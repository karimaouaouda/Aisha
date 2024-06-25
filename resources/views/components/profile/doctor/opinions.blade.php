<div class="w-full px-4 flex mt-4">
    <div class="content h-auto flex flex-wrap justify-around mt-4 gap-4 flex-1">

        @for($i = 0; $i < 10; $i++)
            <x-profile.doctor.parts.opinion/>
        @endfor

    </div>


</div>