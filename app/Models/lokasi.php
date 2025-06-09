<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lokasi extends Model
{
    use HasFactory;
    protected $fillable = [
        'order',
        'is_active',
        'nama_lokasi',
        'lokasi',
        'deskripsi',
        'created_at',
        'updated_at',
    ];

    public function getLokasiEmbedAttribute()
    {
        // Coba ambil koordinat dari URL
        preg_match('/@(-?\d+\.\d+),(-?\d+\.\d+)/', $this->lokasi, $matches);

        if (count($matches) === 3) {
            $lat = $matches[1];
            $lng = $matches[2];
            return "https://maps.google.com/maps?q={$lat},{$lng}&output=embed";
        }

        // Fallback: tampilkan peta default
        return "https://maps.google.com/maps?q=Indonesia&output=embed";
    }
}
