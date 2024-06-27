<div class="flex items-center gap-1">
    <div class="rounded-full border border-sky-500 w-6 h-6 overflow-hidden">
        <img src="{{ $user->profile_photo_url }}" alt="logo" class="w-full h-full object-cover">
    </div>

    <span class="font-semibold text-slate-800 capitalize text-sm">
        {{ $user->name ?? 'helo'}}
    </span>
</div>