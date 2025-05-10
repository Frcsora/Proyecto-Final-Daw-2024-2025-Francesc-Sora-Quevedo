<x-layout :image="$image" :imageFondo="$imageFondo" :socialmedias="$socialmedias">
    <x-slot:title>Players</x-slot:title>
    <main class="tarjetero">
        @include('partials.errors')
        <form id="formImage" method="post" action="{{route('players.update', $player->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <fieldset>
                <label for="name">Nombre:</label>
                <input type="text" name="name" value="{{$player->name}}">
            </fieldset>
            <fieldset>
                <label for="surname1">Primer apellido:</label>
                <input type="text" name="surname1" value="{{$player->surname1}}">
            </fieldset>
            <fieldset>
                <label for="surname2">Segundo apellido:</label>
                <input type="text" name="surname2" value="{{$player->surname2}}">
            </fieldset>
            <fieldset>
                <label for="nickname">Nickname:</label>
                <input type="text" name="nickname" value="{{$player->nickname}}">
            </fieldset>
            <fieldset id="dropeo">
                <label for="image">Imagen:</label>
                <input type="file" id="imagen" name="imagen">
                <input type="hidden" name="image" id="image" value="{{$player->image}}">
            </fieldset>
            <fieldset>
                <label for="team">Equipo:</label>
                <select name="team">
                    @foreach($teams as $team)
                        <option value="{{$team->id}}" @if($team->id == $player->team_id) selected @endif >{{$team->name}}</option>
                    @endforeach
                </select>
            </fieldset>
            <input type="submit" value="Enviar">
        </form>
    </main>
</x-layout>

