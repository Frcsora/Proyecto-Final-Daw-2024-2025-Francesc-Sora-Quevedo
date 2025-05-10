<x-layout :image="$image" :imageFondo="$imageFondo" :socialmedias="$socialmedias">
    <x-slot:title>News</x-slot:title>
    <main>
        @include('partials.errors')
        <div class="tarjetaform">
            <form id="formImage" method="post" action="{{route('news.store')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id_user" value="{{Auth::user()->id}}">
                <fieldset id="dropeo">
                    <label for="image">Imagen:</label>
                    <input type="file" id="imagen" name="imagen" alt="imagen noticia">
                    <input type="hidden" name="image" id="image">
                </fieldset>
                <fieldset>
                    <label for="title">Título:</label>
                    <input placeholder="titulo de la noticia" type="text" name="title" id="title">
                </fieldset>
                <fieldset>
                    <label for="abstract">Sinopsis:</label>
                    <textarea name="abstract" id="abstract" placeholder="sinopsis del a noticia" cols="100" rows="5"></textarea>
                </fieldset>
                <fieldset>
                    <label for="news">Noticia:</label>
                    <textarea name="news" id="news" placeholder="noticia" cols="100" rows="10"></textarea>
                </fieldset>
                <fieldset>
                    <label for="tags">Tags</label>
                    <select name="tags" id="tags">
                        <option value="">Selecciona tags</option>
                        @foreach($tags as $tag)
                            <option value="{{$tag->id}}-{{$tag->tag}}">{{ucfirst($tag->tag)}}</option>
                        @endforeach
                    </select>
                    <div class="tagdiv" id="tagdiv"></div>
                    <input type="hidden" name="taginput" value="" id="taginput">
                </fieldset>
                <input type="submit" value="Enviar">
            </form>
        </div>
    </main>
</x-layout>

