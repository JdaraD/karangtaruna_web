<div class="flex w-full h-[72px] bg-[#F5ECE0] justify-center">
    <div class="grid grid-cols-6 gap-4 h-full size-[90%]">

        {{-- Logo Start --}}
        <div class="flex col-span-1 w-full h-full  justify-center items-center gap-2">
            {{-- logo --}}
            <img src="{{ asset('image/logo.png') }}" alt="" class="size-10 ">
            {{-- logo --}}

            {{-- identity name --}}
            <div>
                <p class="font-[poppins] font-medium text-sm ">Karang Taruna</p>
                <p class="font-[poppins] font-normal text-xs ">Desa Waru</p>
            </div>
            {{-- identity name --}}
        </div>
        {{-- Logo End --}}

        {{-- Menu Start --}}
        <div class="flex col-span-4 w-full h-full= justify-center items-center gap-10">
            <a href="" class="uppercase font-[poppins] text-sm">beranda</a>
            <div>
                <p class="uppercase font-[poppins] text-sm">profil</p>

            </div>

            <div>
                <p class="uppercase font-[poppins] text-sm">program</p>

            </div>

            <div>
                <p class="uppercase font-[poppins] text-sm">media</p>

            </div>

            <a href="" class="uppercase font-[poppins] text-sm">event</a href="">
            <a href="" class="uppercase font-[poppins] text-sm">berita</a>
        </div>
        {{-- Menu End --}}

        {{-- Kontak & Search Start --}}
        <div class="flex col-span-1 w-full h-full justify-center items-center gap-4">
            <a href="">
                <p class="uppercase font-[poppins] text-sm ">kontak</p>
            </a>

            {{-- Search start--}}
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
            {{-- Search End --}}
            
        </div>
        {{-- Kontak & Search End --}}
    </div>
</div>
