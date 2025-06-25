<div class="w-full select-none">
    {{-- image gallery --}}
    <div class="relative overflow-hidden w-full lg:aspect-[26/9] md:aspect-[20/9] aspect-[16/9] mt-2 mb-2" id="slider">
        {{-- image --}}
        <div class="flex w-full h-full transition-transform duration-1000 ease-in-out" id="slides">
            @if ($slider && $slider->count())
                @foreach ($slider as $sd)
                    <div class="w-full shrink-0">
                        <img src="{{ asset('storage/'. $sd->gambar) }}" alt="" class="w-full h-full object-cover">
                    </div>
                @endforeach
            @endif
        </div>

        {{-- button --}}
        <div class="absolute w-full bottom-4 flex justify-center">
            <div class="inline-flex justify-center items-center gap-4 px-4 rounded-2xl opacity-60 bg-gray-500 h-10">
                <div class="navigation-auto flex gap-4" id="auto-dots">
                    {{-- generate di js --}}
                </div>
            </div>
        </div>
    </div>
    {{-- image gallery --}}

    {{-- Program Khusus --}}
    <div class="relative flex flex-col">
        {{-- title --}}
        <div class="flex justify-center items-center py-4 ">
            <p class="uppercase font-[poppins] lg:text-[26px] md:text-[24px] text-[24px] font-bold text-center">
                Program Karang Taruna
            </p>
        </div>
        {{-- title --}}

        {{-- content --}}
        <div class="flex items-center justify-center bg-white w-full h-full">
            <div class="flex flex-wrap justify-center gap-4 py-4 px-2 max-w-full">
                @foreach ( $menukegiatan as $mk )
                <div class="flex flex-col items-center bg-[#6A9C89] w-[230px] h-[320px] rounded-lg shadow transition-transform duration-100 hover:scale-102">
                        
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
        {{-- content --}}

    </div>
    {{-- Program Khusus --}}

    {{-- gallery progress --}}
    <div class="relative flex flex-col">
        {{-- title --}}
        <div class="flex justify-center py-4 ">
            <p class="uppercase font-[poppins] lg:text-[26px] md:text-[24px] text-[24px] font-bold text-center">
                Gallery Progress
            </p>
        </div>
        {{-- title --}}

        {{-- content --}}
        <div class="flex items-center justify-center mt-6 bg-white w-full h-full">
        <div class="flex flex-wrap justify-center gap-3 pb-4 max-w-[1440px]">

            @foreach($kegiatan as $program_id => $items)
                @foreach($items as $item)
                <div class="flex justify-center items-center lg:w-[420px] md:w-[420px] w-[370px] lg:h-[249px] md:h-[229px] h-[218px] bg-[#F5F5F5] shadow transition-transform duration-100 ease-in-out hover:scale-102 rounded-lg">
                    <div class="grid grid-rows-1 gap-2 h-full w-full rounded-lg px-2 py-2">
                        <div class="flex flex-col flex-wrap gap-2 lg:h-[164px] md:h-[164px] h-[144px] rounded-lg">
                            <div class="flex lg:h-[164px] lg:w-[144px] md:h-[164px] md:w-[144px] h-[144px] w-[124px] rounded-md">
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
                                        } elseif ($progres <= 100) {
                                            $bgColor = '#00FF46';
                                        } else {
                                            $bgColor = '#8d8f8e';
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
        {{-- content --}}
    </div>
    {{-- gallery progress --}}

    {{-- gallery karang taruna --}}
    <div class="relative flex justify-center flex-col">
        {{-- title --}}
        <div class="flex justify-center py-4">
            <p class="uppercase font-[poppins] lg:text-[26px] md:text-[24px] text-[24px] font-bold text-center">
                gallery karang taruna
            </p>
        </div>
        {{-- title --}}

        {{-- content --}}
        <div class="relative mb-10">
            <div class="flex justify-center">
                @php
                    $maxSlot = 5;
                @endphp

                <div class="flex justify-center lg:w-[80%] md:w-[90%] w-[90%] lg:gap-4 md:gap-4 gap-1">
                    @for ($i = 0; $i < $maxSlot; $i++)
                        @php
                            $album = $albums[$i] ?? null;
                            $image = $album && $album->photos->first()
                                        ? asset('storage/' . $album->photos->first()->gambar)
                                        : null;
                        @endphp

                        @if ($i === 0 || $i === 4)
                            {{-- Slot Kiri & Kanan --}}
                            @if ($album)
                                <a href="{{ route('fotodetails', $album->slug) }}"
                                class="w-[25%] lg:h-[330px] md:h-[330px] h-[164px] relative group block rounded-lg overflow-hidden">
                                    <img src="{{ $image }}" class="object-cover w-full h-full rounded-lg">
                                    {{-- Hover Icon --}}
                                    <div class="absolute inset-0 flex justify-center items-center bg-black/40 opacity-0 group-hover:opacity-100 transition duration-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h4l2 3h10v9H3V7z" />
                                        </svg>
                                    </div>
                                </a>
                            @else
                                <div class="w-[25%] lg:h-[330px] md:h-[330px] h-[164px] bg-gray-200 animate-pulse rounded-lg"></div>
                            @endif

                        @elseif ($i === 1)
                            {{-- Grid Tengah Start --}}
                            <div class="grid grid-cols-3 lg:gap-4 md:gap-4 gap-1 w-[50%] lg:h-[330px] md:h-[330px] h-[90px]">
                        @endif

                        @if ($i > 0 && $i < 4)
                            @php
                                $col = match($i) {
                                    1 => 'col-span-2',
                                    2 => 'col-span-1',
                                    3 => 'col-span-3',
                                };
                            @endphp

                            <div class="{{ $col }} lg:h-[157px] md:h-[157px] h-[80px] w-full rounded-lg">
                                @if ($album)
                                    <a href="{{ route('fotodetails', $album->slug) }}"
                                    class="relative group block w-full h-full rounded-lg overflow-hidden">
                                        <img src="{{ $image }}" class="object-cover w-full h-full rounded-lg">
                                        <div class="absolute inset-0 flex justify-center items-center bg-black/40 opacity-0 group-hover:opacity-100 transition duration-300">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h4l2 3h10v9H3V7z" />
                                            </svg>
                                        </div>
                                    </a>
                                @else
                                    <div class="w-full h-full bg-gray-200 animate-pulse rounded-lg"></div>
                                @endif
                            </div>

                            @if ($i === 3)
                                {{-- Grid Tengah End --}}
                            </div>
                            @endif
                        @endif
                    @endfor
                </div>

            </div>
            
        </div>
        {{-- content --}}
        
        {{-- Tombol ke detail --}}
        <div class="flex justify-center items-center h-[50px] w-full px-4 mt-2">
            <a href="{{ route('foto') }}"
            class="flex items-center justify-center bg-[#2E8A99] w-full rounded-sm font-[poppins] text-sm text-white">
                Lihat Semua Album
            </a>
        </div>
        {{-- content --}}

    </div>
    {{-- gallery karang taruna --}}

    {{-- kontak --}}
    <div class="relative flex justify-center flex-col">
        {{-- title --}}
        <div class="flex justify-center py-4">
            <p class="uppercase font-[poppins] lg:text-[26px] md:text-[24px] text-[24px] font-bold text-center">
                kontak
            </p>
        </div>
        {{-- title --}}
    </div>

    {{-- content --}}
    <div class="flex items-center justify-center bg-white w-full min-h-screen px-4 py-6">
        <div class="flex flex-col lg:flex-row flex-wrap justify-center gap-6 max-w-[1440px] w-full">
            {{-- Form --}}
            <div class="flex flex-col gap-4 w-full max-w-[700px]">
                <form wire:submit.prevent="submit" class="py-4 px-4 bg-[#D9D9D9] w-full rounded-lg">
                    <p class="text-center capitalize font-semibold font-[poppins] lg:text-[26px] md:text-[24px] text-[24px] mb-4">hubungi kami</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Input kiri --}}
                        <div class="space-y-4 font-[poppins]">
                            <div class="grid grid-cols-[100px_1fr] items-start text-sm gap-2">
                                <label for="nama" class="font-semibold">Nama :</label>
                                <input type="text" wire:model.defer="nama" id="nama" class="w-full h-8 rounded-lg px-2 bg-white" />
                            </div>
                            <div class="grid grid-cols-[100px_1fr] items-start text-sm gap-2">
                                <label for="alamat" class="font-semibold">Alamat :</label>
                                <textarea wire:model.defer="alamat" id="alamat" class="w-full h-[90px] rounded-lg px-2 py-2 bg-white resize-none"></textarea>
                            </div>
                            <div class="grid grid-cols-[100px_1fr] items-start text-sm gap-2">
                                <label for="email" class="font-semibold">Email :</label>
                                <input type="email" wire:model.defer="email" id="email" class="w-full h-8 rounded-lg px-2 bg-white" />
                            </div>
                            <div class="grid grid-cols-[100px_1fr] items-start text-sm gap-2">
                                <label for="no_telp" class="font-semibold">Nomor :</label>
                                <input type="text" wire:model.defer="no_telp" id="no_telp" class="w-full h-8 rounded-lg px-2 bg-white" />
                            </div>
                            <div class="grid grid-cols-[100px_1fr] items-start text-sm gap-2">
                                <label for="keperluan" class="font-semibold">Keperluan :</label>
                                <input type="text" wire:model.defer="keperluan" id="keperluan" class="w-full h-8 rounded-lg px-2 bg-white" />
                            </div>
                            <div class="grid grid-cols-[100px_1fr] items-start text-sm gap-2">
                                <label for="tanggal" class="font-semibold">Tanggal :</label>
                                <input type="date" wire:model.defer="tanggal" id="tanggal" class="w-full h-8 rounded-lg px-2 bg-white" />
                            </div>
                        </div>

                        {{-- Pesan & Submit --}}
                        <div class="flex flex-col gap-4 justify-between">
                            <div class="flex flex-col gap-2">
                                <label for="detail" class="capitalize font-[poppins] font-semibold text-center">Detail Keperluan</label>
                                <textarea wire:model.defer="detail_Keperluan" id="detail" class="w-full h-[168px] rounded-lg px-2 py-2 bg-white resize-none"></textarea>
                            </div>
                            <div class="flex justify-end items-center">
                                <button type="submit" class="bg-[#2E8A99] w-[120px] h-[32px] rounded-md font-[poppins] font-semibold text-white hover:bg-[#1F5B64] transition">Kirim</button>
                                <span wire:loading wire:target="submit" class="ml-3 text-sm text-gray-600">Mengirim...</span>
                            </div>
                        </div>
                    </div>
                </form>

                {{-- Sosial Media --}}
                <div class="bg-[#D9D9D9] py-4 px-6 w-full rounded-lg">
                    <p class="text-center capitalize font-semibold font-[poppins] text-xl mb-4">sosial media</p>
                    <div class="space-y-3">
                        @foreach ($sosialmedia as $sm)
                            <div class="flex items-center gap-2">
                                <img src="{{ asset('storage/'.$sm->logo) }}" alt="" class="w-9 h-9" />
                                <div class="flex gap-2 flex-wrap">
                                    <p class="font-[poppins] font-semibold text-sm capitalize">{{ $sm->judul }} :</p>
                                    <a href="{{ $sm->link_aplikasi }}" class="text-sm font-[poppins] font-semibold text-blue-700 hover:underline">
                                        {{ $sm->nama_akun }}
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Maps --}}
            @foreach ($lokasi as $lk)
                <div class="bg-[#D9D9D9] w-full max-w-[500px] h-[300px] md:h-[516px] rounded-lg overflow-hidden">
                    <iframe
                        src="{{ $lk->lokasi_embed }}"
                        class="w-full h-full"
                        style="border-radius: 8px"
                        allowfullscreen
                        loading="lazy"
                    ></iframe>
                </div>
            @endforeach
        </div>
    </div>

    {{-- content --}}

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


