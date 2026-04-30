<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [ProductController::class, 'index'])->name('dashboard');
    Route::get('/products', [ProductController::class, 'productsIndex'])->name('products.index');
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/cart', [ProductController::class, 'cart'])->name('cart.index');
    Route::post('/cart', [ProductController::class, 'addToCart'])->name('cart.add');
    Route::patch('/cart/{product}', [ProductController::class, 'updateCart'])->name('cart.update');
    Route::delete('/cart/{product}', [ProductController::class, 'removeCartItem'])->name('cart.remove');
    Route::get('/checkout', [ProductController::class, 'checkout'])->name('checkout');
    Route::post('/checkout', [ProductController::class, 'placeOrder'])->name('checkout.place');
    Route::get('/orders', [ProductController::class, 'orders'])->name('orders.index');
    Route::get('/orders/{order}', [ProductController::class, 'orderShow'])->name('orders.show');
    Route::post('/orders/{order}/confirm-payment', [ProductController::class, 'confirmPayment'])->name('orders.payment.confirm');
    
    // Payment routes
    Route::get('/payments', [ProductController::class, 'paymentHistory'])->name('payment.history');
    Route::get('/payment/{order}', [ProductController::class, 'payment'])->name('payment.index');
    Route::post('/payment/{order}', [ProductController::class, 'processPayment'])->name('payment.process');
});

require __DIR__.'/auth.php';

