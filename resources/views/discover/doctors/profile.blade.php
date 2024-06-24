<x-layouts.wrapper>

    <div class="content w-full px-0 md:px-5 lg:px-16" x-data="{section : '{{ $section }}'}">

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
                                        'cursor-not-allowed': load || $el.dataset.sent == '1'
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
                                    medical follow
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

            <div class="min-h-screen relative w-full border bg-[#e1ebfa]">
                <div class="w-full px-4 flex items-center py-4 justify-between border-b border-sky-200 shadow-sm">
                    <div class="flex gap-3 items-center h-full">
                        <div class="font-semibold pr-2 border-r  shadow-r">
                            discover 
                        </div>
    
                        <div class="flex gap-2 md:gap-4 lg:gap-6 items-center h-full">
    
                            <a href="{{ $section == 'about' ? '#' : route('doctor.profile', ['doctor' => $doctor->id, 'section' => 'about']) }}" class="about cursor-pointer decoration-none px-4 py-2 rounded-md font-semibold capitalize hover:bg-slate-300 anim-300" 
                                data-name="about"
                                :class="{
                                    'border-b-2 border-sky-400 shadow-b !rounded-none text-sky-400' : section == $el.dataset.name
                                }"
                                x-text="$el.dataset.name">
                                
                            </a>
    
                            <a href="{{ $section == 'opinions' ? '#' : route('doctor.profile', ['doctor' => $doctor->id, 'section' => 'opinions']) }}" class="about cursor-pointer decoration-none px-4 py-2 rounded-md font-semibold capitalize hover:bg-slate-300 anim-300" 
                                data-name="opinions"
                                :class="{
                                    'border-b-2 border-sky-400 shadow-b !rounded-none text-sky-400' : section == $el.dataset.name
                                }"
                                x-text="$el.dataset.name">
                                
                            </a>
    
                            <a href="{{ $section == 'posts' ? '#' : route('doctor.profile', ['doctor' => $doctor->id, 'section' => 'posts']) }}" class="about cursor-pointer decoration-none px-4 py-2 rounded-md font-semibold capitalize hover:bg-slate-300 anim-300" 
                                data-name="posts"
                                :class="{
                                    'border-b-2 border-sky-400 shadow-b !rounded-none text-sky-400' : section == $el.dataset.name
                                }"
                                x-text="$el.dataset.name">
                                
                            </a>
    
                            <a href="{{ $section == 'articles' ? '#' : route('doctor.profile', ['doctor' => $doctor->id, 'section' => 'articles']) }}" class="about cursor-pointer decoration-none px-4 py-2 rounded-md font-semibold capitalize hover:bg-slate-300 anim-300" 
                                data-name="articles"
                                :class="{
                                    'border-b-2 border-sky-400 shadow-b !rounded-none text-sky-400' : section == $el.dataset.name
                                }"
                                x-text="$el.dataset.name">
                                
                            </a>

                            <a  href="{{ $section == 'media' ? '#' : route('doctor.profile', ['doctor' => $doctor->id, 'section' => 'media']) }}" class="about cursor-pointer decoration-none px-4 py-2 rounded-md font-semibold capitalize hover:bg-slate-300 anim-300" 
                                data-name="media"
                                :class="{
                                    'border-b-2 border-sky-400 shadow-b !rounded-none text-sky-400' : section == $el.dataset.name
                                }"
                                x-text="$el.dataset.name">
                                
                            </a>
    
                            {{-- <a class="about decoration-none px-4 py-2 rounded-md font-semibold capitalize hover:bg-slate-300 anim-300" 
                                data-name="about"
                                :class="{
                                    'border-b-2 border-sky-400 shadow-b !rounded-none' : section == $el.dataset.name
                                }">
                                
                            </a> --}}
    
                        </div>
                    </div>

                    <div class="actions flex gap-3">
                        <div class="signaler items-center cursor-pointer text-red-500 hover:text-red-700 anim-300 flex gap-1 text-lg">
                            <i class="bi bi-flag"></i>
                            <span class="font-semibold hidden md:block">
                                report
                            </span>
                        </div>

                        <div class="signaler items-center cursor-pointer text-yellow-400 hover:text-yellow-500 anim-300 flex gap-1 text-lg">
                            <i class="bi bi-star"></i>
                            <span class="font-semibold hidden md:block">
                                rate
                            </span>
                        </div>

                    </div>
                </div>

                <div class="w-full">

                    @switch($section)
                            @case('about')
                                <x-profile.doctor.about :doctor="$doctor"/>
                                @break
                            @case('opinions')
                                <x-profile.doctor.opinions :doctor="$doctor"/>
                                @break
                            @case('posts')
                                <x-profile.doctor.posts :doctor="$doctor"/>
                                @break
                            @case('articles')
                                <x-profile.doctor.articles :doctor="$doctor"/>
                                @break
                            @case('media')
                                <x-profile.doctor.media :doctor="$doctor"/>
                                @break
                            @default
                            <x-profile.doctor.about :doctor="$doctor"/>
                        @endswitch

                </div>
            </div>



        </div>
    </div>

    @vite('resources/js/doctor/profile.js')

</x-layouts.wrapper>
