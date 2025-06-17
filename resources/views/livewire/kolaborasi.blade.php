<div class="select-none my-6">
    <div class="flex flex-wrap justify-center items-center">
        {{-- content --}}

        <div class=" flex flex-wrap justify-center items-center max-w-screen gap-4">
            @foreach ( $menu as $mn )
                
            <div class="flex flex-col bg-[#D9D9D9] h-[200px] w-[320px] rounded-lg shadow-lg transition-transform duration-100 hover:scale-102">
                <a href="{{ route('kolaborasidetail',['id' => $mn->id]) }}" class="hover:cursor-pointer">
                    <div class="flex justify-center items-center h-[150px] w-full rounded-t-lg shadow-lg">
                        <img src="{{ asset('storage/'.$mn->gambar) }}" alt="" class="rounded-t-lg h-full w-full">
                    </div>
                    <div class="flex justify-center items-center h-[50px] w-full rounded-b-lg shadow-lg">
                        <p class="capitalize font-[poppins] text-md">{{ $mn->nama_kolaborasi }}</p>
                    </div>
                </a>
            </div>
            
            @endforeach


        </div>
        {{-- content --}}

    </div>
    
</div>