</div>

<script>
    const slides = document.getElementById('slides');
    const slider = document.getElementById('slider');
    const dotsContainer = document.getElementById('auto-dots');
    const totalSlides = slides.children.length;
    let index = 0;
    let interval = null;
    let dots = [];

    // Generate dots dynamically
    for (let i = 0; i < totalSlides; i++) {
        const dot = document.createElement('div');
        dot.className = 'dot border-2 border-[#40D3DC] hover:bg-[#40D3DC] active:bg-[#40D3DC] p-1.5 rounded-[10px] cursor-pointer transition-[0.5s]';
        dot.addEventListener('click', () => manualSlide(i));
        dotsContainer.appendChild(dot);
        dots.push(dot);
    }

    window.addEventListener('resize', () => showSlide(index));

    function showSlide(i) {
        const slideWidth = slider.offsetWidth;
        slides.style.width = `${slideWidth * totalSlides}px`;
        Array.from(slides.children).forEach(slide => {
            slide.style.width = `${slideWidth}px`;
        });

        slides.style.transform = `translateX(-${slideWidth * i}px)`;
        dots.forEach(dot => dot.classList.remove('bg-[#40D3DC]'));
        if (dots[i]) dots[i].classList.add('bg-[#40D3DC]');
        index = i;
    }

    function nextSlide() {
        index = (index + 1) % totalSlides;
        showSlide(index);
    }

    function startAutoSlide() {
        interval = setInterval(nextSlide, 4000);
    }

    function stopAutoSlide() {
        clearInterval(interval);
    }

    function manualSlide(i) {
        stopAutoSlide();
        showSlide(i);
        startAutoSlide();
    }

    slider.addEventListener('mouseenter', stopAutoSlide);
    slider.addEventListener('mouseleave', startAutoSlide);

    // Start
    if (totalSlides > 0) {
        showSlide(0);
        startAutoSlide();
    }

    // image sider
    
</script>