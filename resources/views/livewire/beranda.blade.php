<div class="w-full select-none">
    {{-- image gallery --}}
    <div class="relative overflow-hidden w-full lg:aspect-[26/9] md:aspect-[20/9] aspect-[16/9] mt-2 mb-2" id="slider">
        {{-- image --}}
        <div class="flex w-full h-full transition-transform duration-1000 ease-in-out" id="slides">
            @foreach ( $slider as $sd )
                <div class="w-full shrink-0">
                    <img src="{{ asset('storage/'. $sd->gambar) }}" alt="" class="w-full h-full object-cover">
                </div>
            @endforeach
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
        <div class="flex justify-center py-4 ">
            <p class="uppercase font-[poppins] text-[30px] font-bold">
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
            <p class="uppercase font-[poppins] text-[30px] font-bold">
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
            <p class="uppercase font-[poppins] text-[30px] font-bold">
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

                <div class="flex justify-center w-[80%] gap-4">
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
                                class="w-[25%] h-[330px] relative group block rounded-lg overflow-hidden">
                                    <img src="{{ $image }}" class="object-cover w-full h-full rounded-lg">
                                    {{-- Hover Icon --}}
                                    <div class="absolute inset-0 flex justify-center items-center bg-black/40 opacity-0 group-hover:opacity-100 transition duration-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h4l2 3h10v9H3V7z" />
                                        </svg>
                                    </div>
                                </a>
                            @else
                                <div class="w-[25%] h-[330px] bg-gray-200 animate-pulse rounded-lg"></div>
                            @endif

                        @elseif ($i === 1)
                            {{-- Grid Tengah Start --}}
                            <div class="grid grid-cols-3 gap-4 w-[50%] h-[330px]">
                        @endif

                        @if ($i > 0 && $i < 4)
                            @php
                                $col = match($i) {
                                    1 => 'col-span-2',
                                    2 => 'col-span-1',
                                    3 => 'col-span-3',
                                };
                            @endphp

                            <div class="{{ $col }} h-[157px] w-full rounded-lg">
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
            <p class="uppercase font-[poppins] text-[30px] font-bold">
                kontak
            </p>
        </div>
        {{-- title --}}
    </div>
    {{-- content --}}
    <div class="flex items-center justify-center bg-white w-full h-full">
        <div class="flex flex-wrap justify-center gap-[50px] mb-4 max-w-[1440px]">
            <div class="flex flex-col gap-4 w-[700px] h-[516px]">
                <div class="py-2 px-4 bg-[#D9D9D9] w-full h-[314px] rounded-lg">
                    <p class="flex items-center justify-center capitalize font-semibold font-[poppins] text-xl mb-2">hubungi kami</p>
                    <div class="grid grid-cols-2 gap-10">
                        <div class="w-full h-full">
                            <ul class="grid gap-4 font-[poppins]">
                                <li class="grid grid-cols-[100px_1fr] items-start">
                                    <label for="nama" class="text-left font-semibold text-sm">Nama :</label>
                                    <input type="text" name="nama" id="nama" class="w-full h-[25px] rounded-lg px-2 bg-white">
                                </li>
                                <li class="grid grid-cols-[100px_1fr] items-start text-sm">
                                    <label for="alamat" class="text-left font-semibold">Alamat :</label>
                                    <textarea name="alamat" id="alamat" class="w-full h-[90px] rounded-lg px-2 py-2 bg-white resize-none"></textarea>
                                </li>
                                <li class="grid grid-cols-[100px_1fr] items-start text-sm">
                                    <label for="nomor" class="text-left font-semibold">Nomor :</label>
                                    <input type="text" name="nomor" id="nomor" class="w-full h-[25px] rounded-lg px-2 bg-white">
                                </li>
                                <li class="grid grid-cols-[100px_1fr] items-start text-sm">
                                    <label for="keperluan" class="text-left font-semibold">Keperluan :</label>
                                    <input type="text" name="keperluan" id="keperluan" class="w-full h-[25px] rounded-lg px-2 bg-white">
                                </li>
                                <li class="grid grid-cols-[100px_1fr] items-start text-sm">
                                    <label for="tanggal" class="text-left font-semibold">Tanggal :</label>
                                    <input type="text" name="tanggal" id="tanggal" class="w-full h-[25px] rounded-lg px-2 bg-white">
                                </li>
                            </ul>
                            
                        </div>
                        <div class="flex flex-col w-full gap-4 h-full">
                            <div class="w-full h-[200px]">
                                <label for="detail" class="capitalize font-[poppins] font-semibold flex mb-2 justify-center">detail keperluan</label>
                                <textarea name="detail" id="detail" class="w-full h-[168px] rounded-lg px-2 py-2 bg-white resize-none"></textarea>
                            </div>
                            <div class="flex justify-end items-center w-full h-[48px]">
                                <button id="" for="" class="flex items-center justify-center bg-[#2E8A99] w-[120px] h-[24px] rounded-md font-[poppins] font-semibold font-md text-white">kirim</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                {{-- sosial media --}}
                <div class="bg-[#D9D9D9] py-2 w-full h-[198px] rounded-lg">
                    <p class="flex items-center justify-center capitalize font-semibold font-[poppins] text-xl mb-2">sosial media</p>
                    <div class="w-[90%] px-10">
                        @foreach ( $sosialmedia as $sm )
                            
                        <div class="flex items-center gap-2 mb-2">
                            <img src="{{ asset('storage/'.$sm->logo) }}" alt="" class="w-9 h-9">
                            
                            <div class="flex gap-2">
                                <p class="font-[poppins] font-semibold text-sm capitalize">{{ $sm->judul }} :</p>
                                <a href="{{ $sm->link_aplikasi }}">
                                    <p class="font-[poppins] font-semibold text-sm">{{ $sm->nama_akun }}</p>
                                </a>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
                {{-- sosial media --}}


            </div>

            {{-- Maps --}}
            @foreach ($lokasi as $lk)
                <div class="bg-[#D9D9D9] w-[500px] h-[516px] rounded-lg">
                    <div class="h-full w-full rounded-md">
                        <iframe
                            src="{{ $lk->lokasi_embed }}"
                            width="100%"
                            height="100%"
                            style="border-radius: 8px"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy"
                        ></iframe>
                    </div>
                </div>
            @endforeach
            {{-- Maps --}}


        </div>
    </div>
    {{-- content --}}

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

    // function initMap() {
        // const map = new google.maps.Map(document.getElementById("map"), {
            // center: { lat: -6.9147, lng: 107.6122 }, // Koordinat Parung, Bogor
            // zoom: 12
        // });

        // Tambahkan marker (opsional)
        // const marker = new google.maps.Marker({
            // position: { lat: -6.9147, lng: 107.6122 }, // Koordinat Parung, Bogor
            // map: map,
            // title: "Parung, Bogor"
        // });
    // }
    
</script>