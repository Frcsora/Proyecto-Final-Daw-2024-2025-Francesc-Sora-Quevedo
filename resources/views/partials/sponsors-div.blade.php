@if(count($sponsors) > 0)
    <x-card>
        <x-slot:show></x-slot:show>
            <h2>Patrocinadores</h2>
            <section class="flex flex-wrap gap-2">
                @foreach($sponsors as $sponsor)
                    <a href="{{$sponsor->link}}" target="_blank" rel="noopener noreferrer"><img class="w-24" alt="{{$sponsor->name}}" src="{{$sponsor->base64}}"></a>
                @endforeach
            </section>
    </x-card>
@endif
