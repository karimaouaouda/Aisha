@props(['submit'])

<x-filament::section collapsible collapsed>
    <x-slot name="heading">{{$heading}}</x-slot>

    <x-slot name="description">{{$description}}</x-slot>
    <div class="mt-5 md:mt-0 md:col-span-2">
        <form wire:submit="{{ $submit }}">
            <div class="px-4 py-5  sm:p-6">
                <div class="grid grid-cols-6 gap-6">
                    {{ $form }}
                </div>
            </div>

            @if (isset($actions))
                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-end sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                    {{ $actions }}
                </div>
            @endif
        </form>
    </div>
</x-filament::section>
