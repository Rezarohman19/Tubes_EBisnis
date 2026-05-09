<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    // ─── PUBLIC HOME (tanpa login) ───────────────────────────────────────────
    public function publicHome(Request $request)
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
                'newest'     => $query->orderBy('created_at', 'desc'),
                default      => null,
            };
        }

        $products = $query->get();

        return view('home', compact('products'));
    }

    // ─── DASHBOARD (logged in) ───────────────────────────────────────────────
    public function index()
    {
        $products = Product::orderBy('name')->get();
        return view('dashboard', compact('products'));
    }

    // ─── PRODUCTS INDEX (public, with filter) ────────────────────────────────
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

        $products = $query->get();

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
        // Wajib login untuk tambah ke keranjang
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
            return redirect()->route('dashboard')->with('error', 'Keranjang kosong. Silakan pilih produk terlebih dahulu.');
        }

        // Ambil kupon dari session jika ada
        $couponCode  = session('coupon_code');
        $discount    = session('coupon_discount', 0);
        $couponError = null;

        $grandTotal = max(0, $cartData['subtotal'] - $discount);

        $paymentMethods = [
            'dana'          => 'DANA',
            'qris'          => 'QRIS',
            'gopay'         => 'GoPay',
            'ovo'           => 'OVO',
            'shopee_pay'    => 'ShopeePay',
            'bank_transfer' => 'Transfer Bank (Virtual Account)',
        ];

        return view('checkout', [
            'items'          => $cartData['items'],
            'subtotal'       => $cartData['subtotal'],
            'discount'       => $discount,
            'grandTotal'     => $grandTotal,
            'couponCode'     => $couponCode,
            'couponError'    => $couponError,
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
            'shipping_address' => 'required|string|max:255',
            'payment_method'   => 'required|in:dana,qris,gopay,ovo,shopee_pay,bank_transfer',
        ]);

        $cartData = $this->buildCartItems();

        if (count($cartData['items']) === 0) {
            return redirect()->route('dashboard')->with('error', 'Keranjang kosong.');
        }

        // Hitung diskon dari session
        $discount   = session('coupon_discount', 0);
        $couponCode = session('coupon_code');
        $grandTotal = max(0, $cartData['subtotal'] - $discount);

        $order = DB::transaction(function () use ($request, $cartData, $discount, $couponCode, $grandTotal) {
            $order = Order::create([
                'user_id'          => Auth::id(),
                'total'            => $grandTotal,
                'shipping_address' => $request->shipping_address,
                'payment_method'   => $request->payment_method,
                'payment_status'   => 'pending',
                'status'           => 'Menunggu Pembayaran',
                'discount'         => $discount,
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

            // Tambah used_count kupon
            if ($couponCode) {
                Coupon::where('code', $couponCode)->increment('used_count');
            }

            return $order;
        });

        session()->forget(['cart', 'coupon_code', 'coupon_discount']);

        return redirect()->route('payment.index', $order)->with('success', 'Pesanan berhasil dibuat. Silakan lanjutkan pembayaran.');
    }

    // ─── ORDERS ──────────────────────────────────────────────────────────────
    public function orders()
    {
        /** @var \App\Models\User|null $user */
        $user = Auth::user();
        if (!$user) abort(403);

        $orders = $user->orders()
            ->with('items.product')
            ->orderByDesc('created_at')
            ->get();

        return view('orders.index', compact('orders'));
    }

    public function orderShow(Order $order)
    {
        if ($order->user_id !== Auth::id()) abort(403);
        $order->load('items.product');
        return view('orders.show', compact('order'));
    }

    public function confirmPayment(Request $request, Order $order)
    {
        if ($order->user_id !== Auth::id()) abort(403);

        if ($order->payment_status === 'paid') {
            return redirect()->back()->with('info', 'Pembayaran sudah dikonfirmasi.');
        }

        $order->update([
            'payment_status' => 'paid',
            'status'         => 'Diproses',
            'paid_at'        => now(),
        ]);

        return redirect()->route('orders.show', $order)->with('success', 'Pembayaran berhasil dikonfirmasi. Pesanan sedang diproses.');
    }

    public function completeOrder(Order $order)
    {
        if ($order->user_id !== Auth::id()) abort(403);

        if ($order->status !== 'Dikirim') {
            return redirect()->back()->with('error', 'Pesanan hanya bisa diselesaikan setelah status Dikirim.');
        }

        $order->update(['status' => 'Selesai']);

        return redirect()->route('orders.show', $order)->with('success', 'Pesanan berhasil diselesaikan. Terima kasih sudah berbelanja!');
    }

    // ─── PAYMENT ─────────────────────────────────────────────────────────────
    public function payment(Order $order)
    {
        if ($order->user_id !== Auth::id()) abort(403);

        if ($order->payment_status === 'paid') {
            return redirect()->route('orders.show', $order)->with('info', 'Pesanan ini sudah lunas.');
        }

        $order->load('items.product');

        $paymentMethods = [
            'dana'          => 'DANA',
            'qris'          => 'QRIS',
            'gopay'         => 'GoPay',
            'ovo'           => 'OVO',
            'shopee_pay'    => 'ShopeePay',
            'bank_transfer' => 'Transfer Bank (Virtual Account)',
        ];

        return view('payment.index', compact('order', 'paymentMethods'));
    }

    public function processPayment(Request $request, Order $order)
    {
        if ($order->user_id !== Auth::id()) abort(403);

        $request->validate([
            'payment_method' => 'required|in:dana,qris,gopay,ovo,shopee_pay,bank_transfer',
        ]);

        if ($order->payment_status === 'paid') {
            return redirect()->route('orders.show', $order)->with('info', 'Pesanan ini sudah lunas.');
        }

        $order->update([
            'payment_method' => $request->payment_method,
            'payment_status' => 'paid',
            'status'         => 'Diproses',
            'paid_at'        => now(),
        ]);

        return redirect()->route('orders.show', $order)->with('success', 'Pembayaran berhasil! Pesanan Anda sedang diproses.');
    }

    public function paymentHistory()
    {
        $orders = Order::where('user_id', Auth::id())
            ->orderByDesc('created_at')
            ->get();

        return view('payment.history.index', compact('orders'));
    }
}