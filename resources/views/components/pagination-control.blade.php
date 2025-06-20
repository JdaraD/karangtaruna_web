<div class="hidden sm:flex sm:items-center sm:justify-between mt-6 text-sm text-gray-700">
    <!-- Info Pagination -->
    <div>
        <p>
            Menampilkan
            <span class="font-semibold text-gray-900">{{ $paginator->firstItem() }}</span>
            sampai
            <span class="font-semibold text-gray-900">{{ $paginator->lastItem() }}</span>
            dari
            <span class="font-semibold text-gray-900">{{ $paginator->total() }}</span>
            entri
        </p>
    </div>

    <!-- Kontrol Per Halaman & Navigasi -->
    <div class="flex items-center gap-4">
        <!-- Dropdown Per Page -->
        <div class="flex items-center gap-2">
            <label for="perPage" class="text-gray-600">Per halaman</label>
            <select id="perPage" wire:model="{{ $perPageBinding }}"
                class="border border-gray-300 rounded-md px-3 py-1.5 focus:outline-none focus:ring-2 focus:ring-[#048DD1] focus:border-transparent text-gray-700">
                <option value="8">8</option>
                <option value="12">12</option>
                <option value="20">20</option>
            </select>
        </div>

        <!-- Navigasi Halaman -->
        <nav class="inline-flex rounded-md shadow-sm" aria-label="Pagination">
            <!-- Tombol Sebelumnya -->
            <button wire:click="previousPage"
                class="px-2 py-1.5 border border-gray-300 rounded-l-md bg-white text-gray-500 hover:bg-gray-100 disabled:opacity-50"
                @disabled($paginator->onFirstPage())>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                </svg>
            </button>

            <!-- Tombol Halaman -->
            @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                <button wire:click="gotoPage({{ $i }})"
                    class="px-3 py-1.5 border border-gray-300 text-sm font-medium 
                    {{ $paginator->currentPage() === $i 
                        ? 'bg-gradient-to-b text-black' 
                        : 'bg-white text-gray-700 hover:bg-gray-100' }}">
                    {{ $i }}
                </button>
            @endfor

            <!-- Tombol Selanjutnya -->
            <button wire:click="nextPage"
                class="px-2 py-1.5 border border-gray-300 rounded-r-md bg-white text-gray-500 hover:bg-gray-100 disabled:opacity-50"
                @disabled(!$paginator->hasMorePages())>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </nav>
    </div>
</div>
