<x-filament-panels::page>

    <div class="flex flex-col gap-4" x-data="appData">
        <x-filament::section col-span="1" collapsible>

            <x-slot name="heading">
                heart beats
            </x-slot>

            <x-slot name="description">
                follow patient heart beats
            </x-slot>

            @livewire(App\Filament\Doctor\Resources\PatientResource\Widgets\HeartBeatWidget::class, ['patient' => $record], key($record->id))

            <div class="w-full flex justify-between px-5 mt-4">

                <div class="flex gap-2">
                    <span class="font-bold">
                        normal heartbeat rate :
                    </span>
                    <span>
                        60 - 100
                    </span>
                </div>

                <div class="flex gap-2">
                    <span class="font-bold">
                        heart beat average
                    </span>
                    <span>
                        {{ $heart_analytics['averageHeartRate'] ?? 'not set' }}
                    </span>
                </div>
            </div>
            @foreach ($heart_analytics['heart_rate_zones'] as $zone => $percentage)
                @php

                    $color = match ($zone) {
                        'Moderate' => 'bg-orange-600',
                        'Vigorous' => 'bg-red-600',
                        default => 'bg-sky-600',
                    };
                @endphp

                <div class="relative pt-1 px-10 my-2">
                    <div class="flex mb-2 items-center justify-between">
                        <div>
                            <span
                                class="text-xs font-semibold inline-block py-1 px-2 uppercase rounded-full text-white {{ $color }}">
                                {{ $zone }} {{ $percentage }}%
                            </span>
                        </div>
                    </div>

                    <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-gray-200">
                        <div style="width: {{ $percentage }}%"
                            class="shadow-none h-full flex flex-col text-center whitespace-nowrap text-white justify-center {{ $color }}">
                        </div>
                    </div>
                </div>
            @endforeach

            <div 
                class="mt-4 flex justify-center flex gap-4 items-center">
                <button @click="alertPatient($el)" data-topic="heart_beats" data-patient="{{ $record->id }}"
                    class="bg-red-400 gap-1 flex items-center justify-center cursor-pointer text-white rounded-md px-4 py-2 hover:bg-red-600 anim-300">
                    <i class="bi bi-exclamation-lg"></i> alert patient
                </button>

                <button data-topic="heart_beats" data-patient="{{ $record->id }}"
                    class="bg-sky-400 gap-1 flex items-center justify-center cursor-pointer text-white rounded-md px-4 py-2 hover:bg-sky-600 anim-300">
                    <i class="bi bi-clipboard2-pulse"></i> request heart docs
                </button>
            </div>



        </x-filament::section>
    </div>




    @vite('resources/js/doctor/visualisation/iot.js')

</x-filament-panels::page>
