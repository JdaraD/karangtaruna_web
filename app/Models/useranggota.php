<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class useranggota extends Model
{
    use Notifiable, HasFactory;

    protected $table = 'useranggotas';

    protected $fillable = [
        // Tambahkan kolom yang ingin diisi
        'is_active',
        'name',
        'email',
        'password',
        'created_at',
        'updated_at',
    ];
}
