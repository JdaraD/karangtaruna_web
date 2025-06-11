<?php

namespace App\Http\Controllers;

use App\Models\album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function show($slug)
    {
        $album = album::where('slug', $slug)->with('photos')->firstOrFail();
        return view('albums.show', compact('album'));
    }
}
