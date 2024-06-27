<x-filament::section collapsible collapsed>
    <x-slot name="heading">{{ $heading }}</x-slot>
    <x-slot name="description">{{ $description }}</x-slot>

    <div class="md:mt-0 md:col-span-2">
        <div class="px-4 py-5 sm:p-6">
            {{ $content }}
        </div>
    </div>
</x-filament::section>
