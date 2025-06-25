<x-filament::page>
    <div class="flex justify-center rounded-lg">
        <div class="w-full max-w-md space-y-6 p-6 bg-white dark:bg-gray-900 rounded-2xl shadow-xl">
            <h2 class="text-2xl font-bold text-center text-gray-900 dark:text-white">
                Daftar Akun Baru
            </h2>

            <form wire:submit.prevent="submit" class="space-y-4">
                {{ $this->form }}

                <x-filament::button type="submit" class="w-full bg-amber-500 hover:bg-amber-600 text-white">
                    Daftar Sekarang
                </x-filament::button>
            </form>
        </div>
    </div>
</x-filament::page>
