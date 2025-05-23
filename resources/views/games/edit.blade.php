
<x-layout :image="$image" :imageFondo="$imageFondo" :socialmedias="$socialmedias" :teams="$teams">
    <x-slot:title>Games</x-slot:title>
    <main class="flex flex-col items-center">
        <x-card>
            <x-slot:show></x-slot:show>


            @include('partials.errors')
            <form method="post" action="{{route('games.update', $game->id)}}">
                @csrf
                @method('PUT')
                <label for="name">Nombre del juego</label>
            <input type="text" id="game" name="name" value="{{$game->name}}"><br>
            <input class="buttonBlue" type="submit" value="Crear">
            </form>
            @include('partials.back')
        </x-card>
    </main>
</x-layout>

