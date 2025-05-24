<x-layout :image="$image" :imageFondo="$imageFondo" :socialmedias="$socialmedias" :sponsors="$sponsors" :teams="$teams">
    <x-slot:title>Players</x-slot:title>
    <x-main :tweets="$tweets" :sponsors="$sponsors" :matchesBefore="$matchesBefore" :matchesAfter="$matchesAfter">
        <x-card>
            <h3 class="text-xl md:text-2xl lg:text-4xl"><a href="{{route('players.show',$player->id)}}">{{$player->name}} "{{$player->nickname}}" {{$player->surname1}} {{$player->surname2}}</a></h3>
            <img class="rounded-full w-48" src="{{$player->image}}" alt="{{$player->name}} "{{$player->nickname}}" {{$player->surname1}} {{$player->surname2}}">
            @if(Auth::check())
                @if(in_array(Auth::user()->role, ['admin', 'superadmin']))
                    <form action="{{route('players.edit', $player->id)}}">
                        <button title="Editar jugador" type="submit"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z"/></svg></button>
                    </form>
                @endif
            @endif
            @if(Auth::check() && in_array(Auth::user()->role, ['admin', 'superadmin']))
                <form method="POST" action="{{route('players.destroy', $player->id)}}">
                    @method('DELETE')
                    @csrf
                    <button title="Eliminar jugador" type="submit"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg></button>
                </form>
            @endif
            @include('partials.linea')
            <h2>Redes sociales del jugador</h2>
            @if(Auth::check())

            @endif
            @isset($medias)
                @foreach($medias as $media)
                    <section class="flex gap-1">
                        <p class="flex text-2xl">{{$media->name}} - <a href="{{$media->link}}">{!! $media->medias->svg !!}</a>
                            @if(Auth::check())
                                @if(in_array(Auth::user()->role, ['admin', 'superadmin']))
                                    <a href="{{route('playersmedias.edit', $media->id)}}">Editar</a></p>
                        <form method="post" action="{{route('playersmedias.destroy', $media->id)}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg></button>
                        </form><br><br>
                        @endif
                        @endif
                    </section>
                @endforeach
                    @if(in_array(Auth::user()->role, ['admin', 'superadmin']))
                        <form action="{{route('playersmedias.create')}}">
                            <button title="Añadir red social" class="buttonBlue" type="submit"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 144L48 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l144 0 0 144c0 17.7 14.3 32 32 32s32-14.3 32-32l0-144 144 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-144 0 0-144z"/></svg></button>
                        </form>
                    @endif
            @endisset
            @include('partials.status')
            @include('partials.back')
        </x-card>
    </x-main>
</x-layout>

