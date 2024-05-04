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
        $produks = Produk::paginate(5); // semua produk
        $review = Review::paginate(5); // semua review
        $infotokos = InfoToko::paginate(5); // hanya satu toko
        $orders = Order::with('products')->paginate(5); // semua order (4 per halaman)
        $hasInfoToko = InfoToko::exists(); // check if there is at least one record in the InfoToko table

        return view('admin.Dashboard', [
            'produk' => $produks,
            'ulasan' => $review,
            'infotoko' => $infotokos,
            'orders' => $orders,
            'hasInfoToko' => $hasInfoToko, // pass the variable to the view
        ]);
    }
}
