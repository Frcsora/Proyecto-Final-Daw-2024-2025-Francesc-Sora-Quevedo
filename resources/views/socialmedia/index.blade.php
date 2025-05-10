<x-layout :image="$image" :imageFondo="$imageFondo" :socialmedias="$socialmedias">
    <x-slot:title>Socialmedia</x-slot:title>
    <main>
        <div class="tarjetasSM">
            @foreach($socialmedias as $socialmedia)
                <div class="tarjetaSM">
                    <p>{{$socialmedia->name}}</p>
                    <a href="{{route('socialmedia.edit', $socialmedia->id)}}">Editar</a>
                    <form action="{{route('socialmedia.destroy', $socialmedia->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Eliminar"/>
                    </form>
                </div>
            @endforeach
                <p><a href="{{route("socialmedia.create")}}">Añadir otra red social</a></p>
        </div>
        @include('partials.status')

    </main>
</x-layout>
