<?php

namespace App\Livewire\Auth;

use App\Models\tentangKami;
use App\Models\useranggota;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Registeranggota extends Component
{
    public $tentangkami;

    public $name, $email, $password;

     protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:useranggotas,email',
        'password' => 'required|string|min:6',
    ];

    public function register()
    {
        $this->validate();


        // Simpan ke DB
        $user = useranggota::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'is_active' => 1,
        ]);

        // Auto login
        // Auth::guard('web')->login($user);

        // Redirect
        session()->flash('success', 'Registrasi dan login berhasil!');
        return redirect()->route('Beranda');
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

    // Mengirim data ke Beranda
    public function mount()
    {
        $this->loadTentangKami();
    }
    public function render()
    {
        return view('livewire.auth.registeranggota');
    }
}
