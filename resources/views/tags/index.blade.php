<x-layout :image="$image" :imageFondo="$imageFondo" :socialmedias="$socialmedias" :teams="$teams">

    <x-slot:title>Tags</x-slot:title>
    <main class="flex flex-col">
        <x-cards-div>
        @forelse($tagsvar as $tag)
            <x-card>
                <p class="text-xl">{{$tag->tag}}</p>
                <a href="{{route('tags.edit', $tag->id)}}">Editar</a>
                <form method="post" action="{{route('tags.destroy', $tag->id)}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg></button>
                </form>
            </x-card>
        @empty
            <h1>No existe ningún tag</h1>
        @endforelse
        </x-cards-div>
        <form action="{{route('tags.create')}}">
            <button title="Añadir red social" class="buttonBlue" type="submit"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z"/></svg></button>
        </form>
        @include('partials.linea')
        @include('partials.status')
        @include('partials.back')
    </main>
</x-layout>

