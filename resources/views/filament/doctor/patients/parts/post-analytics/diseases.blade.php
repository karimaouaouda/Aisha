<div class="max-w-md rounded-xl border bg-white p-6 pb-10 text-gray-900">
    <div class="flex justify-between items-center">
        <p class="text-lg font-medium">
            Patient Summary
        </p>

        <div class="font-semibold text-sky-600 drop-shadow flex items-center gap-2">
            <span class="flex gap-1 ites-center italic">
                <i class="bi bi-check-lg"></i>
                1598
            </span>
            <p>
                disease
            </p>
        </div>
    </div>

    @foreach($diseases as $disease)
    <div class="mt-4">
        <a href="{{ route('filament.doctor.resources.patients.disease', ['disease' => $disease, 'record' => $patient]) }}" class="flex float-left items-center gap-1 hover:gap-2 anim-300">
            <p class=" font-semibold">
    
                {{ $disease }}
            </p>
            <i class="bi bi-chevron-right text-xs"></i>
        </a>
        <span class="float-right mb-2">{{ rand(20, 150) }}</span>
        <div class="h-1.5 w-full overflow-hidden rounded-full bg-gray-50">
            <div class="h-full w-[20%] overflow-hidden rounded-full bg-indigo-600"></div>
        </div>
    </div>
    @endforeach


    <div class="mt-4 w-full text-center">
        <a href="#" class="flex gap-2 items-center text-md font-semibold justify-ceter text-blue-500 hover:text-blue-700 anim-300">
            <span>
                see more
            </span>
            <i class="bi bi-arrow-right"></i>
        </a>
    </div>
</div>
