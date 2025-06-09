<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usahamandiri extends Model
{
    Use HasFactory;

    protected $fillable = [
        'order',
        'is_active',
        'nama_barang',
        'kategori',
        'foto_barang',
        'harga',
        'deskripsi',
        'link_tiktok',
        'link_shopee',
        'link_lazada',
        'link_tokopedia',
    ];

    protected $casts = [
        'foto_barang' => 'array',
    ];  

}
