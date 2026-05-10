<?php

use App\Http\Controllers\Admin;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// ─── PUBLIC ROUTES ────────────────────────────────────────────────────────────
Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/dashboard', [ProductController::class, 'index'])->name('dashboard');
Route::get('/products', [ProductController::class, 'productsIndex'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

// ─── USER ROUTES (Auth) ───────────────────────────────────────────────────────
Route::middleware('auth')->group(function () {

    // Keranjang
    Route::get('/cart',                   [ProductController::class, 'cart'])->name('cart.index');
    Route::post('/cart',                  [ProductController::class, 'addToCart'])->name('cart.add');
    Route::patch('/cart/{product}',       [ProductController::class, 'updateCart'])->name('cart.update');
    Route::delete('/cart/{product}',      [ProductController::class, 'removeCartItem'])->name('cart.remove');

    // Checkout & Kupon
    Route::get('/checkout',               [ProductController::class, 'checkout'])->name('checkout');
    Route::post('/checkout',              [ProductController::class, 'placeOrder'])->name('checkout.place');
    Route::post('/checkout/coupon',       [ProductController::class, 'applyCoupon'])->name('checkout.coupon');
    Route::post('/checkout/coupon/remove',[ProductController::class, 'removeCoupon'])->name('checkout.coupon.remove');

    // Pesanan
    Route::get('/orders',                 [ProductController::class, 'orders'])->name('orders.index');
    Route::get('/orders/{order}',         [ProductController::class, 'orderShow'])->name('orders.show');
    Route::post('/orders/{order}/complete',[ProductController::class, 'completeOrder'])->name('orders.complete');

    // Pembayaran Manual
    Route::get('/payment/{order}',        [ProductController::class, 'payment'])->name('payment.index');
    Route::post('/payment/{order}/proof', [ProductController::class, 'uploadProof'])->name('payment.proof');
    Route::get('/payments',               [ProductController::class, 'paymentHistory'])->name('payment.history');

    // Notifikasi
    Route::get('/notifications',                     [NotificationController::class, 'index'])->name('notifications.index');
    Route::post('/notifications/{id}/read',          [NotificationController::class, 'markRead'])->name('notifications.read');
    Route::post('/notifications/read-all',           [NotificationController::class, 'markAllRead'])->name('notifications.read-all');
});

// ─── ADMIN ROUTES ─────────────────────────────────────────────────────────────
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/', [Admin\DashboardController::class, 'index'])->name('dashboard');

    // Produk
    Route::get('/products',               [Admin\ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create',        [Admin\ProductController::class, 'create'])->name('products.create');
    Route::post('/products',              [Admin\ProductController::class, 'store'])->name('products.store');
    Route::get('/products/{product}/edit',[Admin\ProductController::class, 'edit'])->name('products.edit');
    Route::patch('/products/{product}',   [Admin\ProductController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}',  [Admin\ProductController::class, 'destroy'])->name('products.destroy');

    // Pesanan
    Route::get('/orders',                          [Admin\OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}',                  [Admin\OrderController::class, 'show'])->name('orders.show');
    Route::patch('/orders/{order}/status',         [Admin\OrderController::class, 'updateStatus'])->name('orders.update-status');
    Route::post('/orders/{order}/confirm-payment', [Admin\OrderController::class, 'confirmPayment'])->name('orders.confirm-payment');
    Route::post('/orders/{order}/reject-payment',  [Admin\OrderController::class, 'rejectPayment'])->name('orders.reject-payment');
    Route::get('/orders/{order}/proof',            [Admin\OrderController::class, 'viewProof'])->name('orders.view-proof');

    // Pengguna
    Route::get('/users',                [Admin\UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}',         [Admin\UserController::class, 'show'])->name('users.show');
    Route::post('/users/{user}/toggle-role',[Admin\UserController::class, 'toggleRole'])->name('users.toggle-role');

    // Kupon
    Route::get('/coupons',              [Admin\CouponController::class, 'index'])->name('coupons.index');
    Route::post('/coupons',             [Admin\CouponController::class, 'store'])->name('coupons.store');
    Route::post('/coupons/{coupon}/toggle',[Admin\CouponController::class, 'toggle'])->name('coupons.toggle');
    Route::delete('/coupons/{coupon}',  [Admin\CouponController::class, 'destroy'])->name('coupons.destroy');
});

require __DIR__ . '/auth.php';