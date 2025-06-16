<?php

namespace App\Http\Controllers;

use App\Models\addmenukegiatan;
use App\Models\programkegiatan;
use Illuminate\Http\Request;

class kegiatanController extends Controller
{
    public function show($id)
    {
        $kegiatan = addmenukegiatan::with('program')->findOrFail($id);
        $program = Programkegiatan::where('program_id', $id)
                ->where('is_active', 1)
                ->get();
        return view('livewire.kegiatan', compact('kegiatan','program'));
    }
}
