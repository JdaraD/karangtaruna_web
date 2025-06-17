<?php

namespace App\Http\Controllers;

use App\Models\kolaborasi;
use Illuminate\Http\Request;

class DetailKolController extends Controller
{
    
    public function show($id)
    {
        $kol = kolaborasi::findOrFail($id);
        return view('livewire.detailkol',compact('kol'));
        
    }
}
