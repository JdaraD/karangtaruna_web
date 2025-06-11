<div class="flex justify-center items-center select-none my-[28px] w-full">
    <div class="flex flex-col gap-2 w-[88%] h-full z-0">
        <p class="uppercase font-[poppins] text-md font-bold">test</p>
        <div class="border-b-1 w-full"></div>
        <div class="flex justify-center items-center h-full w-full">
            <div class="flex flex-col gap-4 w-[80%] h-full">
                {{-- content --}}
                @foreach ( $acara as $ar)
                    <button wire:click="openOverlayEvent">
                        <div class="flex flex-wrap gap-2 w-[98%] bg-gray-50 shadow py-2 px-2 rounded-md transition-transform duration-100 hover:scale-102 h-full">
                            <div class="flex justify-center w-[40%] h-full">
                                <img src="{{ asset('storage/'.$ar->gambar) }}" alt="{{ $ar->nama_acara }}" class="w-full h-[195px] object-cover rounded-lg">
                            </div>
                            <div class="w-[58%] h-full line-clamp-4 text-justify">
                                <p class="uppercase font-[poppins] text-sm">{{ $ar->deskripsi }}</p>
                                <p class="capitalize font-[poppins] text-sm italic">{{ \Carbon\Carbon::parse($ar->tanggal)->translatedFormat('d F Y') }}</p>
                            </div>
                        </div>
                    </button>
  
                @endforeach
                {{-- content --}}

                
            </div>
            {{-- overlay --}}
                <div class="absolute shadow opacity-50 bg-gray-400 h-full w-full z-40">
                    <div class="flex bg-white h-[820px] w-[820px] z-50">
                        <p>testsdadas</p>
                    </div>
                </div>
            {{-- overlay --}}
        </div>
    </div>
    
</div>
