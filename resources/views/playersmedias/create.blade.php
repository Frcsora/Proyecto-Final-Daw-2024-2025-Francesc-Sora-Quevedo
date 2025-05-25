<x-layout :image="$image" :imageFondo="$imageFondo" :socialmedias="$socialmedias" :teams="$teams">
        <x-slot:title>PlayersMedia</x-slot:title>
    <main class="flex flex-col items-center">
        <x-card>
            <x-slot:show></x-slot:show>

            @include('partials.errors')
            <form id="formCreateSocialMedia" method="post" action="{{route('playersmedias.store')}}">
                @csrf
                <input type="hidden" value="{{session()->get('player_id')}}" name="player_id">
                <fieldset>
                    <label for="media">Red social:</label><br>
                    <select name="media_id" class="media" id="media">
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
            @include('partials.back')
        </x-card>
    </main>
</x-layout>
