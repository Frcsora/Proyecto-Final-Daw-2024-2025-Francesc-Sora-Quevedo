<x-layout :image="$image" :imageFondo="$imageFondo" :socialmedias="$socialmedias" :sponsors="$sponsors" :teams="$teams">
    <x-slot:title>Teams</x-slot:title>

    <x-main :tweets="$tweets" :sponsors="$sponsors" :matchesBefore="$matchesBefore" :matchesAfter="$matchesAfter">
        <x-card>
            <x-slot:show></x-slot:show>
            <h2 class="text-5xl text-bold">{{$team->name}}</h2>
            <p>{{$team->games->name}}</p>
            @include('partials.linea')
            <h2 class="text-md md:text-lg lg:text-2xl">Jugadores</h2>
            <section class="flex flex-col md:flex-row md:flex-wrap gap-3">

                @foreach($players as $player)
                    <section class="gap-4 border border-black p-3 flex flex-col items-center">
                        <h3><a href="{{route('players.show',$player->id)}}">{{$player->name}} "{{$player->nickname}}" {{$player->surname1}} {{$player->surname2}}</a></h3>
                        <img class="w-32 h-32 rounded-full" src="{{$player->image}}" alt="{{$player->name}} "{{$player->nickname}}" {{$player->surname1}} {{$player->surname2}}">
                    </section>
                @endforeach
            </section>
            @if(Auth::check())
                @if(in_array(Auth::user()->role, ['admin', 'superadmin']))
                    <form action="{{route('players.create')}}">
                        <button title="Añadir jugador" class="buttonBlue" type="submit"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z"/></svg></button>
                    </form>
                @endif
            @endif

            @isset($tournaments)
                @include('partials.linea')
                <h1>Torneos</h1>
                @foreach($tournaments as $tournament)
                    <section class="flex flex-wrap gap-2">
                        <p><a href="{{route('tournaments.show', $tournament->id)}}">{{$tournament->event}}: {{$tournament->name}}.</a> Fecha de inicio: {{\Carbon\Carbon::parse($tournament->date)->format('d/m/Y')}} {{$tournament->time}} @isset($tournament->result) Posición: {{$tournament->result}} @endif</p>
                        @if(Auth::check() && in_array(Auth::user()-> role, ['admin', 'superadmin']))
                            <form action="{{route('tournaments.edit', $tournament->id)}}">
                                <button title="Editar torneo" type="submit"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z"/></svg></button>
                            </form>
                            <form method="post" action="{{route('tournaments.destroy', $tournament->id)}}">
                                @csrf
                                @method('DELETE')
                                <button title="Eliminar torneo" type="submit"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg></button>
                            </form><br><br>
                        @endif
                    </section>
                @endforeach
                @if(Auth::check() && in_array(Auth::user()-> role, ['admin', 'superadmin']))
                    <form action="{{route('tournaments.create')}}">
                        <button title="Añadir torneo" class="buttonBlue" type="submit"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z"/></svg></button>
                    </form>
                @endif
            @endisset
            @include('partials.linea')
            @isset($medias)
                <h2>Redes sociales del equipo</h2>
                @foreach($medias as $media)
                    <section class="flex flex-col gap-1">
                        <section class="flex flex-wrap gap-2">{{$media->name}} - <a href="{{$media->link}}">{!! $media->medias->svg !!}</a>
                            @if(Auth::check())
                                @if(in_array(Auth::user()->role, ['admin', 'superadmin']))
                                    <form action="{{route('teamsmedias.edit', $media->id)}}">
                                        <button title="Editar red social" type="submit"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z"/></svg></button>
                                    </form>
                        <form method="post" action="{{route('teamsmedias.destroy', $media->id)}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg></button>
                        </form></section><br><br>
                        @endif
                        @endif

                    </section>
                @endforeach
            @endisset
            @if(Auth::check())
                @if(in_array(Auth::user()->role, ['admin', 'superadmin']))
                    <form method="get" action="{{route('teamsmedias.create')}}">
                        <button title="Añadir red social" class="buttonBlue" type="submit"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z"/></svg></button>
                    </form>
                @endif
            @endif
            @include('partials.linea')
            @if(Auth::check())
                @if(in_array(Auth::user()->role, ['admin', 'superadmin']))
                    <form method="post" action="{{route('teams.destroy', $team->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg></button>
                    </form><br><br>
                @endif
            @endif
        </x-card>
    </x-main>

</x-layout>

