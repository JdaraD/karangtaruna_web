<?php

namespace App\Livewire\Components\Layouts;

use App\Models\RunningText;
use App\Models\tentangKami;
use Livewire\Component;

class Navbar extends Component
{
    public $Text;
    public $tentangkami;
    public $colorsetting;

    // mengambil data warna
    public function loadColorSetting()
    {
        $this->colorsetting = \App\Models\colorsetting::where('is_active', 1)
            ->orderBy('created_at', 'desc')
            ->first();
    }

    // Tentang Kami
    public function loadTentangKami ()
    {
        // Mengambil semua data tentang kami
        $this->tentangkami = tentangKami::where('is_active',1)
            // ->oldest()
            ->latest()
            ->first();
    }

    // Running Text
    protected function loadRunningText ()
    {
        // Mengambil semua data running text
        $this->Text = RunningText::all()
        ->where('is_active',1);
    }

    // Mengirim data ke Beranda
    public function mount()
    {
        $this->loadRunningText();
        $this->loadTentangKami();
        $this->loadColorSetting();
        // dd($this->loadColorSetting());
    }


    public function render()
    {
        return view('livewire.components.layouts.navbar');
    }
}
