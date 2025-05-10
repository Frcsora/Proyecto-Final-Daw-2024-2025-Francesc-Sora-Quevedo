<header>
    <section>
        <a href="{{route('welcome')}}" class="logo"><img  src="{{$image}}" alt="Logo del equipo pio pio e-sports"></a>
        <div class="menu-escritorio">
            <nav>
                <ul class="nav-list">
<<<<<<< HEAD
                    <a href="{{route('aboutus')}}"><li>Nuestro club</li></a>
                    <a href="{{route('teams.index')}}"><li>Equipos</li></a>
                    <a href="{{route('news.index')}}"><li>Noticias</li></a>
                    @if(Auth::check())
                        <a href="{{route('contactus')}}"><li>Contáctanos</li></a>
                    @endif
=======
                    <a><li>Nuestro club</li></a>
                    <a><li>Equipos</li></a>
                    <a><li>Noticias</li></a>
                    <a><li>Area abonados</li></a>
                    <a><li>Contáctanos</li></a>
>>>>>>> parent of effacc4 (Revert "Primer commit del proyecto Laravel")
                    @if(!Auth::check())
                        <a href="{{route("login")}}"><li>Login</li></a>
                        <a href="{{route("register")}}"><li>Registrate</li></a>
                    @else
<<<<<<< HEAD
                            <li class="dropdown" id="dropdown">
                                <p>¡Bienvenido, {{Auth::user()->name}}! <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M2 334.5c-3.8 8.8-2 19 4.6 26l136 144c4.5 4.8 10.8 7.5 17.4 7.5s12.9-2.7 17.4-7.5l136-144c6.6-7 8.4-17.2 4.6-26s-12.5-14.5-22-14.5l-72 0 0-288c0-17.7-14.3-32-32-32L128 0C110.3 0 96 14.3 96 32l0 288-72 0c-9.6 0-18.2 5.7-22 14.5z"/></svg></p>
                                <div class="hidden dropdown-user" id="dropdown-user">
                                    <ul class="dropdown-l">
                                        @if(Auth::user()->role == 'admin' || Auth::user()->role == 'superadmin')
                                            <li><small><a href="{{route('admin')}}">Administración</a></small></li>
                                        @endif
                                        <li><small><a href="{{route('profile.edit')}}">Editar perfil</a></small></li>
                                        <li><form method="POST" action="{{route('logout')}}">
                                                @csrf
                                                <input type="submit" class="logout" value="Cerrar sesión">
                                            </form></li>
                                    </ul>
                                </div>
                            </li>

=======
                        <li>Bienvenido, {{Auth::user()->name}}!</li>
                        @if(Auth::user()->role == 'admin' || Auth::user()->role == 'superadmin')
                            <small><a href="{{route('admin')}}">Administración</a></small>
                        @endif
                        <form method="POST" action="{{route('logout')}}">
                            @csrf
                            <input type="submit" class="logout" value="Cerrar sesión">
                        </form>
>>>>>>> parent of effacc4 (Revert "Primer commit del proyecto Laravel")
                    @endif

                </ul>
            </nav>
            <ul class="socialmedia">
<<<<<<< HEAD
                @if(count($socialmedias) > 0)
                    @foreach($socialmedias as $socialmedia)
                        <li><a href="{{$socialmedia->link}}">{!! $socialmedia->medias->svg !!}</a></li>
                    @endforeach
                @endif
