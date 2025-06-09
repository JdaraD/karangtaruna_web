<div class="flex justify-center items-center select-none my-[28px] w-full">
    <div class="flex flex-col gap-2 w-[88%] h-full">
        <p class="uppercase font-[poppins] text-md font-bold">test</p>
        <div class="border-b-1 w-full"></div>
        <div class="flex flex-row gap-2 h-full w-full">
            <div class="flex flex-col justify-center gap-4 items-center w-[900px] h-full">
                {{-- content --}}

                @foreach ( $berita as $br )
                    
                <div class="flex flex-wrap gap-2 w-[98%] h-full bg-gray-100 rounded-md shadow px-2 py-2 transition-transform duration-100 hover:scale-102">
                    <div class="flex justify-center w-[40%] h-full">
                        <img src="{{ asset('storage/'.$br->gambar) }}" alt="{{ $br->judul_berita }}" class="w-full h-[195px] object-cover rounded-lg">
                    </div>
                    <div class="w-[59%] h-full line-clamp-4 text-justify">
                        <p class="uppercase font-[poppins] text-sm">{{ $br->deskripsi }}</p>
                        <p class="capitalize font-[poppins] text-sm italic">{{ \Carbon\Carbon::parse($br->tanggal)->translatedFormat('d F Y') }}</p>
                    </div>
                </div>
                
                @endforeach 
                {{-- content --}}

            </div>
            <div class="flex flex-col gap-6 w-[452px] h-full">
                {{-- content --}}

                <div class="flex justify-center bg-gray-400 items-center w-full h-full rounded-lg shadow-lg">
                    <p class="uppercase font-[poppins] text-sm">kalender</p>
                </div>
                {{-- content --}}

            </div>
        </div>
    </div>

</div>
