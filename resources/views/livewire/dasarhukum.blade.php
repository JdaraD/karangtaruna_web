<div class="select-none">

    <div class="flex justify-center items-center w-full h-full select-none">

        {{-- dekripsi --}}
        <div class="h-full w-[88%] mt-6 mb-4">

            <p class="uppercase font-bold text-bold font-[poppins] text-xl">dasar hukum</p>
            @if ( $tentang)
                
            <div class="mt-4 mb-6">
                {{-- Logo Start --}}
                <div class="flex items-center w-full h-full gap-2">
                    {{-- logo --}}
                    <img src="{{ asset('storage/'.$tentang->foto_profil) }}" alt="" class="size-10 ">
                    {{-- logo --}}
                    
                    {{-- identity name --}}
                    <div>
                        <p class="font-[poppins] font-medium text-sm ">{{ $tentang->first_name }}</p>
                        <p class="font-[poppins] font-normal text-xs ">{{ $tentang->last_name }}</p>
                    </div>
                    {{-- identity name --}}
                </div>
                {{-- Logo End --}}
                
            </div>
            
            @endif
            @foreach ( $hukum as $hkm )
                
            {{-- deskripsi --}}
            <p class="font-[poppins] text-justify text-sm">{{ $hkm->description }}</p>
            {{-- deskripsi --}}
            
            @endforeach
        </div>
        {{-- dekripsi --}}

    </div>

    {{-- pasal --}}
    <div class="flex justify-center items-center mb-6">
        <div class="relative flex flex-wrap justify-center items-center bg-yellow-100 rounded-lg p-6 lg:w-1/2 md:w-1/2 w-[80%] shadow-md">
            <div>
                <p class="font-[poppins] text-md text-bold font-bold uppercase text-center">PASAL TENTANG HUKUM BERDIRINYA KARANGTARUNA</p>

            </div>

            <ul class="my-4 space-y-4 ">
                @foreach ( $pasal as $psl)
                    <div class="relative items-start lg:gap-4 md:gap-4 gap-2">
                        <div class="flex flex-row gap-2">
                            <div class="h-4 w-4 bg-teal-600 rounded-full mt-1"></div>
                            <p class="font-[poppins] lg:text-md md:text-md text-sm uppercase" >{{ $psl->pasal }}</p>
                        </div>
                        <p class="text-gray-700 font-[poppins] text-sm capitalize text-justify">{{ $psl->description }}</p>
                    </div>
                @endforeach
            </ul>
        </div>
    </div>
    {{-- pasal --}}

</div>
