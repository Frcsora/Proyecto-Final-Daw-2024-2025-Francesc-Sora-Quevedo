<x-layout :image="$image" :imageFondo="$imageFondo" :socialmedias="$socialmedias">
    <x-slot:title>Contáctanos</x-slot:title>
    <x-main>
        <section class="w-full flex flex-col items-center">
            <x-card>
                @include('partials.errors')
                <form id="formMessage" action="{{route('message')}}" method="POST">
                    @csrf
                    <input name="email" type="hidden" value="{{Auth::user()->email}}">
                    <input type="hidden" name="name" value="{{Auth::user()->name}}">
                    <h2 class="text-bold text-5xl text-bold">{{Auth::user()->name}}</h2>
                    <fieldset>
                        <label for="text">Mensaje:</label><br>
                        <textarea name="text" class="w-96 md:w-[600px] xl:w-[850px] 2xl:w-[1200px] text-4xl" rows="20"></textarea>
                    </fieldset>
                    <input class="buttonBlue" type="submit" value="Enviar">
                </form>
            </x-card>
        </section>
    </x-main>
</x-layout>

