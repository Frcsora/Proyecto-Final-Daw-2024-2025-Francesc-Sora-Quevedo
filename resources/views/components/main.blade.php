@props(['tweets', 'sponsors','matchesBefore', 'matchesAfter'])
<main class="flex flex-col items-center justify-start gap-2">
    @include('partials.sponsors-div')
    <section class="flex flex-col lg:flex-row items-start gap-4">
        <section class="flex flex-col gap-5 text-center w-full md:w-[25%]">
            @include('partials.patreoncard')
            <x-card>

                <p class="text-md">Próximos encuentros</p>
                @isset($matchesAfter)
                    @foreach($matchesAfter as $match)
                        <p class="text-sm">PioPio Esports vs {{$match->rival}} {{\Carbon\Carbon::parse($match->date)->format('d/m/y')}} {{$match->time}}🔜</p>
                    @endforeach
                @endisset
            </x-card>
            <x-card>

                <p class="text-md">Últimos encuentros</p>
                @isset($matchesBefore)
                    @foreach($matchesBefore as $match)
                        <p class="text-sm">PioPio Esports vs {{$match->rival}} @isset($match->result) @if($match->result == 'Victoria') ✅ @elseif($match->result == 'Empate') 🟰 @elseif($match->result == 'Derrota') ❌ @else 🔜 @endif @endisset</p>
                    @endforeach
                @endisset
            </x-card>
        </section>
        <section class="w-full flex flex-col lg:flex-row items-center justify-around md:w-[50%]">{{$slot}}</section>
        @include('partials.tweets')
    </section>
    @if(!isset($news))
        @include('partials.linea')
    @endif
    @include('partials.status')
</main>
