<?php

namespace App\Livewire;

use App\Models\acara;
use Livewire\Component;
use Livewire\WithPagination;

class Event extends Component
{
    use WithPagination;
    // public $acara;

    // public pagination
    public $perPage = 8;

    // load data acara
    // public function loadacara()
    // {
    //     $this->acara = acara::all()
    //         ->where('is_active',1);
    // }

    // muat data ke page
    // public function mount()
    // {
    //     $this->loadacara();
    // }

    // pagination
    public function updatedPerPage()
    {
        $this->resetPage();
    }

    public function render()
    {
        $acara = acara::where('is_active',1)
            ->latest()
            ->paginate($this->perPage);

        return view('livewire.event',compact('acara'));
    }
}
