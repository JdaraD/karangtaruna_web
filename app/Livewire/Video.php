<?php

namespace App\Livewire;

use App\Models\kumpulanvideo;
use Livewire\Component;
use Livewire\WithPagination;

class Video extends Component
{
    use WithPagination;
    // public $video;
        
    // pagination
    public $perPage = 8;

    // load data video
    // public function loadvideo()
    // {
    //     $this->video = kumpulanvideo::all()
    //         ->where('is_active',1);
    // }

    // kirim data ke page
    // public function mount()
    // {
    //     $this->loadvideo();
    // }

    public function render()
    {
        $video = kumpulanvideo::where('is_active',1)
            ->latest()
            ->paginate($this->perPage);

        return view('livewire.video',compact('video'));
    }
}
