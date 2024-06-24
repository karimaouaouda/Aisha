<x-filament-widgets::widget>
    <x-filament::section>

        <div class="w-full mb-4">
            <h2 class="text-2xl font-bold text-sky-600 capitalize">
                Doctors Medical Reports :
            </h2>
        </div>
        <div class="w-full roundeed-lg p-1 relative h-[50vh]">

            <div class="w-8/12 h-full mx-auto p-2">
                <div class="flex flex-col items-center justify-center h-full gap-3">

                    <div class="header-v flex justify-between w-full items-center">

                        <div class="personal-info flex gap-2 items-center">

                            <div class="w-12 h-12 rounded-full overflow-hidden border-2 border-sky-500">
                                <img class="w-full h-full" src="{{ $patient->profile_photo_url }}" alt="profile photo"/>
                            </div>
                            <div class="flex flex-1 flex-col justify-around">
                                <h1 class="font-semibold capitalize text-slate-800 text-lg">
                                    Daya Azzedine
                                </h1>
                                <span class="font-normal text-sm text-gray-500 drop-shadow shadow-sky-500">
                                    Generalist
                                </span>
                            </div>

                        </div>

                        <div class="post-info flex gap-3 items-center">
                            <span class="text-sm font-light text-gray-400">
                                15min ago
                            </span>

                            <div x-data="{open : false}" class="drop-down relative ">
                                <div @click="open = !open" class="toggler cursor-pointer">
                                    <i class="bi bi-three-dots text-xl"></i>
                                </div>
                                <div x-show="open" x-transition class="absolute bg-gray-200 border shadow w-40 p-2 right-0 top-full">
                                    <div class="w-full flex flex-col gap-1">
                                        <a href="#" class="flex px-2 py-1 rounded-md gap-2 anim-300 hover:bg-gray-300">
                                            <i class="bi bi-house text-md"></i>
                                            <span class="capitalize text-slate-700  text-md">
                                                page 1
                                            </span>
                                        </a>
            
                                        <a href="#" class="flex px-2 py-1 rounded-md gap-2 hover:bg-gray-300 anim-300">
                                            <i class="bi bi-house text-md pointer-events-none"></i>
                                            <span class="capitalize text-slate-700 text-md">
                                                page 1
                                            </span>
                                        </a>
            
                                        <a href="#" class="flex px-2 py-1 rounded-md bg-red-500 bg-opacity-60 text-white hover:bg-opacity-80 hover:bg-red-700 anim-300 p-2 gap-2">
                                            <i class="bi bi-house text-md"></i>
                                            <span class="capitalize text-slate-700 text-md">
                                                page 1
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="content pl-10 pr-2">
                        <p class="text-center text-md text-slate-600">
                            <sup>
                                <i class="bi bi-quote"></i>
                            </sup>
                            After reviewing your recent check-up and test results, 
                            I'm pleased to inform you that your overall health is in good condition.
                             Your blood pressure and cholesterol levels are within normal ranges,
                              which is great. However, your blood sugar levels are slightly elevated,
                               indicating that you should monitor your diet more closely to prevent potential 
                               issues in the future. Your weight is within a healthy range, 
                               but I recommend incorporating more physical activity into your routine to maintain this balance.
                            If you have any concerns or need more detailed information, please feel free to ask.
                             <sup>
                                <i class="bi bi-quote"></i>
                             </sup>
                        </p>
                    </div>
                </div>
            </div>

            <button class="border-none outline-none absolute left-16 top-1/2 -tanslate-x-1/2">
                <i class="bi bi-chevron-compact-left text-gray-300 hover:text-gray-600 anim-300 text-4xl"></i>
            </button>

            <button class="border-none outline-none absolute right-16 top-1/2 -tanslate-x-1/2">
                <i class="bi bi-chevron-compact-right text-gray-300 hover:text-gray-600 anim-300 text-4xl"></i>
            </button>

        </div>


    </x-filament::section>
</x-filament-widgets::widget>
