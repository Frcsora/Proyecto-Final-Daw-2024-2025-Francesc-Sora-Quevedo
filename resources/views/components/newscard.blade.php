@props(['title','img','sinopsis','tags', 'name', 'fecha','id'])
<div class="w-64 sm:w-full shadow-md border border-gray-200 gap-3 rounded-lg before:rounded-lg tarjeta p-2 flex flex-col justify-around items-center relative before:absolute before:opacity-80 before:bg-[wheat] before:p-2 before:w-full before:h-full before:content[''] before:z-[-1]">
    <h2 class="text-lg lg:text-2xl"><a href="{{route('news.show', $id)}}">{{$title}}</a></h2>
    <small>Creado por {{$name}} el {{\Carbon\Carbon::parse($fecha)->format('d/m/y H:i')}}</small>
    <img class="rounded-lg w-80 max-h-48" src="{{$img}}" alt="{{$name}}">
    <p class="md:w-[60%] bg-white text-base p-2">{{$sinopsis}}</p>
    @if(count($tags) > 0)
        <p>
            Etiquetas:
            @foreach($tags as $tag)
                <a href="{{route('tags.show', $tag->id)}}">{{$tag->tag}}</a>{{" "}}
            @endforeach
        </p>
    @endif
    @if(Auth::check() && in_array(Auth::User()->role, ['admin', 'superadmin']))
        <form action="{{route('news.edit', $id)}}">
            <button title="Editar noticia" type="submit"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z"/></svg></button>
        </form>
        <form method="POST" action="{{route('news.destroy', $id)}}">
            @csrf
            @method('DELETE')
            <button title="Eliminar noticia" type="submit"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg></button>
        </form>
    @endif
</div>
