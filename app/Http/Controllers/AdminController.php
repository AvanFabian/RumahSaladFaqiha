<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Review;
use App\Models\InfoToko;
use App\Models\Order;

class AdminController extends Controller
{
    public function index()
    {
        $produks = Produk::all(); // semua produk
        $review = Review::all(); // semua review
        $infotokos = InfoToko::all(); // hanya satu toko
        $orders = Order::all();
        // blade
        return view('admin.Dashboard', [
            'produk' => $produks,
            'ulasan' => $review,
            'infotoko' => $infotokos,
            'orders' => $orders,
        ]);
    }
}
