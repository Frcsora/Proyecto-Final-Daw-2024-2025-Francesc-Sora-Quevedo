<x-layout :image="$image" :imageFondo="$imageFondo" :socialmedias="$socialmedias">

    <x-slot:title>Admin</x-slot:title>
    <main>
        <div class="tarjetasAdmin">
            <div class="admindiv">
                <h3>Usuarios</h3>
                <a href="{{route('users.index')}}">Ver</a>

            </div>
            <div class="admindiv">
                <h3>Noticias</h3>
                <a href="{{route('news.index')}}">Ver</a>
                <a href="{{route('news.create')}}">Crear</a>
            </div>
            <div class="admindiv">
                <h3>Tags</h3>
                <a href="{{route('tags.index')}}">Ver</a>
                <a href="{{route('tags.create')}}">Crear</a>
            </div>
            <div class="admindiv">
                <h3>Imagenes</h3>
                <a href="{{route('images.index')}}">Ver</a>
            </div>
            <div class="admindiv">
                <h3>Redes sociales</h3>
                <a href="{{route('socialmedia.index')}}">Ver</a>
            </div>
            <div class="admindiv">
                <h3>Juegos</h3>
                <a href="{{route('games.index')}}">Ver</a>
                <a href="{{route('games.create')}}">Crear</a>
            </div>
            <div class="admindiv">
                <h3>Equipos</h3>
                <a href="{{route('teams.index')}}">Ver</a>
                <a href="{{route('teams.create')}}">Crear</a>
            </div>

        </div>
    </main>
</x-layout>

