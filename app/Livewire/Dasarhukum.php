<?php

namespace App\Livewire;

use App\Models\hukum;
use App\Models\pasal;
use App\Models\tentangKami;
use Livewire\Component;

class Dasarhukum extends Component
{
    public $tentang;
    public $hukum;
    public $pasal;

    // load data tentang
    public function loadtentang()
    {
        $this->tentang = tentangKami::where('is_active',1)
            ->latest()
            ->take(1)
            ->get();
    }
    // laod data hukum
    public function loadhukum()
    {
        $this->hukum = hukum::where('is_active',1)
            ->latest()
            ->take(1)
            ->get();
    }
    // load data pasal
    public function loadpasal()
    {
        $this->pasal = pasal::where('is_active',1)
            ->latest()
            ->take(1)
            ->get();
    }
    // kirim data ke page Dasar Hukum
    public function mount()
    {
        $this->loadtentang();
        $this->loadhukum();
        $this->loadpasal();
    }
    public function render()
    {
        return view('livewire.dasarhukum');
    }
}
