<x-filament-widgets::widget>
    <x-filament::section>
        
    <img src="{{ asset('media/iotill.svg') }}" class="w-8/12 h-72 mx-auto" alt="">

    <h1 class="w-full my-2 text-center text-3xl font-bold text-slate-800">
        IOT Data States
    </h1>

    <p class="text-sm font-semibold text-center text-slate-500 px-4">
        show analytics about data reciverd from patient different iot devices (phone, smart watch ...) and see 
        AI Opinion about it and take steps
    </p>
    <div class="w-full mt-4 mb-2 text-center">
        <a href="{{ route('filament.doctor.resources.patients.stats.iot', ['record' => $patient_id]) }}" class="py-2 px-4 text-white bg-sky-400 hover:bg-sky-600 
                        anim-300 text-lg shadow mx-auto">
        access now <i class="bi bi-arrow-right"></i>
    </a>
    </div>

    </x-filament::section>
</x-filament-widgets::widget>
