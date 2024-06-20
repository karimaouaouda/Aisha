<x-custom-layout>
    <div class="content flex flex-col">
        <div class="w-full py-2 bg-green-500 bg-opacity-60">
            <div class="w-2/3 mx-auto rounded-lg h-14 overflow-hidden relative">
                <input type="search" placeholder="search for doctors..." name="q" id="q"
                    class="w-full h-full font-normal text-lg pl-4">
                <div class="absolute w-fit right-2 top-0 h-full py-2">
                    <button class="px-4 h-full my-auto ">
                        <i class="bi bi-sliders2 text-xl text-slate-700"></i>
                    </button>
                    <button class="rounded-md px-4 h-full my-auto bg-green-500">
                        <i class="bi bi-search text-white"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="w-full px-4 mt-10 md:px-10 lg:px-16">

            <div class="search-results flex flex-col gap-4">
                <h1 class="text-xl ">
                    search results for : <span class="font-semibold">{{ __('Karim aouaouda') }}</span>
                </h1>
            </div>

            <div class="w-full my-2 flex flex-wrap gap-2 justify-around">

                @foreach ($doctors as $doctor)
                    <x-main.doctor-card :doctor="$doctor" />
                @endforeach

            </div>
        </div>
    </div>
    @vite('resources/js/navbar.js')

</x-custom-layout>
