<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fotoStruktur extends Model
{
    use HasFactory;
    protected $fillable = [
        'order',
        'is_active',
        'foto_struktur',
        'description',
    ];
}
