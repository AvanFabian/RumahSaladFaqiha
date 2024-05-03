<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InfoToko;

class TokoController extends Controller
{
    // Show the form to create shop information
    public function create()
    {
        return view('admin.akunsosmed.Create');

    }
    // Store the shop information
    public function store(Request $request)
    {
        $request->validate([
            'akun_fb' => 'required',
            'akun_ig' => 'required',
            'akun_tiktok' => 'required',
            'no_whatsapp' => 'required',
        ]);

        $toko = new InfoToko;
        $toko->no_whatsapp = $request->no_whatsapp;
        $toko->akun_ig = $request->akun_ig;
        $toko->akun_fb = $request->akun_fb;
        $toko->akun_tiktok = $request->akun_tiktok;
        $toko->save();

        return back()->with('message', 'Akun toko berhasil ditambahkan');
    }
    // Show the form to edit shop information
    public function edit(InfoToko $toko)
    {
        return view('admin.akunsosmed.Edit', compact('toko'));
    }
    // Update the shop information
    public function update(Request $request, InfoToko $toko)
    {
        $request->validate([
            'no_whatsapp' => 'required',
            'akun_ig' => 'required',
            'akun_fb' => 'required',
            'akun_tiktok' => 'required',
        ]);

        $toko->no_whatsapp = $request->no_whatsapp;
        $toko->akun_ig = $request->akun_ig;
        $toko->akun_fb = $request->akun_fb;
        $toko->akun_tiktok = $request->akun_tiktok;
        $toko->save();

        return back()->with('message', 'Akun toko berhasil diperbarui');
    }

    // Delete the shop information
    public function destroy(InfoToko $toko)
    {
        $toko->delete();

        return back()->with('message', 'Akun toko berhasil dihapus');
    }
}