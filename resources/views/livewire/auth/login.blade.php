<div class="min-h-screen bg-gradient-to-br from-blue-800 via-indigo-900 to-purple-900 text-white flex justify-center items-center py-10 px-4">
    <div wire:loading wire:target="login" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-80">
        <div class="flex flex-col gap-4 items-center h-full justify-center">
                @foreach ( $kami as $km )
                    <img src="{{ asset('storage/'.$km->foto_profil) }}" class="w-16 h-16 md:w-20 md:h-20" />
                    
                @endforeach

            <div class="flex space-x-2">
                <span class="h-3 w-3 bg-green-500 rounded-full animate-bounce"></span>
                <span class="h-3 w-3 bg-green-500 rounded-full animate-bounce [animation-delay:.2s]"></span>
                <span class="h-3 w-3 bg-green-500 rounded-full animate-bounce [animation-delay:.4s]"></span>
            </div>
        </div>
    </div>  
    <div class="max-w-screen-xl bg-white/10 border border-white/20 backdrop-blur-lg shadow-2xl rounded-xl flex justify-center flex-1 overflow-hidden"> 
        <div class="lg:w-1/2 xl:w-5/12 p-6 sm:p-12">
            <div class="flex justify-center items-center mb-6">
                @foreach ( $kami as $km )
                    <img src="{{ asset('storage/'.$km->foto_profil) }}" class="w-16 h-16 md:w-20 md:h-20" />
                    
                @endforeach
            </div>
            
            <div class="flex flex-col items-center">
                <div class="w-full">
                    <div class="text-center mb-6">
                        @if (session('error'))
                            <div class="bg-red-600/80 text-white p-2 rounded mb-4 text-sm shadow">
                                {{ session('error') }}
                            </div>
                        @endif
                        @foreach ( $kami as $km )
                            <h1 class="text-3xl font-extrabold mb-2 drop-shadow">Login CMS {{ $km->first_name }} {{ $km->last_name }}</h1>
                            <p class="text-sm text-blue-200 tracking-wide font-medium">Login dengan E-mail Admin</p>

                        @endforeach
                    </div>

                    <form wire:submit.prevent="login" class="mx-auto max-w-xs space-y-5">
                        <div>
                            <input wire:model="email"
                                class="w-full px-5 py-3 rounded-lg bg-white/20 border border-white/30 placeholder-white/70 text-sm focus:outline-none focus:ring-2 focus:ring-white"
                                type="email" placeholder="Email" />
                            @error('email')
                                <span class="text-red-300 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <input wire:model="password"
                                class="w-full px-5 py-3 rounded-lg bg-white/20 border border-white/30 placeholder-white/70 text-sm focus:outline-none focus:ring-2 focus:ring-white"
                                type="password" placeholder="Password" />
                            @error('password')
                                <span class="text-red-300 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex items-center">
                            <input wire:model="remember" type="checkbox" id="remember"
                                class="form-checkbox text-blue-500 bg-white/10 border-white/30 focus:ring-white">
                            <label for="remember" class="ml-2 text-sm text-white/80">Ingat saya</label>
                        </div>

                        <button
                            class="w-full bg-blue-600 hover:bg-blue-700 transition-all duration-300 text-white py-3 rounded-lg font-semibold flex items-center justify-center shadow-md">
                            <svg class="w-6 h-6 -ml-1 mr-2" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                                <circle cx="8.5" cy="7" r="4" />
                                <path d="M20 8v6M23 11h-6" />
                            </svg>
                            Login
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="flex-1 hidden lg:flex items-center justify-center relative overflow-hidden bg-gradient-to-tr from-blue-800 via-indigo-900 to-purple-900">
            <!-- Modern Blobs -->
            <div class="absolute w-[400px] h-[400px] bg-purple-400/30 rounded-full blur-3xl mix-blend-screen animate-blob-fast"></div>
            <div class="absolute w-[500px] h-[500px] bg-indigo-500/20 rounded-full blur-2xl mix-blend-screen animate-blob-mid animation-delay-2000"></div>
            <div class="absolute w-[600px] h-[600px] bg-blue-400/20 rounded-full blur-xl mix-blend-screen animate-blob-slow animation-delay-4000"></div>
        </div>

    </div>
        <style>
        @keyframes blob-fast {
        0%, 100% {
            transform: translate(0px, 0px) scale(1);
        }
        50% {
            transform: translate(40px, -60px) scale(1.2);
        }
        }
        @keyframes blob-mid {
        0%, 100% {
            transform: translate(0px, 0px) scale(1);
        }
        50% {
            transform: translate(-40px, 50px) scale(0.95);
        }
        }
        @keyframes blob-slow {
        0%, 100% {
            transform: translate(0px, 0px) scale(1);
        }
        50% {
            transform: translate(60px, 30px) scale(1.05);
        }
        }

        .animate-blob-fast {
        animation: blob-fast 6s infinite ease-in-out;
        }
        .animate-blob-mid {
        animation: blob-mid 8s infinite ease-in-out;
        }
        .animate-blob-slow {
        animation: blob-slow 10s infinite ease-in-out;
        }

        .animation-delay-2000 {
        animation-delay: 2s;
        }
        .animation-delay-4000 {
        animation-delay: 4s;
        }
        </style>       
</div>