<x-layout :image="$image" :imageFondo="$imageFondo" :socialmedias="$socialmedias">
    <x-slot:title>Images</x-slot:title>
    <main>
        <div class="imagenesIndex">
                <h1>Logos</h1><br>
                <div class="logosfondos">
                    @foreach($logos as $logo)
                        <x-card>
                            <img src="{{$logo->base64}}" alt="logo {{$logo->name}}">
                            <form method="POST" action="{{route('images.update', $logo->id)}}">
                                @csrf
                                @method('PUT')
                                <input name="type" type="hidden" value="logo">
                                <input value="Cambiar" type="submit">
                            </form>
                            <label for="checklogo{{$logo->id}}">Active:</label>
                            <a href="{{route('images.show', $logo->id)}}">Preview</a>
                            <form method="POST" action="{{route('images.destroy', $logo->id)}}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Eliminar">
                            </form>
                        </x-card><br>
                    @endforeach
                </div>
                <hr>
                <h1>Fondos</h1><br>
                <div class="logosfondos">
                    @foreach($fondos as $fondo)
                        <x-card>
                            <img src="{{$fondo->base64}}" alt="fondo {{$logo->name}}}">
                            <form method="POST" action="{{route('images.update', $fondo->id)}}">
                                @csrf
                                @method('PUT')
                                <input name="type"  type="hidden" value="fondo">
                                <input value="Cambiar" type="submit">
                            </form>
                            <a href="{{route('images.show', $fondo->id)}}">Preview</a>
                            <form method="POST" action="{{route('images.destroy', $fondo->id)}}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Eliminar">
                            </form>
                        </x-card><br>
                    @endforeach
                </div>
            <a href="{{route('images.create')}}">Insertar nueva imagen</a>
        </div>
        @include('partials.status')
    </main>

</x-layout>
