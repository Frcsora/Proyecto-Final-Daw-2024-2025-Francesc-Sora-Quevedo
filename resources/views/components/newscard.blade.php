@props(['title','img','sinopsis','tags', 'name', 'fecha','id'])
<div class="md:w-full gap-3 rounded-lg before:rounded-lg tarjeta p-2 flex flex-col justify-around items-center relative before:absolute before:opacity-80 before:bg-[wheat] before:p-2 before:w-full before:h-full before:content[''] before:z-[-1]">
    <h2 class="text-xl md:text-2xl lg:text-4xl"><a href="{{route('news.show', $id)}}">{{$title}}</a></h2>
    <small>Creado por {{$name}} el {{$fecha}}</small>
    <img class="rounded-lg w-80 max-h-48" src="{{$img}}" alt="imagen noticia">
    <p class="bg-white">{{$sinopsis}}</p>

    @if(count($tags) > 0)
        <p>
            Etiquetas:
            @foreach($tags as $tag)
                <a href="{{route('tags.show', $tag->id)}}">{{$tag->tag}}</a>{{" "}}
            @endforeach
        </p>
    @endif
    @if(Auth::check() && in_array(Auth::User()->role, ['admin', 'superadmin']))
        <a href="{{route("news.edit", $id)}}">Editar</a>
        <form method="POST" action="{{route('news.destroy', $id)}}">
            @csrf
            @method('DELETE')
            <input class="buttonRed" type="submit" value="Eliminar noticia">
        </form>
    @endif
</div>
