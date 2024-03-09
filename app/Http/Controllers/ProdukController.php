<?php

namespace App\Http\Controllers;
use App\Models\Produk; // import the Produk model
use App\Models\OpsiProduk; // import the OpsiProduk model
use Illuminate\Http\Request;

class ProdukController extends Controller
{

    // Tampilkan Halaman Tambah Produk
    public function create()
    {
        return view('produk.Create');

    }

    // Simpan Produk ke Database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'desc' => 'required',
            'image' => 'required',
            'harga' => 'required',
            // 'nama_opsi' => 'required', // validate the product option field
        ]);

        $produk = Produk::create($request->all());

        // Create the product option
        // OpsiProduk::create([
        //     'nama_opsi' => $request->nama_opsi,
        //     'id_produk' => $produk->id,
        // ]);

        return redirect()->route('admin.dashboard') 
            ->with('success', 'Produk created successfully.');
    }

    // halaman Edit produk
    public function edit(Produk $produk)
    {
        return view('produks.Edit', [
            'produk' => $produk
        ]);
    }

    // proses backend Edit produk
    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            'title' => 'required',
            'desc' => 'required',
            'image' => 'required',
            'harga' => 'required',
            'nama_opsi' => 'required', // validate the product option field
        ]);

        $produk->update($request->all());

        // Update the product option
        $produk->opsiProduk->update([
            'nama_opsi' => $request->nama_opsi,
        ]);

        // Redirect to the products index page
        return redirect()->route('produks.index')
            ->with('success', 'Produk updated successfully');
    }

    // Hapus produk
    public function destroy(Produk $produk)
    {
        // Delete the product option
        $produk->opsiProduk->delete();

        $produk->delete();

        // Redirect to the products
        return redirect()->route('produks.index')
            ->with('success', 'Produk deleted successfully');
    }
}
