<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class misi extends Model
{
    use HasFactory;
    protected $fillable = [
        'order',
        'is_active',
        'description',
    ];
}
