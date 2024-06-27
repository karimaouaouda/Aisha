<x-filament-panels::page>

    <x-filament::section collapesable>
        <x-slot name="heading">
            add your Address
        </x-slot>

        <x-slot name="description">
            adding your address help <span class="text-sky-500 font-semibold">AISHA</span> make experience more powerfull
        </x-slot>

        {{ $this->address }}
    </x-filament::section>

</x-filament-panels::page>
