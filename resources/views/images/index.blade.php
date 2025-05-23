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
                            <form action="{{route('images.show', $logo->id)}}">
                                <button class="buttonBlue" title="Preview" type="submit"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg></button>
                            </form>
                            @if($logo->active == "false")
                                <form method="POST" action="{{route('images.destroy', $logo->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button title="Eliminar imagen" type="submit"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg></button>
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
                            <img src="{{$fondo->base64}}" alt="fondo {{$fondo->name}}}">
                            <form method="POST" action="{{route('images.update', $fondo->id)}}">
                                @csrf
                                @method('PUT')
                                <input name="type"  type="hidden" value="fondo">
                                <input class="buttonBlue" value="Cambiar" type="submit">
                            </form>
                            <form action="{{route('images.show', $fondo->id)}}">
                                <button class="buttonBlue" title="Preview" type="submit"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"/></svg></button>
                            </form>                            @if($fondo->active == "false")
                                <form method="POST" action="{{route('images.destroy', $fondo->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <input class="buttonRed" type="submit" value="Eliminar">
                                </form>
                            @endif
                        </x-card><br>
                    @endforeach
                </x-cards-div>
            <form action="{{route("images.create")}}">
                <button title="Añadir imagenes" class="buttonBlue" type="submit"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z"/></svg></button>
            </form>
        </section>
        @include('partials.status')
        @include('partials.back')
    </main>

</x-layout>
