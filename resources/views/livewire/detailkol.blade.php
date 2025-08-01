<x-layouts.app>

<div class="flex justify-center items-center h-full py-4 my-4 w-full select-none">
    <div class="flex flex-col gap-2 bg-gray-100 shadow-xl/20 py-2 h-[600px] w-[80%] rounded-md">
        <div class="flex justify-center items-center h-[260px] w-full">
            <div class="h-[96%] lg:w-[600px] md:w-[600px] w-[290px] rounded-md">
                <img src="{{ asset('storage/'. $kol->gambar) }}" alt="" class="w-full h-full object-cover rounded-md">
            </div>
        </div>
        <div class="flex justify-center items-center h-full">
            <div class="flex flex-col gap-2 items-center h-full w-[90%]">
                <p class="font-[poppins] text-md text-justify capitalize font-bold">{{ $kol->nama }}</p>
                <p class="font-[poppins] text-sm text-justify capitalize">{{ $kol->deskripsi }}</p>

            </div>
        </div>
        <div class="flex justify-center items-center w-full h-[40px]">
            <div class="flex justify-between h-full items-center w-[90%]">
                <div class="order-1">
                    <p class="font-[poppins] text-sm text-justify capitalize">{{ \Carbon\Carbon::parse($kol->tanggal)->translatedFormat('d F Y') }}</p>

                </div>

                <a href="{{ route('kolaborasidetail', ['id' => $kol->program_id]) }}" class="order-3 flex justify-center items-center rounded-md bg-amber-400 w-[140px]">
                    <p class="font-[poppins] text-md text-justify capitalize">Kembali</p>
                </a>
            </div>
        </div>
    </div>
</div>
</x-layouts.app>

