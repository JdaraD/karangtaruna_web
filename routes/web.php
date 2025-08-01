<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DetailKolController;
use App\Http\Controllers\EventDetailController;
use App\Http\Controllers\kegiatanController;
use App\Http\Controllers\kolaborasiController;
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
use App\Http\Controllers\NewsDetailController;
use App\Http\Controllers\UsahaMandiriController;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\LoginUser;
use App\Livewire\Auth\Registeranggota;
use App\Livewire\Detailevent;
use App\Livewire\Event;
use App\Livewire\Foto;
use App\Livewire\Video;
use Google\Service\Walletobjects\Pagination;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/admin/login',Login::class)->name('filament.admin.auth.login');
// Route::get('/login', LoginUser::class)->name('user');
Route::get('/register', Registeranggota::class)->name('register');

Route::get('/', Beranda::class)->name('Beranda');
Route::get('/tentangkami', Tentang::class)->name('tentang');
Route::get('/dasarhukum', Dasarhukum::class)->name('dasarhukum');
Route::get('/sktuktur', Struktur::class)->name('sktuktur');
Route::get('/menukagiatan', Menukegiatan::class)->name('menukegiatan');
Route::get('/kegiatan/{id}', [kegiatanController::class,'show'])->name('kegiatan');
// Route::get('/kegiatan', Kegiatan::class)->name('kegiatan');
Route::get('/usahamandiri', Usahamandiri::class)->name('usahamandiri');
Route::get('/detailproduk/{id}', [UsahaMandiriController::class, 'show'])->name('detailusaha');
// Route::get('/detailusaha', Detailusaha::class)->name('detailusaha');
Route::get('/kolaborasi', Kolaborasi::class)->name('kolaborasi');
Route::get('/kolaborasidetail/{id}', [kolaborasiController::class, 'show'])->name('kolaborasidetail');
Route::get('/detailkolaborasi/{id}', [DetailKolController::class, 'show'])->name('detailkolaborasi');
// Route::get('/kolaborasidetail/{id}', Kolaborasidetail::class)->name('kolaborasidetail');
Route::get('/foto', Foto::class)->name('foto');
// Route::get('/foto', Foto::class)->name('foto');
Route::get('/fotodetails/{slug}', Fotodetails::class)->name('fotodetails');
Route::get('/video', Video::class)->name('video');
// Route::get('/videodetails', Videodetails::class)->name('videodetails');
Route::get('/news', News::class)->name('news');
Route::get('/newsdetail/{id}', [NewsDetailController::class,'show'])->name('newsdetail');
Route::get('/event', Event::class)->name('event');
Route::get('/detailevent/{id}', [EventDetailController::class, 'show'])->name('detailevent');

Route::get('/maps', [MapsController::class,'index'])->name('maps');
// Route::get('/pagination', Pagination::class)->name('pagination');

// Route::get('/download-foto/{id}', function ($id) {
//     $record = App\Models\FotoStruktur::findOrFail($id);
//     $path = storage_path('app/public/' . $record->foto_struktur);

//     return response()->download($path);
// })->name('download.foto');

// Route::get('/tes-email', function () {
//     Mail::raw('Tes pengiriman email dari Laravel', function ($m) {
//         $m->to('emailtujuan@gmail.com')->subject('Tes Gmail SMTP');
//     });

//     return 'Email terkirim!';
// });

Route::get('reset-password/{token}', function (string $token) {
    return view('auth.reset-password', ['token' => $token]);
})->name('password.reset');

Route::post('reset-password', [\App\Http\Controllers\ResetPasswordController::class, 'store'])
    ->name('password.update');

// Route::get('register', [RegisterController::class, 'create'])->name('register');
// Route::post('register', [RegisterController::class, 'store']);