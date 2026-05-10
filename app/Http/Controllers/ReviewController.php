<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Tampilkan form ulasan untuk pesanan yang sudah selesai
     */
    public function create(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        if ($order->status !== 'Selesai') {
            return redirect()->route('orders.show', $order)
                ->with('error', 'Ulasan hanya bisa diberikan untuk pesanan yang sudah selesai.');
        }

        $order->load('items.product');

        // Cek produk mana yang sudah diulas
        $reviewedProductIds = Review::where('order_id', $order->id)
            ->where('user_id', Auth::id())
            ->pluck('product_id')
            ->toArray();

        $pendingItems = $order->items->filter(
            fn($item) => !in_array($item->product_id, $reviewedProductIds) && $item->product
        );

        if ($pendingItems->isEmpty()) {
            return redirect()->route('orders.show', $order)
                ->with('info', 'Semua produk pada pesanan ini sudah diulas.');
        }

        return view('reviews.create', compact('order', 'pendingItems', 'reviewedProductIds'));
    }

    /**
     * Simpan ulasan
     */
    public function store(Request $request, Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        if ($order->status !== 'Selesai') {
            return redirect()->route('orders.show', $order)
                ->with('error', 'Ulasan hanya bisa diberikan untuk pesanan yang sudah selesai.');
        }

        $request->validate([
            'reviews'                => 'required|array|min:1',
            'reviews.*.product_id'   => 'required|exists:products,id',
            'reviews.*.rating'       => 'required|integer|min:1|max:5',
            'reviews.*.comment'      => 'nullable|string|max:1000',
        ]);

        $saved = 0;
        foreach ($request->reviews as $reviewData) {
            // Pastikan produk ini ada di order
            $inOrder = $order->items->firstWhere('product_id', $reviewData['product_id']);
            if (!$inOrder) continue;

            // Upsert — hindari duplikat
            Review::updateOrCreate(
                [
                    'order_id'   => $order->id,
                    'user_id'    => Auth::id(),
                    'product_id' => $reviewData['product_id'],
                ],
                [
                    'rating'      => $reviewData['rating'],
                    'comment'     => $reviewData['comment'] ?? null,
                    'is_approved' => true,
                ]
            );
            $saved++;
        }

        return redirect()->route('orders.show', $order)
            ->with('success', "Terima kasih! {$saved} ulasan berhasil disimpan.");
    }
}