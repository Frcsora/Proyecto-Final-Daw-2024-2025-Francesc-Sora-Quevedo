<header class="p-4 w-full bg-[#fac533]">
    <section class="flex justify-evenly gap-1">
        <a href="{{route('welcome')}}" class="w-24 md:w-32"><img class="w-24 md:w-32 lg:w-full logo" src="{{$image}}" alt="Logo del equipo pio pio e-sports"></a>
        <section class="w-full hidden xl:flex justify-between items-center">
            <nav class="w-full flex justify-center items-center lg:text-2xl 2xl:text-4xl">
                <ul class="flex items-center gap-5">
                    <a href="{{route('aboutus')}}"><li>Nuestro club</li></a>
                    <a href="{{route('teams.index')}}"><li>Equipos</li></a>
                    <a href="{{route('news.index')}}"><li>Noticias</li></a>
                    @if(Auth::check())
                        <a href="{{route('contactus')}}"><li>Contáctanos</li></a>
                    @endif
                    @if(!Auth::check())
                        <a href="{{route("login")}}"><li>Login</li></a>
                        <a href="{{route("register")}}"><li>Registrate</li></a>
                    @else
                                <li class="cursor-pointer relative" id="dropdown">
                                    <p class="flex">¡Bienvenido, {{Auth::user()->name}}! <svg class="w-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M2 334.5c-3.8 8.8-2 19 4.6 26l136 144c4.5 4.8 10.8 7.5 17.4 7.5s12.9-2.7 17.4-7.5l136-144c6.6-7 8.4-17.2 4.6-26s-12.5-14.5-22-14.5l-72 0 0-288c0-17.7-14.3-32-32-32L128 0C110.3 0 96 14.3 96 32l0 288-72 0c-9.6 0-18.2 5.7-22 14.5z"/></svg></p>
                                    <section class="z-[20]  rounded border border-black absolute w-full flex-col items-center p-2 bg-[#fac533] hidden dropdown-user" id="dropdown-user">
                                        <ul class="gap-4">
                                            @if(Auth::user()->role == 'admin' || Auth::user()->role == 'superadmin')
                                                <li><small><x-dropdown-link><a href="{{route('admin')}}">Administración</a></x-dropdown-link></small></li>
                                            @endif
                                            <li><small><x-dropdown-link><a href="{{route('profile.edit')}}">Editar perfil</a></x-dropdown-link></small></li>
                                            <li><form method="POST" action="{{route('logout')}}">
                                                    @csrf
                                                    <input class="cursor-pointer buttonRed" type="submit" value="Cerrar sesión">
                                                </form></li>
                                        </ul>
                                    </section>
                                </li>
                    @endif

                </ul>
            </nav>

            <ul class="w-12 flex flex-row-reverse z-20">
                @if(count($socialmedias) > 0)
                    @foreach($socialmedias as $socialmedia)
                        <li class="z-20 w-full"><a class="z-20" href="{{$socialmedia->link}}">{!! $socialmedia->medias->svg !!}</a></li>
                    @endforeach
                @endif
            </ul>
        </section>
        <section class="flex xl:hidden items-center">
            <ul class="hidden md:flex gap-2">
                @if(count($socialmedias) > 0)
                    @foreach($socialmedias as $socialmedia)
                        <li class="w-9"><a href="{{$socialmedia->link}}">{!! $socialmedia->medias->svg !!}</a></li>
                    @endforeach
                @endif
            </ul>
            <section class="flex md:hidden">
                <x-dropdown>
                    <x-slot name="trigger"><button><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M352 256c0 22.2-1.2 43.6-3.3 64l-185.3 0c-2.2-20.4-3.3-41.8-3.3-64s1.2-43.6 3.3-64l185.3 0c2.2 20.4 3.3 41.8 3.3 64zm28.8-64l123.1 0c5.3 20.5 8.1 41.9 8.1 64s-2.8 43.5-8.1 64l-123.1 0c2.1-20.6 3.2-42 3.2-64s-1.1-43.4-3.2-64zm112.6-32l-116.7 0c-10-63.9-29.8-117.4-55.3-151.6c78.3 20.7 142 77.5 171.9 151.6zm-149.1 0l-176.6 0c6.1-36.4 15.5-68.6 27-94.7c10.5-23.6 22.2-40.7 33.5-51.5C239.4 3.2 248.7 0 256 0s16.6 3.2 27.8 13.8c11.3 10.8 23 27.9 33.5 51.5c11.6 26 20.9 58.2 27 94.7zm-209 0L18.6 160C48.6 85.9 112.2 29.1 190.6 8.4C165.1 42.6 145.3 96.1 135.3 160zM8.1 192l123.1 0c-2.1 20.6-3.2 42-3.2 64s1.1 43.4 3.2 64L8.1 320C2.8 299.5 0 278.1 0 256s2.8-43.5 8.1-64zM194.7 446.6c-11.6-26-20.9-58.2-27-94.6l176.6 0c-6.1 36.4-15.5 68.6-27 94.6c-10.5 23.6-22.2 40.7-33.5 51.5C272.6 508.8 263.3 512 256 512s-16.6-3.2-27.8-13.8c-11.3-10.8-23-27.9-33.5-51.5zM135.3 352c10 63.9 29.8 117.4 55.3 151.6C112.2 482.9 48.6 426.1 18.6 352l116.7 0zm358.1 0c-30 74.1-93.6 130.9-171.9 151.6c25.5-34.2 45.2-87.7 55.3-151.6l116.7 0z"/></svg></button></x-slot>
                    <x-slot name="content">
                        <ul class="p-2 flex flex-col gap-5">
                            @if(count($socialmedias) > 0)
                                @foreach($socialmedias as $socialmedia)
                                    @dd($socialmedia)
                                    <li><a href="{{$socialmedia->link}}">{!! $socialmedia->medias->svg !!}</a></li>
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
                        @endif
                    </ul>
                </x-slot>
            </x-dropdown>
        </section>
    </section>
</header>
