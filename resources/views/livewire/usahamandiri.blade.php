<div class="select-none mb-6">
    {{-- slider image --}}
    <div class="relative overflow-hidden w-full lg:aspect-[26/9] md:aspect-[20/9] aspect-[16/9] mt-2 mb-2" id="slider">
        {{-- image --}}
        
        <div class="flex w-full h-full transition-transform duration-1000 ease-in-out" id="slides">
            @foreach ( $gambar as $gb )
            <div class="w-full shrink-0">
                <img src="{{ asset('storage/' . $gb->gambar) }}" alt="{{ $gb->nama_iklan }}" class="w-full h-full object-cover">
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
    {{-- slider image --}}

    {{-- banner --}}
    @foreach ( $banner as $br )
    <div class="flex justify-center items-center w-full h-full mb-4">
        <div class="flex justify-center items-center bg-red-300 w-[80%] lg:h-[64px] md:h-[30px] h-[25px] rounded-md shadow-md">
            <img src="{{ asset('storage/' . $br->gambar_banner) }}" alt="{{ $br->nama_banner }}" class="object-cover h-full w-full rounded-md">
        </div>
    </div>
    
    @endforeach
    {{-- banner --}}


    <div class="flex flex-col items-center gap-4 justify-center h-full w-full">
        @foreach ( $usahamandiri as $UM )
            
        <div class="flex flex-col w-[90%] gap-2">
            <p class="capitalize text-sm text-justify font-medium font-[poppins] underline underline-offset-4">{{ $UM->kategori }}</p>
            
            <div class="flex overflow-x-auto whitespace-nowrap gap-4 px-4 py-2 scrollbar-hidden">
                @php
                    $images = $UM->foto_barang[0] ?? null;
                @endphp

                <a href="{{ route('detailusaha', ['id' => $UM->id]) }}" class="flex-shrink-0 flex flex-col items-center bg-[#D9D9D9] h-[200px] w-[220px] gap-2 rounded-md shadow-md hover:cursor-pointer">
                    <div class="flex justify-center items-center w-full h-[120px]">
                        <img src="{{ asset('storage/' . $images) }}" alt="" class="object-cover h-full w-full rounded-t-md">
                    </div>
                    <div class="flex flex-col w-[90%] h-full gap-2">
                        <p class="capitalize text-sm text-justify font-medium font-[poppins]">{{ $UM->nama_barang }}</p>
                        <p class="capitalize text-sm text-justify font-medium font-[poppins]">Rp. {{ number_format($UM->harga, 0, ',', '.') }}</p>
                    </div>
                </a>

            </div>

        </div>

        @endforeach

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

</script>