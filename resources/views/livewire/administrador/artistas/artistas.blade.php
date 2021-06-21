<div class="min-h-screen text-white py-5">
    <div class="mb-5">
        <span class="font-bold text-4xl">Solicitud de nuevos artistas</span>
    </div>

    <div class="w-full">
        @foreach ($artistasPendientes as $artistaPendiente)
            <div class="bg-gray-200 px-4 py-2 text-primary my-4 lg:w-5/6">

                <span class="block mb-2">
                    Solicitado por: {{ $artistaPendiente->artista->representante->nombre }}
                    {{ $artistaPendiente->artista->representante->apellidos }}</span>


                <div class="grid grid-rows-3 grid-cols-12 gap-4">
                    <div class="lg:row-span-2 row-span-1 lg:col-span-4 col-span-12">
                        <img src="{{ asset('storage/' . $artistaPendiente->artista->imagen) }}"
                            class="h-60 w-full" />
                    </div>

                    <div class="lg:row-span-2 row-span-1 lg:col-start-5 lg:col-span-8 col-span-12 flex flex-col justify-between">
                        <div class="flex lg:flex-row flex-col justify-between"> 
                            <div class="flex">
                                <span>Nombre artista: </span>
                                <span>&nbsp{{ $artistaPendiente->artista->ART_Nombre }}</span>
                            </div>

                            <div> 
                                <button class="bg-green-500 py-1 px-2">Aprobar</button>
                                <button class="bg-yellow-500 py-1 px-2">Agregar observación</button>
                                <button class="bg-red-500 py-1 px-2">Rechazar</button>
                            </div>
                        </div>

                        <div> 
                            <span class="font-light">Biografia: </span>
                              
                            <p class="w-72 text-justify">{{ $artistaPendiente->artista->biografia }}</p>
                        </div>

                        <div> 
                            <span class="font-light">Estilos: </span>
                            <span>
                                @foreach ($artistaPendiente->artista->estilos as $estilo)
                                    @if ($loop->last)
                                        {{ $estilo->EST_Nombre }}.
                                    @else
                                        {{ $estilo->EST_Nombre }},
                                    @endif
                                @endforeach
                            </span>
                        </div>
                    </div>

                    <div class="col-span-12 col-start-1 px-4">
                        <span class="block mb-2">Integrantes</span>

                        <div class="swiper-container swiperIntegrantes">
                            <div class="swiper-wrapper">
                                @foreach ($artistaPendiente->artista->integrantes as $integrante)
                                    <div class="swiper-slide flex flex-col items-center mr-6">
                                        <img src="{{ asset('storage/' . $integrante->imagen) }}"
                                            class="h-12 w-12 rounded-full" />
                                        <span>{{ $integrante->nombre }} {{ $integrante->apellidos }} </span>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
    var swiper = new Swiper('.swiperIntegrantes', {
        slidesPerView: 3,
        spaceBetween: 30,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            1024: {
                slidesPerView: 12,
                spaceBetween: 0,
            },
        },
    });
</script>
