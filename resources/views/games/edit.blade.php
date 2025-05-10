<x-layout :image="$image" :imageFondo="$imageFondo" :socialmedias="$socialmedias">
    <x-slot:title>Games</x-slot:title>
    @include('partials.errors')
    <form method="post" action="{{route('games.update', $game->id)}}">
        @csrf
        @method('PUT')
        <label for="name">Nombre del juego</label>
        <input type="text" id="game" name="name" value="{{$game->name}}">
        <input type="submit" value="Editar">
    </form>
</x-layout>

