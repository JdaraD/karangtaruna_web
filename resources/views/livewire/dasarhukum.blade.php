<div class="select-none">

    <div class="flex justify-center items-center w-full h-full select-none">

        {{-- dekripsi --}}
        <div class="h-full w-[88%] mt-6 mb-4">

            <p class="uppercase font-bold text-bold font-[poppins] text-xl">dasar hukum</p>

            <div class="mt-4 mb-6">
                {{-- Logo Start --}}
                <div class="flex items-center w-full h-full gap-2">
                    {{-- logo --}}
                    <img src="{{ asset('image/logo.png') }}" alt="" class="size-10 ">
                    {{-- logo --}}
        
                    {{-- identity name --}}
                    <div>
                        <p class="font-[poppins] font-medium text-sm ">Karang Taruna</p>
                        <p class="font-[poppins] font-normal text-xs ">Desa Waru</p>
                    </div>
                    {{-- identity name --}}
                </div>
                {{-- Logo End --}}

            </div>
            
            {{-- deskripsi --}}
            <p class="font-[poppins] text-justify text-sm">lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum, Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
            {{-- deskripsi --}}

        </div>
        {{-- dekripsi --}}

    </div>

    {{-- pasal --}}
    <div class="flex justify-center items-center mb-6">
        <div class="relative flex flex-wrap justify-center items-center bg-yellow-100 rounded-lg p-6 w-full md:w-1/2 shadow-md">
            <div>
                <p class="font-[poppins] text-md text-bold font-bold uppercase">PASAL TENTANG HUKUM BERDIRINYA KARANGTARUNA</p>

            </div>

            <ul class="mt-4 mb-8 space-y-4 ">
                @for ($i = 0; $i < 6; $i++)
                    <li class="flex items-start gap-4">
                        <div class="w-4 h-4 bg-teal-600 rounded-full mt-1"></div>
                        <p class="text-gray-700">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
                    </li>
                @endfor
            </ul>
        </div>
    </div>
    {{-- pasal --}}

</div>
