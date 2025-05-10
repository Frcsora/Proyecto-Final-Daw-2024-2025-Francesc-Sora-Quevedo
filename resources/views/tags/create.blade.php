<x-layout :image="$image" :imageFondo="$imageFondo" :socialmedias="$socialmedias">
    <x-slot:title>Tags</x-slot:title>
    @include('partials.errors')


    <form method="post" action="{{route('tags.store')}}">
        @csrf
        <label for="tag">Nombre del tag</label>
        <input type="text" id="tag" name="tag">
        <input type="submit" value="Crear">
    </form>
</x-layout>

