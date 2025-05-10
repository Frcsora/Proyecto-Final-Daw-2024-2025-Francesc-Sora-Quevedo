<<<<<<< HEAD
<x-layout :image="$image" :imageFondo="$imageFondo" :socialmedias="$socialmedias">
=======
<x-layout :image="$image" :imageFondo="$imageFondo">
>>>>>>> parent of effacc4 (Revert "Primer commit del proyecto Laravel")
    <x-slot:title>Tags</x-slot:title>
    <main>
        <div class="tarjetero">
            @forelse($newsvar as $news)
                <x-newscard :id="$news->id" :fecha="$news->created_at->format('d M Y H:m:s')" :tags="$news->tags" :name="$news->user->name" :title="$news->title" :img="$news->image" :sinopsis="$news->abstract"></x-newscard>
            @empty
                <h1>No hay noticias que mostrar</h1>
            @endforelse
        </div>
    </main>
</x-layout>

