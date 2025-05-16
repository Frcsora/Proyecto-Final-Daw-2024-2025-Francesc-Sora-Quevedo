<x-layout :image="$image" :imageFondo="$imageFondo" :socialmedias="$socialmedias">
    <x-slot:title>News</x-slot:title>
    <x-main>
        <x-card>
            <x-slot:show></x-slot:show>
            <h2 class="text-xl md:text-2xl lg:text-4xl">{{$newsvar->title}}</h2>
            <small>Creado por {{$newsvar->user->name}} el {{$newsvar->created_at}}</small><br>
            <img class="lg:w-96 rounded-lg max-h-96" src="{{$newsvar->image}}" alt="imagen noticia">
            <p class="bg-white p-1">{{$newsvar->text}}</p>
            @if(count($newsvar->tags) > 0)
                <p>
                    Etiquetas:
                    @foreach($newsvar->tags as $tag)

                        <a href="{{route('tags.show', $tag->id)}}">{{$tag->tag}}</a>{{" "}}
                    @endforeach
                </p>
            @endisset
            @if(Auth::check() && in_array(Auth::user()->role, ['admin', 'superadmin']))
                <a href="{{route('news.edit', $newsvar->id)}}">Editar</a>
                <form method="POST" action="{{route('news.destroy', $newsvar->id)}}">
                    @csrf
                    @method('DELETE')
                    <input class="buttonRed" type="submit" value="Eliminar noticia">
                </form>
            @endif
        </x-card>
    </x-main>
</x-layout>

