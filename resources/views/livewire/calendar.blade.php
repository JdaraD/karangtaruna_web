<livewire:calendar />
<div class="my-4 mx-4 w-full h-full">
    <!-- Navigasi Bulan -->
    <div class="flex items-center justify-between mb-2">
        <button wire:click="previousMonth" class="px-2 py-1 bg-[#6A9C89] rounded hover:bg-gray-300">&larr;</button>
        <h2 class="text-lg font-bold">
            {{ \Carbon\Carbon::parse($currentMonth)->translatedFormat('F Y') }}
        </h2>
        <button wire:click="nextMonth" class="px-2 py-1 bg-[#6A9C89] rounded hover:bg-gray-300">&rarr;</button>
    </div>

    <!-- Nama Hari -->
    <div class="grid grid-cols-7 gap-1 text-center font-semibold text-sm text-gray-700 mb-1">
        @foreach(['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'] as $dayName)
            <div>{{ $dayName }}</div>
        @endforeach
    </div>

    <!-- Grid Tanggal -->
    <div class="grid grid-cols-7 gap-1">
        @php
            $startOfMonth = \Carbon\Carbon::parse($currentMonth)->startOfMonth();
            $startDayOfWeek = $startOfMonth->dayOfWeekIso; // Senin = 1, Minggu = 7
        @endphp

        {{-- Padding kosong sebelum tanggal 1 --}}
        @for ($i = 1; $i < $startDayOfWeek; $i++)
            <div></div>
        @endfor

        {{-- Tanggal bulan ini --}}
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

    <!-- Daftar Berita -->
    <div class="mt-4">
        <h3 class="font-bold">Berita pada tanggal {{ \Carbon\Carbon::parse($selectedDate)->translatedFormat('d F Y') }}:</h3>
        @forelse($beritas as $berita)
            <div class="p-3 mb-2 border rounded shadow bg-white">
                <h4 class="font-semibold text-sm">{{ $berita->judul_berita }}</h4>
                <p class="text-xs text-gray-700">{{ $berita->deskripsi }}</p>
            </div>
        @empty
            <p class="text-gray-500 italic">Tidak ada berita di tanggal ini.</p>
        @endforelse
    </div>
</div>
