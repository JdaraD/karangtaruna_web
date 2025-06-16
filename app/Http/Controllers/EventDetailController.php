<?php

namespace App\Http\Controllers;

use App\Models\acara;
use Illuminate\Http\Request;

class EventDetailController extends Controller
{
    public function show($id)
    {
        $event = acara::findOrFail($id);
        return view('livewire.detailevent',compact('event'));
        
    }
}
