<x-custom-layout>

    <div class="content w-full px-0 md:px-5 lg:px-16">

        <div class="w-full">


            <div class="main-info relative shadow-lg overflow-hidden rounded-b-xl w-full h-[50vh]">

                <img class="object-countain w-full h-full object-top w-full" src='{{ asset('media/cover.jpg') }}'
                    alt='Mountain'>


                <div class="p-4 flex items-end justify-between absolute bottom-0 left-0 w-full">

                    <div class="flex items-center flex-row-reverse gap-0">

                        <div class="py-2 pl-6 pr-4 -translate-x-2 bg-white rounded-r-full">
                            <h1 class="text-lg capitalize tracking-wide text-gray-900 font-semibold ">
                                {{ $doctor->name ?? 'karim aouaouda' }}
                            </h1>
                        </div>

                        <div class="w-24 relative h-24 rounded-full shadow overflow-hidden ring-white ring-2">
                            <img class="w-full h-full" src='{{ $doctor->profile_photo_url }}' alt='Woman looking front'>
                        </div>

                    </div>


                    <div class="p-2 flex gap-4">

                        @if (auth('patient')->check())

                            @if (auth('patient')->user()->isMedicalFollow($doctor))
                                <button class="rounded-full h-10  text-sm uppercase px-4 bg-sky-400 text-white">

                                    <i class="bi bi-check2-all text-md mr-1"></i>

                                    <span>
                                        medical followed
                                    </span>

                                </button>
                            @else
                                <button
                                    x-init="sent = $el.dataset.sent"
                                    data-sent="{{ auth('patient')->user()->isMedicalRequestSent($doctor) }}" 
                                    :disabled="load" @click="send($el)"
                                    data-patient="{{ auth('patient')->id() ?? -1 }}"
                                    data-doctor="{{ $doctor->id ?? -1 }}" x-data="MedicalFollowButtonData"
                                    :class="{
                                        'bg-blue-500': !sent,
                                        'bg-sky-400': sent || load,
                                        'cursor-not-allowed': load || sent
                                    }"
                                    class="rounded-full h-10  text-sm uppercase px-4 bg-blue-500 text-white">

                                    <i class="bi text-md mr-1"
                                        :class="{
                                            'bi-check2-all': sent,
                                            'bi-send': !sent
                                        }"></i>
                                    <span x-text="sent ? 'follow request sent' : 'follow request' ">
                                        follow request
                                    </span>
                                </button>
                            @endif
                        @else
                            <a href="{{ route('filament.patient.auth.login') }}"
                                class="block rounded-full h-10 flex items-center  text-sm uppercase px-4 bg-sky-400 text-white">
                                <i class="bi h-full flex items-center bi-check2-all text-md mr-1"></i>
                                <span>
                                    follow request sent
                                </span>
                            </a>

                        @endif

                        @if (false)
                            <button
                                class="rounded-full h-10 flex items-center text-sm uppercase px-4 bg-slate-900 text-white">
                                <i class="bi h-full flex items-center bi-plus-lg mr-1"></i>
                                <span>
                                    Follow
                                </span>
                            </button>
                        @else
                            <button
                                class="rounded-full h-10 flex items-center text-sm uppercase px-4 bg-white text-slate-900">
                                <i class="bi h-full flex items-center bi-check-lg mr-1"></i>
                                <span>
                                    Followed
                                </span>
                            </button>
                        @endif

                        <a href="{{ auth('patient')->check() ? route('filament.patient.pages.dashboard') : route('filament.patient.auth.login') }}"
                            class="rounded-full h-10 flex items-center text-sm uppercase px-4 bg-slate-200 text-gray-800">
                            <i class="bi h-full flex items-center bi-chat text-md mr-1"></i>
                            <span>
                                Message
                            </span>
                        </a>

                    </div>

                </div>

            </div>

            <div class="h-14 w-full border bg-slate-200">

            </div>



        </div>
    </div>

    @vite('resources/js/profile.js')

</x-custom-layout>
