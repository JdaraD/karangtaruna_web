<div class="select-none my-6">
    <div class="flex flex-wrap justify-center items-center">
        {{-- content --}}

        <div class=" flex flex-wrap justify-center items-center max-w-screen gap-4">
            @foreach ( $menu as $mn )
                
            <div class="flex flex-col bg-[#D9D9D9] lg:h-[200px] lg:w-[320px] md:h-[200px] md:w-[320px] h-[180px] w-[280px] rounded-lg shadow-lg transition-transform duration-100 hover:scale-102">
                <a href="{{ route('kolaborasidetail',['id' => $mn->id]) }}" class="hover:cursor-pointer">
                    <div class="flex justify-center items-center lg:h-[160px] md:h-[160px] h-[130px] w-full rounded-t-lg shadow-lg">
                        <img src="{{ asset('storage/'.$mn->gambar) }}" alt="" class="rounded-t-lg h-full w-full">
                    </div>
                    <div class="flex justify-center items-center h-[40px] w-full rounded-b-lg shadow-lg">
                        <p class="capitalize font-[poppins] text-md">{{ $mn->nama_kolaborasi }}</p>
                    </div>
                </a>
            </div>
            
            @endforeach


        </div>
        {{-- content --}}

    </div>
    
</div>
