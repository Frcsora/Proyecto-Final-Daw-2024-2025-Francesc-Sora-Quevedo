<x-layout :image="$image" :imageFondo="$imageFondo" :socialmedias="$socialmedias" :teams="$teams">
    <x-slot:title>Players</x-slot:title>
    <main class="flex- flex-col">
        @include('partials.errors')
        <x-card>
            <x-slot:show></x-slot:show>

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
                    <input type="file" id="imagen" name="imagen">
                    <input type="hidden" name="image" id="image">
                </fieldset>
                <input type="hidden" value="{{session()->get('team_id')}}" name="team_id">
                <input class="buttonBlue" type="submit" value="Añadir jugador">
            </form>
        </x-card>
        @include('partials.back')
    </main>
</x-layout>

