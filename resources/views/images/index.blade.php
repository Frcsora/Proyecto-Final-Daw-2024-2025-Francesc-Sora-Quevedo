<x-layout :image="$image" :imageFondo="$imageFondo" :socialmedias="$socialmedias" :teams="$teams">
    <x-slot:title>Images</x-slot:title>
    <main class="flex flex-col">
        <section class="flex flex-col items-center">
                <h1 class="text-4xl">Logos</h1><br>
                <x-cards-div>


                    <x-slot:images></x-slot:images>
                    @foreach($logos as $logo)
                        <x-card>
                            <img class="w-64" src="{{$logo->base64}}" alt="logo {{$logo->name}}">
                            <form method="POST" action="{{route('images.update', $logo->id)}}">
                                @csrf
                                @method('PUT')
                                <input name="type" type="hidden" value="logo">
                                <input class="buttonBlue" value="Cambiar" type="submit">
                            </form>
                            <label for="checklogo{{$logo->id}}">Active:</label>
                            <a href="{{route('images.show', $logo->id)}}">Preview</a>
                            @if($logo->active == "false")
                                <form method="POST" action="{{route('images.destroy', $logo->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <input class="buttonRed" type="submit" value="Eliminar">
                                </form>
                            @endif
                        </x-card><br>
                    @endforeach
                </x-cards-div>
                @include('partials.linea')
                <h1 class="text-4xl">Fondos</h1><br>
                <x-cards-div>
                    <x-slot:images></x-slot:images>
                    @foreach($fondos as $fondo)
                        <x-card>
                            <img src="{{$fondo->base64}}" alt="fondo {{$logo->name}}}">
                            <form method="POST" action="{{route('images.update', $fondo->id)}}">
                                @csrf
                                @method('PUT')
                                <input name="type"  type="hidden" value="fondo">
                                <input class="buttonBlue" value="Cambiar" type="submit">
                            </form>
                            <a href="{{route('images.show', $fondo->id)}}">Preview</a>
                            @if($fondo->active == "false")
                                <form method="POST" action="{{route('images.destroy', $fondo->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <input class="buttonRed" type="submit" value="Eliminar">
                                </form>
                            @endif
                        </x-card><br>
                    @endforeach
                </x-cards-div>
            <a href="{{route('images.create')}}">Insertar nueva imagen</a>
        </section>
        @include('partials.status')
        @include('partials.back')
    </main>

</x-layout>
