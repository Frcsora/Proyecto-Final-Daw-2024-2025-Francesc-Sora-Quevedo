<x-layout :image="$image" :imageFondo="$imageFondo" :socialmedias="$socialmedias" :teams="$teams">
    <x-slot:title>Tags</x-slot:title>

    <main class="flex flex-col">
        <x-card>

            <x-slot:show></x-slot:show>

            @include('partials.errors')
            <form method="post" action="{{route('tags.store')}}">
                @csrf
                <label for="tag">Nombre del tag</label>
                <input type="text" id="tag" name="tag"><br>
                <input class="buttonBlue" type="submit" value="Crear">
            </form>
            @include('partials.linea')
            @include('partials.back')
        </x-card>
    </main>
</x-layout>

