<?php

namespace App\Http\Controllers;
use App\Models\Produk; // import the Produk model
use App\Models\OpsiProduk; // import the OpsiProduk model
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    // Tampilkan Halaman Produk (pending dulu)
    // public function index()
    // {
    //     $produks = Produk::latest()->get();
    //     return Inertia::render('Produks/Index', [
    //         'produks' => $produks
    //     ]);
    // }

    // Tampilkan Halaman Tambah Produk
    public function create()
    {
        // return Inertia::render('CrudForm/CreateProduct');
        // blade
        return view('CrudForm.CreateProduct');

    }

    // Simpan Produk ke Database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'desc' => 'required',
            'image' => 'required',
            'harga' => 'required',
            'nama' => 'required', // validate the product option field
        ]);

        $produk = Produk::create($request->all());

        // Create the product option
        OpsiProduk::create([
            'nama' => $request->nama,
            'id_produk' => $produk->id,
        ]);

        return redirect()->route('produks.index')
            ->with('success', 'Produk created successfully.');
    }

    // Halaman Produk Umum
    public function show(Produk $produk)
    {
        return view('Produks.Show', [
            'produk' => $produk
        ]);
    }
    // halaman Edit produk
    public function edit(Produk $produk)
    {
        return view('Produks.Edit', [
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
            'nama' => 'required', // validate the product option field
        ]);

        $produk->update($request->all());

        // Update the product option
        $produk->opsiProduk->update([
            'nama' => $request->nama,
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
