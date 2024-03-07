<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Simpan Variabel isAdmin ke Semua View agar bisa diakses di semua view
        View::composer('*', function ($view) {
            $view->with('isAdmin', Auth::guard('admin')->check());
        });
    }
}
