<x-layout :image="$image" :imageFondo="$imageFondo" :socialmedias="$socialmedias" :sponsors="$sponsors" :teams="$teams">
    <x-slot:title>Contáctanos</x-slot:title>
    <x-main :tweets="$tweets" :sponsors="$sponsors" :matchesBefore="$matchesBefore" :matchesAfter="$matchesAfter">
        <section class="w-full flex flex-col items-center">
            <x-card>
                <x-slot:show></x-slot:show>
                @include('partials.errors')
                <form class="h-[100%]" id="formMessage" action="{{route('message')}}" method="POST">
                    @csrf
                    <input name="email" type="hidden" value="{{Auth::user()->email}}">
                    <input type="hidden" name="name" value="{{Auth::user()->name}}">
                    <h2 class="text-bold text-3xl text-bold">{{Auth::user()->name}}</h2>
                    <fieldset>
                        <label for="text-base">Mensaje:</label><br>
                        <textarea name="text" class="w-[150px] md:w-[450px] 2xl:w-[700px] text-base"></textarea>
                    </fieldset>
                    <input class="buttonBlue" type="submit" value="Enviar">
                </form>
            </x-card>
        </section>
    </x-main>
</x-layout>

