<div class="select-none">

    <div class="flex justify-center items-center w-full h-[full] px-4 py-4 select-none">

        {{-- dekripsi --}}
        <div class="h-full w-[88%] mt-6">
            
            <p class="uppercase font-bold text-bold font-[poppins] text-xl">tentang kami</p>
            
            @if ( $tentangkami )
            <div class="mt-4 mb-6">
                {{-- Logo Start --}}
                <div class="flex items-center w-full h-full gap-2">
                    {{-- logo --}}
                    <img src="{{ asset('storage/'.$tentangkami->foto_profil) }}" alt="" class="size-10 ">
                    {{-- logo --}}
        
                    {{-- identity name --}}
                    <div>
                        <p class="font-[poppins] font-medium text-sm ">{{ $tentangkami->first_name }}</p>
                        <p class="font-[poppins] font-normal text-xs ">{{ $tentangkami->last_name }}</p>
                    </div>
                    {{-- identity name --}}
                </div>
                {{-- Logo End --}}
                
            </div>
            
            {{-- deskripsi --}}
            <p class="font-[poppins] text-justify text-sm">{{ $tentangkami->description }}</p>
            {{-- deskripsi --}}
            
            @endif
        </div>
        {{-- dekripsi --}}

    </div>

    {{-- visi & misi --}}
    <div class="h-full w-full mt-6">

        <div class="flex flex-col md:flex-row justify-center items-start lg:gap-10 md:gap-8 gap-14 px-10 py-6">
            <!-- VISI -->
            <div class="relative flex justify-center items-center bg-yellow-100 rounded-lg p-6 w-full md:w-1/2 shadow-md">
                <div class="absolute -top-12 left-1/2 -translate-x-1/2 bg-teal-700 text-white text-lg font-bold rounded-full w-24 h-24 flex items-center justify-center shadow-md">
                    VISI
                </div>
                <ul class="mt-10 mb-8 space-y-6">
                    @foreach ( $visi as $v )
                        <li class="flex items-start gap-3">
                            <div class="w-4 h-4 bg-teal-600 rounded-full mt-1"></div>
                            <p class="text-gray-700">{{ $v->description }}</p>
                        </li>  
                    @endforeach
                </ul>
            </div>
        
            <!-- MISI -->
            <div class="relative flex justify-center items-center bg-yellow-100 rounded-lg p-6 w-full md:w-1/2 shadow-md">
                <div class="absolute -top-12 left-1/2 -translate-x-1/2 bg-teal-700 text-white text-lg font-bold rounded-full w-24 h-24 flex items-center justify-center shadow-md">
                    MISI
                </div>
                <ul class="mt-10 mb-8 space-y-6">
                    @foreach ( $misi as $m )
                        <li class="flex items-start gap-3">
                            <div class="w-4 h-4 bg-teal-600 rounded-full mt-1"></div>
                            <p class="text-gray-700">{{ $m->description }}</p>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        
    </div>
    {{-- visi & misi --}}

    {{-- identity & slogan --}}
    <div class="flex flex-wrap justify-center h-full w-full py-4 gap-8 max-w-[1024]">
        @if ( $tentangkami )  
            <div class="flex justify-center items-center lg:h-[509px] lg:w-[509px] md:h-[509px] md:w-[509px] h-[360px] w-[360px] bg-white shadow-lg rounded-md">
                <img src="{{ asset('storage/' . $tentangkami->foto_profil) }}" alt="" class="h-[80%] w-[80%] ">
            </div>
        @endif

        <div class="flex flex-col gap-4 px-4 py-4 h-full lg:w-[509px] md:w-[509px] w-[360px] bg-white shadow-lg rounded-md">
            <div class="flex justify-center items-center">
                <p class="capitalize font-bold font-[poppins] text-xl">value</p>
            </div>

            @foreach ( $value as $va )
                <div class="flex gap-2 mb-2">
                    <p class="capitalize font-bold text-bold font-[poppins] text-sm">{{ $va->title }}</p>
                    <p class="capitalize font-[poppins] text-xs text-justify">{{ $va->description }}</p>
                </div>
            @endforeach
            
        </div>
    </div>
    {{-- identity & slogan --}}

    
</div>
