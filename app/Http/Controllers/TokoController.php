<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    // Store the shop information
    public function store(Request $request)
    {
        $request->validate([
            'nama_toko' => 'required',
            'alamat' => 'required',
            'kebijakan' => 'required',
        ]);

        $toko = new Toko;
        $toko->nama_toko = $request->nama_toko;
        $toko->alamat = $request->alamat;
        $toko->kebijakan = $request->kebijakan;
        $toko->save();

        return back()->with('message', 'Shop information saved successfully');
    }

    // Update the shop information
    public function update(Request $request, Toko $toko)
    {
        $request->validate([
            'nama_toko' => 'required',
            'alamat' => 'required',
            'kebijakan' => 'required',
        ]);

        $toko->nama_toko = $request->nama_toko;
        $toko->alamat = $request->alamat;
        $toko->kebijakan = $request->kebijakan;
        $toko->save();

        return back()->with('message', 'Shop information updated successfully');
    }

    // Delete the shop information
    public function destroy(Toko $toko)
    {
        $toko->delete();

        return back()->with('message', 'Shop information deleted successfully');
    }
}