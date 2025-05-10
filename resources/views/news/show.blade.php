<<<<<<< HEAD
<x-layout :image="$image" :imageFondo="$imageFondo" :socialmedias="$socialmedias">
=======
<x-layout :image="$image" :imageFondo="$imageFondo">
>>>>>>> parent of effacc4 (Revert "Primer commit del proyecto Laravel")
    <x-slot:title>News</x-slot:title>

    <main>
        <div class="noticia">
            <h2>{{$newsvar->title}}</h2>
            <small>Creado por {{$newsvar->user->name}} el {{$newsvar->created_at}}</small><br>
            <img src="{{$newsvar->image}}" alt="imagen noticia">
            <p>{{$newsvar->text}}</p>
            @isset($newsvar->tags)
                <p>
                    Etiquetas:
                    @foreach($newsvar->tags as $tag)

                        <a href="{{route('tags.show', $tag->id)}}">{{$tag->tag}}</a>{{" "}}
                    @endforeach
                </p>
            @endisset
            @if(Auth::check() && (Auth::user()->role === "admin" || Auth::user()->role === "superadmin"))
                <a href="{{route('news.edit', $newsvar->id)}}">Editar</a>
<<<<<<< HEAD
                <form method="POST" action="{{route('news.destroy', $newsvar->id)}}">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Eliminar noticia">
                </form>
=======
>>>>>>> parent of effacc4 (Revert "Primer commit del proyecto Laravel")
            @endif
        </div>
    </main>

</x-layout>

