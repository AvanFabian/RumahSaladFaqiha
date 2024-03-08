<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_user',
        'total_harga',
        'status',
        'userEmail',
        'buktiTransfer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function products()
    {
        return $this->belongsToMany(Produk::class, 'order_produk', 'order_id', 'produk_id')
        // ->withPivot('harga', 'nama_produk', 'jumlah') // include 'jumlah'
        ->withTimestamps();
    }
    /** 
     * This function establishes a many-to-many relationship between the Order and Produk models. The belongsToMany method indicates that each Order can have multiple Produk and each Produk can belong to multiple Order.
     * The withPivot('harga', 'nama_produk') method indicates that the pivot table includes additional columns harga and nama_produk that store the price and name of the product for each order.
    */
}