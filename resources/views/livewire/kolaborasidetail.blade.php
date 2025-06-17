<x-layouts.app>
<div class="flex justify-center items-center select-none my-[28px] w-full">
    <div class="flex flex-col gap-2 w-[88%] h-full">
        <p class="uppercase font-[poppins] text-md font-bold">test</p>
        <div class="border-b-1 w-full"></div>
        {{-- content --}}

        <div class="flex flex-row gap-2 h-full w-full">
            <div class="flex flex-col justify-center gap-4 items-center w-[900px] h-full">
                @forelse ( $menu->kolaborasiprogram as $kb )
                    <a href="{{ route('detailkolaborasi', ['id' => $kb->id]) }}" class="flex flex-wrap gap-2 bg-gray-100 rounded-md shadow-md transition-transform duration-100 hover:scale-102 px-2 py-2 w-[98%] h-full">
                        <div class="flex justify-center w-[40%] h-full">
                            <img src="{{ asset('storage/'. $kb->gambar) }}" alt="" class="w-full h-[195px] object-cover rounded-lg">
                        </div>
                        <div class="flex flex-col w-[59%] h-full gap-2 text-justify">
                            <p class="capitalize font-[poppins] text-md font-bold">{{ $kb->nama }}</p>
                            <p class="uppercase font-[poppins] text-sm line-clamp-6">{{ $kb->deskripsi }}</p>
                            <p class="capitalize font-[poppins] text-sm italic">{{ \Carbon\Carbon::parse($kb->tanggal)->translatedFormat('d F Y') }}</p>
                        </div>
                    </a>
                @empty
                
                <p>Tidak ada kolaborasi yang terkait.</p>
                @endforelse
            </div>
            <div class="flex flex-col gap-6 w-[452px] h-full">
                <div class="flex justify-center bg-gray-400 items-center w-full h-full rounded-lg shadow-lg">
                    <p class="uppercase font-[poppins] text-sm">kalender</p>

                </div>
                <div class="flex flex-col gap-4 w-full h-full rounded-lg">
                    <p class="uppercase font-[poppins] text-sm">news</p>
                    <div class="border-b-1 w-full"></div>
                    <div class="flex flex-col gap-2 items-center w-full h-full">
                        @for ($i = 0 ; $i < 6 ; $i++)
                            <div class="flex flex-wrap gap-4 bg-gray-100 rounded-md shadow-md transition-transform duration-100 hover:scale-102 px-2 py-2 w-[98%] h-full">
                                <div class="flex justify-center w-[30%] h-full">
                                    <img src="{{ asset('image/ln1.jpg') }}" alt="" class="w-[160px] h-[95px] object-cover rounded-lg">
                                </div>
                                <div class="w-[60%] h-full line-clamp-3 text-justify">
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quidem explicabo reiciendis iusto in! Eveniet accusantium, fugiat incidunt id, totam odio nulla ipsa ipsum, consectetur sequi quod! Voluptate labore tempora animi! Lorem</p>
                                </div>
                            </div>
        
                        @endfor
                    </div>


                </div>
            </div>
        </div>
        {{-- content --}}

    </div>

</div>
</x-layouts.app>
