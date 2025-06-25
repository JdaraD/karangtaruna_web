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
                <div class="flex justify-center items-center lg:w-[464px] md:w-[420px] w-[370px] lg:h-[249px] md:h-[229px] h-[218px] bg-[#F5F5F5] shadow transition-transform duration-100 ease-in-out hover:scale-102 rounded-lg">
                    <div class="grid grid-rows-1 gap-2 h-full w-full rounded-lg px-2 py-2">
                        <div class="flex flex-col flex-wrap gap-2 lg:h-[164px] md:h-[164px] h-[144px] rounded-lg">
                            <div class="flex lg:h-[164px] lg:w-[180px] md:h-[164px] md:w-[144px] h-[144px] w-[124px] rounded-md">
                                <img src="{{ asset('storage/'.$item->gambar) }}" alt="" class="object-cover rounded-lg">
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
        <form wire:submit.prevent="submit" class="pt-2 pb-2 px-4 bg-gray-200 shadow-sm w-[80%] h-full rounded-lg" enctype="multipart/form-data">
            <p class="flex items-center justify-center capitalize font-semibold font-[poppins] text-xl mb-2">Forms Pengajuan</p>
            
            <div class="grid lg:grid-cols-2 md:grid-cols-2 grid-cols-1 gap-10">
                {{-- KIRI --}}
                <div class="w-full h-full">
                    <ul class="grid gap-4 font-[poppins]">
                        <li class="grid grid-cols-[140px_1fr] items-start">
                            <label class="text-left font-semibold text-sm capitalize">Nama :</label>
                            <input type="text" wire:model.defer="nama" class="w-full h-[30px] rounded-lg px-2 bg-white">
                        </li>
                        <li class="grid grid-cols-[140px_1fr] items-start text-sm">
                            <label class="text-left font-semibold capitalize">Alamat :</label>
                            <textarea wire:model.defer="alamat" class="w-full h-[140px] rounded-lg px-2 py-2 bg-white resize-none"></textarea>
                        </li>
                        <li class="grid grid-cols-[140px_1fr] items-start text-sm">
                            <label class="text-left font-semibold capitalize">Email :</label>
                            <input type="text" wire:model.defer="email" class="w-full h-[30px] rounded-lg px-2 py-2 bg-white resize-none"></input>
                        </li>
                        <li class="grid grid-cols-[140px_1fr] items-start text-sm">
                            <label class="text-left font-semibold capitalize">Nomor :</label>
                            <input type="text" wire:model.defer="no_telp" class="w-full h-[30px] rounded-lg px-2 bg-white">
                        </li>
                        <li class="grid grid-cols-[140px_1fr] items-start text-sm">
                            <label class="text-left font-semibold capitalize">Keperluan :</label>
                            <input type="text" wire:model.defer="keperluan" class="w-full h-[30px] rounded-lg px-2 bg-white">
                        </li>
                        <li class="grid grid-cols-[140px_1fr] items-start text-sm">
                            <label class="text-left font-semibold capitalize">Tanggal :</label>
                            <input type="date" wire:model.defer="tanggal" class="w-full h-[30px] rounded-lg px-2 bg-white">
                        </li>
                        <li class="grid grid-cols-[140px_1fr] items-start text-sm">
                            <label class="text-left font-semibold capitalize">Total Anggaran :</label>
                            <input type="number" wire:model.defer="total_anggaran" class="w-full h-[30px] rounded-lg px-2 bg-white">
                        </li>
                    </ul>
                </div>

                {{-- KANAN --}}
                <div class="flex flex-col w-full gap-4 h-full">
                    <div class="w-full">
                        <label class="capitalize font-[poppins] font-semibold flex mb-2 justify-center">Detail Keperluan</label>
                        <textarea wire:model.defer="detail_Keperluan" class="w-full h-[168px] rounded-lg px-2 py-2 bg-white resize-none"></textarea>
                    </div>

                <div class="w-full">
                    <label class="text-sm font-semibold capitalize font-[poppins] mb-1 block">Upload File</label>

                    <label for="uploadFile" class="cursor-pointer relative inline-block">
                        <div class="flex justify-center items-center bg-white w-[120px] h-[90px] shadow-sm rounded-md border border-gray-200 relative">
                            {{-- Loading Spinner --}}
                            <div wire:loading wire:target="file" class="absolute inset-0 flex justify-center items-center bg-white/80 rounded-md z-10">
                                <div class="dot-loader">
                                    <span></span><span></span><span></span>
                                </div>
                            </div>

                            <style>
                                .dot-loader {
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                    gap: 8px;
                                    height: 80px; /* Tambahkan tinggi agar bisa tersentral */
                                }

                                .dot-loader span {
                                    width: 10px;
                                    height: 10px;
                                    background: #4b5563;
                                    border-radius: 50%;
                                    animation: bounce 0.6s infinite alternate;
                                }

                                .dot-loader span:nth-child(2) {
                                    animation-delay: 0.2s;
                                }

                                .dot-loader span:nth-child(3) {
                                    animation-delay: 0.4s;
                                }

                                @keyframes bounce {
                                    to {
                                        transform: translateY(-10px);
                                        opacity: 0.5;
                                    }
                                }
                            </style>

                            {{-- Ceklis saat upload selesai --}}
                            @if ($file)
                                <div wire:loading.remove wire:target="file" class="absolute top-1 right-1 bg-green-500 text-white p-1 rounded-full z-10">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                            @endif

                            {{-- Ikon Plus --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#aaa" viewBox="0 0 256 256">
                                <path d="M224,128a8,8,0,0,1-8,8H136v80a8,8,0,0,1-16,0V136H40a8,8,0,0,1,0-16h80V40a8,8,0,0,1,16,0v80h80A8,8,0,0,1,224,128Z"/>
                            </svg>
                        </div>
                    </label>

                    <input id="uploadFile" type="file" wire:model="file" class="hidden">
                    @error('file') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                    <div class="flex justify-end items-center w-full h-[48px]">
                        <button type="submit" class="flex items-center justify-center bg-[#2E8A99] w-[120px] h-[32px] rounded-md font-[poppins] font-semibold text-white hover:bg-[#1F5B64] transition">Kirim</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    {{-- pengajuan kegiatan --}}

    {{-- loading --}}
    <div class="fixed inset-0 z-[100] flex items-center justify-center bg-[rgba(209,213,219,0.3)]" wire:target="submit" wire:loading >
        <div class="flex justify-center items-center w-full h-full px-4">
            {{-- loading box --}}
            <div class="w-[400px] h-[400px] max-w-[400px] bg-white rounded-md flex flex-col gap-4 justify-center items-center shadow-lg p-6">
                @foreach ($TentangKami as $tk)
                    <div class="w-full flex flex-col gap-4 items-center">
                        <img
                            src="{{ asset('storage/' . $tk->foto_profil) }}"
                            alt="{{ $tk->first_name }} {{ $tk->last_name }}"
                            class="w-[100px] h-[100px] rounded-full object-cover"
                        >
                        <p class="text-center text-black font-bold capitalize font-[poppins]">
                            {{ $tk->first_name }} {{ $tk->last_name }}
                        </p>
                    </div>
                @endforeach

                {{-- loading --}}
                <div class="w-full flex flex-col items-center gap-4 mt-4">
                    <p class="text-center text-black font-medium capitalize font-[poppins]">Loading</p>
                    <div class="loader"></div>
                </div>

                {{-- loader style --}}
                <style>
                    .loader {
                        height: 25px;
                        aspect-ratio: 2.5;
                        --_g: no-repeat radial-gradient(farthest-side, #000 90%, #0000);
                        background: var(--_g), var(--_g), var(--_g), var(--_g);
                        background-size: 20% 50%;
                        animation: l44 1s infinite linear alternate;
                    }

                    @keyframes l44 {
                        0%, 5%    {background-position: calc(0*100%/3) 50%, calc(1*100%/3) 50%, calc(2*100%/3) 50%, calc(3*100%/3) 50%}
                        12.5%     {background-position: calc(0*100%/3) 0,    calc(1*100%/3) 50%, calc(2*100%/3) 50%, calc(3*100%/3) 50%}
                        25%       {background-position: calc(0*100%/3) 0,    calc(1*100%/3) 0,    calc(2*100%/3) 50%, calc(3*100%/3) 50%}
                        37.5%     {background-position: calc(0*100%/3) 100%,calc(1*100%/3) 0,    calc(2*100%/3) 0,    calc(3*100%/3) 50%}
                        50%       {background-position: calc(0*100%/3) 100%,calc(1*100%/3) 100%,calc(2*100%/3) 0,    calc(3*100%/3) 0}
                        62.5%     {background-position: calc(0*100%/3) 50%, calc(1*100%/3) 100%,calc(2*100%/3) 100%,calc(3*100%/3) 0}
                        75%       {background-position: calc(0*100%/3) 50%, calc(1*100%/3) 50%, calc(2*100%/3) 100%,calc(3*100%/3) 100%}
                        87.5%     {background-position: calc(0*100%/3) 50%, calc(1*100%/3) 50%, calc(2*100%/3) 50%, calc(3*100%/3) 100%}
                        95%, 100% {background-position: calc(0*100%/3) 50%, calc(1*100%/3) 50%, calc(2*100%/3) 50%, calc(3*100%/3) 50%}
                    }
                </style>
            </div>
        </div>
    </div>
    {{-- loading --}}

</div>