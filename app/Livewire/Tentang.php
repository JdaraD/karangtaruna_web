<?php

namespace App\Livewire;

use App\Models\misi;
use App\Models\TentangKami;
use App\Models\value;
use App\Models\visi;
use Livewire\Component;

class Tentang extends Component
{
    public $tentangkami;
    public $visi;
    public $misi;
    public $value;

    // load data Misi
    protected function loadMisi() {
        // Mengambil semua data Misi
        $this->misi = misi::all()
         ->where('is_active',1);
    }

    // load data Value
    protected function loadValue() {
        // Mengambil semua data value
        $this->value = value::all()
        ->where('is_active',1);
    }

    // load data visi
    protected function loadVisi() {
        // Mengambil semua data visi
        $this->visi = visi::all()
            ->where('is_active', 1);
    }

    // load data tentang kami
    protected function loadTentangkami()
    {
        // Mengambil semua data tentang kami
        $this->tentangkami = TentangKami::all()
            ->where('is_active', 1);
    }
    // mengirim data ke Beranda
    public function mount()
    {
        $this->loadMisi();
        $this->loadValue();
        $this->loadVisi();
        $this->loadTentangkami();
    }
    public function render()
    {
        return view('livewire.tentang');
    }
}
