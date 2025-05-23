<x-layout :image="$image" :imageFondo="$imageFondo" :socialmedias="$socialmedias" :teams="$teams">
    <x-slot:title>Players</x-slot:title>
    <main class="flex flex-col items-center">
        @include('partials.errors')
        <x-card>
            <x-slot:show></x-slot:show>

            <form id="formImage" method="post" action="{{route('sponsors.edit', $sponsor->id)}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{$sponsor->created_by}}" name="created_by">
                <fieldset>
                    <label for="name">Nombre:</label><br>
                    <input type="text" name="name" value="{{$sponsor->name}}">
                </fieldset>
                <fieldset>
                    <label for="link">Link del patrocinador:</label><br>
                    <input type="text" name="link" value="{{$sponsor->link}}">
                </fieldset>
                <fieldset>
                    <label for="tier">tier</label><br>
                    <select name="tier">
                        <option value="0" @if($sponsor->tier == 0) selected @endif>0</option>
                        <option value="1" @if($sponsor->tier == 1) selected @endif>1</option>
                        <option value="2" @if($sponsor->tier == 2) selected @endif>2</option>
                        <option value="3" @if($sponsor->tier == 3) selected @endif>3</option>
                    </select>
                </fieldset>
                <fieldset id="dropeo">
                    <label for="image">Imagen:</label><br>
                    <input type="file" id="imagen" name="imagen">
                    <input type="hidden" name="image" id="image" value="{{$sponsor->base64}}">
                </fieldset>
                <input class="buttonBlue" type="submit" value="Añadir patrocinador">
            </form>
        </x-card>
        @include('partials.back')
    </main>
</x-layout>

