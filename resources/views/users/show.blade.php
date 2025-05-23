<x-layout :image="$image" :imageFondo="$imageFondo" :socialmedias="$socialmedias" :teams="$teams">
    <x-slot:title>users</x-slot:title>
    <main class="flex flex-col items-center">
        <x-card>
            <h1 class="text-4xl">{{$user->name}}</h1>
            <small>Usuario creado el {{\Carbon\Carbon::parse($user->created_at->format('d M Y H:m:s'))}}</small>
            @include('partials.linea')
            @if(Auth::check() && Auth::user()->role === 'superadmin' && $user->role !== 'superadmin')
                <form action="{{route('users.update', $user->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="role" value="1">
                    <input class="buttonBlue" type="submit" value="{{$user->role == 'user' ? "Hacer admin": "Quitar admin"}}">
                </form>
                @include('partials.linea')
            @endif
            {{-- Auth::user hace rererencia al usuario autenticado, $user al usuario que se esta viendo en el show --}}
            @if(Auth::check() && in_array(Auth::user()->role, ['admin', 'superadmin']) && $user->role !== 'superadmin')
                <form action="{{route('users.update', $user->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="status" value="1">
                    <input class="buttonBlue" type="submit" value="{{$user->active_user == '1' ? "Bloquear": "Desbloquear"}}">
                </form>
            @endif
            <p>Usuario: @if($user->active_user == 1)
                    Activo
                            @else
                          Bloqueado
                @endif</p>
            <p class="text-base">Correo: {{$user->email}}</p>
            @include('partials.linea')
            @include('partials.back')
        </x-card>
    </main>
</x-layout>
