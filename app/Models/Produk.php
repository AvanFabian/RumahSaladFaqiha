<?php

namespace App\Models;

use App\Models\Nota;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'desc',
        'image',
        'harga',
        'kategori',
    ];
    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('quantity');
    }

    public function cartItems()
{
    return $this->hasMany(CartItem::class, 'product_id');
}
}
