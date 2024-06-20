<x-filament-panels::page>
    <section x-data="SectionData"
        class="w-full border-black border max-h-screen flex justify-between flex-col items-center mx-auto ">
        <input id="_token" class="hidden" value="{{ csrf_token() }}" />

        <div id="data"
            data-json='{
                    "profile_photo_url" : "{{ cache('profile_picture') }}",
                    "ai_pic" : "{{ cache('ai_profile_picture') }}"}'>
        </div>

        <div class="w-full py-2 border-b border h-18 flex px-4 justify-between items-center">
            <div class="flex items-center gap-2">
                <div class="w-14 h-14 rounded-full border-2 border-sky-500 overflow-hidden">
                    <img src="{{ $other->profile_photo_url }}" class="w-full h-full" alt="logo">
                </div>
                <h1 class="font-semibold capitalize text-xl text-slate-700 tracking-wide">
                    {{ $other->name }}
                </h1>
            </div>


            <div class="flex gap-4 items-center">

                <div class="text-light text-sm text-gray-400">
                    il y a 5min
                </div>

                <div x-data="{open : false}" class="drop-down relative ">
                    <div @click="open = !open" class="toggler cursor-pointer">
                        <i class="bi bi-three-dots-vertical text-xl"></i>
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



        <div id="messages" class="messages-box h-[calc(100vh-8rem)] gap-2  w-full 
                overflow-auto py-2">
            <div class="start-discussion px-20 pt-4">
                {{-- <div class="w-full h-40 bg-slate-200">

            </div> --}}
            </div>

            @foreach ($conversation->chats as $message)
                <div class="message-wrapper">
                    <div class="message flex relative gap-2" x-data="{ 'content': '{{ $message->content }}' }">
                        <div class="chat-pic h-10 w-10 rounded-full overflow-hidden border-sky-500 border-2">
                            <img src="{{ cache('profile_picture') ?? asset('media/ai1.jfif') }}" class="w-full h-full"
                                alt="">
                        </div>
                        <div class="message-content h-fit p-2 rounded-md relative top-2 max-w-[400px]">
                            <x-conversation.alert :chat="$message" />
                        </div>
                        <div x-data="{ open: false }" class="dropdown relative top-2 text-white text-xl cursor-pointer">
                            <i @click="open = !open" class="toggler bi bi-three-dots-vertical"></i>
                            <div x-transition x-show="open"
                                class="menu absolute top-6 left-2 h-auto bg-slate-100 overflow-hidden py-2 rounded-md z-50">
                                <ul class="text-black text-sm font-semibold flex flex-col gap-1">
                                    <li class="hover:bg-slate-200 whitespace-nowrap p-1">
                                        <a href="#" class="w-full h-full">copy</a>
                                    </li>
                                    <li class="hover:bg-slate-200 whitespace-nowrap p-1">
                                        <a href="#" class="w-full h-full">edit & resend</a>
                                    </li>
                                    <li class="hover:bg-slate-200 whitespace-nowrap p-1">
                                        <a href="#" class="w-full h-full">copy</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>

        <div x-data="formData"
            class="form h-16 flex items-center justify-around border border-slate-700 bg-slate-200 py-2 w-full">
            <i @click="isRecording ? stopRecord() : record()" id="mic"
                class="bi bi-mic w-14 flex items-center justify-center text-xl hover:text-sky-700 cursor-pointer"></i>
            <select name="" id="mic-select" hidden></select>
            <span id="progress"></span>
            <div class="inner-form w-full h-full bg-slate-700 overflow-hidden rounded-md pl-4 relative">
                <input type="text" id="formInput" placeholder="tap message ...."
                    class="bg-transparent border-none outline-none w-full h-full focus:ring-0">
            </div>
            <i @click="send()" id="send"
                class="bi bi-send w-14 flex items-center justify-center text-xl hover:text-sky-700 cursor-pointer"></i>
        </div>

    </section>

    @vite('resources/js/chat.js')
</x-filament-panels::page>
