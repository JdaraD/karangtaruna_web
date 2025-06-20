<div class="select-none">
    {{-- foto Struktur --}}
    <div class="flex justify-center items-center mx-6 my-4 h-[600px] rounded-lg">
        @foreach ( $struktur as $st )
            <img src="{{ asset('storage/' . $st->foto_struktur) }}" alt="" class="h-full w-fit rounded-lg object-cover">
        @endforeach
        </div>
    {{-- foto Struktur --}}

    {{-- daftar anggota --}}
    <div class="flex flex-col justify-center items-center w-full h-full mb-6 gap-4 select-none">
        
        <div class="flex flex-col justify-center items-center w-full h-full gap-1">
            
            <p class="uppercase font-[poppins] text-[20px] font-bold">Pengurus karang taruna</p>
            <p class="uppercase font-[poppins] text-[16px] font-bold">Desa waru</p>
            <p class="uppercase font-[poppins] text-[12px] font-bold">2025-2027</p>
            
        </div>
        @foreach ( $anggota->where('jabatan','ketua') as $ketua )
            
        <div class="flex flex-col justify-center items-center bg-white h-[290px] w-[208px] rounded-lg shadow-md">
            {{-- overlay --}}
            <div class="absolute h-[290px] w-[208px] z-10 hover:opacity-60 bg-gray-400 bg-opacity-50 transition-opacity duration-300 opacity-0 flex flex-col justify-center rounded-lg items-center">
                <p class="text-black font-[poppins] font-medium text-md">{{ $ag->name }}</p>
                <p class="text-black font-[poppins] font-medium text-md">{{ $ag->keterangan_jabatan }}</p>
            </div>
            {{-- image --}}
            <div class="flex justify-center items-center h-[258px] rounded-t-lg mt-2 w-[96%] z-0">
                <img src="{{ asset('storage/'. $ketua->image) }}" alt="{{ $ketua->name }}" class="h-full w-full rounded-t-xs object-cover">
                <p>foto</p>
            </div>
            {{-- posisi --}}
            <div class="flex justify-center items-center bg-[#D9D9D9] h-[36px] w-full rounded-b-lg shadow-md">
                <p>{{ $ketua->jabatan }}</p>
            </div>
        </div>

        @endforeach
        
        {{-- Slider Anggota --}}
        <div class="w-full overflow-x-auto">
            <div class="flex justify-center">
                <div class="flex gap-4 w-max">
                    @foreach ($anggota->where('jabatan', '!=', 'ketua') as $ag)
                        <div class="flex flex-col justify-center items-center bg-white h-[290px] w-[208px] rounded-lg shadow-md">
                            {{-- overlay --}}
                            <div class="absolute h-[290px] w-[208px] z-10 hover:opacity-60 bg-gray-400 bg-opacity-50 transition-opacity duration-300 opacity-0 flex flex-col justify-center rounded-lg items-center">
                                <p class="text-black font-[poppins] font-medium text-md capitalize">{{ $ag->name }}</p>
                                <p class="text-black font-[poppins] font-medium text-md capitalize">{{ $ag->keterangan_jabatan }}</p>
                            </div>
                            {{-- image --}}
                            <div class="flex justify-center items-center h-[258px] rounded-t-lg mt-2 w-[96%] z-0">
                                <img src="{{ asset('storage/'.$ag->image) }}" alt="{{ $ag->name }}" class="h-full w-full rounded-t-lg object-cover">
                            </div>
                            {{-- posisi --}}
                            <div class="flex justify-center items-center bg-[#D9D9D9] h-[36px] w-full rounded-b-lg shadow-md">
                                <p class="text-center font-bold uppercase font-[poppins]">{{ $ag->jabatan }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
    
</div>
