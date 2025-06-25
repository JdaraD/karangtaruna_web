<div class="flex justify-center items-center select-none my-7 w-full px-4">
    <div class="flex flex-col gap-4 w-full max-w-[1440px]">
        <p class="uppercase font-[poppins] text-md font-bold">News</p>
        <div class="border-b border-gray-300 w-full"></div>

        <div class="flex flex-col-reverse lg:flex-row gap-4 w-full">

            {{-- KONTEN BERITA --}}
            <div class="flex flex-col gap-4 items-center w-full lg:basis-2/3">

                @forelse ($beritas as $br)
                    <a href="{{ route('newsdetail', ['id' => $br->id]) }}"
                        class="flex flex-col sm:flex-row gap-4 w-full bg-gray-100 rounded-md shadow px-4 py-3 transition-transform duration-100 lg:hover:scale-105 md:hover:scale-105 hover:scale-102">
                        
                        <div class="w-full sm:w-[40%]">
                            <img src="{{ asset('storage/' . $br->gambar) }}"
                                alt="{{ $br->judul_berita }}"
                                class="w-full h-[195px] object-cover rounded-lg">
                        </div>

                        <div class="w-full sm:w-[60%] flex flex-col gap-2 text-justify">
                            <p class="capitalize font-[poppins] text-md">{{ $br->judul_berita }}</p>
                            <p class="uppercase font-[poppins] text-sm line-clamp-4">{{ $br->deskripsi }}</p>
                            <p class="capitalize font-[poppins] text-sm italic">{{ \Carbon\Carbon::parse($br->tanggal)->translatedFormat('d F Y') }}</p>
                        </div>
                    </a>
                @empty
                    <div class="text-gray-500 italic text-sm">Tidak ada berita di tanggal ini.</div>
                @endforelse

            </div>

            {{-- KALENDER --}}
            <div class="w-full lg:basis-1/3 bg-gray-100 p-4 rounded-lg shadow-lg">
                <!-- Navigasi Bulan -->
                <div class="flex items-center justify-between mb-2">
                    <button wire:click="previousMonth" class="px-2 py-1 bg-[#6A9C89] text-white rounded hover:bg-[#588474]">&larr;</button>
                    <h2 class="text-lg font-bold text-center w-full">
                        {{ \Carbon\Carbon::parse($currentMonth)->translatedFormat('F Y') }}
                    </h2>
                    <button wire:click="nextMonth" class="px-2 py-1 bg-[#6A9C89] text-white rounded hover:bg-[#588474]">&rarr;</button>
                </div>

                <!-- Hari -->
                <div class="grid grid-cols-7 gap-1 text-center font-semibold text-sm text-gray-700 mb-1">
                    @foreach(['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'] as $dayName)
                        <div>{{ $dayName }}</div>
                    @endforeach
                </div>

                <!-- Tanggal -->
                <div class="grid grid-cols-7 gap-1 text-sm">
                    @php
                        $startOfMonth = \Carbon\Carbon::parse($currentMonth)->startOfMonth();
                        $startDayOfWeek = $startOfMonth->dayOfWeekIso; // 1 (Senin) - 7 (Minggu)
                    @endphp

                    {{-- Padding kosong --}}
                    @for ($i = 1; $i < $startDayOfWeek; $i++)
                        <div></div>
                    @endfor

                    {{-- Tanggal dalam bulan --}}
                    @for ($i = 0; $i < $startOfMonth->daysInMonth; $i++)
                        @php
                            $date = $startOfMonth->copy()->addDays($i)->format('Y-m-d');
                            $hasNews = in_array($date, $datesWithNews);
                        @endphp
                        <button wire:click="selectDate('{{ $date }}')"
                            class="relative p-2 rounded text-center
                                {{ $selectedDate == $date ? 'bg-blue-500 text-white' : 'bg-gray-200 hover:bg-blue-100' }}">
                            <span>{{ \Carbon\Carbon::parse($date)->day }}</span>
                            @if ($hasNews)
                                <span class="absolute bottom-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                            @endif
                        </button>
                    @endfor
                </div>

                <!-- Tanggal terpilih -->
                <div class="text-center mt-3 text-sm font-semibold">
                    Tanggal terpilih: {{ \Carbon\Carbon::parse($selectedDate)->translatedFormat('d F Y') }}
                </div>
            </div>
        </div>

        {{-- PAGINATION --}}
        <x-pagination-control :paginator="$beritas" per-page-binding="perPage" />
    </div>
</div>
