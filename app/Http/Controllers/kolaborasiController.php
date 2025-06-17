<?php

namespace App\Http\Controllers;

use App\Models\kolaborasi;
use App\Models\menukolaborasi;
use Illuminate\Http\Request;

class kolaborasiController extends Controller
{
    public function show($id)
    {
        $menu = menukolaborasi::with('kolaborasiprogram')->findOrFail($id);
        return view('livewire.kolaborasidetail', compact('menu'));
    }
}
