<?php

namespace App\Http\Controllers;
use App\Models\Produk; // import the Produk model
// use App\Models\OpsiProduk; // import the OpsiProduk model
use Illuminate\Http\Request;

class ProdukController extends Controller
{

    // method kalo dibutuhkan:
    // 'nama_opsi' => 'required', // validate the product option field
    // OpsiProduk::create([
    //     'nama_opsi' => $request->nama_opsi,
    //     'id_produk' => $produk->id,
    // ]);

    

    // Tampilkan Halaman Tambah Produk
    public function create()
    {
        return view('admin.produk.Create');

    }

    // Simpan Produk ke Database
    public function store(Request $request)
    {
        $messages = [
            'title.required' => 'The title field is required.',
            'desc.required' => 'The description field is required.',
            'image.required' => 'The image field is required.',
            'image.image' => 'The image must be an image file.',
            'harga.required' => 'The price field is required.',
            'harga.numeric' => 'The price must be a number.',
        ];
    
        $request->validate([
            'title' => 'required|max:255',
            'desc' => 'required',
            'image' => 'required|image',
            'harga' => 'required|numeric',
        ], $messages);
    
        $imagePath = $request->file('image')->store('uploads', 'public');
        
        $produk = Produk::create([
            'title' => $request->title,
            'desc' => $request->desc,
            'image' => $imagePath,
            'harga' => $request->harga,
        ]);
    
        return redirect()->route('produk.create') 
        ->with('success', 'Product created successfully.');
    }


    // halaman Edit produk
    public function edit(Produk $id_produk)
    {
        return view('admin.produk.Edit', [
            'produk' => $id_produk
        ]);
    }

    // method kalo dibutuhkan:
    // $produk->opsiProduk->update([
    //     'nama_opsi' => $request->nama_opsi,
    // ]);
    
    // proses backend Edit produk
    public function update(Request $request, Produk $id_produk)
    {
        $messages = [
            'title.required' => 'The title field is required.',
            'desc.required' => 'The description field is required.',
            'image.required' => 'The image field is required.',
            'image.image' => 'The image must be an image file.',
            'harga.required' => 'The price field is required.',
            'harga.numeric' => 'The price must be a number.',
        ];
    
        $request->validate([
            'title' => 'required|max:255',
            'desc' => 'required',
            'image' => 'required|image',
            'harga' => 'required|numeric',
        ], $messages);
    
        $imagePath = $request->file('image')->store('uploads', 'public');
    
        $id_produk->update([
            'title' => $request->title,
            'desc' => $request->desc,
            'image' => $imagePath,
            'harga' => $request->harga,
        ]);
    
        return redirect()->route('admin.dashboard')
            ->with('success', 'Product updated successfully');
    }


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
