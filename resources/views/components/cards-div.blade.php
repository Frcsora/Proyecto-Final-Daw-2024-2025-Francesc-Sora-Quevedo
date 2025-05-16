<section class="w-full p-2 gap-2 flex flex-col items-center md:grid @isset($images) overflow-x-scroll md:grid-cols-4 @else md:grid-cols-2  @endisset">
   {{$slot}}
</section>
