@props(['tweets', 'sponsors','matchesBefore', 'matchesAfter'])
<main class="flex flex-col items-center gap-2">
    @include('partials.sponsors-div')
    <section class="flex flex-col lg:flex-row items-center md:items-start gap-4">
        <section class="flex flex-col gap-5">
            @include('partials.patreoncard')
            <x-card>
                <p class="text-md">Próximos encuentros</p>
                @isset($matchesAfter)
                    @foreach($matchesAfter as $match)
                        <p class="text-sm">PioPio Esports vs {{$match->rival}} {{\Carbon\Carbon::parse($match->date)->format('d/m/y')}}} {{$match->time}}</p>
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
        <section class="w-full flex flex-col lg:flex-row items-center justify-around">{{$slot}}</section>
    </section>
    @include('partials.linea')
    @include('partials.tweets')
    @include('partials.linea')
    @include('partials.status')
    @include('partials.back')
</main>
