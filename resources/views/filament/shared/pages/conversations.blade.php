<x-filament::page>

    <div class="w-full lg:w-4/5 flex flex-col mx-auto bg-white rounded-md shadow-lg  h-full min-h-screen">

        @if($hasConversations)
        <div x-data="{ show: true }" class="w-full h-20 px-4 lg:px-6 flex justify-between  border-b border-slate-400">
            <div class="info relative">
                <div class="toggler flex gap-2 h-full items-center ">
                    <div class="img w-14 h-14 rounded-full border border-sky-500 overflow-hidden">
                        <img src="{{ $other->profile_phote_url }}" class="w-full h-full object-cover" alt="">
                    </div>
                    <div class="flex justify-around flex-col">
                        <h1 class="text-slate-700 font-bold capitalize tracking-wide">
                            {{ $other->name }}
                        </h1>
                        <span class="italic font-light uppercase text-xs text-slate-400">
                            some desc
                        </span>
                    </div>
                    <i :class="{ 'rotate-180': show }" @click="show= !show"
                        class="bi cursor-pointer anim-300 hover:bg-gray-300 bi-chevron-down w-6 h-6 rounded-full flex items-center justify-center bg-gray-200 shadow-md"></i>
                </div>

                <div x-show="show" x-transition
                    class="absolute overflow-auto w-auto p-2 rounded-md bg-slate-100 shadow-md max-h-[20rem] top-4/5 left-0">

                    @foreach ($conversations as $conversation)
                        <a href="?c={{ $conversation->id }}"
                            class="toggler anim-300 hover:bg-slate-200 rounded-md px-4 py-2 flex gap-2 h-full items-center ">
                            <div class="img w-14 h-14 rounded-full border border-sky-500 overflow-hidden">
                                <img src="{{ $conversation->source_conversationable->profile_photo_url }}"
                                    class="w-full h-full object-cover" alt="">
                            </div>
                            <div class="flex justify-around flex-col">
                                <h1 class="text-slate-700 whitespace-nowrap font-bold capitalize tracking-wide">
                                    {{ $conversation->source_conversationable->name }}
                                </h1>
                                <span class="italic font-light uppercase text-xs text-slate-400">
                                    some desc
                                </span>
                            </div>
                        </a>
                    @endforeach

                </div>
            </div>
        </div>


        <div class="flex-1 px-4 py-2">
            @if (count($conversation->chats) <= 0)
                <div class="w-full h-full items-center flex justify-center font-bold text-red-500 tracking-wide">
                    No Messages start now
                </div>
            @else
                @foreach ($conversation->chats as $chat)
                    @php
                        $sent =
                            $message->source_conversationable_type == get_class($user) &&
                            $message->source_conversationable_id == $user->id;
                    @endphp
                    <x-conversation.message :user="$user" :other="$other" :sent="$sent" :chat="$message" />
                @endforeach
            @endif
        </div>

        <div class="w-full h-20 bg-slate-100 ">

        </div>
        @else
        <div class="w-full mt-10 text-center font-extrabold text-red-400 drop-shadow">
            no conversations !
        </div>
        @endif
    </div>

</x-filament::page>
