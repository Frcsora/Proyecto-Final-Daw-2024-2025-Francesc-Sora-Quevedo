<x-layout :image="$image" :imageFondo="$imageFondo" :socialmedias="$socialmedias">
    <x-slot:title>aboutus</x-slot:title>
    <x-main>
        <section class="w-96 lg:w-full rounded-lg before:rounded-lg tarjeta p-2 flex md:flex-col justify-around items-center relative before:absolute before:opacity-70 before:bg-[wheat] before:p-2 before:w-full before:h-full before:content[''] before:z-[-1]">
            <section class="gap-4 p-2 flex flex-col justify-around items-center">
                <h1 class="text-4xl font-bold">Sobre nosotros</h1><br><br>
                <p>Pio Pio eSports es un club nacido para impulsar a las Islas Canarias en el mundo de los eSports y consolidar los deportes electrónicos como una disciplina legítima.<br><br>
                    Fundado por <a href="https://x.com/ToneStarkGame">ToneStark</a> y <a href="https://x.com/Minimousk">Minimouka</a>, nuestro proyecto busca profesionalizar los eSports y demostrar que son mucho más que un simple juego: son una disciplina que requiere estrategia, preparación y dedicación, al igual que cualquier otro deporte. Inspirados por el crecimiento global del sector y su reconocimiento como una verdadera competición de élite, queremos consolidar una estructura sólida que permita el desarrollo de talento en nuestra región. Nuestro nombre, Pio Pio eSports, representa el orgullo y la identidad canaria, uniendo a nuestra comunidad bajo un mismo grito de pasión y competitividad. A través de un enfoque serio y estructurado, trabajamos para que Canarias tenga un papel destacado en el futuro de los eSports.</p>
                <h2>Encuentranos en nuestras redes sociales</h2><br>
                <section class="">
                    @foreach($socialmedias as $media)
                        <p class="text-2xl flex">{{$media->name}} - <a href="{{$media->link}}">{!! $media->medias->svg !!}</a></p><br>
                    @endforeach
                </section>
            </section>
        </section>
    </x-main>
</x-layout>
