@props(['title','img','sinopsis','tags', 'name', 'fecha','id'])
<div class="tarjeta">
    <h2><a href="{{route('news.show', $id)}}">{{$title}}</a></h2>
    <small>Creado por {{$name}} el {{$fecha}}</small>
    <img src="{{$img}}" alt="imagen noticia">
    <p>{{$sinopsis}}</p>
    @if(count($tags) > 0)
        <p>
            Etiquetas:
            @foreach($tags as $tag)
                <a href="{{route('tags.show', $tag->id)}}">{{$tag->tag}}</a>{{" "}}
            @endforeach
        </p>
    @endif
    @if(Auth::check() && (Auth::user()->role == "admin" || Auth::user()->role == "superadmin"))
        <a href="{{route("news.edit", $id)}}">Editar</a>
<<<<<<< HEAD
        <form method="POST" action="{{route('news.destroy', $id)}}">
            @csrf
            @method('DELETE')
            <input type="submit" value="Eliminar noticia">
        </form>
=======
>>>>>>> parent of effacc4 (Revert "Primer commit del proyecto Laravel")
    @endif
</div>
