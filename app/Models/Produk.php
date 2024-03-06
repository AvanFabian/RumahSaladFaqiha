<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'desc',
        'image',
        'harga',
    ];
    // one to one of opsi produk
    public function opsiProduk()
    {
        return $this->hasOne(OpsiProduk::class, 'id_produk', 'id');
    }
}
