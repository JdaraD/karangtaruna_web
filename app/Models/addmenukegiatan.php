<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addmenukegiatan extends Model
{
    use HasFactory ;
    protected $fillable = [
        'order',
        'is_active',
        'nama_program',
        'gambar',
        'deskripsi',
        'creatad_at',
        'updated_at'
    ];

    public function program()
    {
        return $this->hasMany(programkegiatan::class, 'program_id');
    }
}
