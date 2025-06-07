<x-layout :image="$image" :imageFondo="$imageFondo" :socialmedias="$socialmedias" :teams="$teams" >
    <x-slot:title>Players</x-slot:title>
    <main class="flex flex-col items-center">
        <x-card>
            <x-slot:show></x-slot:show>

            @include('partials.errors')
            <form id="formImage" method="post" action="{{route('players.update', $player->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <fieldset>
                    <label for="name">Nombre:</label><br>
                    <input type="text" name="name" value="{{$player->name}}">
                </fieldset>
                <fieldset>
                    <label for="surname1">Primer apellido:</label><br>
                    <input type="text" name="surname1" value="{{$player->surname1}}">
                </fieldset>
                <fieldset>
                    <label for="surname2">Segundo apellido:</label><br>
                    <input type="text" name="surname2" value="{{$player->surname2}}">
                </fieldset>
                <fieldset>
                    <label for="nickname">Nickname:</label><br>
                    <input type="text" name="nickname" value="{{$player->nickname}}">
                </fieldset>
                <fieldset id="dropeo">
                    <label for="image">Imagen:</label><br>
                    <input type="file" id="imagen" name="imagen">
                    <input type="hidden" name="image" id="image" value="{{$player->image}}">
                </fieldset>
                <fieldset>
                    <label for="team">Equipo:</label><br>
                    <select name="team">
                        @foreach($teams as $team)
                            <option value="{{$team->id}}" @if($team->id == $player->team_id) selected @endif >{{$team->name}}</option>
                        @endforeach
                    </select>
                </fieldset>
                <fieldset>
                    <label for="role">Rol:</label><br>
                    <input type="text" id="role" name="role" value="{{$player->role}}">
                </fieldset>
                <fieldset>
                    <label for="description">Descripción:</label><br>
                    <input type="text" name="description" id="description" value="{{$player->description}}">
                </fieldset>
                <input class="buttonBlue" type="submit" value="Enviar">
            </form>
            @include('partials.back')
        </x-card>
    </main>
</x-layout>

