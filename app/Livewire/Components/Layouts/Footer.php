<?php

namespace App\Livewire\Components\Layouts;

use App\Models\alamat;
use App\Models\nomorTambahan;
use App\Models\tentangKami;
use Livewire\Component;

class Footer extends Component
{
    public $tentangkami;
    public $alamat;

    public $nomorTambahan;

    // load data tentang kami
    protected function loadtentangkami() {
        //  Mengambil semua data tentang kami
        $this->tentangkami = tentangKami::where( 'is_active', 1)
            ->latest()
            ->take(1)
            ->get();
    }

    // load data alamat
    public function loadalamat()
    {
        $this->alamat = alamat::where('is_active',1)
            ->latest()
            ->take(1)
            ->get();
    }

    // load data nomor tambahan
    public function loadnomorTambahan()
    {
        $this->nomorTambahan = nomorTambahan::where('is_active',1)
            ->latest()
            ->take(3)
            ->get();
    }

    // mengirim data ke Beranda
    public function mount() {
        $this->loadtentangkami();
        $this->loadalamat();
        $this->loadnomorTambahan();
    }
    public function render()
    {
        return view('livewire.components.layouts.footer');
    }
}
