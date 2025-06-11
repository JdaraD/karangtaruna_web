<div>
    <form wire:submit.prevent="authenticate" class="space-y-4">
        {{ $this->form }}

        @if (session()->has('loginError'))
            <div class="text-sm text-red-600">
                {{ session('loginError') }}
            </div>
        @endif

        <x-filament::button type="submit" class="w-full">
            {{ __('Masuk') }}
        </x-filament::button>
    </form>
</div>
