<?php

namespace App\Livewire;

use App\Models\menukolaborasi;
use Livewire\Component;

class Kolaborasi extends Component
{
    public $menu;

    // load data menu kolaborasi
    public function loadmenukolaborasi()
    {
        $this->menu = menukolaborasi::all()
            ->where('is_active',1);
    }

    // load data ke page
    public function mount()
    {
        $this->loadmenukolaborasi();
    }

    public function render()
    {
        return view('livewire.kolaborasi');
    }
}
