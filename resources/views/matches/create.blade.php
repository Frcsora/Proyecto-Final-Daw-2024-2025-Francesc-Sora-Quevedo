<x-layout :image="$image" :imageFondo="$imageFondo" :socialmedias="$socialmedias" :teams="$teams">
    <x-slot:title>Tournaments</x-slot:title>
    <main class="flex flex-col items-center">
        <x-card>
            <x-slot:show></x-slot:show>
            @include('partials.errors')
            <form method="post" action="{{route('matches.store')}}">
                @csrf
                <fieldset>
                    <label for="date">Fecha del partido</label><br>
                    <input id="date" type="date" name="date">
                    <input name="time" type="time">
                </fieldset>
                <fieldset>
                    <label for="rival">Nombre del equipo rival</label><br>
                    <input type="text" name="rival">
                </fieldset>
                <fieldset>
                    <label class="best_of">Mejor de</label><br>
                    <select name="best_of">
                        <option value="BO1">BO1</option>
                        <option value="BO3">BO3</option>
                        <option value="BO5">BO5</option>
                    </select>
                </fieldset>
                <input class="buttonBlue" type="submit" value="Crear partido">
            </form>
            @include('partials.back')
        </x-card>
    </main>
</x-layout>
