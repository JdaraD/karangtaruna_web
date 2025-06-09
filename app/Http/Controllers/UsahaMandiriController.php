<?php

namespace App\Http\Controllers;

use App\Models\usahamandiri;
use Illuminate\Http\Request;

class UsahaMandiriController extends Controller
{
    public function show($id)
{
    $usaha = usahamandiri::findOrFail($id);
    return view('livewire.detailusaha', compact('usaha'));
}
}
