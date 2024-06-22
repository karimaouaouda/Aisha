<div class="message-wrapper">
    <div class="message flex relative gap-2" @class([
    'flex-row-reverse' => !$sent
]) x-data="{ 'content': '{{ is_array($parts) ? $parts['content'] : $parts }}' }">
        <div class="chat-pic h-10 w-10 rounded-full overflow-hidden border-sky-500 border-2">
            <img src="{{ cache('profile_picture') ?? asset('media/ai1.jfif') }}" class="w-full h-full"
                alt="">
        </div>
        <div class="message-content h-fit p-2 rounded-md relative top-2 max-w-[400px]">
            @switch($type)

                @case(\App\Enums\ChatTypes::ALERT->value)
                    <x-conversation.alert :topic="$parts['topic']" :title="$parts['title']" :content="$parts['content']" />
                @break
                @case(\App\Enums\ChatTypes::REQUEST->value)
                    request message
                @break
                @default
                normal message
            @endswitch
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
