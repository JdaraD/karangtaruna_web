<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class colorsetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'order',
        'is_active',
        'nama',
        'header_color',
        'header_runningtext_color',
        'footer_color',
        'footer_copyright_color',
        'created_at',
        'updated_at',
    ];
}
