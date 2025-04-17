<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ session('title', 'Page Title') }}</title>

    @livewireStyles
    @vite('resources/css/app.css')
</head>

<body class="h-full w-full bg-white dark:bg-black">
    {{-- Cek jika bukan di halaman login, tampilkan Navbar --}}
    @if (!request()->routeIs('filament.admin.auth.login'))
        @livewire('components.layouts.navbar')
    @endif

    <main>
        {{ $slot }}
    </main>

    {{-- Cek jika bukan di halaman login, tampilkan Footer --}}
    @if (!request()->routeIs('filament.admin.auth.login'))
        @livewire('components.layouts.footer')
    @endif


    @livewireStyles
</body>
</html>