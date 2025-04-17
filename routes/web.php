<?php

use App\Livewire\Beranda;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', Beranda::class)->name('Beranda');