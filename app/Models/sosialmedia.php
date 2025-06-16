<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sosialmedia extends Model
{
    use HasFactory;

    protected $fillable = [
        'order',
        'is_active',
        'logo',
        'judul',
        'nama_akun',
        'link_aplikasi',
        'created_at',
        'updated_at'
    ];
}
