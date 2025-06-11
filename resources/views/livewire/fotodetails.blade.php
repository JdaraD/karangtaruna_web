<div class="select-none my-6">
    <div class="flex justify-center items-center w-full h-full">
        <div class="flex flex-wrap gap-4 justify-center items-center w-full max-w-[1152px] h-full">
            @foreach ($album->photos as $photo )
                
                <div class="flex flex-col justify-center items-center bg-white shadow-lg w-[360px] h-[240px] rounded-md">
                        <img src="{{ asset('storage/'. $photo->gambar) }}" alt="" class="w-full h-full object-cover rounded-md">
                </div>

            @endforeach

        </div>
    </div>
</div>
