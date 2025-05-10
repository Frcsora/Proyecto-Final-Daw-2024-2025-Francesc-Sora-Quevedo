<x-layout :image="$image" :imageFondo="$imageFondo" :socialmedias="$socialmedias">
    <x-slot:title>Players</x-slot:title>
    <main class="tarjetero">
        <x-card>
            <h3><a href="{{route('players.show',$player->id)}}">{{$player->name}} "{{$player->nickname}}" {{$player->surname1}} {{$player->surname2}}</a></h3>
            <img src="{{$player->image}}" alt="{{$player->name}} "{{$player->nickname}}" {{$player->surname1}} {{$player->surname2}}">
            @if(Auth::check())
                @if(in_array(Auth::user()->role, ['admin', 'superadmin']))
                    <p><a href="{{route('players.edit', $player->id)}}">Editar jugador</a></p>
                @endif
            @endif
            @if(\App\Helpers\UserValidator::validateAdmin())
                <form method="POST" action="{{route('players.destroy', $player->id)}}">
                    @method('DELETE')
                    @csrf
                    <input type="submit" value="Eliminar Jugador">
                </form>
            @endif
            @if(Auth::check())
                @if(in_array(Auth::user()->role, ['admin', 'superadmin']))
                    <p><a href="{{route('playersmedias.create', ['id' =>$player->id])}}">Añadir red social</a></p><br><br>
                @endif
            @endif
            @isset($medias)
                @foreach($medias as $media)
                    <div class="red">
                        <p class="media-cont">{{$media->name}} - <a href="{{$media->link}}">{!! $media->medias->svg !!}</a>
                            @if(Auth::check())
                                @if(in_array(Auth::user()->role, ['admin', 'superadmin']))
                                    <a href="{{route('playersmedias.edit', $media->id)}}">Editar</a></p>
                        <form method="post" action="{{route('playersmedias.destroy', $media->id)}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M376.6 84.5c11.3-13.6 9.5-33.8-4.1-45.1s-33.8-9.5-45.1 4.1L192 206 56.6 43.5C45.3 29.9 25.1 28.1 11.5 39.4S-3.9 70.9 7.4 84.5L150.3 256 7.4 427.5c-11.3 13.6-9.5 33.8 4.1 45.1s33.8 9.5 45.1-4.1L192 306 327.4 468.5c11.3 13.6 31.5 15.4 45.1 4.1s15.4-31.5 4.1-45.1L233.7 256 376.6 84.5z"/></svg></button>
                        </form><br><br>
                              @endif
                           @endif
                    </div>
                @endforeach
            @endisset
            @include('partials.status')
        </x-card>
    </main>
</x-layout>

