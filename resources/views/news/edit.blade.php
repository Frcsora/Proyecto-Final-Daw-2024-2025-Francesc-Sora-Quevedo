<x-layout :image="$image" :imageFondo="$imageFondo" :socialmedias="$socialmedias" :teams="$teams">
    <x-slot:title>News</x-slot:title>
    <main class="flex flex-col">
        @include('partials.errors')
        <x-card>
            <x-slot:show></x-slot:show>

            <form class="gap-1" id="formImage" method="post" action="{{route('news.update', $newsvar->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="id_user" value="{{Auth::user()->id}}">
                <fieldset id="dropeo">
                    <label for="image">Imagen:</label><br>
                    <input type="file" id="imagen" name="imagen" alt="imagen noticia">
                    <input type="hidden" name="image" id="image" value="{{$newsvar->image}}">
                </fieldset>
                <fieldset>
                    <label for="title">Título:</label><br>
                    <input placeholder="titulo de la noticia" type="text" name="title" id="title" value="{{$newsvar->title}}">
                </fieldset>
                <fieldset>
                    <label for="abstract">Sinopsis:</label><br>
                    <textarea name="abstract" id="abstract" placeholder="sinopsis del a noticia" cols="100" rows="5">{{$newsvar->abstract}}</textarea>
                </fieldset>
                <fieldset>
                    <label for="news">Noticia:</label><br>
                    <textarea name="news" id="news" placeholder="noticia" cols="100" rows="10">{{$newsvar->text}}</textarea>
                </fieldset>
                <fieldset>
                    <label for="tags">Tags</label><br>
                    <select name="tags" id="tags">
                        <option value="">Selecciona tags</option>
                        @foreach($alltags as $tag)
                            <option value="{{$tag->id}}-{{$tag->tag}}">{{ucfirst($tag->tag)}}</option>
                        @endforeach
                    </select>
                    <div class="flex gap-1" id="tagdiv">
                        @foreach($newsvar->tags as $tag)
                            <p class="rounded bg-[grey] p-2" id="{{$tag->id}}">
                                {{$tag->tag}}
                                <button class="buttonRed">X</button>
                            </p>
                        @endforeach
                    </div>
                    <input type="hidden" name="taginput" value="" id="taginput">
                </fieldset>
                <input class="buttonBlue" type="submit" value="Enviar">
            </form>
            <button class="buttonBlue" id="back">Volver</button>

        </x-card>

    </main>
</x-layout>

<?php
