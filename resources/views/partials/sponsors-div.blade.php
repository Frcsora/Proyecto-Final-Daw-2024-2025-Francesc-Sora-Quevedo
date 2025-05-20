@if(!empty($sponsors))
    <h2>Patrocinadores</h2>
    <section class="overflow-x-scroll flex items-center bg-white gap-6">
        @foreach($sponsors as $sponsor)
            <section class="flex flex-col">
                <img alt="{{$sponsor->name}}" src="{{$sponsor->base64}}">
                <p>{{$sponsor->name}}</p>
            </section>
        @endforeach
    </section>
    @include('partials.linea')
@endif
