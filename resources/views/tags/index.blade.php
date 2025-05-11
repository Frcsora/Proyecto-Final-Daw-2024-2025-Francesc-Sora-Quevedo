<x-layout :image="$image" :imageFondo="$imageFondo" :socialmedias="$socialmedias">

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
                    <button class="buttonRed" type="submit"><svg class="w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M376.6 84.5c11.3-13.6 9.5-33.8-4.1-45.1s-33.8-9.5-45.1 4.1L192 206 56.6 43.5C45.3 29.9 25.1 28.1 11.5 39.4S-3.9 70.9 7.4 84.5L150.3 256 7.4 427.5c-11.3 13.6-9.5 33.8 4.1 45.1s33.8 9.5 45.1-4.1L192 306 327.4 468.5c11.3 13.6 31.5 15.4 45.1 4.1s15.4-31.5 4.1-45.1L233.7 256 376.6 84.5z"/></svg></button>
                </form>
            </x-card>
        @empty
            <h1>No existe ningún tag</h1>
        @endforelse
        </x-cards-div>
        @include('partials.linea')
        <a href="{{route('tags.create')}}">Crear</a>
        @include('partials.status')
        @include('partials.back')
    </main>
</x-layout>

