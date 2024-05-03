<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Review;
use App\Models\InfoToko;

class HomeController extends Controller
{
    public function index()
    {
        $menusalads = Produk::where('kategori', 'menusalad')->paginate(5); // 5 items per page
        $menulains = Produk::where('kategori', 'menulain')->paginate(5); // 5 items per page
        $reviews = Review::paginate(5); // 5 items per page
        $tokos = InfoToko::first(); // hanya satu toko

        // landing home.blade.php
        return view('Home', [
            'menusalad' => $menusalads,
            'menulain' => $menulains,
            'reviews' => $reviews,
            'socialMedia' => $tokos,
        ]);
    }
}