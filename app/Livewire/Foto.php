<?php

namespace App\Livewire;

use App\Models\album;
use Livewire\Component;
use Livewire\WithPagination;

class Foto extends Component
{
    use WithPagination;
    public $perPage= 8;

    // pagination
    public function updatedPerPage()
    {
        $this->resetPage();
    }

    public function render()
    {
        $albums = Album::with(['photos' => function ($q) {
                $q->oldest()->limit(5);
            }])
            ->where('is_active', 1)
            ->latest()
            ->paginate($this->perPage);

        return view('livewire.foto', compact('albums'));
    }
}
