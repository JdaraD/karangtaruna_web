<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\kolaborasi;
use App\Models\menukolaborasi;
use Illuminate\Http\Request;
use Livewire\WithPagination;

class kolaborasiController extends Controller
{
    use WithPagination;

    // pagination
    public $perPage = 8;
    public function show($id)
    {
        $berita = Berita::findOrFail($id);
        $berita = Berita::where('is_active', 1)
        ->latest()
        ->take(6)
        ->get();

        $menu = menukolaborasi::findOrFail($id);

        // Ambil kolaborasiprogram dari menu tersebut dengan pagination
        $programs = kolaborasi::where('program_id', $menu->id)
            ->latest()
            ->paginate(6); // atur jumlah per halaman sesuai kebutuhan
        
        $menu = menukolaborasi::with('kolaborasiprogram')->findOrFail($id);
        return view('livewire.kolaborasidetail', compact('menu','berita','programs'));
    }
}
