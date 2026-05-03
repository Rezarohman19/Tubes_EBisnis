<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\StockLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class MidtransController extends Controller
{
    /**
     * Buat Snap token untuk order, redirect ke Midtrans hosted payment page.
     */
    public function createSnap(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        if ($order->payment_status === 'paid') {
            return redirect()->route('orders.show', $order)->with('info', 'Pesanan sudah lunas.');
        }

        // Setup Midtrans
        \Midtrans\Config::$serverKey    = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = config('midtrans.is_production');
        \Midtrans\Config::$isSanitized  = true;
        \Midtrans\Config::$is3ds        = true;

        $orderId = 'FROZY-' . $order->id . '-' . time();

        $params = [
            'transaction_details' => [
                'order_id'     => $orderId,
                'gross_amount' => $order->grand_total,
            ],
            'customer_details' => [
                'first_name' => $order->user->name,
                'email'      => $order->user->email,
            ],
            'item_details' => $order->items->map(fn ($item) => [
                'id'       => $item->product_id,
                'price'    => $item->price,
                'quantity' => $item->quantity,
                'name'     => substr($item->product->name, 0, 50),
            ])->toArray(),
            'callbacks' => [
                'finish' => route('payment.finish', $order),
            ],
        ];

        try {
            $snapToken = \Midtrans\Snap::getSnapToken($params);
            $snapUrl   = \Midtrans\Snap::createTransaction($params)->redirect_url;

            $order->update([
                'midtrans_order_id'  => $orderId,
                'midtrans_snap_token'=> $snapToken,
                'snap_redirect_url'  => $snapUrl,
            ]);

            // Redirect ke halaman payment dengan snap.js
            return view('payment.midtrans', compact('order', 'snapToken'));

        } catch (\Exception $e) {
            Log::error('Midtrans error: ' . $e->getMessage());
            return redirect()->route('orders.show', $order)
                ->with('error', 'Gagal menghubungi gateway pembayaran. Silakan coba lagi.');
        }
    }

    /**
     * Halaman setelah selesai dari Midtrans (redirect callback).
     */
    public function finish(Request $request, Order $order)
    {
        return redirect()->route('orders.show', $order)
            ->with('info', 'Pembayaran sedang diproses. Status akan diperbarui otomatis.');
    }

    /**
     * Webhook dari Midtrans (notification callback) — tidak perlu auth.
     */
    public function webhook(Request $request)
    {
        \Midtrans\Config::$serverKey    = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = config('midtrans.is_production');

        try {
            $notification = new \Midtrans\Notification();

            $orderId           = $notification->order_id;
            $transactionStatus = $notification->transaction_status;
            $fraudStatus       = $notification->fraud_status ?? 'accept';
            $transactionId     = $notification->transaction_id;

            // Order ID format: FROZY-{id}-{timestamp}
            $orderIdPart = explode('-', $orderId);
            $order = Order::find($orderIdPart[1] ?? null);

            if (!$order) {
                Log::warning('Midtrans webhook: order not found for ' . $orderId);
                return response()->json(['message' => 'Order not found'], 404);
            }

            $order->update([
                'midtrans_transaction_id' => $transactionId,
                'midtrans_status'         => $transactionStatus,
            ]);

            if ($transactionStatus === 'capture' && $fraudStatus === 'accept') {
                $this->markPaid($order);
            } elseif ($transactionStatus === 'settlement') {
                $this->markPaid($order);
            } elseif (in_array($transactionStatus, ['cancel', 'deny', 'expire'])) {
                $order->update([
                    'payment_status' => $transactionStatus === 'expire' ? 'expired' : 'failed',
                    'status'         => 'Dibatalkan',
                ]);
            } elseif ($transactionStatus === 'pending') {
                $order->update(['payment_status' => 'pending']);
            }

            return response()->json(['message' => 'OK']);

        } catch (\Exception $e) {
            Log::error('Midtrans webhook error: ' . $e->getMessage());
            return response()->json(['message' => 'Error'], 500);
        }
    }

    private function markPaid(Order $order): void
    {
        if ($order->payment_status === 'paid') return;

        $order->update([
            'payment_status' => 'paid',
            'status'         => 'Diproses',
            'paid_at'        => now(),
        ]);

        // Kirim notifikasi ke user
        $order->user->notify(new \App\Notifications\OrderPaidNotification($order));
    }
}