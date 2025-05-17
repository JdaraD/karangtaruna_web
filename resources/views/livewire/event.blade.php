<div class="flex justify-center items-center select-none my-[28px] w-full">
    <div class="flex flex-col gap-2 w-[88%] h-full">
        <p class="uppercase font-[poppins] text-md font-bold">test</p>
        <div class="border-b-1 w-full"></div>
        <div class="flex justify-center items-center h-full w-full">
            <div class="flex flex-col gap-4 w-[80%] h-full">
                {{-- content --}}
                @for ($i = 0 ; $i < 6 ; $i++)
                    <div class="flex flex-wrap gap-2 w-[98%] h-full">
                        <div class="flex justify-center w-[40%] h-full">
                            <img src="{{ asset('image/ln1.jpg') }}" alt="" class="w-full h-[195px] object-cover rounded-lg">
                        </div>
                        <div class="w-[59%] h-full line-clamp-4 text-justify">
                            <p class="uppercase font-[poppins] text-sm">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quidem explicabo reiciendis iusto in! Eveniet accusantium, fugiat incidunt id, totam odio nulla ipsa ipsum, consectetur sequi quod! Voluptate labore tempora animi! Lorem</p>
                        </div>
                    </div>
  
                @endfor
                {{-- content --}}
            </div>
        </div>
    </div>

</div>
