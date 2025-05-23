<?php

namespace App\Livewire\Components\Layouts;

use App\Models\tentangKami;
use Livewire\Component;

class Footer extends Component
{
    public $tentangkami;

    // load data
    protected function loadtentangkami() {
        //  Mengambil semua data tentang kami
        $this->tentangkami = tentangKami::all()
            ->where( 'is_active', 1);
    }

    // mengirim data ke Beranda
    public function mount() {
        $this->loadtentangkami();
    }
    public function render()
    {
        return view('livewire.components.layouts.footer');
    }
}
