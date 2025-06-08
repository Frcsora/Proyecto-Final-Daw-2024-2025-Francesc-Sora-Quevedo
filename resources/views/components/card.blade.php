<section class="w-64 gap-5 rounded-2xl p-5 flex flex-col justify-around items-center relative before:absolute before:rounded-2xl before:opacity-80 before:bg-[wheat] before:p-2 before:w-full before:h-full before:content[''] before:z-[-1] shadow-md border border-gray-200 @isset($tarjeta) sm:w-full @endisset  @isset($patreon) h-75 w-64 md:w-full @endisset @isset($show) md:w-full @endisset">
{{$slot}}
</section>
