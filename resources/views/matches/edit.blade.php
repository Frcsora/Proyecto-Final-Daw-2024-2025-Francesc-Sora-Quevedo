<x-layout :image="$image" :imageFondo="$imageFondo" :socialmedias="$socialmedias" :teams="$teams">
    <x-slot:title>Tournaments</x-slot:title>
    <main class="flex flex-col">
        <x-card>
            <x-slot:show></x-slot:show>
            @include('partials.errors')
            <form method="post" action="{{route('matches.update', $match->id)}}">
                @csrf
                @method('PUT')
                <fieldset>
                    <label for="date">Fecha del partido</label><br>
                    <input id="date" type="date" name="date" value="{{$match->date}}">
                    <input name="time" type="time" value="{{$match->time}}">
                </fieldset>
                <fieldset>
                    <label for="rival">Nombre del equipo rival</label><br>
                    <input type="text" name="rival" value="{{$match->rival}}">
                </fieldset>
                <fieldset>
                    <label class="best_of">Mejor de</label><br>
                    <select name="best_of">
                        <option value="BO1" @if($match->best_of == 'BO1') selected @endif>BO1</option>
                        <option value="BO3" @if($match->best_of == 'BO3') selected @endif>BO3</option>
                        <option value="BO5" @if($match->best_of == 'BO5') selected @endif>BO5</option>
                    </select>
                </fieldset>
                <fieldset>
                    <label for="result">Resultado</label><br>
                    <select name="result">
                        <option value="Pendiente" @if($match->result == 'Pendiente') selected @endif>Pendiente</option>
                        <option value="Victoria" @if($match->result == 'Victoria') selected @endif>Victoria</option>
                        <option value="Empate" @if($match->result == 'Empate') selected @endif>Empate</option>
                        <option value="Derrota" @if($match->result == 'Derrota') selected @endif>Derrota</option>
                    </select>
                </fieldset>
                <input class="buttonBlue" type="submit" value="Editar partido">
            </form>
            @include('partials.back')
        </x-card>
    </main>
</x-layout>
