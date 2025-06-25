<x-layouts.app>
<div class="select-none my-6">

    <div class="flex flex-col gap-6 h-full w-full justify-center items-center">
        <div class="grid grid-cols-2 w-[90%] h-full gap-4">
            <div class="flex flex-col items-center gap-2 my-2 mx-2">
                @php
                    $fotoPertama = $usaha->foto_barang[0] ?? null;
                @endphp

                {{-- Foto besar --}}
                @if ($fotoPertama)
                    <div class="lg:h-[314px] lg:w-[314px] md:h-[314px] md:w-[314px] h-[220px] w-[180px] rounded-md">
                        <img id="mainPhoto" src="{{ asset('storage/' . $fotoPertama) }}" alt="Foto utama"
                            class="h-full w-full object-cover rounded-md transition-all duration-200">
                    </div>
                @endif

                {{-- Galeri thumbnail --}}
                <div class="relative w-full max-w-[500px] lg:h-[100px] md:h-[100px] h-[80px] mx-auto mt-4">

                    <!-- Tombol Kiri -->
                    <button id="arrowLeft" onclick="scrollGallery(-1)"
                        class="absolute left-0 top-1/2 -translate-y-1/2 z-10 h-[60%] w-[30px] bg-white/80 text-black rounded-l-md">
                        &#10094;
                    </button>

                    <!-- CSS untuk sembunyikan scrollbar -->
                    <style>
                        .scrollbar-hidden::-webkit-scrollbar {
                            display: none;
                        }
                        .scrollbar-hidden {
                            -ms-overflow-style: none;
                            scrollbar-width: none;
                        }
                    </style>

                    <!-- Galeri Thumbnail -->
                    <div id="imageGallery"
                        class="flex overflow-x-auto scrollbar-hidden w-full h-full gap-2 px-[40px] scroll-smooth"
                        onscroll="checkScrollArrows()">

                        @foreach ($usaha->foto_barang as $foto)
                            <img src="{{ asset('storage/' . $foto) }}" alt="thumb"
                                onclick="changeMainPhoto('{{ asset('storage/' . $foto) }}')"
                                class="flex-shrink-0 object-cover h-full w-[80px] rounded-md cursor-pointer transition-transform duration-200 hover:scale-105">
                        @endforeach
                    </div>

                    <!-- Tombol Kanan -->
                    <button id="arrowRight" onclick="scrollGallery(1)"
                        class="absolute right-0 top-1/2 -translate-y-1/2 z-10 h-[60%] w-[30px] bg-white/80 text-black rounded-r-md">
                        &#10095;
                    </button>
                </div>

            </div>
                
            <div class="flex flex-col gap-2 my-2 mx-2">
                <div class="w-full lg:h-[60px] md:h-[60px] h-[40px]">
                    <p class="capitalize text-sm text-justify font-[poppins] font-bold">{{ $usaha->nama_barang }}</p>
                    <p class="capitalize text-xs text-justify font-[poppins] font-bold">Rp. {{ number_format($usaha->harga, 0, ',', '.') }}</p>
                </div>
                <div class="flex flex-col gap-2 w-full lg:h-[286px] md:h-[286px] h-[200px]">
                    <p class="capitalize text-sm text-justify font-[poppins] font-bold">deskripsi produk</p>
                    <div class="border border-b-1"></div>
                    <p class="capitalize md:text-sm text-xs text-justify font-[poppins]">{{ $usaha->deskripsi }}</p>
                </div>
                <div class="flex flex-col gap-2 h-[128px]">
                    <p class="capitalize text-sm text-justify font-[poppins] font-bold">Link Shop</p>
                    <div class="border border-b-1"></div>
                    <div class="flex justify-center items-center gap-4">
                        @if (!empty($usaha->link_tiktok))
                            <a href="{{ $usaha->link_tiktok }}" target="_blank" class="flex justify-center items-center rounded-md shadow-md hover:cursor-pointer">
                                <img src="{{ asset('image/tiktok.png') }}" alt="" class="h-[60px] w-[60px] px-2 py-2 ">
                            </a>
                        @endif

                        @if (!empty($usaha->link_shopee))
                            <a href="{{ $usaha->link_shopee }}" target="_blank" class="flex justify-center items-center rounded-md shadow-md hover:cursor-pointer">
                                <img src="{{ asset('image/shopee.png') }}" alt="" class="h-[60px] w-[60px] px-2 py-2 ">
                            </a>
                        @endif

                        @if (!empty($usaha->link_lazada))
                            <a href="{{ $usaha->link_lazada }}" target="_blank" class="flex justify-center items-center rounded-md shadow-md hover:cursor-pointer">
                                <img src="{{ asset('image/lazada.png') }}" alt="" class="h-[60px] w-[60px] px-2 py-2 ">
                            </a>
                        @endif

                        @if (!empty($usaha->link_tokopedia))
                            <a href="{{ $usaha->link_tokopedia }}" target="_blank" class="flex justify-center items-center rounded-md shadow-md hover:cursor-pointer">
                                <img src="{{ asset('image/tokopedia.png') }}" alt="" class="h-[60px] w-[60px] px-2 py-2 ">
                            </a>
                        @endif
                    </div>

                </div>
            </div>

            
        </div>
        
    </div>
</div>

<script>
    // ambil elemen gambar utama
    function changeMainPhoto(newSrc) {
        const mainImg = document.getElementById('mainPhoto');
        mainImg.src = newSrc;
    }

    function scrollGallery(direction) {
        const gallery = document.getElementById('imageGallery');
        const scrollAmount = 100;
        gallery.scrollBy({
            left: direction * scrollAmount,
            behavior: 'smooth'
        });
        checkScrollArrows();
    }

    function checkScrollArrows() {
        const gallery = document.getElementById('imageGallery');
        document.getElementById('arrowLeft').style.display = gallery.scrollLeft > 0 ? 'block' : 'none';
        const maxScroll = gallery.scrollWidth - gallery.clientWidth;
        document.getElementById('arrowRight').style.display = gallery.scrollLeft < maxScroll ? 'block' : 'none';
    }

    document.addEventListener("DOMContentLoaded", checkScrollArrows);
</script>


</x-layouts.app>