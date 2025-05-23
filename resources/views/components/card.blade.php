<section class="w-64 gap-5 rounded p-2 flex flex-col justify-around items-center relative before:absolute before:rounded-2xl before:opacity-80 before:bg-[wheat] before:p-2 before:w-full before:h-full before:content[''] before:z-[-1]  @isset($patreon) h-75 w-64 md:w-96 @endisset @isset($show) md:w-full @endisset">
{{$slot}}
</section>