=======
                <li><a href="https://x.com/PioPioEC"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zm297.1 84L257.3 234.6 379.4 396H283.8L209 298.1 123.3 396H75.8l111-126.9L69.7 116h98l67.7 89.5L313.6 116h47.5zM323.3 367.6L153.4 142.9H125.1L296.9 367.6h26.3z"/></svg></a></li>
                <li><a class="hidden"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l320 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64L64 32zM320.8 233l-23.3 23.1L320.8 279c24.1 23.9 24.1 63 0 86.9s-63.4 23.9-87.6 0l-8.5-8.4c-11.3 16-29.7 26.5-50.9 26.5c-34.1 0-61.9-27.5-61.9-61.4l0-133.2c0-33.8 27.7-61.4 61.9-61.4c21.1 0 39.6 10.5 50.9 26.5l8.5-8.4c24.1-23.9 63.4-23.9 87.6 0s24.1 63 0 86.9z"/></svg></a></li>
                <li><a class="hidden"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M194.4 211.7a53.3 53.3 0 1 0 59.3 88.7 53.3 53.3 0 1 0 -59.3-88.7zm142.3-68.4c-5.2-5.2-11.5-9.3-18.4-12c-18.1-7.1-57.6-6.8-83.1-6.5c-4.1 0-7.9 .1-11.2 .1c-3.3 0-7.2 0-11.4-.1c-25.5-.3-64.8-.7-82.9 6.5c-6.9 2.7-13.1 6.8-18.4 12s-9.3 11.5-12 18.4c-7.1 18.1-6.7 57.7-6.5 83.2c0 4.1 .1 7.9 .1 11.1s0 7-.1 11.1c-.2 25.5-.6 65.1 6.5 83.2c2.7 6.9 6.8 13.1 12 18.4s11.5 9.3 18.4 12c18.1 7.1 57.6 6.8 83.1 6.5c4.1 0 7.9-.1 11.2-.1c3.3 0 7.2 0 11.4 .1c25.5 .3 64.8 .7 82.9-6.5c6.9-2.7 13.1-6.8 18.4-12s9.3-11.5 12-18.4c7.2-18 6.8-57.4 6.5-83c0-4.2-.1-8.1-.1-11.4s0-7.1 .1-11.4c.3-25.5 .7-64.9-6.5-83l0 0c-2.7-6.9-6.8-13.1-12-18.4zm-67.1 44.5A82 82 0 1 1 178.4 324.2a82 82 0 1 1 91.1-136.4zm29.2-1.3c-3.1-2.1-5.6-5.1-7.1-8.6s-1.8-7.3-1.1-11.1s2.6-7.1 5.2-9.8s6.1-4.5 9.8-5.2s7.6-.4 11.1 1.1s6.5 3.9 8.6 7s3.2 6.8 3.2 10.6c0 2.5-.5 5-1.4 7.3s-2.4 4.4-4.1 6.2s-3.9 3.2-6.2 4.2s-4.8 1.5-7.3 1.5l0 0c-3.8 0-7.5-1.1-10.6-3.2zM448 96c0-35.3-28.7-64-64-64H64C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96zM357 389c-18.7 18.7-41.4 24.6-67 25.9c-26.4 1.5-105.6 1.5-132 0c-25.6-1.3-48.3-7.2-67-25.9s-24.6-41.4-25.8-67c-1.5-26.4-1.5-105.6 0-132c1.3-25.6 7.1-48.3 25.8-67s41.5-24.6 67-25.8c26.4-1.5 105.6-1.5 132 0c25.6 1.3 48.3 7.1 67 25.8s24.6 41.4 25.8 67c1.5 26.3 1.5 105.4 0 131.9c-1.3 25.6-7.1 48.3-25.8 67z"/></svg></a></li>
                <li><a class="hidden"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.3V349.4A162.6 162.6 0 1 1 185 188.3V278.2a74.6 74.6 0 1 0 52.2 71.2V0l88 0a121.2 121.2 0 0 0 1.9 22.2h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.1z"/></svg></a></li>
                <li><a class="hidden"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M391.2 103.5H352.5v109.7h38.6zM285 103H246.4V212.8H285zM120.8 0 24.3 91.4V420.6H140.1V512l96.5-91.4h77.3L487.7 256V0zM449.1 237.8l-77.2 73.1H294.6l-67.6 64v-64H140.1V36.6H449.1z"/></svg></a></li>
>>>>>>> parent of effacc4 (Revert "Primer commit del proyecto Laravel")
            </ul>
        </div>
        <div class="hidden menu-movil">
            <x-dropdown>
                <x-slot name="trigger"><button class="boton"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M0 96C0 78.3 14.3 64 32 64l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 128C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32l384 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 288c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32L32 448c-17.7 0-32-14.3-32-32s14.3-32 32-32l384 0c17.7 0 32 14.3 32 32z"/></svg></button></x-slot>
                <x-slot name="content">
                    <ul class="nav-movil">
                        <li><x-dropdown-link :href="route('welcome')">Nuestro club</x-dropdown-link></li>
                        <li><x-dropdown-link :href="route('welcome')">Equipos</x-dropdown-link></li>
                        <li><x-dropdown-link :href="route('welcome')">Noticias</x-dropdown-link></li>
                        <li><x-dropdown-link :href="route('welcome')">Contáctanos</x-dropdown-link></li>
                    </ul>
                </x-slot>
            </x-dropdown>
        </div>
    </section>
</header>
