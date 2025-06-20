<div class="flex justify-center items-center select-none my-[28px] w-full">
    <div class="flex flex-col gap-2 w-[88%] h-full">
        <p class="uppercase font-[poppins] text-md font-bold">Video</p>
        <div class="border-b-1 w-full"></div>
        <div class="flex justify-center flex-wrap gap-4 h-full w-full">
            {{-- content --}}
        @foreach ( $video as $vd )
            <div class="hover:cursor-pointer">
                <div class="flex flex-col justify-center items-center bg-white shadow-lg w-[360px] h-[240px] rounded-md">
                    <div class="flex justify-center items-center w-full h-[200px] rounded-t-md">
                        <iframe width="360px" height="200px" style="border-radius: 4px 4px 0px 0px"
                        src="{{ $vd->video_embed }}" 
                        frameborder="0" 
                        allowfullscreen>
                        </iframe>
                    </div>
                    <div class="flex justify-center bg-[#D9D9D9] shadow items-center w-full h-[40px] rounded-b-md">
                        <p class="font-[poppins] text-md font-medium capitalize">{{ $vd->deskripsi }}</p>
                    </div>
                </div>
            </div>
        @endforeach
        {{-- content --}}
        </div>
        {{-- pagination --}}
            <x-pagination-control :paginator="$video" per-page-binding="perPage" />
        {{-- pagination --}}
    </div>
</div>