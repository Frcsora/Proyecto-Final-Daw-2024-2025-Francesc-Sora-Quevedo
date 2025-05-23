<x-layout :image="$image" :imageFondo="$imageFondo" :socialmedias="$socialmedias"  :teams="$teams>
    <x-slot:title>Players</x-slot:title>
    <main class="flex- flex-col">
        @include('partials.errors')
        <x-card>
            <x-slot:show></x-slot:show>

            <form id="formImage" method="post" action="{{route('sponsors.store')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{Auth::user()->id}}" name="created_by">
                <fieldset>
                    <label for="name">Nombre:</label><br>
                    <input type="text" name="name">
                </fieldset>
                <fieldset>
                    <label for="link">Link del patrocinador:</label><br>
                    <input type="text" name="link">
                </fieldset>
                <fieldset>
                    <label for="tier">tier</label><br>
                    <select name="tier">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </fieldset>
                <fieldset id="dropeo">
                    <label for="image">Imagen:</label><br>
                    <input type="file" id="imagen" name="imagen">
                    <input type="hidden" name="image" id="image">
                </fieldset>
                <input class="buttonBlue" type="submit" value="Añadir patrocinador">
            </form>
        </x-card>
        @include('partials.back')
    </main>
</x-layout>

