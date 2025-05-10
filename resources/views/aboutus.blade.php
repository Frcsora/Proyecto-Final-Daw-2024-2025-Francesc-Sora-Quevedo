<x-layout :image="$image" :imageFondo="$imageFondo" :socialmedias="$socialmedias">
    <x-slot:title>aboutus</x-slot:title>
    <main>
        <div class="noticia">
            <div class="aboutus">
                <h1>Sobre nosotros</h1>
                <p>Pio Pio eSports es un club nacido para impulsar a las Islas Canarias en el mundo de los eSports y consolidar los deportes electrónicos como una disciplina legítima.<br><br>
                    Fundado por <a href="https://x.com/ToneStarkGame">ToneStark</a> y <a href="https://x.com/Minimousk">Minimouka</a>, nuestro proyecto busca profesionalizar los eSports y demostrar que son mucho más que un simple juego: son una disciplina que requiere estrategia, preparación y dedicación, al igual que cualquier otro deporte. Inspirados por el crecimiento global del sector y su reconocimiento como una verdadera competición de élite, queremos consolidar una estructura sólida que permita el desarrollo de talento en nuestra región. Nuestro nombre, Pio Pio eSports, representa el orgullo y la identidad canaria, uniendo a nuestra comunidad bajo un mismo grito de pasión y competitividad. A través de un enfoque serio y estructurado, trabajamos para que Canarias tenga un papel destacado en el futuro de los eSports.</p>
                <h2>Encuentranos en nuestras redes sociales</h2>
                <div class="socialmediaAboutus">
                    @foreach($socialmedias as $media)
                        <p>{{$media->name}} - <a href="{{$media->link}}">{!! $media->medias->svg !!}</a></p>
                    @endforeach
                </div>
            </div>
        </div>
    </main>
</x-layout>
