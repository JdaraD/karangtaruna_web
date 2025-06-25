<div class="flex justify-center items-center select-none my-[28px] w-full">
    <div class="flex flex-col gap-2 w-[88%] h-full">
        <p class="uppercase font-[poppins] text-md font-bold">Foto</p>
        <div class="border-b-1 w-full"></div>
        <div class="flex justify-center flex-wrap gap-4 h-full w-full">
            {{-- content --}}
                
            @foreach ( $albums as $ab)
                
            <a href="{{ route('fotodetails', $ab->slug) }}" class="group hover:cursor-pointer">
                <div class="relative flex flex-col justify-center items-center bg-white shadow-lg lg:w-[360px] lg:h-[240px] md:w-[360px] md:h-[240px] w-[280px] h-[160px] rounded-md">
                    
                    {{-- Foto Album --}}
                    <div class="flex justify-center items-center w-full h-[200px] rounded-t-md bg-gray-100 overflow-hidden">
                        @if ($ab->photos->first())
                            <img src="{{ asset('storage/' . $ab->photos->first()->gambar) }}"
                                alt="Foto Album"
                                class="w-full h-full object-cover rounded-t-md">
                        @else
                            <span class="text-sm text-gray-500">Tidak ada foto</span>
                        @endif

                        {{-- Icon muncul saat hover --}}
                        <div class="absolute inset-0 flex justify-center items-center bg-black/40 opacity-0 group-hover:opacity-100 transition duration-300 rounded-md">
                            <!-- Icon Album -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h4l2 3h10v9H3V7z" />
                            </svg>
                        </div>
                    </div>

                    {{-- Nama Album --}}
                    <div class="flex justify-center bg-[#D9D9D9] shadow items-center w-full h-[40px] rounded-b-md">
                        <p class="font-[poppins] text-md font-medium capitalize">{{ $ab->judul }}</p>
                    </div>
                </div>
            </a>

            @endforeach

            {{-- content --}}

        </div>
        {{-- pagination --}}
            <x-pagination-control :paginator="$albums" per-page-binding="perPage" />
        {{-- pagination --}}
    </div>
</div>
