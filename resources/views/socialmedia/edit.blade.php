<x-layout :image="$image" :imageFondo="$imageFondo" :socialmedias="$socialmedias">
    <x-slot:title>Socialmedia</x-slot:title>
    <main>
        @include('partials.errors')

        <form id="formCreateSocialMedia" method="post" action="{{route('socialmedia.update', $socialmediaEdit->id)}}">
            @csrf
            @method('PUT')
            <fieldset>
                <label for="media">Red social:</label>
                <select name="media" class="media" id="media">

                    @foreach($medias as $media)
                        <option value="{{$media->id}}"
                        @if($media->id == $socialmediaEdit->id)
                            selected
                        @endif>{{$media->name}}</option>
                    @endforeach
                </select>
            </fieldset>
            <fieldset>
                <label for="name">Nombre:</label>
                <input id="name" type="text" name="name" value="{{$socialmediaEdit->name}}">
            </fieldset>
            <fieldset>
                <label for="link">Link:</label>
                <input id="link" type="url" name="link" value="{{$socialmediaEdit->link}}">
            </fieldset>
            <input type="submit" value="Enviar">
        </form>
    </main>
</x-layout>
