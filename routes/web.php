<?php

use Illuminate\Support\Facades\Route;
// use Illuminate\Foundation\Application;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\HistoryController;

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

// Home route
Route::get('/', [HomeController::class, 'index'])->name('home');

// Route untuk login user dengan google
Route::middleware('guest')->group(function () {
Route::get('/auth/google/redirect', [UserAuthController::class, 'redirect'])->name('auth.google.login'); 
Route::get('/auth/google/callback', [UserAuthController::class, 'handleGoogleCallback']);
});
// Route untuk logout user dengan google
Route::middleware('auth')->group(function () {
    Route::post('/auth/google/logout', [UserAuthController::class, 'logout'])->name('auth.google.logout');
});

Route::middleware('admin')->group(function () {
    // dashboard admin
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    // Product routes
    // Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
    Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
    Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store');
    Route::get('/produk/{id_produk}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
    Route::put('/produk/{id_produk}', [ProdukController::class, 'update'])->name('produk.update');
    Route::delete('/produk/{id_produk}', [ProdukController::class, 'destroy'])->name('produk.destroy');
    
    // Review routes
    Route::get('/review/create', [ReviewController::class, 'create'])->name('review.create');
    Route::post('/review', [ReviewController::class, 'store'])->name('review.store');
    Route::get('/review/{id_review}/edit', [ReviewController::class, 'edit'])->name('review.edit');
    Route::put('/review/{id_review}', [ReviewController::class, 'update'])->name('review.update');
    Route::delete('/review/{id_review}', [ReviewController::class, 'destroy'])->name('review.destroy');
});

Route::middleware('auth')->group(function () {
    // Review routes (user can only create, edit, and delete their own review)
});

// Logika Checkout produk bagi pengguna
Route::group(['middleware' => 'auth'], function () {
    Route::get('/cart', [CartController::class, 'cart'])->name('chart');
    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
    Route::post('/cart-items/{id}/quantity', [CartController::class, 'updateQuantity'])->name('cart.update');
    Route::post('/checkout', [OrderController::class, 'submitCheckout'])->name('checkout.submit');
    Route::delete('/cart-items/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
    // order success page
    Route::get('/order/success', [OrderController::class, 'orderSuccess'])->name('order.success');
    // mark order as done
    Route::post('/order/{orderId}/done', [OrderController::class, 'markOrderDone'])->name('markorder.done');
    // history
    Route::get('/history', [HistoryController::class, 'index'])->name('history.index');
});

require __DIR__.'/auth.php';
