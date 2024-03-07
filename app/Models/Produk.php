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
        // id is the name of the column in the produks table that is used to establish the relationship with the opsi_produks table. This column contains the ID of the product.
        return $this->hasMany(OpsiProduk::class, 'id_produk', 'id');
    }
}
