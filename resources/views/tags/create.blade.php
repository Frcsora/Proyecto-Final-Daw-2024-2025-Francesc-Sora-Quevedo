<<<<<<< HEAD
<x-layout :image="$image" :imageFondo="$imageFondo" :socialmedias="$socialmedias">
    <x-slot:title>Tags</x-slot:title>
    @include('partials.errors')

=======
<x-layout :image="$image" :imageFondo="$imageFondo">
    <x-slot:title>Tags</x-slot:title>
>>>>>>> parent of effacc4 (Revert "Primer commit del proyecto Laravel")
    <form method="post" action="{{route('tags.store')}}">
        @csrf
        <label for="tag">Nombre del tag</label>
        <input type="text" id="tag" name="tag">
        <input type="submit" value="Crear">
    </form>
</x-layout>

