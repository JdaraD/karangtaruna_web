<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class photo extends Model
{
    use HasFactory;
    protected $fillable = [
        'order',
        'is_active',
        'album_id',
        'gambar',
        'deskripsi',
        'created_at',
        'updated_at'
    ];

    public function album()
    {
        return $this->belongsTo(album::class);
    }
}
