<x-layout :image="$image" :imageFondo="$imageFondo" :socialmedias="$socialmedias" :teams="$teams">
    <x-slot:title>Teams</x-slot:title>
    <main class="flex flex-col items-center">
        @include('partials.errors')
        <x-card>
            <x-slot:show></x-slot:show>

            <form method="post" action="{{route('teams.store')}}">
                @csrf
                <input type="hidden" value="{{Auth::user()->id}}" name="created_by">
                <fieldset>
                    <label for="name">Nombre del equipo</label><br>
                    <input type="text" name="name">
                </fieldset>
                <fieldset>
                    <label for="game_id">Selecciona el juego</label><br>
                    <select name="game_id">
                        @foreach($games as $game)
                            <option value="{{$game->id}}">{{$game->name}}</option>
                        @endforeach
                    </select>
                </fieldset>
                <input class="buttonBlue" type="submit" value="Enviar">
            </form>
        </x-card>
        @include('partials.back')
    </main>
</x-layout>

