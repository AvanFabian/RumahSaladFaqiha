<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'email',
        'username',
        'telp',
        'alamat',
        'buktitransfer',
        'status',
        'catatan',
        'total_price',
    ];

    public function products()
    {
        return $this->belongsToMany(Produk::class, 'order_produk', 'order_id', 'product_id')->withPivot('quantity');
    }
}
