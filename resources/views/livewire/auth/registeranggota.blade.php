<div class="fixed inset-0 flex items-center justify-center bg-gradient-to-br from-blue-800 via-indigo-900 to-purple-900 overflow-hidden z-40">

    {{-- Efek hujan --}}
    <div class="rain pointer-events-none absolute inset-0 z-10">
        @for ($i = 0; $i < 100; $i++)
            <div class="raindrop absolute w-0.5 h-5 bg-white opacity-30 animate-fall"
                style="
                    left: {{ rand(0, 100) }}%;
                    animation-duration: {{ rand(2, 5) }}s;
                    animation-delay: -{{ rand(0, 5) }}s;">
            </div>
        @endfor
    </div>

    {{-- Loading overlay --}}
    <div wire:loading wire:target="register" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-80">
        <div class="flex flex-col items-center h-full justify-center">
            @if ($tentangkami)
            <img src="{{ asset('storage/' . $tentangkami->foto_profil) }}" alt="Loading..." class="h-32 w-32 animate-pulse mb-4">
                
            @endif
            <div class="flex space-x-2">
                <span class="h-3 w-3 bg-green-500 rounded-full animate-bounce"></span>
                <span class="h-3 w-3 bg-green-500 rounded-full animate-bounce [animation-delay:.2s]"></span>
                <span class="h-3 w-3 bg-green-500 rounded-full animate-bounce [animation-delay:.4s]"></span>
            </div>
        </div>
    </div>

    {{-- Form registrasi --}}
    <div class="backdrop-blur-lg bg-white/10 border border-white/30 rounded-2xl shadow-2xl p-8 w-full max-w-md z-20 relative">
        <div class="flex justify-center items-center mb-4">
            @if ($tentangkami)
                <img src="{{ asset('storage/' . $tentangkami->foto_profil) }}" class="w-16 h-16 md:w-20 md:h-20" />
            @endif

        </div>
        <h2 class="text-2xl font-bold text-white mb-6 text-center drop-shadow">Registrasi User</h2>

        @if (session()->has('success'))
            <div class="mb-4 text-green-200 bg-green-500/20 border border-green-300 px-4 py-2 rounded text-sm">
                {{ session('success') }}
            </div>
        @endif

        <form wire:submit.prevent="register" class="space-y-5">
            <div>
                <label class="block text-sm font-medium text-white mb-1">Nama Lengkap</label>
                <input type="text" wire:model="name"
                    class="w-full bg-white/30 text-white placeholder-white/70 border border-white/30 focus:ring-white focus:border-white px-4 py-2 rounded-lg shadow-sm backdrop-blur-md capitalize"
                    placeholder="Masukan Nama Sesuai Nama Di KTP" required />
                @error('name') <span class="text-red-300 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-white mb-1">Email</label>
                <input type="email" wire:model="email"
                    class="w-full bg-white/30 text-white placeholder-white/70 border border-white/30 focus:ring-white focus:border-white px-4 py-2 rounded-lg shadow-sm backdrop-blur-md"
                    placeholder="Masukan Email Resmi Yang Anda Punya" required>
                @error('email') <span class="text-red-300 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-white mb-1">Password</label>
                <input type="password" wire:model.defer="password"
                    class="w-full bg-white/30 text-white placeholder-white/70 border border-white/30 focus:ring-white focus:border-white px-4 py-2 rounded-lg shadow-sm backdrop-blur-md"
                    placeholder="Masukan Password" required>
                @error('password') <span class="text-red-300 text-sm">{{ $message }}</span> @enderror
            </div>

            <button type="submit"
                class="w-full bg-gradient-to-r from-blue-500 to-indigo-600 text-white py-2 rounded-xl hover:from-blue-600 hover:to-indigo-700 transition duration-300 font-semibold shadow-md">
                Daftar
            </button>

            <div class="text-center mt-4">
                <a href="{{ route('Beranda') }}" class="text-sm text-white hover:underline">
                    Sudah punya akun? Kembali Ke Login
                </a>
            </div>
        </form>
    </div>

    {{-- Efek partikel --}}
    <div class="particles pointer-events-none absolute inset-0 z-0" id="particle-container"></div>

    <style>
        .particles {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 0;
        }

        .particle {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float infinite ease-in-out;
        }

        .raindrop {
            height: 20px;
            width: 2px;
            background: rgba(255, 255, 255, 0.2);
            animation-name: fall;
            animation-timing-function: linear;
            position: absolute;
            top: -20px;
        }

        @keyframes fall {
            to {
                transform: translateY(100vh);
            }
        }

        @keyframes float {
            0% {
                transform: translateY(0) scale(1);
                opacity: 0.3;
            }

            50% {
                transform: translateY(-20px) scale(1.2);
                opacity: 0.6;
            }

            100% {
                transform: translateY(0) scale(1);
                opacity: 0.3;
            }
        }
    </style>

    <script>
        const particleContainer = document.getElementById('particle-container');
        const totalParticles = 60;

        for (let i = 0; i < totalParticles; i++) {
            const p = document.createElement('div');
            p.classList.add('particle');
            const size = Math.random() * 8 + 4;
            p.style.width = p.style.height = `${size}px`;
            p.style.left = `${Math.random() * 100}vw`;
            p.style.top = `${Math.random() * 100}vh`;
            p.style.animationDuration = `${Math.random() * 5 + 5}s`;
            p.style.animationDelay = `${Math.random() * 5}s`;
            particleContainer.appendChild(p);
        }
    </script>
</div>
