@php
    $images = $getState() ?? [];
@endphp

<div class="flex gap-2 overflow-x-auto whitespace-nowrap">
    @foreach ($images as $image)
        <img 
            src="{{ asset('storage/' . $image) }}" 
            alt="Foto Barang"
            class="w-8 h-8 object-cover rounded-md"
        />
    @endforeach
</div>
