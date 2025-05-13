<x-layout :image="$image" :imageFondo="$imageFondo" :socialmedias="$socialmedias">
    <x-slot:title>Teams</x-slot:title>
    <main class="flex flex-col">
        @include('partials.errors')
        <x-card>
            <form method="post" action="{{route('teams.update', $team->id)}}">
                @csrf
                @method('PUT')
                <fieldset>
                    <label for="name">Nombre del equipo</label><br>
                    <input type="text" name="name" value="{{$team->name}}">
                </fieldset>
                <fieldset>
                    <label for="game_id">Selecciona el juego</label><br>
                    <select name="game_id">
                        @foreach($games as $game)
                            <option value="{{$game->id}}"
                                    @if($game->id == $team->game_id)
                                        selected
                                @endif>{{$game->name}}</option>
                        @endforeach
                    </select>
                </fieldset>
                <input class="buttonBlue" type="submit" value="Enviar">
            </form>
        </x-card>
        @include('partials.back')
    </main>
</x-layout>

