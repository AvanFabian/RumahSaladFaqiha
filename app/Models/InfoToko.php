<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoToko extends Model
{
    use HasFactory;
    protected $fillable = [
        'no_whatsapp',
        'akun_ig',
        'akun_fb',
        'akun_tiktok',
    ];
}
