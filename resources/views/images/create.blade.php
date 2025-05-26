<x-layout :image="$image" :imageFondo="$imageFondo" :socialmedias="$socialmedias">
    <x-slot:title>Images</x-slot:title>ç

    @include('partials.errors')
    <main class="flex flex-col items-center">
        <x-card>
            <form id="formImage" method="post" action="{{route('images.store')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{Auth::user()->id}}" name="created_by">
                <fieldset id="dropeo">
                    <label for="type">Tipo</label><br>
                    <select id="type" name="type">
                        <option value="logo">Logo</option>
                        <option value="fondo">Fondo</option>
                    </select>
                </fieldset><br>
                <fieldset>
                    <label for="name">Nombre</label><br>
                    <input type="text" id="name" name="name">
                </fieldset><br>
                <fieldset>
                    <label for="image">Imagen:</label><br>
                    <input type="file" id="imagen" name="imagen" alt="imagen noticia">
                    <input type="hidden" name="image" id="image">
                </fieldset><br>
                <input class="buttonBlue" type="submit">
            </form>
        </x-card>
        @include('partials.back')
    </main>

</x-layout>
