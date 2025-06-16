<?php

namespace App\Livewire;

use App\Models\lokasi;
use App\Models\sliderbranda;
use App\Models\sosialmedia;
use Livewire\Component;

class Beranda extends Component
{
    public $lokasi;
    public $slider;
    public $sosialmedia;

    // load data sosail media
    public function loadsosailmedia()
    {
        $this->sosialmedia = sosialmedia::where('is_active',1)
            ->latest()
            ->get();
    }

    // load data slider 
    public function loadslider()
    {
        $this->slider = sliderbranda::where('is_active', 1)
            ->orderBy('created_at', 'desc')
            ->take(7)
            ->get();
    }

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
        $this->loadslider();
        $this->loadsosailmedia();

    }
    public function render()
    {
        return view('livewire.beranda');
    }
}
