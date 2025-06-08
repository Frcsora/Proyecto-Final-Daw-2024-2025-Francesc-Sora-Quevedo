@props(['tweets', 'sponsors','matchesBefore', 'matchesAfter'])
<main class="flex flex-col items-center justify-start gap-2">
    <section class="flex flex-col lg:flex-row items-center lg:items-start gap-4">
        <section id="left-container" class="lg:overflow-y-scroll flex flex-col gap-5 lg:justify-around text-center items-center w-full lg:w-[25%]">
            <section id="left-container-top" class="flex flex-col gap-5 w-full justify-around items-center">
                @include('partials.patreoncard')
                <x-card>
                    <x-slot:tarjeta></x-slot:tarjeta>
                    <p class="text-lg"><b>Próximos encuentros</b></p>
                    @isset($matchesAfter)
                        @foreach($matchesAfter as $match)
                            <p class="text-sm">PioPio Esports vs {{$match->rival}} {{\Carbon\Carbon::parse($match->date)->format('d/m/y')}} {{$match->time}}🔜</p>
                        @endforeach
                    @endisset
                </x-card>
                <x-card>
                    <x-slot:tarjeta></x-slot:tarjeta>
                    <p class="text-lg"><b>Últimos encuentros</b></p>
                    @isset($matchesBefore)
                        @foreach($matchesBefore as $match)
                            <p class="text-sm">PioPio Esports vs {{$match->rival}} @isset($match->result) @if($match->result == 'Victoria') ✅ @elseif($match->result == 'Empate') 🟰 @elseif($match->result == 'Derrota') ❌ @else 🔜 @endif @endisset</p>
                        @endforeach
                    @endisset
                </x-card>
            </section>
            <section>
                @include('partials.sponsors-div')
            </section>
        </section>
        <section id="main-container" class="w-full flex flex-col lg:flex-row items-center justify-around lg:w-[50%]">{{$slot}}</section>
        @include('partials.tweets')
    </section>
    @include('partials.status')
</main>
