<x-layout :image="$image" :imageFondo="$imageFondo" :socialmedias="$socialmedias" :teams="$teams">
    <x-slot:title>Tournaments</x-slot:title>
    <main class="flex flex-col">
        <x-card>
            <x-slot:show></x-slot:show>
            @include('partials.errors')
            <form method="post" action="{{route('tournaments.store')}}">
                @csrf
                <fieldset>
                    <label for="name">Nombre del torneo:</label><br>
                    <input type="text" name="name" id="name">
                </fieldset>
                <fieldset>
                    <label for="event">Nombre del evento:</label><br>
                    <input id="event" type="text" name="event">
                </fieldset>
                <fieldset>
                    <label for="team_id">Selecciona el equipo</label><br>
                    <select name="team_id" id="team">
                        <option value="">Selecciona un equipo</option>
                        @foreach($teams as $team)
                            <option value="{{$team->id}}">{{$team->name}}</option>
                        @endforeach
                    </select>
                </fieldset>
                <fieldset>
                    <label for="date">Fecha de inicio</label><br>
                    <input id="date" type="date" name="date">
                    <input name="time" type="time">
                </fieldset>

                <input class="buttonBlue" type="submit" value="Enviar">
            </form>
            @include('partials.back')
        </x-card>

    </main>
</x-layout>
