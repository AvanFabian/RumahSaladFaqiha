<?php

use Illuminate\Support\Facades\Route;
// use Illuminate\Foundation\Application;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Auth\UserAuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Landing page route
Route::get('/', [HomeController::class, 'index'])->name('home');

// Route untuk login user dengan google
Route::middleware('guest')->group(function () {
Route::get('/auth/google/redirect', [UserAuthController::class, 'redirect'])->name('google.login'); 
Route::get('/auth/google/callback', [UserAuthController::class, 'handleGoogleCallback']);
});
// Route untuk logout user dengan google
Route::middleware('auth')->group(function () {
    Route::post('/auth/google/logout', [UserAuthController::class, 'logout'])->name('google.logout');
});

Route::middleware('admin')->group(function () {
    // dashboard admin
    Route::get('/admin/dashboard', [UserController::class, 'dashboard'])->name('admin.dashboard');
    // Product routes
    // Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
    Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
    Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store');
    Route::get('/produk/{id}', [ProdukController::class, 'show'])->name('produk.show');
    Route::get('/produk/{id}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
    Route::put('/produk/{id}', [ProdukController::class, 'update'])->name('produk.update');
    Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');
});

Route::middleware('auth')->group(function () {
    // Review routes (user can only create, edit, and delete their own review)
    Route::get('/review/create', [ReviewController::class, 'create'])->name('review.create');
    Route::post('/review', [ReviewController::class, 'store'])->name('review.store');
    Route::get('/review/{id}', [ReviewController::class, 'show'])->name('review.show');
    Route::get('/review/{id}/edit', [ReviewController::class, 'edit'])->name('review.edit');
    Route::put('/review/{id}', [ReviewController::class, 'update'])->name('review.update');
    Route::delete('/review/{id}', [ReviewController::class, 'destroy'])->name('review.destroy');
});

Route::middleware('auth')->group(function () {
    // Order routes (user can only view their own order)
    Route::post('/order', [OrderController::class, 'store'])->name('order.store'); // Checkout
    Route::get('/order/{id}', [OrderController::class, 'show'])->name('order.show'); // View order
    Route::delete('/order/{orderId}/product/{productId}', [OrderController::class, 'removeProduct'])->name('order.product.destroy'); // Remove product from order
});

require __DIR__.'/auth.php';
