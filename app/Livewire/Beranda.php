<?php

namespace App\Livewire;

use App\Models\lokasi;
use Livewire\Component;

class Beranda extends Component
{
    public $lokasi;

    // laod data lokasi
    public function loadlokasi()
    {
        $this->lokasi = lokasi::where('is_active',1)
            ->take(1)
            ->latest()
            ->get();
    }

    // kirim data ke page
    public function mount()
    {
        $this->loadlokasi();
    }
    public function render()
    {
        return view('livewire.beranda');
    }
}
