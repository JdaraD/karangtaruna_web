<x-filament::page>
    <div class="max-w-md mx-auto bg-white dark:bg-gray-900 p-6 rounded-xl shadow">
        <h2 class="text-2xl font-bold text-center mb-4 text-gray-900 dark:text-white">Lupa Password</h2>

        <form wire:submit.prevent="submit" class="space-y-4">
            {{ $this->form }}

            <x-filament::button type="submit" class="w-full">
                Kirim Link Reset
            </x-filament::button>
        </form>
    </div>
</x-filament::page>
