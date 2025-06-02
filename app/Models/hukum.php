<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hukum extends Model
{
    use HasFactory;
    protected $fillable = [
        'order',
        'is_active',
        'hukum',
        'description',
    ];
}
