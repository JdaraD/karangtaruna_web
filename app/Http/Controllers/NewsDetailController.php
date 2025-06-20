<?php

namespace App\Http\Controllers;

use App\Livewire\Newsdetail;
use App\Models\Berita;
use Illuminate\Http\Request;

class NewsDetailController extends Controller
{
    public function show($id)
    {
        $berita = Berita::findOrFail($id);
        return view('Livewire.Newsdetail',compact('berita'));
    }
}
