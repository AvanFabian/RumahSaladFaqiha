<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Produk;
use App\Models\Review;
use App\Models\Toko;

class HomeController extends Controller
{
    public function index()
    {
        $produk = Produk::all(); // semua produk
        $reviews = Review::all(); // semua review
        $shop = Toko::first(); // hanya satu toko

        return Inertia::render('Welcome', [
            'produk' => $produk,
            'reviews' => $reviews,
            'shop' => $shop,
        ]);
    }
}