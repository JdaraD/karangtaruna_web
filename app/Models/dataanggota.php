<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataanggota extends Model
{
    use HasFactory;

    protected $fillable = [
        'order',
        'is_active',
        'name',
        'image',
        'alamat',
        'jabatan',
        'keterangan_jabatan',
        'no_hp',
        'email',
        'description',
        'created_at',
        'updated_at',
    ];
}
