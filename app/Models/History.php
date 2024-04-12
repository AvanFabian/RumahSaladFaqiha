<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    // protected $table = 'histories';
    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'total_price',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function product()
    {
        return $this->belongsTo(Produk::class);
    }
}
