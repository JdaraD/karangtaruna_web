<?php

use App\Livewire\Beranda;
use App\Livewire\Dasarhukum;
use App\Livewire\Detailusaha;
use App\Livewire\Fotodetails;
use App\Livewire\Kegiatan;
use App\Livewire\Kolaborasi;
use App\Livewire\Kolaborasidetail;
use App\Livewire\Menukegiatan;
use App\Livewire\News;
use App\Livewire\Struktur;
use App\Livewire\Tentang;
use App\Livewire\Usahamandiri;
use App\Livewire\Videodetails;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapsController;
use App\Livewire\Event;
use App\Livewire\Foto;
use App\Livewire\Video;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', Beranda::class)->name('Beranda');
Route::get('/tentangkami', Tentang::class)->name('tentang');
Route::get('/dasarhukum', Dasarhukum::class)->name('dasarhukum');
Route::get('/sktuktur', Struktur::class)->name('sktuktur');
Route::get('/menukagiatan', Menukegiatan::class)->name('menukegiatan');
Route::get('/kegiatan', Kegiatan::class)->name('kegiatan');
Route::get('/usahamandiri', Usahamandiri::class)->name('usahamandiri');
Route::get('/detailusaha', Detailusaha::class)->name('detailusaha');
Route::get('/kolaborasi', Kolaborasi::class)->name('kolaborasi');
Route::get('/kolaborasidetail', Kolaborasidetail::class)->name('kolaborasidetail');
Route::get('/foto', Foto::class)->name('foto');
Route::get('/fotodetails', Fotodetails::class)->name('fotodetails');
Route::get('/video', Video::class)->name('video');
Route::get('/videodetails', Videodetails::class)->name('videodetails');
Route::get('/news', News::class)->name('news');
Route::get('/event', Event::class)->name('event');

Route::get('/maps', [MapsController::class,'index'])->name('maps');