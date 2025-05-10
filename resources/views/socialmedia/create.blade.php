<x-layout :image="$image" :imageFondo="$imageFondo" :socialmedias="$socialmedias">
    <x-slot:title>Socialmedia</x-slot:title>
    <main>
        @include('partials.errors')
        <form id="formCreateSocialMedia" method="post" action="{{route('socialmedia.store')}}">
            @csrf
            <fieldset>
                <label for="media">Red social:</label>
                <select name="media" class="media" id="media">
                    @foreach($medias as $media)
                        <option value="{{$media->id}}">{{$media->name}}</option>
                    @endforeach
                </select>
            </fieldset>
            <fieldset>
                <label for="name">Nombre:</label>
                <input id="name" type="text" name="name">
            </fieldset>
            <fieldset>
                <label for="link">Link:</label>
                <input id="link" type="url" name="link">
            </fieldset>
            <input type="submit" value="Enviar">
        </form>
    </main>
</x-layout>
