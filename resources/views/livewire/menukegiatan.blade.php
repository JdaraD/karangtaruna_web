<div class="select-none">

    <div class="flex justify-center items-center w-full h-full mt-6 select-none">
        <p class="uppercase font-bold text-bold font-[poppins] text-xl">Program Karang taruna</p>
    </div>

    {{-- menu kegiatan --}}
    <div class="flex items-center justify-center bg-white w-full h-full">
        <div class="flex flex-wrap justify-center gap-6 py-4 px-2 max-w-full">

            @foreach ( $menukegiatan as $mk )
            <div class="flex flex-col items-center bg-[#6A9C89] w-[230px] h-[320px] rounded-lg">
                    
                <img src="{{ asset('storage/'.$mk->gambar) }}" alt="" class="w-[200px] h-[130px] mt-4 rounded-lg">
                
                <div class="grid grid-rows-6 my-2 h-[180px]">
                    <div class="flex justify-center items-center row-span-1">
                        <p class="capitalize font-[poppins] font-medium text-sm">
                            {{ $mk->nama_program }}
                        </p>
                        
                    </div>
                    <div class="row-span-4">
                        <p class="capitalize font-[poppins] font-medium text-xs line-clamp-6 px-4 mt-2 text-justify select-none">
                            {{ $mk->deskripsi }}
                        </p>
                        
                    </div>
                    <div class="flex justify-center items-center row-span-1">
                        <a href="{{ route('kegiatan',['id' => $mk->id]) }}" class="flex justify-center bg-[#2E8A99] hover:bg-[#1F5B64] text-white font-[poppins] font-medium text-xs w-full mx-2 py-1 rounded-sm capitalize">Kunjungi.....</a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
    {{-- menu kegiatan --}}

    {{-- progress kegiatan --}}
    <div class="flex justify-center items-center w-full h-full mt-6 select-none">
        <p class="uppercase font-medium text-bold font-[poppins] text-xl">progress</p>
    </div>

    <div class="flex items-center justify-center mt-6 bg-white w-full h-full">
        <div class="flex flex-wrap justify-center gap-3 pb-4 max-w-[1440px]">

            @foreach($kegiatan as $program_id => $items)
                @foreach($items as $item)
                <div class="flex justify-center items-center lg:w-[420px] md:w-[420px] w-[370px] lg:h-[249px] md:h-[229px] h-[218px] bg-[#F5F5F5] shadow transition-transform duration-100 ease-in-out hover:scale-102 rounded-lg">
                    <div class="grid grid-rows-1 gap-2 h-full w-full rounded-lg px-2 py-2">
                        <div class="flex flex-col flex-wrap gap-2 lg:h-[164px] md:h-[164px] h-[144px] rounded-lg">
                            <div class="flex lg:h-[164px] lg:w-[144px] md:h-[164px] md:w-[144px] h-[144px] w-[124px] rounded-md">
                                <img src="{{ asset('storage/'.$item->gambar) }}" alt="" class="object-fit rounded-lg">
                            </div>
                            <div class="relative lg:h-[164px] lg:w-[250px] md:w-[250px] w-[220px]">
                                <p class="uppercase font-bold">{{ $item->AddMenuProgram->nama_program }}</p>
                                <p class="text-xs text-justify font-[poppins] line-clamp-6">{{ $item->deskripsi }}</p>
                            </div>
                        </div>
                        <div class="grid grid-rows-2 h-[60px] rounded-lg">
                            <div class="flex justify-end">
                                <p class="font-[poppins] text-md font-bold pr-2">{{ $item->progres }}%</p>
                            </div>
                            <div class="flex justify-center items-center">
                                <div class="bg-[#D9D9D9] h-[90%] w-[98%] rounded-lg">
                                    @php
                                        $progres = $item->progres;
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
            @endforeach

        </div>
    </div>
    {{-- progress kegiatan --}}

    {{-- pengajuan kegiatan --}}
    <div class="flex justify-center items-center w-full h-full mt-6 mb-2 select-none">
        <p class="uppercase font-medium text-bold font-[poppins] text-xl">peganjuan kegiatan</p>
    </div>

    <div class="flex justify-center items-center w-full h-full mb-6">
        <div class="pt-2 pb-2 px-4 bg-gray-200 shadow-sm w-[80%] h-full rounded-lg">
            <p class="flex items-center justify-center capitalize font-semibold font-[poppins] text-xl mb-2">froms peganjuan</p>
            <div class="grid lg:grid-cols-2 md:grid-cols-2 grid-cols-1 gap-10">
                <div class="w-full h-full">
                    <ul class="grid gap-4 font-[poppins]">
                        <li class="grid lg:grid-cols-[140px_1fr] md:grid-cols-[140px_1fr] grid-cols-[120px_1fr] items-start">
                            <label for="nama" class="text-left font-semibold text-sm capitalize font-[poppins]">Nama :</label>
                            <input type="text" name="nama" id="nama" class="w-full h-[25px] rounded-lg px-2 bg-white">
                        </li>
                        <li class="grid lg:grid-cols-[140px_1fr] md:grid-cols-[140px_1fr] grid-cols-[120px_1fr] items-start text-sm">
                            <label for="alamat" class="text-left font-semibold capitalize font-[poppins]">Alamat :</label>
                            <textarea name="alamat" id="alamat" class="w-full h-[140px] rounded-lg px-2 py-2 bg-white resize-none"></textarea>
                        </li>
                        <li class="grid lg:grid-cols-[140px_1fr] md:grid-cols-[140px_1fr] grid-cols-[120px_1fr] items-start text-sm">
                            <label for="nomor" class="text-left font-semibold capitalize font-[poppins]">Nomor :</label>
                            <input type="text" name="nomor" id="nomor" class="w-full h-[25px] rounded-lg px-2 bg-white">
                        </li>
                        <li class="grid lg:grid-cols-[140px_1fr] md:grid-cols-[140px_1fr] grid-cols-[120px_1fr] items-start text-sm">
                            <label for="keperluan" class="text-left font-semibold capitalize font-[poppins]">Keperluan :</label>
                            <input type="text" name="keperluan" id="keperluan" class="w-full h-[25px] rounded-lg px-2 bg-white">
                        </li>
                        <li class="grid lg:grid-cols-[140px_1fr] md:grid-cols-[140px_1fr] grid-cols-[120px_1fr] items-start text-sm">
                            <label for="tanggal" class="text-left font-semibold capitalize font-[poppins]">Tanggal :</label>
                            <input type="text" name="tanggal" id="tanggal" class="w-full h-[25px] rounded-lg px-2 bg-white">
                        </li>
                        <li class="grid lg:grid-cols-[140px_1fr] md:grid-cols-[140px_1fr] grid-cols-[120px_1fr] items-start text-sm">
                            <label for="tanggal" class="text-left font-semibold capitalize font-[poppins]">Total anggaran :</label>
                            <input type="text" name="tanggal" id="tanggal" class="w-full h-[25px] rounded-lg px-2 bg-white">
                        </li>
                    </ul>
                    
                </div>

                <div class="flex flex-col w-full gap-4 h-full">
                    <div class="w-full h-[200px]">
                        <label for="detail" class="capitalize font-[poppins] font-semibold flex mb-2 justify-center">detail keperluan</label>
                        <textarea name="detail" id="detail" class="w-full h-[168px] rounded-lg px-2 py-2 bg-white resize-none"></textarea>
                    </div>
                    <div class="flex justify-end items-center">
                        <div class="justify-items-center">
                            
                            <p class="text-sm font-semibold capitalize font-[poppins] capitalize mb-2">upload file</p>
                            <button class="hover:cursor-pointer">
                            <div class="flex justify-center items-center bg-white w-[120px] h-[90px] shadow-sm rounded-md">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#000000" viewBox="0 0 256 256"><path d="M224,128a8,8,0,0,1-8,8H136v80a8,8,0,0,1-16,0V136H40a8,8,0,0,1,0-16h80V40a8,8,0,0,1,16,0v80h80A8,8,0,0,1,224,128Z">
                                        </path>
                                    </svg>
                                </div>
                            </button>

                        </div>
                    </div>
                    <div class="flex justify-end items-center w-full h-[48px]">
                        <button id="" for="" class="flex items-center justify-center bg-[#2E8A99] w-[120px] h-[24px] rounded-md font-[poppins] font-semibold font-md text-white hover:cursor-pointer">kirim</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- pengajuan kegiatan --}}

</div>
