<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Review;
use App\Models\InfoToko;

class AdminController extends Controller
{
    public function index()
    {
        $produks = Produk::all(); // semua produk
        $review = Review::all(); // semua review
        $infotokos = InfoToko::all(); // hanya satu toko
        // blade
        return view('admin.Dashboard', [
            'produk' => $produks,
            'ulasan' => $review,
            'infotoko' => $infotokos,
        ]);
    }
}
