<div class="relative">
    {{-- website --}}
    <div class="flex  justify-center items-center">
        <div id="mainNavbar" class="relative transition-all duration-300 z-20">
            
            {{-- Header --}}
                
            {{-- Navbar --}}
            <div class="flex w-full lg:h-[72px] md:h-[72px] h-[72px] bg-[{{ $colorsetting->header_color }}] justify-center" style="background-color: {{ $colorsetting->header_color }};">
            
                <div class="grid lg:grid-cols-6 md:grid-cols-3 grid-cols-4 gap-4 h-full size-[90%]">
            
                    {{-- Logo Start --}}
                    @if ( $tentangkami )
                        
                    <div class="flex lg:col-span-1 md:col-span-2 col-span-3 w-full h-full lg:justify-center lg:items-center md:justify-center md:items-center justify-end items-center lg:gap-2 md:gap-4 gap-2">
                        {{-- logo --}}
                        <img src="{{ asset('storage/' . $tentangkami->foto_profil) }}" alt="" class="size-10 ">
                        {{-- logo --}}
                        
                        {{-- identity name --}}
                        <a href="{{ route('tentang') }}" class="w-[160px]">
                            <p class="font-[poppins] font-medium lg:text-sm md:text-sm text-sm ">{{ $tentangkami->first_name }}</p>
                            <p class="font-[poppins] font-normal lg:text-sm md:text-sm text-sm ">{{ $tentangkami->last_name }}</p>
                        </a>
                        {{-- identity name --}}
                    </div>
                    @endif
                    {{-- Logo End --}}
            
                    {{-- Menu Start --}}
                    <div class="lg:flex md:hidden hidden col-span-4 w-full h-full justify-center items-center lg:gap-6 md:gap-4 gap-6">
                        <a href="{{ route('Beranda') }}" class="uppercase font-[poppins] text-sm hover:bg-gray-50 px-4 py-2 rounded-md {{ request()->routeIs('Beranda') ? 'bg-gray-50 shadow-md' : '' }}">beranda</a>
                            
                        <div x-data="{ open: false }" class="relative inline-block text-left">
                            @php
                                $isProfilActive = request()->routeIs('tentang') || request()->routeIs('sktuktur') ||request()->routeIs('dasarhukum');
                            @endphp
                            <button @click="open = !open" class="uppercase font-[poppins] text-sm inline-flex justify-center w-full rounded-md px-4 py-2 font-medium text-gray-700 hover:bg-gray-50 {{ $isProfilActive ? 'bg-gray-50 shadow-md' : '' }}">
                                profil
                            </button>
                        
                            <div x-show="open" @click.outside="open = false" x-transition
                                class="absolute left-0 mt-2 w-[160px] rounded-md shadow-lg bg-white ring-opacity-5 z-50">
                                <div class="py-1 flex flex-col justify-center items-center gap-2">
                                    <a href="{{ route('tentang') }}" class="uppercase font-[poppins] w-[150px] text-sm block px-4 py-2 text-gray-700 hover:bg-gray-200 {{ request()->routeIs('tentang') ? 'bg-gray-200' : '' }} rounded-md">tentang kami</a>
                                    <a href="{{ route('sktuktur') }}" class="uppercase font-[poppins] w-[150px] text-sm block px-4 py-2 text-gray-700 hover:bg-gray-200 {{ request()->routeIs('sktuktur') ? 'bg-gray-200' : '' }} rounded-md">struktur katar</a>
                                    <a href="{{ route('dasarhukum') }}" class="uppercase font-[poppins] w-[150px] text-sm block px-4 py-2 text-gray-700 hover:bg-gray-200 {{ request()->routeIs('dasarhukum') ? 'bg-gray-200' : '' }} rounded-md">dasar hukum</a>
                                </div>
                            </div>
                        </div>
                        
                        <div x-data="{ open: false }" class="relative inline-block text-left">
                            @php
                                $isProgramActive = request()->routeIs('menukegiatan') || request()->routeIs('usahamandiri') ||request()->routeIs('kolaborasi') || request()->routeIs('kegiatan') || request()->routeIs('detailusaha') || request()->routeIs('kolaborasidetail') || request()->routeIs('detailkolaborasi');
                            @endphp

                            <button @click="open = !open" class="uppercase font-[poppins] text-sm inline-flex justify-center w-full rounded-md px-4 py-2 font-medium text-gray-700 hover:bg-gray-50 {{ $isProgramActive ? 'bg-gray-50 shadow-md' : '' }}">
                                program
                            </button>
                        
                            <div x-show="open" @click.outside="open = false" x-transition
                                class="absolute left-0 mt-2 w-[154px] rounded-md shadow-lg bg-white ring-opacity-5 z-50">
                                <div class="py-1 flex flex-col justify-center items-center gap-2">
                                    <a href="{{ route('menukegiatan') }}" class="uppercase font-[poppins] w-[144px] text-sm block px-4 py-2 text-gray-700 hover:bg-gray-200 {{ request()->routeIs('menukegiatan') ? 'bg-gray-200' : '' }} rounded-md">kegiatan</a>
                                    <a href="{{ route('usahamandiri') }}" class="uppercase font-[poppins] w-[144px] text-sm block px-4 py-2 text-gray-700 hover:bg-gray-200 {{ request()->routeIs('usahamandiri') ? 'bg-gray-200' : '' }} rounded-md">usaha mandiri</a>
                                    <a href="{{ route('kolaborasi') }}" class="uppercase font-[poppins] w-[144px] text-sm block px-4 py-2 text-gray-700 hover:bg-gray-200 {{ request()->routeIs('kolaborasi') ? 'bg-gray-200' : '' }} rounded-md">kolaborasi</a>
                                </div>
                            </div>
                        </div>
            
                        <div x-data="{ open: false }" class="relative inline-block text-left">
                            @php
                                $isMediaActive = request()->routeIs('foto') || request()->routeIs('video');
                            @endphp

                            <button @click="open = !open"
                                class="uppercase font-[poppins] text-sm inline-flex justify-center w-full rounded-md px-4 py-2 font-medium text-gray-700 hover:bg-gray-50
                                {{ $isMediaActive ? 'bg-gray-50 shadow-md' : '' }}">
                                media
                            </button>
                        
                            <div x-show="open" @click.outside="open = false" x-transition
                                class="absolute left-0 mt-2 w-[140px] rounded-md shadow-lg bg-white ring-opacity-5 z-50">
                                <div class="py-1 flex flex-col justify-center items-center gap-2">
                                    <a href="{{ route('foto') }}" class="uppercase font-[poppins] w-[130px] text-sm block px-4 py-2 text-gray-700 hover:bg-gray-200 {{ request()->routeIs('foto') ? 'bg-gray-200' : '' }} rounded-md">foto</a>
                                    <a href="{{ route('video') }}" class="uppercase font-[poppins] w-[130px] text-sm block px-4 py-2 text-gray-700 hover:bg-gray-200 {{ request()->routeIs('video') ? 'bg-gray-200' : '' }} rounded-md">video</a>
                                </div>
                            </div>
                        </div>
            
                        <a href="{{ route('event') }}" class="uppercase font-[poppins] text-sm focus:bg-gray-50 hover:bg-gray-50 px-4 py-2 rounded-md {{ request()->routeIs('event') ? 'bg-gray-50 shadow-md' : '' }}">event</a>
                        <a href="{{ route('news') }}" class="uppercase font-[poppins] text-sm hover:bg-gray-50 px-4 py-2 rounded-md {{ request()->routeIs('news') ? 'bg-gray-50 shadow-md' : '' }}">berita</a>
                    </div>
                    {{-- Menu End --}}
            
                    {{-- Kontak & Search Start --}}
                    <div class="lg:flex md:flex flex lg:col-span-1 md:col-span-1 col-span-1 w-full h-full justify-center items-center lg:gap-4 md:gap-4 gap-0">
            
                        {{-- Kontak Start --}}
                        <a href="#kontak">
                            <p class="uppercase font-[poppins] lg:text-sm md:text-sm text-[12px] font-medium hover:bg-gray-50 px-4 py-2 rounded-md">kontak</p>
                        </a>
            
                        {{-- Search start--}}
                        {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="lg:size-6 md:size-6 size-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg> --}}
                        {{-- Search End --}}
                        
                    </div>
                    {{-- Kontak & Search End --}}
                </div>
            
            </div>
            {{-- Navbar --}}
            
            {{-- Running Text --}}
            <div class="flex justify-center items-center lg:h-[35px] md:h-[35px] h-[28px] bg-[{{ $colorsetting->header_runningtext_color }}]" style="background-color: {{ $colorsetting->header_runningtext_color }};">
                <div class="grid grid-cols-10 size-[80%] w-[94%]">
                    <div class="flex col-span-1 justify-center items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#006FFF" class="size-7">
                            <path d="M16.881 4.345A23.112 23.112 0 0 1 8.25 6H7.5a5.25 5.25 0 0 0-.88 10.427 21.593 21.593 0 0 0 1.378 3.94c.464 1.004 1.674 1.32 2.582.796l.657-.379c.88-.508 1.165-1.593.772-2.468a17.116 17.116 0 0 1-.628-1.607c1.918.258 3.76.75 5.5 1.446A21.727 21.727 0 0 0 18 11.25c0-2.414-.393-4.735-1.119-6.905ZM18.26 3.74a23.22 23.22 0 0 1 1.24 7.51 23.22 23.22 0 0 1-1.41 7.992.75.75 0 1 0 1.409.516 24.555 24.555 0 0 0 1.415-6.43 2.992 2.992 0 0 0 .836-2.078c0-.807-.319-1.54-.836-2.078a24.65 24.65 0 0 0-1.415-6.43.75.75 0 1 0-1.409.516c.059.16.116.321.17.483Z" />
                        </svg>                  
                        <p class="lg:border-2 md:border-2 border-1 lg:h-[27px] md:h-[27px] h-[20px]"></p>
    
                    </div>
    
                    <div class="flex justify-center items-center col-span-9 px-1">
                        <marquee behavior="scroll" direction="left" scrollamount="6">
                            <div class="">
                                @foreach ( $Text as $texts )
                                    <p class="normal-case font-[poppins] lg:text-sm md:text-sm text-xs font-medium">
                                        {{ $texts->description }}
                                    </p>
                                    
                                @endforeach
                            </div>
                        </marquee>
    
                    </div>
    
                </div>
            </div>
            {{-- Running Text --}}
            
            
        </div>

    </div>
    {{-- website --}}

    {{-- mobile --}}
    <div class="absolute block top-2 md:left-14 w-screen lg:hidden md:flex z-100">
        <button type="button" class="absolute py-3 px-4 inline-flex items-center md:left-8 left-2 gap-x-2 text-sm font-medium " aria-expanded="false" onclick="toggleDropdown()" id="dropdownToggle">
                <span id="toggleIcon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="size-8 text-black" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M3 6.75A.75.75 0 0 1 3.75 6h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 6.75ZM3 12a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 12Zm0 5.25a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
                    </svg>
                </span>
            
        </button>

        <div class="absolute z-10 mt-[64px] left-0 w-screen transition-opacity duration-200 hidden" id="dropdownMenu">
            <div class="w-full flex-auto overflow-hidden rounded-b-md bg-white text-sm/6 shadow-lg ring-gray-900/5">
                {{-- menu --}}
                <div class="p-4 space-y-2" x-data="{ openProfil: false, openProgram: false, openMedia: false }">
                    <a href="{{ route('Beranda') }}" class="flex items-center gap-3 p-2 hover:bg-gray-50 rounded-lg font-semibold text-gray-900 uppercase">
                        <div class="size-10 flex items-center justify-center rounded-lg bg-gray-100">
                            <svg class="size-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 9.75L12 3l9 6.75V19.5a1.5 1.5 0 0 1-1.5 1.5h-15A1.5 1.5 0 0 1 3 19.5V9.75z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 22.5V12h6v10.5" />
                            </svg>
                        </div>
                        Beranda
                    </a>
                    
                    <!-- Accordion Profil -->
                    <div class="rounded-lg hover:bg-gray-50 p-2">
                        <button @click="openProfil = !openProfil" class="flex justify-between items-center w-full text-left">
                            <div class="flex items-center gap-x-3">
                                <div class="flex items-center justify-center size-10 rounded-lg bg-gray-100">
                                    <svg class="size-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z" />
                                    </svg>
                                </div>
                                <span class="font-semibold text-gray-900 uppercase">Profil</span>
                            </div>
                            <svg :class="{ 'rotate-180': openProfil }" class="size-4 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <div x-show="openProfil" x-transition class="mt-2 pl-12 space-y-2 text-sm text-gray-700">
                            <a href="{{ route('tentang') }}" class="block hover:text-indigo-600 {{ request()->routeIs('tentang') ? 'font-semibold text-indigo-600' : '' }}">Tentang Kami</a>
                            <a href="{{ route('sktuktur') }}" class="block hover:text-indigo-600 {{ request()->routeIs('sktuktur') ? 'font-semibold text-indigo-600' : '' }}">Struktur Katar</a>
                            <a href="{{ route('dasarhukum') }}" class="block hover:text-indigo-600 {{ request()->routeIs('dasarhukum') ? 'font-semibold text-indigo-600' : '' }}">Dasar Hukum</a>
                        </div>
                    </div>

                    <!-- Accordion Program -->
                    <div class="rounded-lg hover:bg-gray-50 p-2">
                        <button @click="openProgram = !openProgram" class="flex justify-between items-center w-full text-left">
                            <div class="flex items-center gap-x-3">
                                <div class="flex items-center justify-center size-10 rounded-lg bg-gray-100">
                                    <svg class="size-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 2v20m10-10H2" />
                                    </svg>
                                </div>
                                <span class="font-semibold text-gray-900 uppercase">Program</span>
                            </div>
                            <svg :class="{ 'rotate-180': openProgram }" class="size-4 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <div x-show="openProgram" x-transition class="mt-2 pl-12 space-y-2 text-sm text-gray-700">
                            <a href="{{ route('menukegiatan') }}" class="block hover:text-indigo-600 {{ request()->routeIs('menukegiatan') ? 'font-semibold text-indigo-600' : '' }}">Kegiatan</a>
                            <a href="{{ route('usahamandiri') }}" class="block hover:text-indigo-600 {{ request()->routeIs('usahamandiri') ? 'font-semibold text-indigo-600' : '' }}">Usaha Mandiri</a>
                            <a href="{{ route('kolaborasi') }}" class="block hover:text-indigo-600 {{ request()->routeIs('kolaborasi') ? 'font-semibold text-indigo-600' : '' }}">Kolaborasi</a>
                        </div>
                    </div>

                    <!-- Accordion Media -->
                    <div class="rounded-lg hover:bg-gray-50 p-2">
                        <button @click="openMedia = !openMedia" class="flex justify-between items-center w-full text-left">
                            <div class="flex items-center gap-x-3">
                                <div class="flex items-center justify-center size-10 rounded-lg bg-gray-100">
                                    <svg class="size-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10l4.553-2.276A1 1 0 0 1 21 8.618v6.764a1 1 0 0 1-1.447.894L15 14M4 6h7v12H4z" />
                                    </svg>
                                </div>
                                <span class="font-semibold text-gray-900 uppercase">Media</span>
                            </div>
                            <svg :class="{ 'rotate-180': openMedia }" class="size-4 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <div x-show="openMedia" x-transition class="mt-2 pl-12 space-y-2 text-sm text-gray-700">
                            <a href="{{ route('foto') }}" class="block hover:text-indigo-600 {{ request()->routeIs('foto') ? 'font-semibold text-indigo-600' : '' }}">Foto</a>
                            <a href="{{ route('video') }}" class="block hover:text-indigo-600 {{ request()->routeIs('video') ? 'font-semibold text-indigo-600' : '' }}">Video</a>
                        </div>
                    </div>

                    <!-- Link Langsung -->
                    <a href="{{ route('event') }}" class="flex items-center gap-3 p-2 hover:bg-gray-50 rounded-lg font-semibold text-gray-900 uppercase">
                        <div class="size-10 flex items-center justify-center rounded-lg bg-gray-100">
                            <svg class="size-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 0 0 2-2V7H3v12a2 2 0 0 0 2 2Z" />
                            </svg>
                        </div>
                        Event
                    </a>

                    <a href="{{ route('news') }}" class="flex items-center gap-3 p-2 hover:bg-gray-50 rounded-lg font-semibold text-gray-900 uppercase">
                        <div class="size-10 flex items-center justify-center rounded-lg bg-gray-100">
                            <svg class="size-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 6.75h15m-15 4.5h15m-15 4.5h7.5" />
                            </svg>
                        </div>
                        Berita
                    </a>
                </div>

                {{-- footer --}}
                <div class="grid grid-cols-2 divide-x divide-gray-900/5 bg-gray-50">
                    <a href="#" class="flex items-center justify-center gap-x-2.5 p-3 font-semibold text-gray-900 hover:bg-gray-100">
                    <svg class="size-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                        <path fill-rule="evenodd" d="M2 10a8 8 0 1 1 16 0 8 8 0 0 1-16 0Zm6.39-2.908a.75.75 0 0 1 .766.027l3.5 2.25a.75.75 0 0 1 0 1.262l-3.5 2.25A.75.75 0 0 1 8 12.25v-4.5a.75.75 0 0 1 .39-.658Z" clip-rule="evenodd" />
                    </svg>
                    Watch demo
                    </a>
                    <a href="#" class="flex items-center justify-center gap-x-2.5 p-3 font-semibold text-gray-900 hover:bg-gray-100">
                    <svg class="size-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                        <path fill-rule="evenodd" d="M2 3.5A1.5 1.5 0 0 1 3.5 2h1.148a1.5 1.5 0 0 1 1.465 1.175l.716 3.223a1.5 1.5 0 0 1-1.052 1.767l-.933.267c-.41.117-.643.555-.48.95a11.542 11.542 0 0 0 6.254 6.254c.395.163.833-.07.95-.48l.267-.933a1.5 1.5 0 0 1 1.767-1.052l3.223.716A1.5 1.5 0 0 1 18 15.352V16.5a1.5 1.5 0 0 1-1.5 1.5H15c-1.149 0-2.263-.15-3.326-.43A13.022 13.022 0 0 1 2.43 8.326 13.019 13.019 0 0 1 2 5V3.5Z" clip-rule="evenodd" />
                    </svg>
                    Contact sales
                    </a>
                </div>
            </div>
        </div>

    </div>
    
    {{-- mobile --}}

    {{-- loading page --}}
    <div class="fixed top-0 left-0 w-screen min-h-screen z-[100] flex justify-center items-center bg-[rgba(209,213,219,0.3)]" wire:target="menu" wire:loading wire:loading>
        <div class="flex justify-center mt-36 w-full h-full">
            {{-- loading --}}
            <div class="w-[400px] h-[400px] bg-white rounded-md flex flex-col gap-4 justify-center items-center shadow-lg">
                @if ( $tentangkami )
                    <div class="w-full h-[50%] justify-center items-center flex flex-col gap-4 mt-2">
                        <img src="{{ asset('storage/' .$tentangkami->foto_profil) }}" alt="{{ $tentangkami->first_name }} {{ $tentangkami->last_name }}" class="w-[120px] h-[120px]">
                        <p class="text-center text-black font-bold capitalize font-[poppins]">{{ $tentangkami->first_name }} {{ $tentangkami->last_name }}</p>
    
                    </div>
                    
                @endif
                {{-- loading --}}
                <div class="w-full h-[50%] justify-center items-center flex flex-col gap-4">
                    <p class="text-center text-black font-medium capitalize font-[poppins]">Loading</p>
                    <div class="loader"></div> 
                    <style>
                        .loader {
                        height: 25px;
                        aspect-ratio: 2.5;
                        --_g: no-repeat radial-gradient(farthest-side,#000 90%,#0000);
                        background: var(--_g), var(--_g), var(--_g), var(--_g);
                        background-size: 20% 50%;
                        animation: l44 1s infinite linear alternate; 
                        }
                        @keyframes l44 {
                        0%,
                        5%    {background-position: calc(0*100%/3) 50% ,calc(1*100%/3) 50% ,calc(2*100%/3) 50% ,calc(3*100%/3) 50% }
                        12.5% {background-position: calc(0*100%/3) 0   ,calc(1*100%/3) 50% ,calc(2*100%/3) 50% ,calc(3*100%/3) 50% }
                        25%   {background-position: calc(0*100%/3) 0   ,calc(1*100%/3) 0   ,calc(2*100%/3) 50% ,calc(3*100%/3) 50% }
                        37.5% {background-position: calc(0*100%/3) 100%,calc(1*100%/3) 0   ,calc(2*100%/3) 0   ,calc(3*100%/3) 50% }
                        50%   {background-position: calc(0*100%/3) 100%,calc(1*100%/3) 100%,calc(2*100%/3) 0   ,calc(3*100%/3) 0   }
                        62.5% {background-position: calc(0*100%/3) 50% ,calc(1*100%/3) 100%,calc(2*100%/3) 100%,calc(3*100%/3) 0   }
                        75%   {background-position: calc(0*100%/3) 50% ,calc(1*100%/3) 50% ,calc(2*100%/3) 100%,calc(3*100%/3) 100%}
                        87.5% {background-position: calc(0*100%/3) 50% ,calc(1*100%/3) 50% ,calc(2*100%/3) 50% ,calc(3*100%/3) 100%}
                        95%,
                        100%  {background-position: calc(0*100%/3) 50% ,calc(1*100%/3) 50% ,calc(2*100%/3) 50% ,calc(3*100%/3) 50% }
                        }
    
                    </style>
    
                </div>
                {{-- loading --}}
    
            </div>

        </div>
    </div>
    {{-- loading page --}}
</div>




<script>
    function toggleDropdown() {
        const dropdown = document.getElementById('dropdownMenu');
        const iconSpan = document.getElementById('toggleIcon');

        const isOpen = !dropdown.classList.contains('hidden');

        if (isOpen) {
            // Tutup dropdown
            dropdown.classList.add('hidden');
            iconSpan.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" class="size-8 text-black" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M3 6.75A.75.75 0 0 1 3.75 6h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 6.75ZM3 12a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 12Zm0 5.25a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
                </svg>`;
        } else {
            // Buka dropdown
            dropdown.classList.remove('hidden');
            iconSpan.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" class="size-8 text-black" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>`;
        }
    }
</script>
