<?php

namespace App\Livewire;

use App\Models\Berita;
use Livewire\Component;

class Kolaborasidetail extends Component
{
    // public $berita;
    // public $id;

    // load data berita
    // public function loadberita($id)
    // {
    //     $this->id = $id;

    //     $this->berita = Berita::where('is_active',1)
    //         ->latest()
    //         ->take(6)
    //         ->get();
    // }

    // load ke page

    // public function mount($id)
    // {
    //     $this->id = $id;

    //     $this->berita = Berita::where('is_active', 1)
    //         ->latest()
    //         ->take(6)
    //         ->get();
    // }


    public function render()
    {
        return view('livewire.kolaborasidetail');
    }
}
