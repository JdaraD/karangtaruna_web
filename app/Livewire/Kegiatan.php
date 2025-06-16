<?php

namespace App\Livewire;

use App\Models\addmenukegiatan;
use App\Models\programkegiatan;
use Livewire\Component;

class Kegiatan extends Component
{
    public $menu;
    public $program;

    // laod data add menu program
    public function loadmenu()
    {
        $this->menu = addmenukegiatan::all()
            ->where('is_active',1);
    }

    // load data program Kegiatan
    public function loadprogram()
    {
        $this->program = programkegiatan::with('addmenuProgram')
            ->where('is_active',1)
            ->get();
    }

    // load data ke page
    public function mount()
    {
        $this->loadprogram();
        $this->loadmenu();
    }
    public function render()
    {
        return view('livewire.kegiatan');
    }
}
