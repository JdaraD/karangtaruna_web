<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class album extends Model
{
    use HasFactory;

    protected $fillable = [
        'order',
        'is_active',
        'judul',
        'deskripsi',
        'slug',
        'created_at',
        'updated_at',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
            ];
    }

    public function photos()
    {
        return $this->hasMany(photo::class);
    }
}
