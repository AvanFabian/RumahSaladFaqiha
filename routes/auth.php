<?php

use App\Http\Controllers\Auth\LoginAdminControlller;
use App\Http\Controllers\Auth\RegisterAdminControlller;
use Illuminate\Support\Facades\Route;

Route::namespace('Auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [LoginAdminControlller::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginAdminControlller::class, 'login'])->name('login.submit');
    Route::post('/logout', [LoginAdminControlller::class, 'logout'])->name('logout');

    Route::get('/register/adminfaqiha24', [RegisterAdminControlller::class, 'showRegistrationForm'])->name('register');
    Route::post('/register/adminfaqiha24', [RegisterAdminControlller::class, 'register'])->name('register.submit');
});
