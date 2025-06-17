<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kolaborasi extends Model
{
    use HasFactory;
    protected $fillable = [
        'order',
        'is_active',
        'program_id',
        'nama',
        'gambar',
        'deskripsi',
        'tanggal',
        'created_at',
        'updated_at'
    ];

    public function MenuKolaborasi()
    {
        return $this->belongsTo(menukolaborasi::class,'program_id','id');
    }
}
