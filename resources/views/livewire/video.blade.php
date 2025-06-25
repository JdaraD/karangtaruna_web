<div class="flex justify-center items-center select-none my-[28px] w-full">
    <div class="flex flex-col gap-2 w-[88%] h-full">
        <p class="uppercase font-[poppins] text-md font-bold">Video</p>
        <div class="border-b-1 w-full"></div>
        <div class="flex justify-center flex-wrap gap-4 h-full w-full">
            {{-- content --}}
        @foreach ( $video as $vd )
<div class="hover:cursor-pointer w-full flex justify-center">
    <div class="flex flex-col justify-center items-center bg-white shadow-lg w-full max-w-[360px] rounded-md overflow-hidden">
        <div class="w-full aspect-video">
            <iframe
                class="w-full h-full rounded-t-md"
                src="{{ $vd->video_embed }}"
                frameborder="0"
                allowfullscreen>
            </iframe>
        </div>
        <div class="flex justify-center bg-[#D9D9D9] shadow items-center w-full h-10 rounded-b-md px-2">
            <p class="font-[poppins] text-sm sm:text-md font-medium capitalize text-center">
                {{ $vd->deskripsi }}
            </p>
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