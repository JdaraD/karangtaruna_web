<div class="flex justify-center items-center select-none my-[28px] w-full">
    <div class="flex flex-col gap-2 w-[88%] h-full">
        <p class="uppercase font-[poppins] text-md font-bold">{{ $album->judul }}</p>
        <div class="border-b-1 w-full"></div>
        <div class="flex justify-center flex-wrap gap-4 h-full w-full">
            {{-- content --}}

            @foreach ($album->photos as $photo )
                
                <div class="flex flex-col justify-center items-center bg-white shadow-lg lg:w-[360px] lg:h-[240px] md:w-[360px] md:h-[240px] w-[280px] h-[160px] rounded-md">
                    <img src="{{ asset('storage/'. $photo->gambar) }}" alt="" class="w-full h-full object-cover rounded-md">
                </div>

            @endforeach
            {{-- content --}}

        </div>
        {{-- pagination --}}
            <x-pagination-control :paginator="$photos" per-page-binding="perPage" />
        {{-- pagination --}}
    </div>
</div>