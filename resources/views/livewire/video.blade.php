<div class="select-none my-6">
    <div class="flex justify-center items-center w-full h-full">
        <div class="flex flex-wrap gap-4 justify-center items-center w-full max-w-[1152px] h-full">
            {{-- content --}}
            @for ($i = 0; $i < 6; $i++ )
                
            <a href="{{ route('videodetails') }}" class="hover:cursor-pointer">
                <div class="flex flex-col justify-center items-center bg-white shadow-lg w-[360px] h-[240px] rounded-md">
                    <div class="flex justify-center items-center w-full h-[200px] rounded-t-md">
                        <img src="{{ asset('image/ln2.jpeg') }}" alt="" class="w-full h-full object-cover rounded-t-md">
                    </div>
                    <div class="flex justify-center bg-[#D9D9D9] shadow items-center w-full h-[40px] rounded-b-md">
                        <p class="font-[poppins] text-md font-medium capitalize">kegiatan 1</p>
                    </div>
                </div>

            </a>
            @endfor
            {{-- content --}}

        </div>
    </div>
</div>
