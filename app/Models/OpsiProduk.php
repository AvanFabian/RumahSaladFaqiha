<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpsiProduk extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'id_produk',
    ];
    // one to one of produk
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk', 'id');
    }

}