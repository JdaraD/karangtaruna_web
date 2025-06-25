<?php

namespace App\Livewire;

use App\Models\addmenukegiatan;
use App\Models\alamat;
use App\Models\programkegiatan;
use App\Models\tentangKami;
use Livewire\Component;
use App\Models\PengajuanKegiatan;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Mail;

class Menukegiatan extends Component
{
    use WithFileUploads;

    public $nama, $alamat, $no_telp, $keperluan, $tanggal, $total_anggaran, $detail_Keperluan, $file, $email;
    public $menukegiatan;
    public $kegiatan ;
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
            'total_anggaran' => 'required|numeric',
            'detail_Keperluan' => 'required',
            'file' => 'nullable|file|max:2048',
        ]);

       // Simpan file ke storage/app/public/pengajuan-files
        $filePath = $this->file?->store('pengajuan-files', 'public');

        $data = PengajuanKegiatan::create([
            'nama' => $this->nama,
            'alamat' => $this->alamat,
            'email' => $this->email,
            'no_telp' => $this->no_telp,
            'keperluan' => $this->keperluan,
            'tanggal' => $this->tanggal,
            'total_anggaran' => $this->total_anggaran,
            'detail_Keperluan' => $this->detail_Keperluan,
            'file_path' => $filePath,
        ]);

        // load data tentangkami untuk email
        $kami = tentangKami::where('is_active',1)
            ->latest()
            ->take(1)
            ->first();

        // load data alamat untuk email
        $alamat = alamat::where('id', 1)->first(); // sesuaikan id atau kriteria lainnya
        $email = $alamat->email;
        // dd($email);

        Mail::to('juliandara17@gmail.com')->send(new \App\Mail\PengajuanMasuk($data, $kami));

        session()->flash('success', 'Pengajuan berhasil dikirim.');
        $this->reset(['nama', 'alamat', 'email', 'no_telp', 'keperluan', 'tanggal', 'total_anggaran', 'detail_Keperluan', 'file']);
    }

    // laod data programKegiatan
    public function loadkegiatan()
    {
        // Ambil semua kegiatan aktif, urutkan berdasarkan program_id dan terbaru
        $allKegiatan = ProgramKegiatan::where('is_active', 1)
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

    // load data Addmenukegiatan
    public function loadmenukegiatan()
    {
        $this->menukegiatan = addmenukegiatan::all()
            ->where('is_active',1);

    }

    // load date ke page
    public function mount()
    {
        $this->loadmenukegiatan();
        $this->loadkegiatan();
        $this->loadTentangKami();
    }
    public function render()
    {
        return view('livewire.menukegiatan');
    }
}
