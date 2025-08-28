<?php

namespace App\Livewire;

use App\Models\addmenukegiatan;
use App\Models\alamat;
use App\Models\album;
use App\Models\lokasi;
use App\Models\PengajuanBantuan;
use App\Models\programkegiatan;
use App\Models\sliderbranda;
use App\Models\sosialmedia;
use App\Models\tentangKami;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Beranda extends Component
{
    public $lokasi;
    public $slider;
    public $sosialmedia;
    public $kegiatan;
    public $menukegiatan;
    public $albums;

    public $nama, $alamat, $no_telp, $keperluan, $tanggal, $detail_Keperluan, $email;
    public $TentangKami;

    // load data tentang kami
    public function loadTentangKami()
    {
        $this->TentangKami = tentangKami::where('is_active', 1)
            ->latest()
            ->take(1)
            ->get();
    }

    // Fungsi kirim form
    public function submit()
    {
        $this->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'no_telp' => 'required',
            'keperluan' => 'required',
            'tanggal' => 'required|date',
            'detail_Keperluan' => 'required',
        ]);

        $data = PengajuanBantuan::create([
            'nama' => $this->nama,
            'alamat' => $this->alamat,
            'email' => $this->email,
            'no_telp' => $this->no_telp,
            'keperluan' => $this->keperluan,
            'tanggal' => $this->tanggal,
            'detail_Keperluan' => $this->detail_Keperluan,
        ]);

        // load data tentangkami untuk email
        $kami = tentangKami::where('is_active',1)
            ->latest()
            ->take(1)
            ->first();

        // load data alamat untuk email
        $alamat = alamat::where('id', 1)->first();
        $email = $alamat->email;
        // @dd($kami);


        Mail::to($email)->send(new \App\Mail\BantuanMasuk($data, $kami));

        $this->dispatch('reset-form');
        session()->flash('message', 'Pengajuan Bantaun berhasil dikirim.');

        $this->reset(['nama', 'alamat', 'email', 'no_telp', 'keperluan', 'tanggal', 'detail_Keperluan']);

    }

    // laod data album
    public function loadalbums()
    {
        $this->albums = Album::with(['photos' => function ($q) {
            $q->oldest()->limit(1); // ambil 5 foto per album
        }])
        ->where('is_active', 1)
        ->latest()
        ->take(5) // tampilkan hanya 3 album
        ->get();
    }

    // load data Addmenukegiatan
    public function loadmenukegiatan()
    {
        $this->menukegiatan = addmenukegiatan::all()
            ->where('is_active',1);

    }

    // laod data programKegiatan
    public function loadkegiatan()
    {
        // Ambil semua kegiatan aktif, urutkan berdasarkan program_id dan terbaru
        $allKegiatan = programkegiatan::where('is_active', 1)
            ->orderBy('program_id')
            ->orderByDesc('created_at')
            ->get();

        // Kelompokkan berdasarkan program_id, lalu ambil 2 teratas
        $this->kegiatan = $allKegiatan
            ->groupBy('program_id')
            ->map(function ($items) {
                return $items->take(2);
            });
    }

    // load data sosail media
    public function loadsosailmedia()
    {
        $this->sosialmedia = sosialmedia::where('is_active',1)
            ->latest()
            ->get();
    }

    // load data slider 
    public function loadslider()
    {
        $this->slider = sliderbranda::where('is_active', 1)
            ->orderBy('created_at', 'desc')
            ->take(7)
            ->get();
    }

    // laod data lokasi
    public function loadlokasi()
    {
        $this->lokasi = lokasi::where('is_active',1)
            ->take(1)
            ->latest()
            ->get();
    }

    // kirim data ke page
    public function mount()
    {
        $this->loadlokasi();
        $this->loadslider();
        $this->loadsosailmedia();
        $this->loadkegiatan();
        $this->loadmenukegiatan();
        $this->loadalbums();
        $this->loadTentangKami();

    }
    public function render()
    {
        return view('livewire.beranda');
    }
}
