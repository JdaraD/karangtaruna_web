<x-layouts.app>
<div class="flex justify-center items-center select-none my-[28px] w-full">
    <div class="flex flex-col gap-2 w-[88%] h-full">
        <p class="uppercase font-[poppins] text-md font-bold">{{ $menu->nama_kolaborasi }}</p>
        <div class="border-b-1 w-full"></div>
        {{-- content --}}

        <div class="flex flex-row gap-2 h-full w-full">
            <div class="flex flex-col justify-center gap-4 items-center lg:w-[900px] md:w-[900px] w-[216px] h-full">
                @forelse ( $menu->kolaborasiprogram as $kb )
                    <a href="{{ route('detailkolaborasi', ['id' => $kb->id]) }}" class="flex flex-wrap gap-2 bg-gray-100 rounded-md shadow-md transition-transform duration-100 hover:scale-102 px-2 py-2 w-[98%] h-full">
                        <div class="flex justify-center lg:w-[40%] md:w-[40%] w-[100%]  h-full">
                            <img src="{{ asset('storage/'. $kb->gambar) }}" alt="" class="w-full lg:h-[195px] md:h-[195px] h-[140px] object-cover rounded-lg">
                        </div>
                        <div class="flex flex-col lg:w-[59%] md:w-[59%] w-[100%] h-full gap-2">
                            <p class="capitalize font-[poppins] text-md font-bold">{{ $kb->nama }}</p>
                            <p class="uppercase font-[poppins] text-sm line-clamp-6">{{ $kb->deskripsi }}</p>
                            <p class="capitalize font-[poppins] text-sm italic">{{ \Carbon\Carbon::parse($kb->tanggal)->translatedFormat('d F Y') }}</p>
                        </div>
                    </a>
                @empty
                
                <p>Tidak ada kolaborasi yang terkait.</p>
                @endforelse
            </div>
            <div class="flex flex-col gap-6 lg:w-[452px] md:w-[452px] w-[120px] h-full">
                <div class="flex flex-col gap-4 w-full h-full rounded-lg">
                    <p class="uppercase font-[poppins] text-sm font-bold">news</p>
                    <div class="border-b-1 w-full"></div>
                    <div class="flex flex-col gap-2 items-center w-full h-full">

                        @foreach ($berita as $br)
                            <a href="{{ route('newsdetail',['id' => $br->id]) }}" class="flex flex-wrap gap-4 bg-gray-100 rounded-md shadow-md transition-transform duration-100 hover:scale-102 px-2 py-2 w-[98%] h-full">
                                <div class="flex justify-center lg:w-[30%] md:w-[30%] w-[100%] h-full">
                                    <img src="{{ asset('storage/'.$br->gambar) }}" alt="" class="w-[160px] h-[95px] object-cover rounded-lg">
                                </div>
                                <div class="lg:w-[60%] md:w-[60%] w-[100%] h-full line-clamp-3">
                                    <p class="capitalize font-[poppins] text-sm font-bold">{{ $br->judul_berita }}</p>
                                    <p class="capitalize font-[poppins] text-xs">{{ $br->deskripsi }}</p>
                                </div>
                            </a>
        
                        @endforeach 
                    </div>


                </div>
            </div>
        </div>
        {{-- content --}}
        {{-- pagination --}}
            <x-pagination-control :paginator="$programs" per-page-binding="perPage" />
        {{-- pagination --}}
    </div>

</div>
</x-layouts.app>
