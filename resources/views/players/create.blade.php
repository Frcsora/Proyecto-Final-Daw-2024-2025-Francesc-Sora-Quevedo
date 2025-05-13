<x-layout :image="$image" :imageFondo="$imageFondo" :socialmedias="$socialmedias">
    <x-slot:title>Players</x-slot:title>
    <main class="flex- flex-col">
        @include('partials.errors')
        <x-card>
            <form id="formImage" method="post" action="{{route('players.store')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{Auth::user()->id}}" name="created_by">
                <fieldset>
                    <label for="name">Nombre:</label><br>
                    <input type="text" name="name">
                </fieldset>
                <fieldset>
                    <label for="surname1">Primer apellido:</label><br>
                    <input type="text" name="surname1">
                </fieldset>
                <fieldset>
                    <label for="surname2">Segundo apellido:</label><br>
                    <input type="text" name="surname2">
                </fieldset>
                <fieldset>
                    <label for="nickname">Nickname:</label><br>
                    <input type="text" name="nickname">
                </fieldset>
                <fieldset id="dropeo">
                    <label for="image">Imagen:</label><br>
                    <input type="file" id="imagen" name="imagen" alt="imagen noticia">
                    <input type="hidden" name="image" id="image">
                </fieldset>
                <fieldset>
                    <label for="team">Equipo:</label><br>
                    <select name="team">
                        @foreach($teams as $team)
                            <option value="{{$team->id}}">{{$team->name}}</option>
                        @endforeach
                    </select>
                </fieldset>
                <input class="buttonBlue" type="submit" value="Enviar">
            </form>
        </x-card>
        @include('partials.back')
    </main>
</x-layout>

