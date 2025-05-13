<main class="flex flex-col w-full">
    <section class="flex flex-col lg:flex-row items-center justify-center gap-4">
        @include('partials.patreoncard')
        <section class="w-full">{{$slot}}</section>
    </section>
    @isset($newsindex)
        @include('partials.status')

    @else
        @include('partials.linea')
        @include('partials.status')
        @include('partials.back')
    @endisset

</main>
