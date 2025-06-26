<?php

namespace App\Livewire\Auth;

use App\Models\tentangKami;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;
    public $remember = false;
    public $kami;

    // load data tentang kami
    public function loadkami()
    {
        $this->kami = tentangKami::where('is_active',1)
            ->orderBy('created_at', 'desc')
            ->latest()
            ->take(1)
            ->get();
    }

    // laod data ke page
    public function mount()
    {
        $this->loadkami();
    }

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    public function login()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            session()->regenerate();
            return redirect()->intended('/admin');
        }

        session()->flash('error', 'Email atau password salah.');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
