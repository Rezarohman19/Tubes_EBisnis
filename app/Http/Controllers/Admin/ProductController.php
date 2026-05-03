<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\StockLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::orderByDesc('created_at');

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('stock_filter')) {
            match ($request->stock_filter) {
                'low'   => $query->where('stock', '<=', 10)->where('stock', '>', 0),
                'out'   => $query->where('stock', 0),
                'ok'    => $query->where('stock', '>', 10),
                default => null,
            };
        }

        $products = $query->paginate(15)->withQueryString();

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'price'       => 'required|integer|min:0',
            'stock'       => 'required|integer|min:0',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('products', 'public');
            $validated['image'] = basename($path);
        }

        $product = Product::create($validated);

        // Log initial stock
        if ($product->stock > 0) {
            StockLog::create([
                'product_id'      => $product->id,
                'user_id'         => Auth::id(),
                'quantity_before' => 0,
                'quantity_change' => $product->stock,
                'quantity_after'  => $product->stock,
                'type'            => 'restock',
                'note'            => 'Stok awal saat produk dibuat',
            ]);
        }

        return redirect()->route('admin.products.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    public function edit(Product $product)
    {
        $stockLogs = StockLog::where('product_id', $product->id)
            ->with('user')
            ->latest()
            ->take(10)
            ->get();

        return view('admin.products.edit', compact('product', 'stockLogs'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name'             => 'required|string|max:255',
            'description'      => 'required|string',
            'price'            => 'required|integer|min:0',
            'stock_adjustment' => 'required|integer', // Input penyesuaian stok (+ atau -)
            'image'            => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // 1. Logika Update Stok (Hanya jalan jika adjustment bukan 0)
        $adjustment = (int) $validated['stock_adjustment'];
        if ($adjustment !== 0) {
            $before = $product->stock;
            $after  = max(0, $before + $adjustment);

            StockLog::create([
                'product_id'      => $product->id,
                'user_id'         => Auth::id(),
                'quantity_before' => $before,
                'quantity_change' => $adjustment,
                'quantity_after'  => $after,
                'type'            => $adjustment > 0 ? 'restock' : 'adjustment',
                'note'            => 'Update manual via halaman edit produk',
            ]);

            $product->stock = $after;
        }

        // 2. Handle Gambar
        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete('products/' . $product->image);
            }
            $path = $request->file('image')->store('products', 'public');
            $product->image = basename($path);
        }

        // 3. Update Field Lainnya
        $product->name = $validated['name'];
        $product->description = $validated['description'];
        $product->price = $validated['price'];
        
        $product->save();

        return redirect()->route('admin.products.index')
            ->with('success', 'Produk dan stok berhasil diperbarui.');
    }

    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete('products/' . $product->image);
        }

        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Produk berhasil dihapus.');
    }
}