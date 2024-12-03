<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/panel', function () {
    return redirect('/dashboard');
});

// Route::get('/dashboard/logout', function () {
//     return redirect('/logout');
// });

// Route::get('/dashboard/login', function () {
//     return redirect('/login');
// });

Route::middleware('auth')->group(function () {
    Route::get('/produk', [OrderController::class, 'index'])->name('products.index');
    Route::post('/order/{productId}', [OrderController::class, 'store'])->name('orders.store');
    Route::post('/order/{orderId}/upload-payment-proof', [OrderController::class, 'uploadPaymentProof'])->name('orders.uploadPaymentProof');
    Route::get('/dashboard/orders', [OrderController::class, 'userOrders'])->name('dashboard.orders');
});



Route::get('/products', [ProductController::class, 'index'])->name('products.index');


Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');



// LOGIN LOGUOT
Route::get('/login', [LoginController::class, 'index' ] )->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate' ] );
Route::post('/logout', [LoginController::class, 'logout' ] );

Route::get('/register', function () {
    return view('auth.register',[
        "title" => "register",
        "active" => "register"
    ]);
});

// Route::middleware(['auth:sanctum', RoleMiddleware::class . ':admin,super_admin'])->group(function () {

//     Route::get('/dashboard', function () {
//         return redirect('/dashboard');
//     });
        
// });

// Route::middleware(['auth:sanctum', RoleMiddleware::class . ':admin,super_admin'])->prefix('/dashboard');