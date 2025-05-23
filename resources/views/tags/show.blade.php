<x-layout :image="$image" :imageFondo="$imageFondo" :socialmedias="$socialmedias" :teams="$teams">
    <x-slot:title>Tags</x-slot:title>
    <main class="flex flex-col">
        <x-cards-div>
            @forelse($newsvar as $news)
                <x-newscard :id="$news->id" :fecha="$news->created_at->format('d M Y H:m:s')" :tags="$news->tags" :name="$news->user->name" :title="$news->title" :img="$news->image" :sinopsis="$news->abstract"></x-newscard>
            @empty
                <h1>No hay noticias que mostrar</h1>
            @endforelse
        </x-cards-div>
    </main>
</x-layout>

