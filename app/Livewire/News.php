<?php

namespace App\Livewire;

use App\Models\Berita;
use Livewire\Component;

class News extends Component
{
    public $berita;

    // load data berita
    public function loadberita()
    {
        $this->berita = Berita::all()
            ->where('is_active',1);
    }
    
    // muat date ke page
    public function mount()
    {
        $this->loadberita();
    }
    
    public function render()
    {
        return view('livewire.news');
    }
}
