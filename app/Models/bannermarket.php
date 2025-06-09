<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bannermarket extends Model
{
    use HasFactory;

    protected $fillable = [
        'order',
        'is_active',
        'nama_banner',
        'gambar_banner',
        'deskripsi',
        'created_at',
        'updated_at',
    ];
}
