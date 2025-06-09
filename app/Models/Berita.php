<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;
    protected $fillable = [
        'order',
        'is_active',
        'judul_berita',
        'gambar',
        'deskripsi',
        'tanggal',
        'created_at',
        'updated_at'
    ];
}
