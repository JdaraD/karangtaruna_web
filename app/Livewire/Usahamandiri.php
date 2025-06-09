<?php

namespace App\Livewire;

use App\Models\bannermarket;
use App\Models\slideriklan;
use Livewire\Component;

class Usahamandiri extends Component
{
    public $usahamandiri;
    public $gambar;
    public $banner;

    // load data slider
    public function loadslider()
    {
        $this->gambar = slideriklan::all()
            ->where('is_active',1);
            // dd($this->slider);
    }

    // load data banner
    public function loadbanner() 
    {
        $this->banner = bannermarket::where('is_active',1)
            ->where('is_active',1)
            ->take(1)
            ->latest()
            ->get();
    }

    // load data usahamandiri
    public function loadusahamandiri() {
        $this->usahamandiri = \App\Models\usahamandiri::all()
            ->where('is_active', 1);
    }

    // kirim dara ke view
    public function mount()
    {
        $this->loadusahamandiri();
        $this->loadslider();
        $this->loadbanner();
    }

    public function render()
    {
        return view('livewire.usahamandiri');
    }
}
