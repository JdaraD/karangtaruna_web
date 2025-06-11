<?php

namespace App\Livewire;

use App\Models\album;
use Livewire\Component;

class Foto extends Component
{

    public function render()
    {
        return view('livewire.foto', [
            'albums' => Album::with(['photos' => function ($q) {
                $q->oldest()->limit(1); // ambil 1 foto pertama berdasarkan created_at
            }])->latest()->get(),
        ]);
    }
}
