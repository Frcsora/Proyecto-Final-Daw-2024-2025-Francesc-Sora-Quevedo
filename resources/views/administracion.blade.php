<x-layout :image="$image" :imageFondo="$imageFondo" :socialmedias="$socialmedias">

    <x-slot:title>Admin</x-slot:title>
    <x-main>
        <x-cards-div >
            <x-card>
                <h3 class="text-2xl">Usuarios</h3>
                <a href="{{route('users.index')}}">Ver</a>

            </x-card>
            <x-card>
                <h3 class="text-2xl">Noticias</h3>
                <a href="{{route('news.index')}}">Ver</a>
                <a href="{{route('news.create')}}">Crear</a>
            </x-card>
            <x-card>
                <h3 class="text-2xl">Tags</h3>
                <a href="{{route('tags.index')}}">Ver</a>
                <a href="{{route('tags.create')}}">Crear</a>
            </x-card>
            <x-card>
                <h3 class="text-2xl">Imagenes</h3>
                <a href="{{route('images.index')}}">Ver</a>
            </x-card>
            <x-card>
                <h3 class="text-2xl">Redes sociales</h3>
                <a href="{{route('socialmedia.index')}}">Ver</a>
            </x-card>
            <x-card>
                <h3 class="text-2xl">Juegos</h3>
                <a href="{{route('games.index')}}">Ver</a>
                <a href="{{route('games.create')}}">Crear</a>
            </x-card>
            <x-card>
                <h3 class="text-2xl">Equipos</h3>
                <a href="{{route('teams.index')}}">Ver</a>
                <a href="{{route('teams.create')}}">Crear</a>
            </x-card>
        </x-cards-div>
    </x-main>
</x-layout>

