<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\StockLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::with('user')->latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('payment_status')) {
            $query->where('payment_status', $request->payment_status);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->whereHas('user', fn ($u) => $u->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%"))
                  ->orWhere('id', is_numeric($search) ? $search : null);
            });
        }

        $orders = $query->paginate(20)->withQueryString();

        $statusList        = ['Menunggu Pembayaran', 'Pembayaran Dikonfirmasi', 'Diproses', 'Dikirim', 'Selesai', 'Dibatalkan'];
        $paymentStatusList = ['pending', 'proof_uploaded', 'paid', 'rejected'];

        // Ringkasan untuk header
        $summary = [
            'pending_proof' => Order::where('payment_status', 'proof_uploaded')->count(),
            'pending_order' => Order::where('status', 'Menunggu Pembayaran')->count(),
        ];

        return view('admin.orders.index', compact('orders', 'statusList', 'paymentStatusList', 'summary'));
    }

    public function show(Order $order)
    {
        $order->load('items.product', 'user');
        return view('admin.orders.show', compact('order'));
    }

    /**
     * Konfirmasi pembayaran (approve bukti transfer)
     */
    public function confirmPayment(Order $order)
    {
        if ($order->payment_status !== 'proof_uploaded') {
            return back()->with('error', 'Tidak ada bukti pembayaran yang menunggu konfirmasi.');
        }

        $order->update([
            'payment_status' => 'paid',
            'status'         => 'Pembayaran Dikonfirmasi',
            'paid_at'        => now(),
        ]);

        // Kirim notifikasi ke user
        try {
            $order->user->notify(new \App\Notifications\OrderPaidNotification($order));
        } catch (\Exception $e) {
            // Jangan hentikan proses kalau notifikasi gagal
        }

        return back()->with('success', 'Pembayaran berhasil dikonfirmasi. Pesanan siap diproses.');
    }

    /**
     * Tolak bukti pembayaran
     */
    public function rejectPayment(Request $request, Order $order)
    {
        $request->validate([
            'rejection_reason' => 'required|string|max:255',
        ]);

        $order->update([
            'payment_status'           => 'rejected',
            'payment_rejection_reason' => $request->rejection_reason,
        ]);

        return back()->with('success', 'Bukti pembayaran ditolak. User akan diminta mengirim ulang.');
    }

    /**
     * Update status pesanan
     */
    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status'          => 'required|in:Menunggu Pembayaran,Pembayaran Dikonfirmasi,Diproses,Dikirim,Selesai,Dibatalkan',
            'tracking_number' => 'nullable|string|max:100',
            'courier'         => 'nullable|string|max:50',
            'cancel_reason'   => 'nullable|string|max:255',
        ]);

        $oldStatus = $order->status;

        $order->update([
            'status'          => $request->status,
            'tracking_number' => $request->tracking_number ?? $order->tracking_number,
            'courier'         => $request->courier ?? $order->courier,
            'cancel_reason'   => $request->cancel_reason,
        ]);

        // Kembalikan stok jika dibatalkan
        if ($request->status === 'Dibatalkan' && $oldStatus !== 'Dibatalkan') {
            foreach ($order->items as $item) {
                $product = $item->product;
                if (!$product) continue;

                $before = $product->stock;
                $product->increment('stock', $item->quantity);

                StockLog::create([
                    'product_id'      => $product->id,
                    'user_id'         => null,
                    'quantity_before' => $before,
                    'quantity_change' => $item->quantity,
                    'quantity_after'  => $before + $item->quantity,
                    'type'            => 'cancel',
                    'note'            => 'Stok dikembalikan — order #' . $order->id . ' dibatalkan',
                ]);
            }
        }

        // Kirim notifikasi ke user
        try {
            if ($oldStatus !== $request->status) {
                $order->user->notify(new \App\Notifications\OrderStatusNotification($order, $oldStatus));
            }
        } catch (\Exception $e) {
            //
        }

        return redirect()->route('admin.orders.show', $order)
            ->with('success', 'Status pesanan berhasil diperbarui.');
    }

    /**
     * Lihat bukti pembayaran (full size)
     */
    public function viewProof(Order $order)
    {
        if (!$order->payment_proof) {
            abort(404, 'Bukti pembayaran tidak ditemukan.');
        }

        $path = storage_path('app/public/payment_proofs/' . $order->payment_proof);
        if (!file_exists($path)) {
            abort(404, 'File bukti pembayaran tidak ditemukan.');
        }

        return response()->file($path);
    }
}