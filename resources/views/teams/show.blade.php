<x-layout :image="$image" :imageFondo="$imageFondo" :socialmedias="$socialmedias">
    <x-slot:title>Teams</x-slot:title>

    <x-main>
        <x-card>
            <h2 class="text-5xl text-bold">{{$team->name}}</h2>
            <p>{{$team->games->name}}</p>
            @include('partials.linea')
            <section class="flex flex-col md:flex-row md:flex-wrap gap-3">
                @foreach($players as $player)
                    <section class="border border-black p-3 flex flex-col items-center">
                        <h3><a href="{{route('players.show',$player->id)}}">{{$player->name}} "{{$player->nickname}}" {{$player->surname1}} {{$player->surname2}}</a></h3>
                        <img class="w-24 h-24 rounded-full" src="{{$player->image}}" alt="{{$player->name}} "{{$player->nickname}}" {{$player->surname1}} {{$player->surname2}}">
                    </section>
                @endforeach
            </section>
            @include('partials.linea')
            @if(Auth::check())
                @if(in_array(Auth::user()->role, ['admin', 'superadmin']))
                    <p><a href="{{route('players.create')}}">Añadir jugador</a></p><br><br>
                @endif
            @endif
            @if(Auth::check())
                @if(in_array(Auth::user()->role, ['admin', 'superadmin']))
                    <p><a href="{{route('teamsmedias.create', ['id' =>$team->id])}}">Añadir red social</a></p><br><br>
                @endif
            @endif
            @isset($medias)
                @foreach($medias as $media)
                    <section class="flex gap-1">
                        <p class="flex text-2xl">{{$media->name}} - <a href="{{$media->link}}">{!! $media->medias->svg !!}</a>
                            @if(Auth::check())
                                @if(in_array(Auth::user()->role, ['admin', 'superadmin']))
                                    <a href="{{route('teamsmedias.edit', $media->id)}}">Editar</a></p>
                        <form method="post" action="{{route('teamsmedias.destroy', $media->id)}}">
                                @csrf
                                @method('DELETE')
                                <button class="buttonRed" type="submit"><svg class="w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M376.6 84.5c11.3-13.6 9.5-33.8-4.1-45.1s-33.8-9.5-45.1 4.1L192 206 56.6 43.5C45.3 29.9 25.1 28.1 11.5 39.4S-3.9 70.9 7.4 84.5L150.3 256 7.4 427.5c-11.3 13.6-9.5 33.8 4.1 45.1s33.8 9.5 45.1-4.1L192 306 327.4 468.5c11.3 13.6 31.5 15.4 45.1 4.1s15.4-31.5 4.1-45.1L233.7 256 376.6 84.5z"/></svg></button>
                            </form><br><br>
                               @endif
                            @endif

                    </section>
                @endforeach
            @endisset
            @if(Auth::check())
                @if(in_array(Auth::user()->role, ['admin', 'superadmin']))
                    <form method="post" action="{{route('teams.destroy', $team->id)}}">
                        @csrf
                        @method('DELETE')
                        <button class="buttonRed" type="submit">Eliminar equipo</button>
                    </form><br><br>
                @endif
            @endif
        </x-card>
    </x-main>

</x-layout>

