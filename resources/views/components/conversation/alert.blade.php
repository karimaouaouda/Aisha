<div class=" w-full rounded-lg p-2 bg-red-500 bg-opacity-80">
    
    <div class="flex gap-3 text-center flex-col w-full">

        <h1 class="text-2xl drop-shadow drop-shadow-white tracking-wide font-bold text-red-700">
            {{$title}} !
        </h1>
        <div class="flex text-center justify-center text-white gap-2 items-center">
            <span class="font-semibold tracking-wide">
                topic :
            </span>
            <span>
                {{ $topic }}
            </span>
        </div>
        <p class="text-white min-w-[250px] drop-shadow font-semibold first-line:ml-2">
            {!!$content!!}
        </p>
        <button class="float-right" data-text="{{ $content }}" x-data="listenButtonData" @click="listen($el.dataset.text)">
            <i class="bi bi-headphones hover:bg-slate-200 hover:bg-opacity-30 rounded-full flex items-center justify-center w-6 h-6"></i>
        </button>
    </div>
</div>