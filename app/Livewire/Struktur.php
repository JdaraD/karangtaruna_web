<?php

namespace App\Livewire;


use App\Models\dataanggota;
use App\Models\fotoStruktur;
use App\Models\tentangKami;
use Livewire\Component;

class Struktur extends Component
{
    public $struktur;
    public $anggota;

    // load data anggota
    public function loadanggota()
    {
        $this->anggota = dataanggota::all()
            ->where('is_active', 1);
    }

    // load data Struktur
    public function loadstruktur()
    {
        $this->struktur = fotoStruktur::where('is_active',1)
            ->latest()
            ->take(1)
            ->get();
        // dd($this->struktur);
    }

    // mengirim data ke page Struktur
    public function mount()
    {
        $this->loadstruktur();
        $this->loadanggota();
    }

    public function render()
    {
        return view('livewire.struktur');
    }
}
