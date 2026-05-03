<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\StockLog;
use Illuminate\Http\Request;

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
            $query->whereHas('user', fn ($q) => $q->where('name', 'like', '%' . $request->search . '%'))
                ->orWhere('id', $request->search);
        }

        $orders = $query->paginate(20)->withQueryString();

        $statusList = ['Menunggu Pembayaran', 'Diproses', 'Dikirim', 'Selesai', 'Dibatalkan'];

        return view('admin.orders.index', compact('orders', 'statusList'));
    }

    public function show(Order $order)
    {
        $order->load('items.product', 'user');
        return view('admin.orders.show', compact('order'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status'         => 'required|in:Menunggu Pembayaran,Diproses,Dikirim,Selesai,Dibatalkan',
            'tracking_number'=> 'nullable|string|max:100',
            'courier'        => 'nullable|string|max:50',
            'cancel_reason'  => 'nullable|string|max:255',
        ]);

        $oldStatus = $order->status;

        $order->update([
            'status'          => $request->status,
            'tracking_number' => $request->tracking_number ?? $order->tracking_number,
            'courier'         => $request->courier ?? $order->courier,
            'cancel_reason'   => $request->cancel_reason,
        ]);

        // Jika dibatalkan, kembalikan stok
        if ($request->status === 'Dibatalkan' && $oldStatus !== 'Dibatalkan') {
            foreach ($order->items as $item) {
                $product = $item->product;
                $before  = $product->stock;
                $product->increment('stock', $item->quantity);

                StockLog::create([
                    'product_id'      => $product->id,
                    'user_id'         => null,
                    'quantity_before' => $before,
                    'quantity_change' => $item->quantity,
                    'quantity_after'  => $before + $item->quantity,
                    'type'            => 'cancel',
                    'note'            => 'Stok dikembalikan karena order #' . $order->id . ' dibatalkan',
                ]);
            }
        }

        return redirect()->route('admin.orders.show', $order)
            ->with('success', 'Status pesanan diperbarui.');
    }
}