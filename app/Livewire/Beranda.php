<?php

namespace App\Livewire;

use App\Models\addmenukegiatan;
use App\Models\lokasi;
use App\Models\programkegiatan;
use App\Models\sliderbranda;
use App\Models\sosialmedia;
use Livewire\Component;

class Beranda extends Component
{
    public $lokasi;
    public $slider;
    public $sosialmedia;
    public $kegiatan;
    public $menukegiatan;

    // load data Addmenukegiatan
    public function loadmenukegiatan()
    {
        $this->menukegiatan = addmenukegiatan::all()
            ->where('is_active',1);

    }

    // laod data programKegiatan
    public function loadkegiatan()
    {
        // Ambil semua kegiatan aktif, urutkan berdasarkan program_id dan terbaru
        $allKegiatan = programkegiatan::where('is_active', 1)
            ->orderBy('program_id')
            ->orderByDesc('created_at')
            ->get();

        // Kelompokkan berdasarkan program_id, lalu ambil 2 teratas
        $this->kegiatan = $allKegiatan
            ->groupBy('program_id')
            ->map(function ($items) {
                return $items->take(2);
            });
    }

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
        $this->loadkegiatan();
        $this->loadmenukegiatan();

    }
    public function render()
    {
        return view('livewire.beranda');
    }
}
