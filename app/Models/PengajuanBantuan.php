<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanBantuan extends Model
{
    use HasFactory;
    protected $fillable = [
        'order',
        'is_active',
        'nama',
        'alamat',
        'email',
        'no_telp',
        'keperluan',
        'tanggal',
        'detail_Keperluan',
        'created_at',
        'updated_at',
    ];
}
