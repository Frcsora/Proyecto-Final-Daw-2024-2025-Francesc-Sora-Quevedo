<footer class="bg-[#fac533] w-full p-4 text-3xl md:text-md gap-4 flex flex-col items-center md:flex-row md:items:center md:justify-around">
    <section>
        <section x-data="{ open: false }">
            <button @click="open = true" class="buttonBlue p-2 text-base">Ver Políticas</button>
            <section x-show="open" x-transition class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
                <section class="bg-white rounded-lg w-96 md:w-full max-w-2xl max-h-[90vh] overflow-y-auto p-6 relative">
                    <button @click="open = false"
                            class="buttonRed">
                        Cerrar
                    </button>
                    <section class="overflow-x-hidden text-gray-800 w-full">
                        <h2 class="text-md md:text-xl lg:text-3xl font-bold mb-6 text-center">Política de Privacidad – PioPioEsports</h2>
                        <p class="text-sm text-center text-gray-500 mb-8">Última actualización: 10 de mayo de 2025</p>

                        <h2 class="text-md md:text-xl font-semibold mb-2 mt-6">1. Información que recopilamos</h2>
                        <p class="text-sm md:text-xl mb-4">Podemos recopilar la siguiente información: correo electrónico, nombre de usuario, fecha de registro y actualización del perfil</p>

                        <h2 class="text-md md:text-xl font-semibold mb-2 mt-6">2. Cómo usamos tu información</h2>
                        <p class="text-sm md:text-xl mb-4">Usamos tu información para gestionar tu cuenta, comunicarnos contigo, mejorar nuestros servicios, y cumplir obligaciones legales.</p>

                        <h2 class="text-md md:text-xl font-semibold mb-2 mt-6">3. Compartición de datos</h2>
                        <p class="text-sm md:text-xl mb-4">No vendemos tus datos. Solo los compartimos con proveedores que colaboran con nosotros, cuando lo exige la ley, o para proteger nuestros derechos.</p>

                        <h2 class="text-md md:text-xl font-semibold mb-2 mt-6">4. Seguridad</h2>
                        <p class="text-sm md:text-xl mb-4">Usamos medidas razonables para proteger tu información, aunque ninguna tecnología es 100% infalible.</p>

                        <h2 class="text-md md:text-xl font-semibold mb-2 mt-6">5. Tus derechos</h2>
                        <p class="text-sm md:text-xl mb-4">Puedes acceder, corregir o eliminar tus datos personales, y retirar tu consentimiento escribiendo a <strong>piopioesportsclub@gmail.com</strong>.</p>

                        <h2 class="text-md md:text-xl font-semibold mb-2 mt-6">6. Menores de edad</h2>
                        <p class="text-sm md:text-xlmb-4">No recopilamos datos de menores de 13 años. Si lo hacemos por error, eliminaremos esa información inmediatamente.</p>

                        <h2 class="text-md md:text-xl font-semibold mb-2 mt-6">7. Cambios en la Política de Privacidad</h2>
                        <p class="text-sm md:text-xl mb-4">Podemos actualizar esta política y publicaremos cualquier cambio en esta misma página.</p>

                        <h2 class="text-md md:text-xl font-semibold mb-2 mt-6">8. Contacto</h2>
                        <p class="mb-2 text-sm md:text-xl">Si tienes dudas, puedes escribirnos a:</p>
                        <p class="mb-1 text-sm md:text-xl "><strong>Email:</strong> piopioesportsclub@gmail.com</p>
                        <p class="text-sm md:text-xl "><strong>Web:</strong> https://www.piopioesports.com</p>
                    </section>
                </section>
            </section>
        </section>
    </section>
    <section>
        <nav class="text-base">
            <p>Menú </p>
            <ul class="nav-list flex flex-col gap-2">
                <a href="{{ route('aboutus') }}"><li><p>Nuestro club</p></li></a>
                <a href="{{ route('teams.index') }}"><li>Equipos</li></a>
                <a href="{{ route('news.index') }}"><li>Noticias</li></a>
                @if(Auth::check() && in_array(Auth::user() ->role, ['admin', 'superadmin']))
                    <a href="{{ route('contactus') }}"><li>Contáctanos</li></a>
                @endif
            </ul>
        </nav>
    </section>
    <section class="flex flex-col h-full justify-around items-center">
        <small class="text-[11px] md:text-[13px]">
            <a href="https://piopioesports.up.railway.app/">PioPioEsports</a>
            © 2025 by
            <a href="https://www.fsoraquevedo.com"> Francesc Sorà </a>
            is licensed under
            <a href="https://creativecommons.org/licenses/by-nc-nd/4.0/">
                CC BY-NC-ND 4.0
            </a>
        </small>
        <section class="flex flex-row-reverse gap-2">
            @if(count($socialmedias) > 0)
                @foreach($socialmedias as $socialmedia)
                    <a href="{{$socialmedia->link}}">{!! $socialmedia->medias->svg !!}</a>
                @endforeach
            @endif
        </section>
    </section>
</footer>
