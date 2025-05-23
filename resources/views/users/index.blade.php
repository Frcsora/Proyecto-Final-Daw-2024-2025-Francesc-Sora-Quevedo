<x-layout :image="$image" :imageFondo="$imageFondo" :socialmedias="$socialmedias" :teams="$teams">
    <x-slot:title>users</x-slot:title>
    <main class="flex flex-col items-center">
        <x-cards-div>
            <x-slot:images></x-slot:images>
            @foreach($users as $user)
                <x-card>
                    <div class="flex flex-col items-center">
                        <p class="text-4xl">{{$user->name}} </p>
                        <a href="{{route('users.show', $user->id)}}">Ver</a>
                        @if($user->active_user == 1)
                            <p>Usuario Activo</p>
                        @else
                            <p>Usuario Bloqueado</p>
                        @endif
                    </div>
                </x-card>
            @endforeach
        </x-cards-div>
        @include('partials.linea')
        @include('partials.status')
        @include('partials.back')
    </main>
</x-layout>
