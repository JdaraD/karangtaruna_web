{{-- website --}}
<div id="mainNavbar" class="relative transition-all duration-300">
    {{-- Navbar --}}
    <div class="flex w-full lg:h-[72px] md:h-[72px] h-[58px] bg-[#F5ECE0] justify-center">
    
        <div class="grid grid-cols-6 gap-4 h-full size-[90%]">
    
            {{-- Logo Start --}}
            <div class="flex lg:col-span-1 md:col-span-1 col-span-4 w-full h-full justify-center items-center gap-2">
                {{-- logo --}}
                <img src="{{ asset('image/logo.png') }}" alt="" class="size-10 ">
                {{-- logo --}}
    
                {{-- identity name --}}
                <div>
                    <p class="font-[poppins] font-medium lg:text-sm md:text-sm text-sm ">Karang Taruna</p>
                    <p class="font-[poppins] font-normal lg:text-sm md:text-sm text-sm ">Desa Waru</p>
                </div>
                {{-- identity name --}}
            </div>
            {{-- Logo End --}}
    
            {{-- Menu Start --}}
            <div class="lg:flex md:flex hidden col-span-4 w-full h-full= justify-center items-center gap-6">
                <a href="{{ route('Beranda') }}" class="uppercase font-[poppins] text-sm hover:bg-gray-50 px-4 py-2 rounded-md">beranda</a>
                    
                <div x-data="{ open: false }" class="relative inline-block text-left">
                    <button @click="open = !open" class="uppercase font-[poppins] text-sm inline-flex justify-center w-full rounded-md px-4 py-2 font-medium text-gray-700 hover:bg-gray-50">
                        profil

                        <!-- Panah ke kiri (←) saat dropdown tertutup -->
                        {{-- <svg x-show="!open" class="ml-2 h-4 w-4 transform" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                        </svg> --}}

                        <!-- Panah ke bawah (↓) saat dropdown terbuka -->
                        {{-- <svg x-show="open" class="ml-2 h-4 w-4 transform" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg> --}}
                    </button>
                
                    <div x-show="open" @click.outside="open = false" x-transition
                        class="absolute left-0 mt-2 w-[160px] rounded-md shadow-lg bg-white ring-opacity-5 z-50">
                        <div class="py-1">
                            <a href="{{ route('tentangkami') }}" class="uppercase font-[poppins] text-sm block px-4 py-2 text-gray-700 hover:bg-gray-100">tentang kami</a>
                            <a href="{{ route('sktuktur') }}" class="uppercase font-[poppins] text-sm block px-4 py-2 text-gray-700 hover:bg-gray-100">struktur katar</a>
                            <a href="{{ route('dasarhukum') }}" class="uppercase font-[poppins] text-sm block px-4 py-2 text-gray-700 hover:bg-gray-100">dasar hukum</a>
                        </div>
                    </div>
                </div>
                
                <div x-data="{ open: false }" class="relative inline-block text-left">
                    <button @click="open = !open" class="uppercase font-[poppins] text-sm inline-flex justify-center w-full rounded-md px-4 py-2 font-medium text-gray-700 hover:bg-gray-50">
                        program
                        <!-- Panah ke kiri (←) saat dropdown tertutup -->
                        {{-- <svg x-show="!open" class="ml-2 h-4 w-4 transform" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                        </svg> --}}

                        <!-- Panah ke bawah (↓) saat dropdown terbuka -->
                        {{-- <svg x-show="open" class="ml-2 h-4 w-4 transform" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg> --}}
                    </button>
                
                    <div x-show="open" @click.outside="open = false" x-transition
                        class="absolute left-0 mt-2 w-[140px] rounded-md shadow-lg bg-white ring-opacity-5 z-50">
                        <div class="py-1">
                            <a href="{{ route('menukegiatan') }}" class="uppercase font-[poppins] text-sm block px-4 py-2 text-gray-700 hover:bg-gray-100">kegiatan</a>
                            <a href="{{ route('usahamandiri') }}" class="uppercase font-[poppins] text-sm block px-4 py-2 text-gray-700 hover:bg-gray-100">usaha mandiri</a>
                            <a href="{{ route('kolaborasi') }}" class="uppercase font-[poppins] text-sm block px-4 py-2 text-gray-700 hover:bg-gray-100">kolaborasi</a>
                        </div>
                    </div>
                </div>
    
                <div x-data="{ open: false }" class="relative inline-block text-left">
                    <button @click="open = !open" class="uppercase font-[poppins] text-sm inline-flex justify-center w-full rounded-md px-4 py-2 font-medium text-gray-700 hover:bg-gray-50">
                        media
                        <!-- Panah ke kiri (←) saat dropdown tertutup -->
                        {{-- <svg x-show="!open" class="ml-2 h-4 w-4 transform" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                        </svg> --}}
                        {{-- <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="ml-2" width="18" height="18" fill="#000000" viewBox="0 0 256 256">
                            <path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216ZM149.66,93.66,115.31,128l34.35,34.34a8,8,0,0,1-11.32,11.32l-40-40a8,8,0,0,1,0-11.32l40-40a8,8,0,0,1,11.32,11.32Z">
                            </path>
                        </svg> --}}

                        <!-- Panah ke bawah (↓) saat dropdown terbuka -->
                        {{-- <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="ml-2" width="18" height="18" fill="#000000" viewBox="0 0 256 256">
                            <path d="M128,24A104,104,0,1,0,232,128,104.11,104.11,0,0,0,128,24Zm0,192a88,88,0,1,1,88-88A88.1,88.1,0,0,1,128,216Zm45.66-109.66a8,8,0,0,1,0,11.32l-40,40a8,8,0,0,1-11.32,0l-40-40a8,8,0,0,1,11.32-11.32L128,140.69l34.34-34.35A8,8,0,0,1,173.66,106.34Z">
                            </path>
                        </svg> --}}
                        {{-- <svg x-show="open" class="ml-2 h-4 w-4 transform" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg> --}}
                    </button>
                
                    <div x-show="open" @click.outside="open = false" x-transition
                        class="absolute left-0 mt-2 w-[140px] rounded-md shadow-lg bg-white ring-opacity-5 z-50">
                        <div class="py-1">
                            <a href="{{ route('foto') }}" class="uppercase font-[poppins] text-sm block px-4 py-2 text-gray-700 hover:bg-gray-100">foto</a>
                            <a href="{{ route('video') }}" class="uppercase font-[poppins] text-sm block px-4 py-2 text-gray-700 hover:bg-gray-100">video</a>
                        </div>
                    </div>
                </div>
    
                <a href="{{ route('event') }}" class="uppercase font-[poppins] text-sm hover:bg-gray-50 px-4 py-2 rounded-md">event</a>
                <a href="{{ route('news') }}" class="uppercase font-[poppins] text-sm hover:bg-gray-50 px-4 py-2 rounded-md">berita</a>
            </div>
            {{-- Menu End --}}
    
            {{-- Kontak & Search Start --}}
            <div class="lg:flex md:flex flex lg:col-span-1 md:col-span-1 col-span-2 w-full h-full justify-center items-center lg:gap-4 md:gap-4 gap-0">
    
                {{-- Kontak Start --}}
                <a href="">
                    <p class="uppercase font-[poppins] lg:text-sm md:text-sm text-[12px] font-medium hover:bg-gray-50 px-4 py-2 rounded-md">kontak</p>
                </a>
    
                {{-- Search start--}}
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="lg:size-6 md:size-6 size-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                </svg>
                {{-- Search End --}}
                
            </div>
            {{-- Kontak & Search End --}}
        </div>
    
    </div>
    {{-- Navbar --}}
    
    {{-- Running Text --}}
    <div class="flex justify-center items-center lg:h-[35px] md:h-[35px] h-[28px] bg-[#6A9C89]">
        <div class="grid grid-cols-10 size-[80%]">
            <div class="flex col-span-1 justify-center items-center gap-3">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#006FFF" class="size-7">
                    <path d="M16.881 4.345A23.112 23.112 0 0 1 8.25 6H7.5a5.25 5.25 0 0 0-.88 10.427 21.593 21.593 0 0 0 1.378 3.94c.464 1.004 1.674 1.32 2.582.796l.657-.379c.88-.508 1.165-1.593.772-2.468a17.116 17.116 0 0 1-.628-1.607c1.918.258 3.76.75 5.5 1.446A21.727 21.727 0 0 0 18 11.25c0-2.414-.393-4.735-1.119-6.905ZM18.26 3.74a23.22 23.22 0 0 1 1.24 7.51 23.22 23.22 0 0 1-1.41 7.992.75.75 0 1 0 1.409.516 24.555 24.555 0 0 0 1.415-6.43 2.992 2.992 0 0 0 .836-2.078c0-.807-.319-1.54-.836-2.078a24.65 24.65 0 0 0-1.415-6.43.75.75 0 1 0-1.409.516c.059.16.116.321.17.483Z" />
                  </svg>                  
                <p class="lg:border-2 md:border-2 border-1 lg:h-[27px] md:h-[27px] h-[20px]"></p>

            </div>

            <div class="flex justify-center items-center col-span-9 px-1">
                <marquee behavior="scroll" direction="left" scrollamount="8">
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
{{-- website --}}

{{-- mobile --}}
{{-- mobile --}}


{{-- <script>
window.addEventListener('scroll', function () {
    console.log('Scrolled');  // Debugging line
    const navbar = document.getElementById('mainNavbar');
    if (window.scrollY > 0) {
        navbar.classList.add('fixed', 'top-0', 'left-0', 'z-50', 'shadow-md');
    } else {
        navbar.classList.remove('fixed', 'top-0', 'left-0', 'z-50', 'shadow-md');
    }
});
</script> --}}