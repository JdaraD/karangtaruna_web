<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kumpulanvideo extends Model
{
    use HasFactory;
    protected $fillable = [
        'order',
        'is_active',
        'nama_video',
        'video',
        'deskripsi',
        'created_at',
        'updated_at',
    ];

    public function getVideoEmbedAttribute()
    {
        // Coba ambil video ID dari URL YouTube
        preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/)([a-zA-Z0-9_-]+)/', $this->video, $matches);

        if (count($matches) === 2) {
            $videoId = $matches[1];
            return "https://www.youtube.com/embed/{$videoId}";
        }

        // Fallback: tampilkan video default atau null
        return "https://www.youtube.com/embed/dQw4w9WgXcQ"; // fallback video
    }

}
