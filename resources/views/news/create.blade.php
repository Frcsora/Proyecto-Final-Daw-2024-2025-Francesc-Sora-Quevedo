<x-layout :image="$image" :imageFondo="$imageFondo" :socialmedias="$socialmedias" :teams="$teams">
    <x-slot:title>News</x-slot:title>
    <main class="flex flex-col">
        @include('partials.errors')
        <x-card>
            <x-slot:show></x-slot:show>
            <form id="formImage" method="post" action="{{route('news.store')}}" enctype="multipart/form-data">
                @csrf
                <section class="flex flex-col items-start">
                    <input type="hidden" name="id_user" value="{{Auth::user()->id}}">
                    <fieldset id="dropeo">
                        <label for="image">Imagen:</label>
                        <input type="file" id="imagen" name="imagen" alt="imagen noticia"><br>
                        <input type="hidden" name="image" id="image">
                    </fieldset>
                    <fieldset>
                        <label for="title">Título:</label><br>
                        <input placeholder="titulo de la noticia" type="text" name="title" id="title">
                    </fieldset>
                    <fieldset>
                        <label for="abstract">Sinopsis:</label><br>
                        <textarea name="abstract" class="w-96 md:w-[600px]" rows="20"></textarea>
                    </fieldset>
                    <fieldset>
                        <label for="news">Noticia:</label><br>
                        <textarea name="news" class="w-96 md:w-[600px]" rows="20"></textarea>
                    </fieldset>
                    <fieldset>
                        <label for="tags">Tags</label><br>
                        <select name="tags" id="tags">
                            <option value="">Selecciona tags</option>
                            @foreach($tags as $tag)
                                <option value="{{$tag->id}}-{{$tag->tag}}">{{ucfirst($tag->tag)}}</option>
                            @endforeach
                        </select>
                        <div class="flex gap-1" id="tagdiv"></div>
                        <input type="hidden" name="taginput" value="" id="taginput">
                    </fieldset>
                    <input class="buttonBlue" type="submit" value="Enviar">
                </section>
            </form>
            <button class="buttonBlue" id="back">Volver</button>
        </x-card>

    </main>
</x-layout>

