<x-layouts.app>
<div class="select-none">

    {{-- deskripsi kegiatan --}}
    @if ($kegiatan)
        
    <div class="flex justify-center items-center w-full h-full mt-6 select-none">
        
        <div class="flex flex-row justify-center items-center w-full h-full">
            <div class="grid lg:grid-cols-2 md:grid-cols-1 justify-items-center grid-cols-1 gap-4 w-[86%]">
                
                <div class="flex justify-center items-center rounded-lg lg:w-[600px] md:w-[420px] w-[340px] lg:h-[340px] md:h-[260px] h-[220px]">
                    <img src="{{ asset('storage/'.$kegiatan->gambar) }}" alt="" class="object-cover rounded-lg w-full h-full">
                </div>
                
                <div class="w-full h-full">
                    <p class="capitalize text-md font-[poppins] font-bold">{{ $kegiatan->nama_program }}</p>
                    <p class="capitalize text-sm text-justify font-[poppins]">
                        {{ $kegiatan->deskripsi }}
                    </p>
                    </div>
                    
                </div>
                
            </div>
    </div>
    @endif
        {{-- deskripsi kegiatan --}}


    {{-- progress kegiatan --}}
    <div class="flex justify-center items-center w-full h-full mt-6 select-none">
        <p class="uppercase font-medium text-bold font-[poppins] text-xl">progress</p>
    </div>

    <div class="flex items-center justify-center mt-6 bg-white w-full h-full">
        <div class="flex flex-wrap justify-center gap-3 pb-4 max-w-[1440px]">

            @foreach ( $program as $pg )
            <div class="flex justify-center items-center lg:w-[420px] md:w-[420px] w-[370px] lg:h-[249px] md:h-[229px] h-[218px] bg-[#F5F5F5] rounded-lg">
                    <div class="grid grid-rows-1 gap-2 h-full w-full rounded-lg px-2 py-2">
                        <div class="flex flex-col flex-wrap gap-2 lg:h-[164px] md:h-[164px] h-[144px] rounded-lg">
                            <div class="flex lg:h-[164px] lg:w-[144px] md:h-[164px] md:w-[144px] h-[144px] w-[124px] rounded-md">
                                <img src="{{ asset('storage/'.$pg->gambar) }}" alt="" class="object-fit rounded-lg">
                            </div>
                            <div class="relative lg:h-[164px] lg:w-[250px] md:w-[250px] w-[220px]">
                                <p class="uppercase font-bold">{{ $pg->AddMenuProgram->nama_program }}</p>
                                <p class="text-xs text-justify font-[poppins] line-clamp-6">{{ $pg->deskripsi }}</p>
                            </div>
                        </div>
                        <div class="grid grid-rows-2 h-[60px] rounded-lg">
                            <div class="flex justify-end">
                                <p class="font-[poppins] text-md font-bold pr-2">{{ $pg->progres }}%</p>
                            </div>
                            <div class="flex justify-center items-center">
                                <div class="bg-[#D9D9D9] h-[90%] w-[98%] rounded-lg">
                                    @php
                                        $progres = $pg->progres;
                                        if ($progres <= 25) {
                                            $bgColor = '#FF4400';
                                        } elseif ($progres <= 50) {
                                            $bgColor = '#E1FF00';
                                        } elseif ($progres <= 75) {
                                            $bgColor = '#BBFF00';
                                        } else {
                                            $bgColor = '#00FF46';
                                        }
                                    @endphp
                                    <div class="h-full w-[{{ $progres }}%] rounded-lg" style="background-color: {{ $bgColor }};">
                                        <p class="flex justify-center items-center font-[poppins] text-md capitalize font-medium">Progress</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    {{-- progress kegiatan --}}

    
</div>
</x-layouts.app>
