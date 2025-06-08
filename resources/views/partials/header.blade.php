<header class="p-4 w-full bg-[#fac533]">
    <section class="flex justify-evenly gap-1">
        <a href="{{route('welcome')}}" class="w-24 md:w-32"><img class="w-24 md:w-32 lg:w-full logo" src="{{ $image }}" alt="Logo del equipo pio pio e-sports"></a>
        <section class="w-full hidden xl:flex justify-between items-center">
            <nav class="w-full flex justify-center items-center lg:text-2xl">
                <ul class="flex items-center gap-5">
                    <li><a href="{{route('aboutus')}}">Nuestro club</a></li>
                    <li class="cursor-pointer relative" id="dropdownTeams">
                        <p class="flex">Equipos<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M2 334.5c-3.8 8.8-2 19 4.6 26l136 144c4.5 4.8 10.8 7.5 17.4 7.5s12.9-2.7 17.4-7.5l136-144c6.6-7 8.4-17.2 4.6-26s-12.5-14.5-22-14.5l-72 0 0-288c0-17.7-14.3-32-32-32L128 0C110.3 0 96 14.3 96 32l0 288-72 0c-9.6 0-18.2 5.7-22 14.5z"/></svg></p>
                        @foreach($teams as $team)
                            <section class="w-96 rounded-lg text-black border border-black absolute flex-col items-center p-4 bg-white hidden text-2xl" id="dropdown-team">
                                <ul class="gap-6 flex flex-col">
                                    <li><a href="{{ route('teams.show', $team->id) }}">{{ $team->name }}</a></li>
                                </ul>
                            </section>
                        @endforeach
                    </li>
                    <li><a href="{{route('news.index')}}">Noticias</a></li>
                    @if(Auth::check())
                        <li><a href="{{route('contactus')}}">Contáctanos</a></li>
                    @endif
                    @if(!Auth::check())
                        <li><a href="{{route("login")}}">Login</a></li>
                        <li><a href="{{route("register")}}">Registrate</a></li>
                    @else
                        <li class="cursor-pointer relative" id="dropdown">
                            <p class="flex">¡Bienvenido, {{Auth::user()->name}}! <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M2 334.5c-3.8 8.8-2 19 4.6 26l136 144c4.5 4.8 10.8 7.5 17.4 7.5s12.9-2.7 17.4-7.5l136-144c6.6-7 8.4-17.2 4.6-26s-12.5-14.5-22-14.5l-72 0 0-288c0-17.7-14.3-32-32-32L128 0C110.3 0 96 14.3 96 32l0 288-72 0c-9.6 0-18.2 5.7-22 14.5z"/></svg></p>
                            <section class="z-20 rounded-lg border border-black absolute w-full flex-col items-center p-4 bg-white text-black hidden dropdown-user" id="dropdown-user">
                                <ul class="gap-6 flex flex-col">
                                    @if(in_array(Auth::user()->role, ['admin', 'superadmin']))
                                                <li><small><a href="{{route('admin')}}">Administración</a></small></li>
                                    @endif
                                    <li><small><a href="{{route('profile.edit')}}">Editar perfil</a></small></li>
                                        <li>
                                            <form method="POST" action="{{route('logout')}}">
                                                @csrf
                                                <input class="cursor-pointer buttonRed" type="submit" value="Cerrar sesión">
                                            </form>
                                        </li>
                                </ul>
                            </section>
                        </li>
                    @endif

                </ul>
            </nav>
            <ul class="w-12 flex flex-row-reverse z-20">
                @if(count($socialmedias) > 0)
                    @foreach($socialmedias as $socialmedia)
                        <li class="z-20 w-full"><a class="z-20" href="{{$socialmedia->link}}" target="_blank" rel="noopener noreferrer">{!! $socialmedia->medias->svg !!}</a></li>
                    @endforeach
                @endif
            </ul>
        </section>
        <section class="flex xl:hidden items-center">
            <ul class="hidden md:flex gap-2">
                @if(count($socialmedias) > 0)
                    @foreach($socialmedias as $socialmedia)
                        <li class="w-9"><a href="{{ $socialmedia->link }}">{!! $socialmedia->medias->svg !!}</a></li>
                    @endforeach
                @endif
            </ul>
            <section>
                <section class="flex md:hidden">
                    <x-dropdown>
                        <x-slot name="trigger"><button><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M181.3 32.4c17.4 2.9 29.2 19.4 26.3 36.8L197.8 128l95.1 0 11.5-69.3c2.9-17.4 19.4-29.2 36.8-26.3s29.2 19.4 26.3 36.8L357.8 128l58.2 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-68.9 0L325.8 320l58.2 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-68.9 0-11.5 69.3c-2.9 17.4-19.4 29.2-36.8 26.3s-29.2-19.4-26.3-36.8l9.8-58.7-95.1 0-11.5 69.3c-2.9 17.4-19.4 29.2-36.8 26.3s-29.2-19.4-26.3-36.8L90.2 384 32 384c-17.7 0-32-14.3-32-32s14.3-32 32-32l68.9 0 21.3-128L64 192c-17.7 0-32-14.3-32-32s14.3-32 32-32l68.9 0 11.5-69.3c2.9-17.4 19.4-29.2 36.8-26.3zM187.1 192L165.8 320l95.1 0 21.3-128-95.1 0z"/></svg></button></x-slot>
                        <x-slot name="content">
                            <ul class="p-2 flex flex-col items-center gap-5">
                                @if(count($socialmedias) > 0)
                                    @foreach($socialmedias as $socialmedia)
                                        <li><x-dropdown-link :href="$socialmedia->link">
                                                <x-slot:svg></x-slot:svg>
                                                {!! $socialmedia->medias->svg !!}
                                            </x-dropdown-link></li>
                                    @endforeach
                                @endif
                            </ul>
                        </x-slot>
                    </x-dropdown>
                </section>
            </section>
            <section class="xl:hidden flex items-center">
                <x-dropdown>
                    <x-slot name="trigger"><button><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M0 96C0 78.3 14.3 64 32 64l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 128C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 288c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32L32 448c-17.7 0-32-14.3-32-32s14.3-32 32-32l384 0c17.7 0 32 14.3 32 32z"/></svg></button></x-slot>
                    <x-slot name="content">
                        <ul class="p-2 flex flex-col gap-5">
                            <li><x-dropdown-link :href="route('aboutus')">Nuestro club</x-dropdown-link></li>
                            <li><x-dropdown-link :href="route('teams.index')">Equipos</x-dropdown-link></li>
                            <li><x-dropdown-link :href="route('news.index')">Noticias</x-dropdown-link></li>
                            @if(Auth::check())
                                <li><x-dropdown-link :href="route('contactus')">Contáctanos</x-dropdown-link></li>

                                @if(in_array(Auth::user()->role, ['admin', 'superadmin']))
                                    <li><x-dropdown-link :href="route('admin')">Administración</x-dropdown-link></li>
                                @endif

                                <li><x-dropdown-link :href="route('profile.edit')">Editar perfil</x-dropdown-link></li>
                                <li><form method="POST" action="{{route('logout')}}">
                                        @csrf
                                        <input class="cursor-pointer buttonRed" type="submit" value="Cerrar sesión">
                                    </form></li>
                            @else
                                <li><x-dropdown-link :href="route('login')">Login</x-dropdown-link></li>
                                <li><x-dropdown-link :href="route('register')">Registrate</x-dropdown-link></li>
                            @endif
                        </ul>
                    </x-slot>
                </x-dropdown>
            </section>
        </section>

    </section>
</header>
