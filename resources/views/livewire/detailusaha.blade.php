<div class="select-none my-6">

    <div class="flex flex-col gap-6 h-full w-full justify-center items-center">
        <div class="grid grid-cols-2 w-[90%] h-full gap-4">
            <div class="flex flex-col justify-center items-center gap-2 my-2 mx-2">
                <div class=" h-[314px] w-[314px] bg-green-500 rounded-md">
                    <img src="{{ asset('image/unnamed.jpg') }}" alt="" class="h-full w-full object-cover rounded-md">

                </div>
                <div class="relative w-full max-w-[450px] h-[100px] mx-auto">
                    <!-- Tombol Kiri -->
                    <button id="arrowLeft" onclick="scrollGallery(-1)"
                        class="absolute left-0 top-1/2 -translate-y-1/2 z-10 h-[40px] bg-gray-300 px-2 text-black rounded-l-md hidden">
                        &#10094;
                    </button>

                    <!-- Scrollbar hidden CSS -->
                    <style>
                    .scrollbar-hidden::-webkit-scrollbar {
                        display: none;
                    }
                    .scrollbar-hidden {
                        -ms-overflow-style: none;
                        scrollbar-width: none;
                    }
                    </style>

                    <!-- Galeri -->
                    <div id="imageGallery"
                        class="flex overflow-x-auto whitespace-nowrap scrollbar-hidden w-full h-full gap-2 px-8 scroll-smooth"
                        onscroll="checkScrollArrows()">
                        @for ($i = 0; $i < 6; $i++)
                            <img src="{{ asset('image/unnamed.jpg') }}" alt="thumb"
                                class="object-cover h-full min-w-[80px] max-w-[80px] rounded-md">
                        @endfor
                    </div>

                    <!-- Tombol Kanan -->
                    <button id="arrowRight" onclick="scrollGallery(1)"
                        class="absolute right-0 top-1/2 -translate-y-1/2 z-10 h-[40px] bg-gray-300 px-2 rounded-r-md text-black">
                        &#10095;
                    </button>
                </div>
            </div>
            <div class="flex flex-col gap-2 my-2 mx-2">
                <div class="w-full h-[60px]">
                    <p class="capitalize text-sm text-justify font-[poppins] font-bold">pupuk campur</p>
                    <p class="capitalize text-xs text-justify font-[poppins] font-bold">rp. 100.000</p>
                </div>
                <div class="flex flex-col gap-2 w-full h-[286px]">
                    <p class="capitalize text-sm text-justify font-[poppins] font-bold">deskripsi produk</p>
                    <div class="border border-b-1"></div>
                    <p class="capitalize text-sm text-justify font-[poppins]">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.

The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>
                </div>
                <div class="flex flex-col gap-2 h-[128px]">
                    <p class="capitalize text-sm text-justify font-[poppins] font-bold">deskripsi produk</p>
                    <div class="border border-b-1"></div>
                    <div class="flex justify-center items-center gap-4">
                        <img src="{{ asset('image/ln2.jpeg') }}" alt="" class="h-[80px] w-[80px] ">
                        <img src="{{ asset('image/ln2.jpeg') }}" alt="" class="h-[80px] w-[80px] ">
                        <img src="{{ asset('image/ln2.jpeg') }}" alt="" class="h-[80px] w-[80px] ">

                    </div>
                </div>
            </div>
            
        </div>
        
    </div>
</div>

<script>
    const gallery = document.getElementById('imageGallery');
    const arrowLeft = document.getElementById('arrowLeft');
    const arrowRight = document.getElementById('arrowRight');

    function scrollGallery(dir) {
        const scrollAmount = 100;
        gallery.scrollBy({ left: dir * scrollAmount, behavior: 'smooth' });
        // delay checkScrollArrows to let scroll finish
        setTimeout(checkScrollArrows, 300);
    }

    function checkScrollArrows() {
        const maxScrollLeft = gallery.scrollWidth - gallery.clientWidth;
        arrowLeft.classList.toggle('hidden', gallery.scrollLeft <= 0);
        arrowRight.classList.toggle('hidden', gallery.scrollLeft >= maxScrollLeft - 1);
    }

    // Inisialisasi saat halaman pertama kali dimuat
    window.addEventListener('load', checkScrollArrows);
</script>