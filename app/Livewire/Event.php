<?php

namespace App\Livewire;

use App\Models\acara;
use Livewire\Component;

class Event extends Component
{
    public $acara;

    // load data acara
    public function loadacara()
    {
        $this->acara = acara::all()
            ->where('is_active',1);
    }

    // muat data ke page
    public function mount()
    {
        $this->loadacara();
    }

    public function render()
    {
        return view('livewire.event');
    }
}
