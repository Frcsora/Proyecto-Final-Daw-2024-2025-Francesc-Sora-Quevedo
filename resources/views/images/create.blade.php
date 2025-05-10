<x-layout :image="$image" :imageFondo="$imageFondo" :socialmedias="$socialmedias">
    <x-slot:title>Images</x-slot:title>ç

    @include('partials.errors')
    <main>
        <form id="formImage" method="post" action="{{route('images.store')}}" enctype="multipart/form-data">
            @csrf
            <fieldset id="dropeo">
                <label for="type">Tipo</label>
                <select id="type" name="type">
                    <option value="logo">Logo</option>
                    <option value="fondo">Fondo</option>
                </select>
            </fieldset>
            <fieldset>
                <label for="name">Nombre</label>
                <input type="text" id="name" name="name">
            </fieldset>
            <fieldset>
                <label for="image">Imagen:</label>
                <input type="file" id="imagen" name="imagen" alt="imagen noticia">
                <input type="hidden" name="image" id="image">
            </fieldset>
            <input type="submit">
        </form>
    </main>

</x-layout>
