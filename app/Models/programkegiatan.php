<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class programkegiatan extends Model
{
    use HasFactory ;
    protected $fillable = [
        'order',
        'is_active',
        'program_id',
        'gambar',
        'deskripsi',
        'progres',
        'created_at',
        'updated_at'
    ];

    public function AddmenuProgram()
    {
        return $this->belongsTo(addmenukegiatan::class, 'program_id', 'id');
    }
}
