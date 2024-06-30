<x-filament-panels::page>
    <x-filament::section collapsible collapsed>
        <x-slot name="heading">
            update body data
        </x-slot>
        <x-slot name="description">
            the data like age, height weight
        </x-slot>
        <form wire:submit="updateBodyData">
            {{ $this->bodyData }}
    
            <div class="w-full my-4 text-right">
                <button type="submit" class="px-4 py-2 bg-sky-500 text-white font-semibold rounded-md hover:bg-slate-600 anim-300">
                    save
                </button>
            </div>
        </form>
    </x-filament::section>

    <x-filament::section collapsible collapsed>
        <x-slot name="heading">
            update health data
        </x-slot>
        <x-slot name="description">
            the data like diseases, symptoms
        </x-slot>
        <form wire:submit="updateHealthData">
            {{ $this->healthData }}
    
            <div class="w-full my-4 text-right">
                <button type="submit" class="px-4 py-2 bg-sky-500 text-white font-semibold rounded-md hover:bg-slate-600 anim-300">
                    save
                </button>
            </div>
        </form>
    </x-filament::section>
    <x-filament-actions::modals />
</x-filament-panels::page>
