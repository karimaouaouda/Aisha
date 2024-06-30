<x-filament::page>
    <div class="flex flex-col gap-2 w-full">
        <div class="user-info flex flex-col w-full overflow-hidden h-96 rounded-lg shadow-md">
            <div class="cover w-full h-2/3 bg-sky-500">
                <img src="{{$user->cover_photo_url?? asset('./images/default_cover.jfif')}}" class="w-full h-full object-cover" alt="cover">
            </div>
            <div class="user-details flex items-center h-1/3 justify-between px-4 lg:px-10">

                <div class="flex gap-2 items-center">
                    <div class="w-24 h-24  shadow-lg rounded-full bg-slate-100 border-2 border-sky-500 overflow-hidden">
                        <img src="{{ $user->profile_photo_url }}" alt="photo profile" class="w-full h-full object-cover">
                    </div>

                    <div class="flex flex-col justify-around">
                        <h1 class="name font-bold text-2xl capitalize text-slate-800">
                            {{ $user->name }}
                        </h1>
                        <span class="text-slate-400 drop-shadow text-xs uppercase">
                            follow {{ $user->doctors()->count() }} doctor
                        </span>
                    </div>
                </div>

                <div class="action flex gap-2 items-center">

                    <a href="#" class="rounded-md p-2 text-white bg-sky-500 shadow-md hover:shadow-lg anim-300 text-sm">
                        <i class="bi bi-graph-up"></i>
                        <span class="capitalize font-semibold">
                            analytics
                        </span>
                    </a>

                    <a href="#" class="rounded-md p-2 text-slate-700 bg-slate-300 shadow-md hover:shadow-lg anim-300 text-sm">
                        <i class="bi bi-chat"></i>
                        <span class="capitalize font-semibold">
                            message
                        </span>
                    </a>
                    
                    <button class="rounded-md p-2 text-white hover:shadow-lg anim-300 bg-red-500 bg-opacity-70 shadow-md text-sm">
                        <i class="bi bi-flag"></i>
                        <span class="capitalize font-semibold">
                            report
                        </span>
                    </button>

                </div>

            </div>
        </div>

        <div class="flex gap-4">

            <div class="w-full p-4 lg:w-96 rounded-lg bg-white shadow-md flex flex-col">
                <h1 class="text-center uppercase font-semibold text-sky-600 drop-shadow text-lg">
                    patient info
                </h1>

                <div class="list flex flex-col gap-2 mt-4">
                    <div class="flex gap-2 w-full justify-center items-center">
                        <span class="text-lg uppercase font-semibold">
                            age :
                        </span>
                        <span class="text-green-600 font-semibold">
                            56 ans
                        </span>
                    </div>

                    <div class="flex gap-2 w-full justify-center items-center">
                        <span class="text-lg uppercase font-semibold">
                            height :
                        </span>
                        <span class="text-green-600 font-semibold">
                            180 cm
                        </span>
                    </div>

                    <div class="flex gap-2 w-full justify-center items-center">
                        <span class="text-lg uppercase font-semibold">
                            weight :
                        </span>
                        <span class="text-green-600 font-semibold">
                            81 kg
                        </span>
                    </div>

                    <div class="flex gap-2 w-full justify-center items-center">
                        <span class="text-lg uppercase font-semibold">
                            age :
                        </span>
                        <span class="text-green-600 font-semibold">
                            56 ans
                        </span>
                    </div>

                </div>
            </div>

            <div class="bg-white rounded-lg shadow-md flex justify-around items-center p-4 flex-1">
                <div class="flex flex-col gap-3 items-center">
                    <i class="bi bi-chat text-4xl drop-shadow"></i>
                    <h1 class="text-2xl font-bold uppercase">
                        {{ $user->messages()->count() }} Message
                    </h1>
                </div>

                <div class="flex flex-col text-sky-500 gap-3 items-center">
                    <i class="bi bi-smartwatch text-4xl drop-shadow"></i>
                    <h1 class="text-2xl font-bold uppercase">
                        2 iot devices
                    </h1>
                </div>

                <div class="flex flex-col gap-3 items-center text-green-700">
                    <i class="bi bi-patch-check text-4xl drop-shadow"></i>
                    <h1 class="text-2xl font-bold uppercase">
                        verified
                    </h1>
                </div>
            </div>
        </div>
    </div>
</x-filament::page>