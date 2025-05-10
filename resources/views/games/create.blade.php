<x-layout :image="$image" :imageFondo="$imageFondo" :socialmedias="$socialmedias">
    <x-slot:title>Games</x-slot:title>
    @include('partials.errors')
    <form method="post" action="{{route('games.store')}}">
        @csrf
        <label for="name">Nombre del juego</label>
        <input type="text" id="tag" name="name">
        <input type="submit" value="Crear">
    </form>
</x-layout>

