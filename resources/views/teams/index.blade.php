<x-layout :image="$image" :imageFondo="$imageFondo" :socialmedias="$socialmedias">
    <x-slot:title>Teams</x-slot:title>
    <x-main>
        <x-cards-div>
            @forelse($teams as $team)
                <x-card>
                    <h2 class="text-4xl"><a href="{{route('teams.show', $team->id)}}">{{$team->name}}</a></h2>
                    <p>{{$team->games->name}}</p>
                    @if(Auth::check())
                        @if(in_array(Auth::user()->role, ['admin', 'superadmin']))
                            <p><a href="{{route('teams.edit', $team->id)}}">Editar</a></p><br><br>
                        @endif
                    @endif
                </x-card>
            @empty
                <h1>No existe ningún equipo creado</h1>
            @endforelse
        </x-cards-div>
    </x-main>
</x-layout>

