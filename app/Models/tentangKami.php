<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tentangKami extends Model
{
    use HasFactory;
    protected $fillable = [
        'order',
        'is_active',
        'first_name',
        'last_name',
        'description',
        'foto_profil',
    ];
}
