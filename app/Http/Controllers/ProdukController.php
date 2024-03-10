<?php

namespace App\Http\Controllers;
use App\Models\Produk; // import the Produk model
// use App\Models\OpsiProduk; // import the OpsiProduk model
use Illuminate\Http\Request;

class ProdukController extends Controller
{

    // Tampilkan Halaman Tambah Produk
    public function create()
    {
        return view('admin.produk.Create');

    }

    // Simpan Produk ke Database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'desc' => 'required',
            'image' => 'required|image',
            'harga' => 'required',
            // 'nama_opsi' => 'required', // validate the product option field
        ]);

        $imagePath = $request->file('image')->store('uploads', 'public');
        
        $produk = Produk::create([
            'title' => $request->title,
            'desc' => $request->desc,
            'image' => $imagePath,
            'harga' => $request->harga,
        ]);

        
        return redirect()->route('produk.create') 
        ->with('success', 'Produk created successfully.');
    }
    // Create the product option
    // OpsiProduk::create([
    //     'nama_opsi' => $request->nama_opsi,
    //     'id_produk' => $produk->id,
    // ]);

    // halaman Edit produk
    public function edit(Produk $id_produk)
    {
        return view('admin.produk.Edit', [
            'produk' => $id_produk
        ]);
    }

    // proses backend Edit produk
    public function update(Request $request, Produk $id_produk)
    {
        $request->validate([
            'title' => 'required',
            'desc' => 'required',
            'image' => 'required|image',
            'harga' => 'required',
        ]);
    
        $imagePath = $request->file('image')->store('uploads', 'public');
    
        $id_produk->update([
            'title' => $request->title,
            'desc' => $request->desc,
            'image' => $imagePath,
            'harga' => $request->harga,
        ]);
    
        return redirect()->route('admin.dashboard')
            ->with('success', 'Produk updated successfully');
    }
    // Update the product option
    // $produk->opsiProduk->update([
    //     'nama_opsi' => $request->nama_opsi,
    // ]);

    // Hapus produk
    public function destroy(Produk $id_produk)
    {
        // Delete the product option
        // $produk->opsiProduk->delete();

        $id_produk->delete();

        // Redirect to the products
        return redirect()->route('admin.dashboard')
            ->with('success', 'Produk deleted successfully');
    }
}
