<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Order;
use App\Models\Produk;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    // Simpan Order ke Database (store method)
    public function store(Request $request)
    {
        $order = new Order; // create a new order
        $order->id_user = $request->user()->id; // store the user id
        $order->total_harga = $request->total_harga; // store the total price
        $order->status = 'pending'; // store the status of the order
        $order->userEmail = $request->user()->email; // store the user email
        $order->save(); // save the order to the database

        foreach ($request->products as $product) {
            $produk = Produk::find($product['id']); // find the product
            $order->products()->attach($produk->id, [ // attach the product to the order
                'harga' => $produk->harga,
                'nama_produk' => $produk->nama,
                'jumlah' => $product['jumlah'], // store the quantity of the product
            ]);
        }

        return response()->json(['message' => 'Order created successfully']);
    }

    // Tampilkan Halaman Tambah Order (show method)
    public function show()
    {
        return view('admin.crud.Create');
    }

    // Hapus Order dari Database (removeProduct method)
    public function removeProduct(Order $order)
    {
        $order->delete();
        return response()->json(['message' => 'Order deleted successfully']);
    }
}