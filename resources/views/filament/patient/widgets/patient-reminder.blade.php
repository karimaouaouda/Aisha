<x-filament-widgets::widget>
    <x-filament::section>
        <div class="flex items-center">
            <img src="{{asset('./images/aisha-ai.svg')}}" class="h-72 w-72" alt="">

            <div class="p-4 font-semibold bg-slate-100 shadow-md relative -left-10">
                <div class="absolute triangle-left">

                </div>
                <h1 class="text-xl font-bold text-sky-700">
                    Hey {{ $user->name }}, You miss something
                </h1>
                <p class="px-4 lg:px-6">
                    it look's like you did not complete your profile, please complete it that can i make your 
                    experience more powerfull and helpfull, i need them to analyze your health states and 
                    provide a good treatment for you, no data will be shared, <a href="{{ route('filament.patient.pages.complete-profile') }}" class="text-sky-500 hover:underline">complete now</a>
                </p>
            </div>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
