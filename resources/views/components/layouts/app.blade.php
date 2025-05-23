<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <title>{{ session('title', 'Page Title') }}</title> --}}
    <title>{{ session('title', 'Karang Taruna Desa Waru') }}</title>
    @foreach ( $tentangkami as $tentang)
    <link rel="icon" href="{{ asset('storage/'. $tentang->foto_profil) }}" type="image/x-icon">
        
    @endforeach

    {{-- CSRF Token --}}

    @livewireStyles
    @vite('resources/css/app.css')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    {{-- maps API --}}
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap">
    </script>
    {{-- maps API --}}

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

</head>

<body class="h-full w-full bg-white">
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