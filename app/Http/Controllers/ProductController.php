<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // ─── DASHBOARD (landing page) ──────────────────────────────────────────────
    public function index(Request $request)
    {
        // Beranda: tampilkan produk featured (tanpa filter/search — itu di katalog)
        $products = Product::where('stock', '>', 0)
            ->orderByDesc('created_at')
            ->take(8)
            ->get();

        return view('dashboard', compact('products'));
    }

    // ─── PRODUCTS INDEX (katalog, dengan search & filter) ─────────────────────
    public function productsIndex(Request $request)
    {
        $query = Product::orderBy('created_at', 'desc');

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('stock_filter')) {
            match ($request->stock_filter) {
                'available' => $query->where('stock', '>', 0),
                'out'       => $query->where('stock', 0),
                default     => null,
            };
        }

        if ($request->filled('sort')) {
            match ($request->sort) {
                'price_asc'  => $query->orderBy('price', 'asc'),
                'price_desc' => $query->orderBy('price', 'desc'),
                'newest'     => $query->latest(),
                default      => null,
            };
        }

        $products = $query->paginate(12)->withQueryString();

        return view('products.index', compact('products'));
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    // ─── CART ────────────────────────────────────────────────────────────────
    protected function getCart(): array
    {
        return session('cart', []);
    }

    protected function saveCart(array $cart): void
    {
        session(['cart' => $cart]);
    }

    protected function buildCartItems(): array
    {
        $items    = [];
        $subtotal = 0;

        foreach ($this->getCart() as $productId => $quantity) {
            $product = Product::find($productId);
            if (!$product) continue;

            $itemSubtotal = $product->price * $quantity;
            $items[]      = [
                'product'  => $product,
                'quantity' => $quantity,
                'subtotal' => $itemSubtotal,
            ];
            $subtotal += $itemSubtotal;
        }

        return ['items' => $items, 'subtotal' => $subtotal];
    }

    public function cart()
    {
        $cartData = $this->buildCartItems();
        return view('cart', $cartData);
    }

    public function addToCart(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('info', 'Silakan login terlebih dahulu untuk menambahkan produk ke keranjang.');
        }

        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity'   => 'nullable|integer|min:1',
        ]);

        $product  = Product::findOrFail($request->product_id);
        $quantity = $request->input('quantity', 1);
        $cart     = $this->getCart();

        $cart[$product->id] = ($cart[$product->id] ?? 0) + $quantity;
        if ($cart[$product->id] > $product->stock) {
            $cart[$product->id] = $product->stock;
        }

        $this->saveCart($cart);

        return redirect()->route('cart.index')->with('success', 'Produk berhasil ditambahkan ke keranjang.');
    }

    public function updateCart(Request $request, Product $product)
    {
        $request->validate([
            'quantity' => ['required', 'integer', 'min:1', 'max:' . $product->stock],
        ]);

        $cart = $this->getCart();
        if (!isset($cart[$product->id])) {
            return redirect()->route('cart.index')->with('error', 'Produk tidak ditemukan di keranjang.');
        }

        $cart[$product->id] = $request->quantity;
        $this->saveCart($cart);

        return redirect()->route('cart.index')->with('success', 'Jumlah keranjang berhasil diperbarui.');
    }

    public function removeCartItem(Product $product)
    {
        $cart = $this->getCart();
        unset($cart[$product->id]);
        $this->saveCart($cart);

        return redirect()->route('cart.index')->with('success', 'Produk dihapus dari keranjang.');
    }

    // ─── CHECKOUT ────────────────────────────────────────────────────────────
    public function checkout()
    {
        $cartData = $this->buildCartItems();

        if (count($cartData['items']) === 0) {
            return redirect()->route('home')->with('error', 'Keranjang kosong.');
        }

        $couponCode  = session('coupon_code');
        $discount    = session('coupon_discount', 0);

        $netTotal    = max(0, $cartData['subtotal'] - $discount);
        $shippingFee = $netTotal >= 150000 ? 0 : 15000;
        $grandTotal  = $netTotal + $shippingFee;

        $paymentMethods = config('payment.methods');

        return view('checkout', [
            'items'          => $cartData['items'],
            'subtotal'       => $cartData['subtotal'],
            'discount'       => $discount,
            'shipping_cost'  => $shippingFee,
            'grandTotal'     => $grandTotal,
            'couponCode'     => $couponCode,
            'paymentMethods' => $paymentMethods,
        ]);
    }

    public function applyCoupon(Request $request)
    {
        $request->validate(['coupon_code' => 'required|string']);

        $cartData = $this->buildCartItems();
        $coupon   = Coupon::where('code', strtoupper($request->coupon_code))->first();

        if (!$coupon || !$coupon->isValid($cartData['subtotal'])) {
            session()->forget(['coupon_code', 'coupon_discount']);
            return redirect()->route('checkout')->with('coupon_error', 'Kupon tidak valid atau tidak memenuhi syarat minimum pembelian.');
        }

        $discount = $coupon->calculateDiscount($cartData['subtotal']);
        session([
            'coupon_code'     => $coupon->code,
            'coupon_discount' => $discount,
        ]);

        return redirect()->route('checkout')->with('success', "Kupon {$coupon->code} berhasil diterapkan! Diskon: Rp " . number_format($discount, 0, ',', '.'));
    }

    public function removeCoupon()
    {
        session()->forget(['coupon_code', 'coupon_discount']);
        return redirect()->route('checkout')->with('success', 'Kupon berhasil dihapus.');
    }

    public function placeOrder(Request $request)
    {
        $request->validate([
            'shipping_address' => 'required|string|max:500',
            'payment_method'   => 'required|in:' . implode(',', array_keys(config('payment.methods'))),
        ]);

        $cartData = $this->buildCartItems();

        if (count($cartData['items']) === 0) {
            return redirect()->route('home')->with('error', 'Keranjang kosong.');
        }

        $discount    = session('coupon_discount', 0);
        $couponCode  = session('coupon_code');
        $netTotal    = max(0, $cartData['subtotal'] - $discount);
        $shippingFee = $netTotal >= 150000 ? 0 : 15000;
        $grandTotal  = $netTotal + $shippingFee;

        $order = DB::transaction(function () use ($request, $cartData, $discount, $couponCode, $shippingFee, $grandTotal) {
            $isCod = $request->payment_method === 'cod';

            $order = Order::create([
                'user_id'          => Auth::id(),
                'total'            => $grandTotal,
                'shipping_address' => $request->shipping_address,
                'payment_method'   => $request->payment_method,
                'payment_status'   => $isCod ? 'pending' : 'pending',
                'status'           => 'Menunggu Pembayaran',
                'discount'         => $discount,
                'shipping_cost'    => $shippingFee,
                'coupon_code'      => $couponCode,
            ]);

            foreach ($cartData['items'] as $item) {
                if ($item['quantity'] > $item['product']->stock) {
                    throw new \Exception('Stok tidak tersedia untuk produk ' . $item['product']->name);
                }

                OrderItem::create([
                    'order_id'   => $order->id,
                    'product_id' => $item['product']->id,
                    'quantity'   => $item['quantity'],
                    'price'      => $item['product']->price,
                ]);

                $item['product']->decrement('stock', $item['quantity']);
            }

            if ($couponCode) {
                Coupon::where('code', $couponCode)->increment('used_count');
            }

            return $order;
        });

        session()->forget(['cart', 'coupon_code', 'coupon_discount']);

        // COD langsung ke detail pesanan
        if ($order->isCod()) {
            return redirect()->route('orders.show', $order)
                ->with('success', 'Pesanan berhasil dibuat! Pembayaran dilakukan saat barang tiba.');
        }

        return redirect()->route('payment.index', $order)
            ->with('success', 'Pesanan berhasil dibuat! Silakan lakukan pembayaran.');
    }

    // ─── ORDERS ──────────────────────────────────────────────────────────────
    public function orders(Request $request)
    {
        /** @var \App\Models\User|null $user */
        $user = Auth::user();
        if (!$user) abort(403);

        $query = $user->orders()->with('items.product')->latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $orders = $query->paginate(10)->withQueryString();

        return view('orders.index', compact('orders'));
    }

    public function orderShow(Order $order)
    {
        if ($order->user_id !== Auth::id()) abort(403);
        $order->load('items.product');
        return view('orders.show', compact('order'));
    }

    public function completeOrder(Order $order)
    {
        if ($order->user_id !== Auth::id()) abort(403);

        if ($order->status !== 'Dikirim') {
            return redirect()->back()->with('error', 'Pesanan hanya bisa diselesaikan setelah status Dikirim.');
        }

        $order->update(['status' => 'Selesai']);

        return redirect()->route('orders.show', $order)
            ->with('success', 'Pesanan berhasil diselesaikan. Terima kasih sudah berbelanja!');
    }

    // ─── PAYMENT ─────────────────────────────────────────────────────────────
    public function payment(Order $order)
    {
        if ($order->user_id !== Auth::id()) abort(403);

        if ($order->payment_status === 'paid') {
            return redirect()->route('orders.show', $order)->with('info', 'Pesanan ini sudah lunas.');
        }

        if ($order->isCod()) {
            return redirect()->route('orders.show', $order)->with('info', 'Pesanan ini menggunakan COD.');
        }

        $order->load('items.product');
        $methodConfig = config('payment.methods.' . $order->payment_method);

        return view('payment.index', compact('order', 'methodConfig'));
    }

    public function uploadProof(Request $request, Order $order)
    {
        if ($order->user_id !== Auth::id()) abort(403);

        if (!$order->canUploadProof()) {
            return redirect()->back()->with('error', 'Tidak dapat mengunggah bukti pembayaran untuk pesanan ini.');
        }

        $request->validate([
            'payment_proof' => 'required|image|mimes:jpeg,png,jpg,webp|max:4096',
        ]);

        // Hapus bukti lama jika ada
        if ($order->payment_proof) {
            Storage::disk('public')->delete('payment_proofs/' . $order->payment_proof);
        }

        $file     = $request->file('payment_proof');
        $filename = time() . '_' . $order->id . '.' . $file->extension();
        $file->storeAs('payment_proofs', $filename, 'public');

        $order->update([
            'payment_proof'              => $filename,
            'payment_proof_uploaded_at'  => now(),
            'payment_status'             => 'proof_uploaded',
        ]);

        // Notifikasi admin (opsional — bisa diaktifkan jika ada admin notification)
        // Notification::send(User::admins()->get(), new PaymentProofUploaded($order));

        return redirect()->route('orders.show', $order)
            ->with('success', 'Bukti pembayaran berhasil dikirim! Admin akan memverifikasi dalam 1×24 jam.');
    }

    public function paymentHistory(Request $request)
    {
        $orders = Order::where('user_id', Auth::id())
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('payment.history.index', compact('orders'));
    }
}