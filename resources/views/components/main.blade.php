@props(['tweets', 'sponsors'])
@include('partials.sponsors-div')

<main class="flex flex-col items-center gap-2">
    <section class="flex flex-col lg:flex-row items-center md:items-start gap-4">
        @include('partials.patreoncard')
        <section class="w-full flex flex-col lg:flex-row items-center justify-around">{{$slot}}</section>
    </section>
    @include('partials.linea')
    @include('partials.tweets')
    @include('partials.linea')
    @include('partials.status')
    @include('partials.back')
</main>
