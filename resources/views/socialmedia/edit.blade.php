<x-layout :image="$image" :imageFondo="$imageFondo" :socialmedias="$socialmedias" :teams="$teams">
    <x-slot:title>Socialmedia</x-slot:title>
    <main class="flex flex-col">
        <x-card>
            <x-slot:show></x-slot:show>

            @include('partials.errors')

            <form id="formCreateSocialMedia" method="post" action="{{route('socialmedia.update', $socialmediaEdit->id)}}">
                @csrf
                @method('PUT')
                <fieldset>
                    <label for="media">Red social:</label><br>
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
                    <label for="name">Nombre:</label><br>
                    <input id="name" type="text" name="name" value="{{$socialmediaEdit->name}}">
                </fieldset>
                <fieldset>
                    <label for="link">Link:</label><br>
                    <input id="link" type="url" name="link" value="{{$socialmediaEdit->link}}">
                </fieldset>
                <input class="buttonBlue" type="submit" value="Enviar">
            </form>
            @include('partials.linea')
            @include('partials.back')
        </x-card>
    </main>
</x-layout>
