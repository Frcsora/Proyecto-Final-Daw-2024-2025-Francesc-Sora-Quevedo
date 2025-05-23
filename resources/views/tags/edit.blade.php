<x-layout :image="$image" :imageFondo="$imageFondo" :socialmedias="$socialmedias" :teams="$teams">
    <x-slot:title>Tags</x-slot:title>
    <main class="flex flex-col items-center"></main>
    <x-card>
        <x-slot:show></x-slot:show>

        @include('partials.errors')
        <form method="post" action="{{route('tags.update', $tag->id)}}">
            @csrf
            @method('PUT')
            <label for="tag">Nombre del tag</label>
            <input type="text" id="tag" name="tag" value="{{$tag->tag}}"><br>
            <input class="buttonBlue" type="submit" value="Editar">
        </form>
        @include('partials.linea')
        @include('partials.back')
    </x-card>

</x-layout>

