<?php

namespace App\Livewire\Components\Layouts;

use App\Models\RunningText;
use App\Models\tentangKami;
use App\Models\useranggota;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Navbar extends Component
{
    public $Text;
    public $tentangkami;
    public $colorsetting;

    public $email; 
    public $password;
    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    //   Validasi input email dan password
    public function login()
    {
        $this->validate();

        $anggota = UserAnggota::where('email', $this->email)->first();

        if (!$anggota) {
            session()->flash('error', 'Email tidak ditemukan.');
            return;
        }

        if (!$anggota->is_active) {
            session()->flash('error', 'Akun Anda tidak aktif. Silakan hubungi admin.');
            return;
        }

        // Proses login pakai guard useranggota
        if (Auth::guard('useranggota')->attempt([
            'email' => $this->email,
            'password' => $this->password,
        ], true)) // true = remember me
        {
            session()->flash('success', 'Login berhasil!');
            return redirect()->route('Beranda');
        }

        session()->flash('error', 'Password salah.');
    }

    // mengambil data warna
    public function loadColorSetting()
    {
        $this->colorsetting = \App\Models\colorsetting::where('is_active', 1)
            ->orderBy('created_at', 'desc')
            ->first();
    }

    // Tentang Kami
    public function loadTentangKami ()
    {
        // Mengambil semua data tentang kami
        $this->tentangkami = tentangKami::where('is_active',1)
            // ->oldest()
            ->latest()
            ->first();
    }

    // Running Text
    protected function loadRunningText ()
    {
        // Mengambil semua data running text
        $this->Text = RunningText::all()
        ->where('is_active',1);
    }

    // Mengirim data ke Beranda
    public function mount()
    {
        $this->loadRunningText();
        $this->loadTentangKami();
        $this->loadColorSetting();
        // dd($this->loadColorSetting());
    }


    public function render()
    {
        return view('livewire.components.layouts.navbar');
    }
}
