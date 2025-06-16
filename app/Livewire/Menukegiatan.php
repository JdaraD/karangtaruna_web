<?php

namespace App\Livewire;

use App\Models\addmenukegiatan;
use App\Models\programkegiatan;
use Livewire\Component;

class Menukegiatan extends Component
{
    public $menukegiatan;
    public $kegiatan ;

    // laod data programKegiatan
    public function loadkegiatan()
    {
        // Ambil semua kegiatan aktif, urutkan berdasarkan program_id dan terbaru
        $allKegiatan = ProgramKegiatan::where('is_active', 1)
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

    // load data Addmenukegiatan
    public function loadmenukegiatan()
    {
        $this->menukegiatan = addmenukegiatan::all()
            ->where('is_active',1);

    }

    // load date ke page
    public function mount()
    {
        $this->loadmenukegiatan();
        $this->loadkegiatan();
    }
    public function render()
    {
        return view('livewire.menukegiatan');
    }
}
