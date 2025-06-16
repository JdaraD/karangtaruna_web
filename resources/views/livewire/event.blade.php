<div class="flex justify-center items-center select-none my-[28px] w-full">
    <div class="flex flex-col gap-2 w-[88%] h-full z-0">
        <p class="uppercase font-[poppins] text-md font-bold">Event</p>
        <div class="border-b-1 w-full"></div>
        <div class="flex justify-center items-center h-full w-full">
            <div class="flex flex-col gap-4 lg:w-[80%] md:w-[80%] w-[90%] h-full">
                {{-- content --}}
                @foreach ( $acara as $ar)
                    
                        <a href="{{ route('detailevent',['id' => $ar->id]) }}" class="flex flex-wrap gap-2 w-[98%] bg-gray-50 shadow py-2 px-2 rounded-md transition-transform duration-100 hover:scale-102 h-full">
                            <div class="flex justify-center w-[40%] h-full">
                                <img src="{{ asset('storage/'.$ar->gambar) }}" alt="{{ $ar->judul_acara }}" class="w-full lg:h-[195px] md:h-[195px] h-[100px] object-cover rounded-lg">
                            </div>
                            <div class="flex flex-col gap-2 lg:w-[58%] md:w-[58%] w-[48%] h-full text-justify">
                                <p class="uppercase font-[poppins] text-sm">{{ $ar->judul_acara }}</p>
                                <p class="capitalize font-[poppins] text-sm lg:line-clamp-5 md:line-clamp-5 line-clamp-3">{{ $ar->deskripsi }}</p>
                                <p class="capitalize font-[poppins] text-sm italic">{{ \Carbon\Carbon::parse($ar->tanggal)->translatedFormat('d F Y') }}</p>
                            </div>
                        </a>
  
                @endforeach
                {{-- content --}}

                
            </div>
        </div>
    </div>
    {{-- overlay --}}
        {{-- <div class="fixed inset-0 flex justify-center items-center shadow bg-gray-400/60 h-full w-full z-20">
            <div class="absolute my-4 bg-amber-500 h-[100px] w-[80%] z-50">
                <p>testsdadas</p>
            </div>
        </div> --}}
        {{-- <div class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-amber-500 rounded-xl shadow-xl p-6 w-11/12 max-w-xl">
                <p class="text-white text-center text-lg font-semibold">Ini adalah overlay notifikasi</p>
            </div>
        </div> --}}

    {{-- overlay --}}
    
</div>
