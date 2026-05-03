<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\MidtransController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// ─── USER ROUTES (Pembeli) ───────────────────────────────────────────────────
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [ProductController::class, 'index'])->name('dashboard');
    Route::get('/products', [ProductController::class, 'productsIndex'])->name('products.index');
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

    // Keranjang Belanja
    Route::get('/cart', [ProductController::class, 'cart'])->name('cart.index');
    Route::post('/cart', [ProductController::class, 'addToCart'])->name('cart.add');
    Route::patch('/cart/{product}', [ProductController::class, 'updateCart'])->name('cart.update');
    Route::delete('/cart/{product}', [ProductController::class, 'removeCartItem'])->name('cart.remove');

    // Proses Checkout & Kupon
    Route::get('/checkout', [ProductController::class, 'checkout'])->name('checkout');
    Route::post('/checkout', [ProductController::class, 'placeOrder'])->name('checkout.place');
    Route::post('/checkout/apply-coupon', [ProductController::class, 'applyCoupon'])->name('checkout.coupon');

    // Pesanan & Riwayat Pembayaran
    Route::get('/orders', [ProductController::class, 'orders'])->name('orders.index');
    Route::get('/orders/{order}', [ProductController::class, 'orderShow'])->name('orders.show');
    Route::post('/orders/{order}/confirm-payment', [ProductController::class, 'confirmPayment'])->name('orders.payment.confirm');

    // Integrasi Midtrans
    Route::get('/payment/{order}/pay', [MidtransController::class, 'createSnap'])->name('payment.snap');
    Route::get('/payment/{order}/finish', [MidtransController::class, 'finish'])->name('payment.finish');
    Route::get('/payments', [ProductController::class, 'paymentHistory'])->name('payment.history');
    Route::get('/payment/{order}', [ProductController::class, 'payment'])->name('payment.index');
    Route::post('/payment/{order}', [ProductController::class, 'processPayment'])->name('payment.process');

    // Notifikasi
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::post('/notifications/{id}/read', [NotificationController::class, 'markRead'])->name('notifications.read');
    Route::post('/notifications/read-all', [NotificationController::class, 'markAllRead'])->name('notifications.read-all');
});

// ─── MIDTRANS WEBHOOK (Tanpa CSRF) ───────────────────────────────────────────
Route::post('/midtrans/webhook', [MidtransController::class, 'webhook'])
    ->name('midtrans.webhook')
    ->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);

// ─── ADMIN ROUTES (Pemilik Toko) ──────────────────────────────────────────────
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [Admin\DashboardController::class, 'index'])->name('dashboard');

    // Manajemen Produk & Stok (Terintegrasi)
    Route::get('/products', [Admin\ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [Admin\ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [Admin\ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit', [Admin\ProductController::class, 'edit'])->name('products.edit');
    
    // Gunakan PATCH untuk update (Sesuai Controller gabungan)
    Route::patch('/products/{product}', [Admin\ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [Admin\ProductController::class, 'destroy'])->name('products.destroy');

    // Manajemen Pesanan
    Route::get('/orders', [Admin\OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [Admin\OrderController::class, 'show'])->name('orders.show');
    Route::patch('/orders/{order}/status', [Admin\OrderController::class, 'updateStatus'])->name('orders.status');

    // Manajemen Pengguna
    Route::get('/users', [Admin\UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [Admin\UserController::class, 'show'])->name('users.show');
    Route::post('/users/{user}/toggle-role', [Admin\UserController::class, 'toggleRole'])->name('users.toggle-role');

    // Manajemen Kupon
    Route::get('/coupons', [Admin\CouponController::class, 'index'])->name('coupons.index');
    Route::post('/coupons', [Admin\CouponController::class, 'store'])->name('coupons.store');
    Route::post('/coupons/{coupon}/toggle', [Admin\CouponController::class, 'toggle'])->name('coupons.toggle');
    Route::delete('/coupons/{coupon}', [Admin\CouponController::class, 'destroy'])->name('coupons.destroy');
});

require __DIR__ . '/auth.php';