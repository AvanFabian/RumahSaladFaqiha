<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'komentar',
    ];
    // belongsTo relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
