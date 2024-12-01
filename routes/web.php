<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return redirect('/dashboard/login');
});

Route::get('/panel', function () {
    return redirect('/dashboard');
});


use App\Http\Controllers\OrderController;

Route::middleware('auth')->group(function () {
    Route::get('/produk', [OrderController::class, 'index'])->name('products.index');
    // Menyimpan pesanan
    Route::post('/order/{productId}', [OrderController::class, 'store'])->name('orders.store');

    // Menyimpan bukti pembayaran
    Route::post('/order/{orderId}/upload-payment-proof', [OrderController::class, 'uploadPaymentProof'])->name('orders.uploadPaymentProof');

    // Halaman pesanan pengguna
    Route::get('/dashboard/orders', [OrderController::class, 'userOrders'])->name('dashboard.orders');
});


use App\Http\Controllers\ProductController;

// Menampilkan daftar produk
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// Menampilkan detail produk
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');
