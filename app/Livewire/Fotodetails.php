<?php

namespace App\Livewire;

use App\Models\album;
use Livewire\Component;
use Livewire\WithPagination;

class Fotodetails extends Component
{
    use WithPagination;

    public album $album;

    // pagination
    public $perPage = 8;

    // kirim data ke page
    public function mount($slug)
    {
        $this->album = album::with('photos')->where('slug', $slug)->firstOrFail();
    }

    public function updatedPerPage()
    {
        $this->resetPage();
    }

    public function render()
    {
        $photos = $this->album
            ? $this->album->photos()->paginate($this->perPage)
            : collect(); // jika album null, hindari error

        return view('livewire.fotodetails', [
            'album' => $this->album,
            'photos' => $photos,
        ]);
    }
}
