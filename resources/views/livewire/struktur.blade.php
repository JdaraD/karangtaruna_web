<div class="select-none">
    {{-- foto Struktur --}}
    <div class="flex justify-center items-center mx-6 my-4 lg:h-[600px] md:h-[600px] h-[280px] rounded-lg">
        @foreach ( $struktur as $st )
            <img src="{{ asset('storage/' . $st->foto_struktur) }}" alt="" class="h-full w-full rounded-lg object-contain">
        @endforeach
    </div>
    {{-- foto Struktur --}}

    {{-- daftar anggota --}}
    <div class="flex flex-col justify-center items-center w-full h-full mb-6 gap-4 select-none px-4">

        {{-- Judul --}}
        <div class="text-center">
            <p class="uppercase font-[poppins] text-xl sm:text-2xl font-bold">Pengurus karang taruna</p>
            <p class="uppercase font-[poppins] text-lg sm:text-xl font-bold">Desa waru</p>
            <p class="uppercase font-[poppins] text-sm sm:text-base font-bold">2025-2027</p>
        </div>

        {{-- Ketua --}}
        @foreach ($anggota->where('jabatan','Ketua') as $ketua)
            <div class="relative flex flex-col justify-center items-center bg-white h-[290px] w-[208px] rounded-lg shadow-md">
                {{-- overlay --}}
                <div class="absolute top-0 left-0 h-full w-full z-10 hover:bg-gray-300/30 opacity-0 hover:opacity-100 duration-300 rounded-lg flex flex-col justify-center items-center">
                    <p class="text-black font-[poppins] font-medium text-md">{{ $ketua->name }}</p>
                    <p class="text-black font-[poppins] font-medium text-md">{{ $ketua->keterangan_jabatan }}</p>
                </div>
                {{-- image --}}
                <div class="flex justify-center items-center h-[258px] rounded-t-lg mt-2 w-[96%] z-0">
                    <img src="{{ asset('storage/'. $ketua->image) }}" alt="{{ $ketua->name }}" class="h-full w-full rounded-t-xs object-cover">
                </div>
                {{-- posisi --}}
                <div class="flex justify-center items-center bg-[#D9D9D9] h-[36px] w-full rounded-b-lg shadow-md">
                    <p class="text-center font-bold uppercase font-[poppins]">{{ $ketua->jabatan }}</p>
                </div>
            </div>
        @endforeach

        {{-- Slider Anggota --}}
        <div class="w-full max-w-screen overflow-x-auto overflow-y-hidden px-4 no-scrollbar h-[320px]">
            <div class="w-max flex gap-4">
                @foreach ($anggota->where('jabatan', '!=', 'Ketua') as $ag)
                    <div class="relative flex-shrink-0 bg-white h-[290px] w-[208px] rounded-lg shadow-md">
                        {{-- overlay --}}
                        <div class="absolute inset-0 z-10 hover:opacity-100 opacity-0 transition-opacity duration-300 bg-gray-400/50 rounded-lg flex flex-col justify-center items-center">
                            <p class="text-black font-[poppins] font-medium text-md capitalize">{{ $ag->name }}</p>
                            <p class="text-black font-[poppins] font-medium text-md capitalize">{{ $ag->keterangan_jabatan }}</p>
                        </div>
                        {{-- image --}}
                        <div class="flex justify-center items-center h-[258px] rounded-t-lg mt-2 w-[96%] z-0 mx-auto">
                            <img src="{{ asset('storage/'.$ag->image) }}" alt="{{ $ag->name }}" class="h-full w-full rounded-t-lg object-cover">
                        </div>
                        {{-- posisi --}}
                        <div class="flex justify-center items-center bg-[#D9D9D9] h-[23px] w-full rounded-b-lg shadow-md">
                            <p class="text-center font-bold uppercase font-[poppins]">{{ $ag->jabatan }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

</div>