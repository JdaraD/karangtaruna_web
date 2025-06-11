<?php

namespace App\Livewire;

use App\Models\album;
use Livewire\Component;

class Fotodetails extends Component
{
    public album $album;

    public function mount($slug)
    {
        $this->album = album::with('photos')->where('slug', $slug)->firstOrFail();
    }
    public function render()
    {
        return view('livewire.fotodetails');
    }
}
