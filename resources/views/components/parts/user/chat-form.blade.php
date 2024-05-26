<section class="w-screen max-h-screen flex justify-between flex-col items-center
                lg:w-2/3 mx-auto ">
                <input id="_token" value="{{ csrf_token() }}" />
    <div class="chat-header w-full h-16 border bg-slate-200">

    </div>

    <div id="messages" class="messages-box h-[calc(100vh-8rem)] gap-2 bg-slate-800  w-full 
                overflow-auto py-2">
        <div class="start-discussion px-20 pt-4">
            {{-- <div class="w-full h-40 bg-slate-200">

            </div> --}}
        </div>

        <div class="message-wrapper">
            <div class="message flex relative gap-2">
                <div class="chat-pic h-10 w-10 rounded-full overflow-hidden border-sky-500 border-2">
                    <img src="{{asset('media/pic.jfif')}}" class="w-full h-full" alt="">
                </div>
                <div class="message-content h-fit bg-blue-700 text-white p-2 rounded-md relative top-2 max-w-[400px]">
                    this is a smoe message that is not important right now but i just wrote it to fill the div
                    with some random text, please take advantage to see 
                </div>
                <div x-data="{open : false}" class="dropdown relative top-2 text-white text-xl cursor-pointer">
                    <i @click="open = !open" class="toggler bi bi-three-dots-vertical"></i>
                    <div x-transition x-show="open" class="menu absolute top-6 left-2 h-auto bg-slate-100 overflow-hidden py-2 rounded-md z-50">
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
        <div class="message-wrapper">
            <div class="message flex flex-row-reverse relative gap-2">
                <div class="chat-pic h-10 w-10 rounded-full overflow-hidden border-sky-500 border border-2">
                    <img src="{{asset('media/ai1.jfif')}}" class="w-full h-full" alt="">
                </div>
                <div class="message-content h-fit bg-gray-300 p-2 rounded-md relative top-2 max-w-[400px]">
                    this is a smoe message that is not important right now but i just wrote it to fill the div
                    with some random text, please take advantage to see 
                </div>
                <div x-data="{open : false}" class="dropdown relative top-2 text-white text-xl cursor-pointer">
                    <i @click="open = !open" class="toggler bi bi-three-dots-vertical"></i>
                    <div x-transition x-show="open" class="menu absolute top-6 left-2 h-auto bg-slate-100 overflow-hidden py-2 rounded-md z-50">
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

        <div class="message-wrapper">
            <div class="message audio flex relative gap-2">
                <div class="chat-pic h-10 w-10 rounded-full overflow-hidden border-sky-500 border-2">
                    <img src="{{asset('media/pic.jfif')}}" class="w-full h-full" alt="">
                </div>
                <div class="message-content min-h-full h-fit bg-blue-700 text-white rounded-md relative max-w-[400px]">
                    <div class="h-12 p-2 flex items-center">
                        <i class="bi bi-play-fill text-white text-xl cursor-pointer"></i>
                        <div class="w-40 border h-full">

                        </div>
                    </div>
                </div>
                <div x-data="{open : false}" class="dropdown relative top-2 text-white text-xl cursor-pointer">
                    <i @click="open = !open" class="toggler bi bi-three-dots-vertical"></i>
                    <div x-transition x-show="open" class="menu absolute top-6 left-2 h-auto bg-slate-100 overflow-hidden py-2 rounded-md z-50">
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
        
    </div>

    <div x-data="formData" class="form h-16 flex items-center justify-around border border-slate-700 bg-slate-200 py-2 w-full">
        <i @click="isRecording ? stopRecord() : record()" id="mic" class="bi bi-mic w-14 flex items-center justify-center text-xl hover:text-sky-700 cursor-pointer"></i>
        <select name="" id="mic-select" hidden></select>
        <span id="progress"></span>
        <div class="inner-form w-full h-full bg-slate-700 overflow-hidden rounded-md pl-4 relative">
            <input type="text" id="formInput" placeholder="tap message ...." class="bg-transparent border-none outline-none w-full h-full focus:ring-0">
        </div>
        <i @click="send()" id="send" class="bi bi-send w-14 flex items-center justify-center text-xl hover:text-sky-700 cursor-pointer"></i>
    </div>
</section>

@vite('resources/js/chat.js')