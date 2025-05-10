<x-layout :image="$image" :imageFondo="$imageFondo" :socialmedias="$socialmedias">
    <x-slot:title>Admin</x-slot:title>
    <main>
        @include('partials.errors')
        <form id="formMessage" action="{{route('message')}}" method="POST">
            @csrf
            <input name="email" type="hidden" value="{{Auth::user()->email}}">
            <input type="hidden" name="name" value="{{Auth::user()->name}}">
            <h2>{{Auth::user()->name}}</h2>
            <fieldset>
                <label for="text">Mensaje:</label><br>
                <textarea name="text" cols="80" rows="20"></textarea>
            </fieldset>
            <input type="submit" value="Enviar">
        </form>
        @if(session('status'))
            <p style="color:green">{{session('status')}}</p>
        @endif

    </main>
</x-layout>

