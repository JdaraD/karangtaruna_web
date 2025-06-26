{{-- resources/views/filament/pages/auth/login-custom.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Custom</title>
    @vite('resources/css/app.css') {{-- jika kamu pakai Vite --}}
    @livewireStyles
</head>
<body class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 min-h-screen flex items-center justify-center">

    <div class="w-full max-w-md w p-6 bg-amber-200 rounded-lg shadow-xl">
        <h2 class="text-2xl font-bold text-center text-white mb-6">Login Custom</h2>

            <form wire:submit.prevent="authenticate" class="space-y-4 mt-4">
                {{ $this->form }}

                @if (session()->has('loginError'))
                    <div class="text-sm text-red-600">
                        {{ session('loginError') }}
                    </div>
                @endif

                <x-filament::button type="submit" class="w-full">
                    {{ __('Masuk') }}
                </x-filament::button>
            </form>
    </div>

    @livewireScripts
</body>
</html>
