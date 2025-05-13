<x-layout :image="$image" :imageFondo="$imageFondo" :socialmedias="$socialmedias">
    <x-slot:title>Games</x-slot:title>
    <main class="flex flex-col">
        <x-card>
            @include('partials.errors')
            <form method="post" action="{{route('games.store')}}">
                @csrf
                <label for="name">Nombre del juego</label>
                <input type="text" id="tag" name="name">
                <input class="buttonBlue" type="submit" value="Crear">
            </form>
            @include('partials.back')
        </x-card>
    </main>
</x-layout>

