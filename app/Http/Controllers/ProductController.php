<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('name')->get();

        return view('dashboard', compact('products'));
    }

    public function productsIndex()
    {
        $products = Product::orderBy('created_at', 'desc')->get();

        return view('products.index', compact('products'));
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

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
        $items = [];
        $subtotal = 0;

        foreach ($this->getCart() as $productId => $quantity) {
            $product = Product::find($productId);
            if (!$product) {
                continue;
            }

            $itemSubtotal = $product->price * $quantity;
            $items[] = [
                'product' => $product,
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
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'nullable|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);
        $quantity = $request->input('quantity', 1);
        $cart = $this->getCart();
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
            return redirect()->route('cart.index')->with('success', 'Produk tidak ditemukan di keranjang.');
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

    public function checkout()
    {
        $cartData = $this->buildCartItems();

        if (count($cartData['items']) === 0) {
            return redirect()->route('dashboard')->with('success', 'Keranjang kosong. Silakan pilih produk terlebih dahulu.');
        }

        $paymentMethods = [
            'bank_transfer' => 'Transfer Bank (Virtual Account)',
            'dana' => 'DANA',
            'qris' => 'QRIS',
        ];

        return view('checkout', [
            'items' => $cartData['items'],
            'subtotal' => $cartData['subtotal'],
            'paymentMethods' => $paymentMethods,
        ]);
    }

    public function placeOrder(Request $request)
    {
        $request->validate([
            'shipping_address' => 'required|string|max:255',
            'payment_method' => 'required|in:bank_transfer,dana,qris',
        ]);

        $cartData = $this->buildCartItems();

        if (count($cartData['items']) === 0) {
            return redirect()->route('dashboard')->with('success', 'Keranjang kosong. Silakan pilih produk terlebih dahulu.');
        }

        $order = DB::transaction(function () use ($request, $cartData) {
            $order = Order::create([
                'user_id' => Auth::id(),
                'total' => $cartData['subtotal'],
                'shipping_address' => $request->shipping_address,
                'payment_method' => $request->payment_method,
                'payment_status' => 'pending',
                'status' => 'Menunggu Pembayaran',
            ]);

            foreach ($cartData['items'] as $item) {
                if ($item['quantity'] > $item['product']->stock) {
                    throw new \Exception('Stok tidak tersedia untuk produk ' . $item['product']->name);
                }

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product']->id,
                    'quantity' => $item['quantity'],
                    'price' => $item['product']->price,
                ]);

                $item['product']->decrement('stock', $item['quantity']);
            }

            return $order;
        });

        session()->forget('cart');

        return redirect()->route('payment.index', $order)->with('success', 'Pesanan berhasil dibuat. Silakan lanjutkan pembayaran.');
    }

    public function orders()
    {
        /** @var \App\Models\User|null $user */
        $user = Auth::user();

        if (!$user) {
            abort(403);
        }

        $orders = $user->orders()
            ->with('items.product')
            ->orderByDesc('created_at')
            ->get();

        return view('orders.index', compact('orders'));
    }

    public function orderShow(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        $order->load('items.product');

        return view('orders.show', compact('order'));
    }

    public function confirmPayment(Request $request, Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        if ($order->payment_status === 'paid') {
            return redirect()->back()->with('success', 'Pembayaran sudah dikonfirmasi.');
        }

        $order->update([
            'payment_status' => 'paid',
            'status' => 'Diproses',
        ]);

        return redirect()->route('orders.show', $order)->with('success', 'Pembayaran berhasil dikonfirmasi. Pesanan sedang diproses.');
    }

    public function payment(Order $order)
    {
        // Verify ownership
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        // Check if already paid
        if ($order->payment_status === 'paid') {
            return redirect()->route('orders.show', $order)->with('info', 'Pesanan ini sudah lunas.');
        }

        $order->load('items.product');

        $paymentMethods = [
            'bank_transfer' => 'Transfer Bank (Virtual Account)',
            'dana' => 'DANA',
            'qris' => 'QRIS',
        ];

        return view('payment.index', compact('order', 'paymentMethods'));
    }

    public function processPayment(Request $request, Order $order)
    {
        // Verify ownership
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        // Validate
        $request->validate([
            'payment_method' => 'required|in:bank_transfer,dana,qris',
        ]);

        // Check if already paid
        if ($order->payment_status === 'paid') {
            return redirect()->route('orders.show', $order)->with('info', 'Pesanan ini sudah lunas.');
        }

        // Update order status to paid
        $order->update([
            'payment_method' => $request->payment_method,
            'payment_status' => 'paid',
            'status' => 'Diproses',
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
