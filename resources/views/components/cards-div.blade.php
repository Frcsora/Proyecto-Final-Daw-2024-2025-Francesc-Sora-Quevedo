<section class="w-full p-2 gap-2 grid grid-cols-1 @isset($images) overflow-x-scroll md:grid-cols-4 @else md:grid-cols-2  @endisset">
   {{$slot}}
</section>
