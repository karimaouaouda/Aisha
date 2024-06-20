<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @vite('resources/css/app.css')

    <title>Document</title>
</head>

<body class="w-screen h-screen overflow-x-hidden overflow-y-auto">

    <div class="wrapper w-screen min-h-screen overflow-x-hidden overflow-y-auto">

        {{-- start navbar --}}

        <nav class="w-full h-16 bg-emerald-300">
            <div class="w-full h-full px-2 md:px-10 lg:px-16">
                <div class="w-full h-full flex justify-between items-center">
                    <div class="brand">
                        <a href="{{ url('/') }}" class="font-extrabold tracking-wide text-white text-2xl">
                            <em class="text-sky-500">C</em>hat<em class="text-sky-500">P</em>y
                        </a>
                    </div>

                    <div class="tabs">
                        <a href="#" class="tab-item w-full h-full">
                            Home
                        </a>

                        <a href="#" class="tab-item w-full h-full">
                            Feautures
                        </a>

                        <a href="#" class="tab-item w-full h-full">
                            Testimonials
                        </a>

                        <a href="#" class="tab-item w-full h-full">
                            Team
                        </a>

                        <a href="#" class="tab-item w-full h-full">
                            About us
                        </a>


                        <a href="#" class="tab-item w-full h-full">
                            Contact
                        </a>
                    </div>

                    <div class="auth">

                        @if (!is_anyone_auth())
                            <a href="{{ route('filament.patient.auth.register') }}">
                                <i class="bi bi-person"></i>
                            </a>
                        @else
                            <div class="flex gap-2 items-center">
                                <div class="dropdown relative" x-data="{ open: false }">
                                    <div class="toggler" @click="open = !open">
                                        <i class="bi bi-person-circle text-xl text-white cursor-pointer"></i>
                                    </div>
                                    <div class="dropdown-menu flex flex-col p-2 rounded-lg right-0 top-full text-sm absolute bg-slate-100"
                                        x-show="open">

                                        <a
                                            class="px-2 cursor-pointer whitespace-nowrap py-1 rounded-md hover:bg-slate-200 flex gap-2 anim-300">

                                            <i class="bi bi-sliders text-sky-400"></i>

                                            <span class="font-normal text-sky-400">
                                                Dashboard
                                            </span>
                                        </a>

                                        <a
                                            class="px-2 cursor-pointer whitespace-nowrap py-1 rounded-md hover:bg-slate-200 flex gap-2 anim-300">

                                            <i class="bi bi-person text-sky-400"></i>

                                            <span class="font-normal text-sky-400">
                                                Profile
                                            </span>
                                        </a>

                                        <a
                                            class="px-2 cursor-pointer whitespace-nowrap py-1 rounded-md hover:bg-slate-200 flex gap-2 anim-300">

                                            <i class="bi bi-gear text-sky-400"></i>

                                            <span class="font-normal text-sky-400">
                                                settings
                                            </span>
                                        </a>

                                        <div class="w-full h-px bg-red-500 my-2"></div>

                                        <a
                                            class="px-2 cursor-pointer whitespace-nowrap py-1 rounded-md bg-red-400 bg-opacity-40 text-white hover:bg-red-600 flex gap-2 anim-300">

                                            <i class="bi bi-gear text-sky-400"></i>

                                            <span class="font-normal text-sky-400">
                                                log out
                                            </span>
                                        </a>

                                    </div>
                                </div>


                                <div class="dropdown relative" x-data="{ open: false }">
                                    <div class="toggler" @click="open = !open">
                                        <i class="bi bi-person-circle text-xl text-white cursor-pointer"></i>
                                    </div>
                                    <div class="dropdown-menu flex flex-col p-2 rounded-lg right-0 top-full text-sm absolute bg-slate-100"
                                        x-show="open">

                                        <a
                                            class="px-2 cursor-pointer whitespace-nowrap py-1 rounded-md hover:bg-slate-200 flex gap-2 anim-300">

                                            <i class="bi bi-sliders text-sky-400"></i>

                                            <span class="font-normal text-sky-400">
                                                Dashboard
                                            </span>
                                        </a>

                                        <a
                                            class="px-2 cursor-pointer whitespace-nowrap py-1 rounded-md hover:bg-slate-200 flex gap-2 anim-300">

                                            <i class="bi bi-person text-sky-400"></i>

                                            <span class="font-normal text-sky-400">
                                                Profile
                                            </span>
                                        </a>

                                        <a
                                            class="px-2 cursor-pointer whitespace-nowrap py-1 rounded-md hover:bg-slate-200 flex gap-2 anim-300">

                                            <i class="bi bi-gear text-sky-400"></i>

                                            <span class="font-normal text-sky-400">
                                                settings
                                            </span>
                                        </a>

                                        <div class="w-full h-px bg-red-500 my-2"></div>

                                        <a
                                            class="px-2 cursor-pointer whitespace-nowrap py-1 rounded-md bg-red-400 bg-opacity-40 text-white hover:bg-red-600 flex gap-2 anim-300">

                                            <i class="bi bi-gear text-sky-400"></i>

                                            <span class="font-normal text-sky-400">
                                                log out
                                            </span>
                                        </a>

                                    </div>
                                </div>

                                <div class="dropdown relative" x-data="{ open: false }">
                                    <div class="toggler" @click="open = !open">
                                        <i class="bi bi-person-circle text-xl text-white cursor-pointer"></i>
                                    </div>
                                    <div class="dropdown-menu flex flex-col p-2 rounded-lg right-0 top-full text-sm absolute bg-slate-100"
                                        x-show="open">

                                        <a
                                            class="px-2 cursor-pointer whitespace-nowrap py-1 rounded-md hover:bg-slate-200 flex gap-2 anim-300">

                                            <i class="bi bi-sliders text-sky-400"></i>

                                            <span class="font-normal text-sky-400">
                                                Dashboard
                                            </span>
                                        </a>

                                        <a
                                            class="px-2 cursor-pointer whitespace-nowrap py-1 rounded-md hover:bg-slate-200 flex gap-2 anim-300">

                                            <i class="bi bi-person text-sky-400"></i>

                                            <span class="font-normal text-sky-400">
                                                Profile
                                            </span>
                                        </a>

                                        <a
                                            class="px-2 cursor-pointer whitespace-nowrap py-1 rounded-md hover:bg-slate-200 flex gap-2 anim-300">

                                            <i class="bi bi-gear text-sky-400"></i>

                                            <span class="font-normal text-sky-400">
                                                settings
                                            </span>
                                        </a>

                                        <div class="w-full h-px bg-red-500 my-2"></div>

                                        <a
                                            class="px-2 cursor-pointer whitespace-nowrap py-1 rounded-md bg-red-400 bg-opacity-40 text-white hover:bg-red-600 flex gap-2 anim-300">

                                            <i class="bi bi-gear text-sky-400"></i>

                                            <span class="font-normal text-sky-400">
                                                log out
                                            </span>
                                        </a>

                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </nav>

        {{-- end navbar --}}

        {{ $slot }}

        @vite('resources/js/alpine.js')
    </div>
</body>

</html>
