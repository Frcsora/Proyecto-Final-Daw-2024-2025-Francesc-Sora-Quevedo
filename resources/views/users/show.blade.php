<x-layout :image="$image" :imageFondo="$imageFondo" :socialmedias="$socialmedias">
    <x-slot:title>users</x-slot:title>
    <main class="mainusers">
        <div class="userShow">
            <h1>{{$user->name}}</h1>
            <small>Usuario creado el {{$user->created_at->format('d M Y H:m:s')}}</small>
            @if(Auth::check() && Auth::user()->role == 'superadmin' && $user->role != 'superadmin')
                <form action="{{route('users.update', $user->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="role" value="1">
                    <input type="submit" value="{{$user->role == 'user' ? "Hacer admin": "Quitar admin"}}">
                </form>
            @endif
            {{-- Auth::user hace rererencia al usuario autenticado, $user al usuario que se esta viendo en el show --}}
            @if(Auth::check() && (Auth::user()->role == 'superadmin' || Auth::user()->role == 'admin') && $user->role != 'superadmin')
                <form action="{{route('users.update', $user->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="status" value="1">
                    <input type="submit" value="{{$user->active_user == '1' ? "Bloquear": "Desbloquear"}}">
                </form>
            @endif
            <p>Usuario: @if($user->active_user == 1)
                    Activo
                            @else
                          Bloqueado
                @endif</p>
            <p>Correo: {{$user->email}}</p>
        </div>
    </main>
</x-layout>
