<x-layout :image="$image" :imageFondo="$imageFondo" :socialmedias="$socialmedias" :sponsors="$sponsors" :teams="$teams">
    <x-slot:title>Contáctanos</x-slot:title>
    <x-main :tweets="$tweets" :sponsors="$sponsors" :matchesBefore="$matchesBefore" :matchesAfter="$matchesAfter">
        <section class="w-full flex flex-col items-center">
            <x-card>
                <x-slot:show></x-slot:show>
                @include('partials.errors')
                <form id="formMessage" action="{{route('message')}}" method="POST">
                    @csrf
                    <input name="email" type="hidden" value="{{Auth::user()->email}}">
                    <input type="hidden" name="name" value="{{Auth::user()->name}}">
                    <h2 class="text-bold text-5xl text-bold">{{Auth::user()->name}}</h2>
                    <fieldset>
                        <label for="text">Mensaje:</label><br>
                        <textarea name="text" class="w-[300px] md:w-[600px] 2xl:w-[900px] text-4xl"></textarea>
                    </fieldset>
                    <input class="buttonBlue" type="submit" value="Enviar">
                </form>
            </x-card>
        </section>
    </x-main>
</x-layout>

