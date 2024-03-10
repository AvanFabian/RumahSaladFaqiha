<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Review;
use App\Models\InfoToko;

class HomeController extends Controller
{
    public function index()
    {
        $menusalads = Produk::all(); // semua produk
        $reviews = Review::all(); // semua review
        $shops = InfoToko::first(); // hanya satu toko

        // landing home.blade.php
        return view('Home', [
            'menusalad' => $menusalads,
            'reviews' => $reviews,
            'shop' => $shops,
        ]);
    }
}