<?php

namespace App\Livewire\Components\Layouts;

use App\Models\RunningText;
use Livewire\Component;

class Navbar extends Component
{
    public $Text;

    // Running Text
    protected function loadRunningText ()
    {
        // Mengambil semua data running text
        $this->Text = RunningText::all()
        ->where('is_active',1);
    }

    // Mengirim data ke Beranda
    public function mount()
    {
        $this->loadRunningText();
        // dd($this->loadRunningText());
    }


    public function render()
    {
        return view('livewire.components.layouts.navbar');
    }
}
