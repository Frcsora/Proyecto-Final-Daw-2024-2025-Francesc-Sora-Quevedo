<x-layout :image="$image" :imageFondo="$imageFondo" :socialmedias="$socialmedias">
    <x-slot:title>Socialmedia</x-slot:title>
    <main class="flex flex-col">
        <x-cards-div>
            <x-slot:images></x-slot:images>
            @foreach($socialmedias as $socialmedia)
                <x-card>
                    <p>{{$socialmedia->name}}</p>
                    <a href="{{route('socialmedia.edit', $socialmedia->id)}}">Editar</a>
                    <form action="{{route('socialmedia.destroy', $socialmedia->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input class="buttonRed" type="submit" value="Eliminar"/>
                    </form>
                </x-card>
            @endforeach
        </x-cards-div>
        @include('partials.linea')
        <p><a href="{{route("socialmedia.create")}}">Añadir otra red social</a></p>
        @include('partials.status')
        @include('partials.back')


    </main>
</x-layout>
