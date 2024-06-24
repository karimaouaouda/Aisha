<div class="w-full px-4 flex mt-4">

    <div class="sections sticky top-10 w-72 border-r  flex flex-col gap-4">
        <div class="w-full text-left py-4 text-xl font-bold tracking-wide">
            Navigate
        </div>
        <a href="#work" class="w-full p-2 rounded-md border-md items-center anim-300 hover:bg-slate-300 flex gap-2">
            <i class="bi bi-briefcase text-lg"></i>
            <span class="font-semibold uppercase tracking-wide text-sm">
                work details
            </span>
        </a>

        <a href="#local" class="w-full p-2 rounded-md border-md items-center anim-300 hover:bg-slate-300 flex gap-2">
            <i class="bi bi-geo-alt text-lg"></i>
            <span class="font-semibold uppercase tracking-wide text-sm">
                localization
            </span>
        </a>

        <a href="#studies" class="w-full p-2 rounded-md border-md items-center anim-300 hover:bg-slate-300 flex gap-2">
            <i class="bi bi-journal text-lg"></i>
            <span class="font-semibold uppercase tracking-wide text-sm">
                studies
            </span>
        </a>
        
        <a href="#researchs" class="w-full p-2 rounded-md border-md items-center anim-300 hover:bg-slate-300 flex gap-2">
            <i class="bi bi-pen text-lg"></i>
            <span class="font-semibold uppercase tracking-wide text-sm">
                reserches and academic work
            </span>
        </a>

    </div>

    <div class="content h-auto flex flex-col mt-4 gap-4 flex-1">

        <div class="w-full md:w-4/5 p-4 gap-3 flex flex-col  rounded-xl mx-auto">
            <div class="w-full h-14 rounded-md overflow-hidden border relative shadow">
                <input type="text" class="w-full h-full border-none bg-transparent outline-none px-2 text-lg" placeholder="search by title, subject ....">
                
                <i class="bi bi-search text-xl absolute right-0 top-0 h-full px-4 flex items-center"></i>
            </div>
        </div>

        @if( $doctor->has_articles )
            @foreach($doctor->articles as $article)
                <x-profile.doctor.parts.article :article="$article"/>
            @endforeach
        @endif

        @for($i = 0; $i < 10; $i++)
            <x-profile.doctor.parts.article/>
        @endfor

    </div>


</div>