<x-layouts.wrapper>
    <div class="content flex flex-col bg-[#e1ebfa]" x-data="searchPageData">
        <div class="w-full py-2 ">
            <div x-data="{query : '{{ request()->has('query') ? request()->input('query') : '' }}'}" class="w-2/3 mx-auto rounded-lg h-14 overflow-hidden relative">
                <input x-model="query" type="search" placeholder="search for doctors..." name="q" id="q"
                    class="w-full h-full border-none outline-none font-normal text-lg pl-4">
                <div class="absolute w-fit right-2 top-0 h-full py-2">
                    <button @click="showFilters = !showFilters" class="px-4 h-full my-auto ">
                        <i class="bi bi-sliders2 text-xl text-slate-700"></i>
                    </button>
                    <button @click="search(query)" class="rounded-md px-4 h-full my-auto bg-[#e1ebfa]">
                        <i class="bi bi-search text-white"></i>
                    </button>
                </div>
            </div>

            <div class="w-full py-2" x-data="{}" x-show="showFilters" x-transition>
                <div class="w-full md:w-1/2 flex flex-col items-center h-auto mx-auto" x-init="await loadCategories()" x-data="selectMultipleData">
                    <span class="text-lg font-semibold">
                        select categories
                    </span>
                    <div class="w-full px-4">
                        <div class="flex flex-col items-center relative">
                            <div class="w-full  svelte-1l8159u">
                                <div class="my-2 p-1 flex border border-gray-200 bg-white rounded svelte-1l8159u">
                                    <div class="flex flex-auto flex-wrap">
                                        
                                        <template x-for="item in selected">
                                            <div class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-full text-teal-700 bg-teal-100 border border-teal-300 ">
                                                <div class="text-xs font-normal leading-none max-w-full flex-initial" x-text="item"></div>
                                                <div class="flex flex-auto flex-row-reverse">
                                                    <div>
                                                        <svg @click="select(item)" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x cursor-pointer hover:text-teal-400 rounded-full w-4 h-4 ml-2">
                                                            <line x1="18" y1="6" x2="6" y2="18"></line>
                                                            <line x1="6" y1="6" x2="18" y2="18"></line>
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                        </template>
                                        

                                    </div>
                                    <div @click="openMenu = !openMenu" class="text-gray-300 w-8 py-1 pl-2 pr-1 border-l flex items-center border-gray-200 svelte-1l8159u">
                                        <button class="cursor-pointer w-6 h-6 text-gray-600 outline-none focus:outline-none">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-up w-4 h-4">
                                                <polyline points="18 15 12 9 6 15"></polyline>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div x-show="openMenu" x-transition class="absolute shadow top-full bg-white z-40 w-full lef-0 rounded max-h-[300px] overflow-y-auto svelte-5uyqqj">
                                <div class="flex flex-col w-full">
                                    <template x-for="item in available">
                                        <div @click="select(item)" class="cursor-pointer w-full border-gray-100 rounded-t border-b hover:bg-teal-100">
                                            <div :class="{'border-teal-600' : selected.includes(item), 'hover:border-teal-100' : !selected.includes(item)}  " class="flex w-full items-center p-2 pl-2 border-transparent border-l-2 relative">
                                                <div class="w-full items-center flex">
                                                    <div class="mx-2 leading-6">
                                                        <span x-text="item"></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="w-full px-4 md:px-10 lg:px-16">

            @if(request()->has('query'))
            <div class="search-results flex flex-col gap-4">
                <h1 class="!text-xl ">
                    search results for : <span class="font-semibold">
                        {{ request()->input('query') }}
                    </span>
                </h1>
            </div>
            @endif

            <div class="w-full my-2 flex flex-wrap gap-2 justify-around">

                @for($i = 0; $i < 10 ; $i++)
                    <x-profile.doctor.parts.article />
                @endfor

                {{-- @if( count($doctors) > 0 )
                    @foreach ($doctors as $doctor)
                        <x-profile.doctor.parts.article :doctor="$doctor" />
                    @endforeach
                @else
                    <div class="py-10 text-center">
                        <h4 class="text-2xl justify-center items-center font-bold tracking-wide flex gap-4 uppercase text-red-500">
                            <i class="bi bi-x-lg"></i> no doctor found 
                        </h4>
                    </div>
                @endif --}}

            </div>
        </div>
    </div>


    @vite('resources/js/doctor/index.js')
</x-layouts.wrapper>
