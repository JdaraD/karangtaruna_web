<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class menukolaborasi extends Model
{
    use HasFactory;
    protected $fillable = [
        'order',
        'is_acrive',
        'nama_kolaborasi',
        'gambar',
        'deskripsi',
        'created_at',
        'updated_at'
    ];

    public function kolaborasiprogram()
    {
        return $this->hasMany( kolaborasi::class,'program_id');
    }
}
