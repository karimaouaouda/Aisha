<x-filament::page>

<div class="flex flex-col gap-3">

    <div class="w-full">

        <div class="p-4 rounded-md bg-white shadow-md w-full">
            <div class="flex flex-col gap-2">
                <h1 class="font-bold text-center text-3xl capitalize text-indigo-600">
                    aisha detect this disease because : 
                </h1>
                <div class="flex flex-col gap-2 text-center">
                    <div class="reason font-semibold text-green-600 flex gap-2 w-full p-2">
                        we found it is a trend disease through : {{ $data->count() }} post analytics
                    </div>
                </div>
            </div>
        </div>

    </div>

    @foreach($data as $analyse)
       <x-filament::section collapsible collapsed>
           <x-slot name="heading">
               analysed on : {{ $analyse->created_at }}
           </x-slot>

           <div class="flex flex-col gap-1 table">
               <div class="row px-2 w-full">
                    <div class="border-b py-2 flex">
                        <div class="h-auto w-52 border-r font-semibold text-slate-800 flex items-center justify-center">
                            summarized text
                        </div>
                        <p class="w-full px-4 h-auto">
                            {{ $analyse->source_text['with_gemini'] }}
                        </p>
                    </div>
               </div>

               <div class="row px-2 w-full">
                <div class="border-b py-2 flex">
                    <div class="h-auto w-52 border-r font-semibold text-slate-800 flex items-center justify-center">
                        diseases
                    </div>
                   <div class="px-4 flex flex-col gap-1">
                        @foreach($analyse->diseases_expected['with_gemini'] as $d => $score)
                            @if($score > 0.02)
                            <div class="disease flex">
                                <div class="text-semibold">
                                    {{ $d }}
                                </div>
                                <span class="mx-4">
                                    ( {{ (int)($score * 100) }}% )
                                </span>
                            </div>
                            @endif
                        @endforeach
                   </div>
                </div>
           </div>
           </div>
       </x-filament::section>
    @endforeach

</div>

</x-filament::page>