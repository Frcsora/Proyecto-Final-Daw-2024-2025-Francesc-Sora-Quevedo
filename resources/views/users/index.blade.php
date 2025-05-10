<x-layout :image="$image" :imageFondo="$imageFondo" :socialmedias="$socialmedias">
    <x-slot:title>users</x-slot:title>
    <main class="mainusers">
        @foreach($users as $user)
            <div class="user">
                <p>{{$user->name}} <a href="{{route('users.show', $user->id)}}">Ver</a>

                @if($user->active_user == 1)
                    Activo
                @else
                    Bloqueado
                @endif</p>
            </div>
        @endforeach
            @include('partials.status')

    </main>
</x-layout>
