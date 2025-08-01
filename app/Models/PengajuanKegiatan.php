<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengajuanKegiatan extends Model
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
        'total_anggaran',
        'detail_Keperluan',
        'file_path',
        'is_admin',
        'created_at',
        'updated_at',
    ];
}
