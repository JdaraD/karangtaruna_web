<?php

namespace App\Livewire;

use App\Models\kumpulanvideo;
use Livewire\Component;

class Video extends Component
{
    public $video;

    // load data video
    public function loadvideo()
    {
        $this->video = kumpulanvideo::all()
            ->where('is_active',1);
    }

    // kirim data ke page
    public function mount()
    {
        $this->loadvideo();
    }

    public function render()
    {
        return view('livewire.video');
    }
}
