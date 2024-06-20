<x-filament-panels::page>

<div class="w-full flex flex-col gap-4" x-data="AppData">

    @foreach ($requests as $request)

    <div class="w-full md:w-96 rounded-md border overflow-hidden shadow bg-slate-100">

        <div class="h-36 border-b border-sky-500 mb-10 w-full relative">
            <img src="{{ asset('media/cover.jpg') }}" class="w-full h-full object-cover" alt="cover">


            <div class="absolute -bottom-10 left-1/2 -translate-x-10 w-20 h-20 rounded-full overflow-hidden bor ring-2 ring-sky-500 ">
                <img src="{{ asset('media/profile.jpg') }}" class="w-full h-full object-cover" alt="">
            </div>
        </div>

        <div class="info flex flex-col gap-2 pb-2 px-4">
            <h1 class="text-lg capitalize text-center font-sky-400">
                {{ $request->name }}
            </h1>

            <div class="tabs flex flex-col">

                <div class="tab" x-data="{open : false}">
                    <div @click="open = !open" class="tab-toggler cursor-pointer relative text-sm">
                        <div class="h-px w-full bg-slate-400 top-1/2 left-0 absolute"></div>
                        <div class="p-1 relative w-fit mx-auto bg-slate-100 flex justify-center items-center gap-1">
                            <span class="">
                                address
                            </span>
                            <i class="bi bi-caret-down anim-300" 
                                :class="{
                                    'rotate-180' : open
                                }"></i>
                        </div>
                    </div>
    
                    <div x-transition x-show="open" class="menu">
                        <ul class="">
                            <li class="flex items-center gap-2">
                                <span class="font-semibold capitaize">
                                    city :
                                </span>
                                <span class="font-semibold text-green-500">
                                    Guelma
                                </span>
                            </li>
    
                            <li class="flex items-center gap-2">
                                <span class="font-semibold capitaize">
                                    province :
                                </span>
                                <span class="font-semibold text-green-500">
                                    hiliopolis
                                </span>
                            </li>

                            <li class="flex items-center gap-2">
                                <span class="font-semibold capitaize">
                                    street line :
                                </span>
                                <span class="font-semibold text-green-500">
                                    hiahem abdelhamid, 12
                                </span>
                            </li>

                        </ul>
                    </div>
                </div>


                <div class="tab" x-data="{open : false}">
                    <div @click="open = !open" class="tab-toggler cursor-pointer relative text-sm">
                        <div class="h-px w-full bg-slate-400 top-1/2 left-0 absolute"></div>
                        <div class="p-1 relative w-fit mx-auto bg-slate-100 flex justify-center items-center gap-1">
                            <span class="">
                                contact
                            </span>
                            <i class="bi bi-caret-down anim-300" 
                                :class="{
                                    'rotate-180' : open
                                }"></i>
                        </div>
                    </div>
    
                    <div x-transition x-show="open" class="menu">
                        <ul class="">
                            <li class="flex items-center gap-2">
                                <span class="font-semibold capitaize">
                                    email :
                                </span>
                                <span class="font-semibold text-green-500">
                                    {{ $request->email }}
                                </span>
                            </li>
    
                            <li class="flex items-center gap-2">
                                <span class="font-semibold capitaize">
                                    phone :
                                </span>
                                <span class="font-semibold text-green-500">
                                    0655766709
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="buttons w-full text-sm flex items-center justify-around">

                <button @click="acceptRequest($el)" data-type="accept" data-patient="{{ $request->patient_id }}" class="accept rounded-lg px-4 text-white py-2 flex 
                                items-center justify-center gap-1 bg-green-400 anim-300 hover:bg-green-600">

                    <i class="bi bi-check-lg"></i>

                    <span class="font-semibold capitalize">
                        accept request
                    </span>

                </button>

                <button @click="rejectRequest($el)" data-type="reject" data-patient="{{ $request->patient_id }}" class="reject rounded-lg px-4 text-white py-2 flex 
                            items-center justify-center gap-1 bg-red-400 anim-300 hover:bg-red-600">

                    <i class="bi bi-x-lg"></i>

                    <span class="font-semibold capitalize">
                        reject request
                    </span>

                </button>

            </div>
        </div>

    </div>

    @endforeach



    @vite('resources/js/doctor/requests.js')

</div>

</x-filament-panels::page>
