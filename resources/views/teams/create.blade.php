<x-layout :image="$image" :imageFondo="$imageFondo" :socialmedias="$socialmedias">
    <x-slot:title>Teams</x-slot:title>
    <main class="tarjetero">
        @include('partials.errors')

        <form method="post" action="{{route('teams.store')}}">
            @csrf
            <input type="hidden" value="{{Auth::user()->id}}" name="created_by">
            <fieldset>
                <label for="name">Nombre del equipo</label>
                <input type="text" name="name">
            </fieldset>
            <fieldset>
                <label for="game_id">Selecciona el juego</label>
                <select name="game_id">
                    @foreach($games as $game)
                        <option value="{{$game->id}}">{{$game->name}}</option>
                    @endforeach
                </select>
            </fieldset>
            <input type="submit" value="Enviar">
        </form>
    </main>
</x-layout>

