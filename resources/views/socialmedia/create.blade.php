<x-layout :image="$image" :imageFondo="$imageFondo" :socialmedias="$socialmedias">
    <x-slot:title>Socialmedia</x-slot:title>
    <main class="flex flex-col">
        <x-card>
            @include('partials.errors')
            <form method="post" action="{{route('socialmedia.store')}}">
                @csrf
                <input type="hidden" value="{{Auth::user()->id}}" name="created_by">
                <fieldset>
                    <label for="media">Red social:</label><br>
                    <select name="media" class="media" id="media">
                        @foreach($medias as $media)
                            <option value="{{$media->id}}">{{$media->name}}</option>
                        @endforeach
                    </select>
                </fieldset>
                <fieldset>
                    <label for="name">Nombre:</label><br>
                    <input id="name" type="text" name="name">
                </fieldset>
                <fieldset>
                    <label for="link">Link:</label><br>
                    <input id="link" type="url" name="link">
                </fieldset>
                <input class="buttonBlue" type="submit" value="Enviar">
            </form>
            @include('partials.linea')
            @include('partials.back')
        </x-card>

    </main>
</x-layout>
