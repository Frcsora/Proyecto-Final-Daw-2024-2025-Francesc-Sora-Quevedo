<<<<<<< HEAD
<x-layout :image="$image" :imageFondo="$imageFondo" :socialmedias="$socialmedias">
    <x-slot:title>News</x-slot:title>
    <main>
        <div class="tarjetero">
=======
<x-layout :image="$image" :imageFondo="$imageFondo">
    <x-slot:title>News</x-slot:title>

    <main>

        <div class="tarjetero">

>>>>>>> parent of effacc4 (Revert "Primer commit del proyecto Laravel")
            @forelse($newsvar as $news)
                <x-newscard :id="$news->id" :fecha="$news->created_at->format('d M Y H:m:s')" :tags="$news->tags" :name="$news->user->name" :title="$news->title" :img="$news->image" :sinopsis="$news->abstract"></x-newscard>
            @empty
                <h1>No hay noticias que mostrar</h1>
            @endforelse
        </div>
    </main>
<<<<<<< HEAD
    @include('partials.status')
=======

>>>>>>> parent of effacc4 (Revert "Primer commit del proyecto Laravel")
</x-layout>

