<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Review;
use App\Models\InfoToko;

class HomeController extends Controller
{
    public function index()
    {
        $menusalads = Produk::where('kategori', 'menusalad')->get();
        $menulains = Produk::where('kategori', 'menulain')->get();
        $reviews = Review::all(); // semua review
        $shops = InfoToko::first(); // hanya satu toko

        // landing home.blade.php
        return view('Home', [
            'menusalad' => $menusalads,
            'menulain' => $menulains,
            'reviews' => $reviews,
            'shop' => $shops,
        ]);
    }
}