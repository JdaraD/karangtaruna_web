<?php

use App\Livewire\Beranda;
use App\Livewire\Dasarhukum;
use App\Livewire\Struktur;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapsController;
use App\Livewire\Tentangkami;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', Beranda::class)->name('Beranda');
Route::get('/tentangkami', Tentangkami::class)->name('tentangkami');
Route::get('/dasarhukum', Dasarhukum::class)->name('dasarhukum');
Route::get('/sktuktur', Struktur::class)->name('sktuktur');

Route::get('/maps', [MapsController::class,'index'])->name('maps');