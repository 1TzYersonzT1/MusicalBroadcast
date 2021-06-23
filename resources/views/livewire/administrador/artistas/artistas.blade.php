<div class="min-h-screen text-white py-5">
    <div class="mb-5">
        <span class="font-bold text-4xl">Solicitud de nuevos artistas</span>
    </div>

    @if(count($artistasPendientes) > 0)
    <div class="w-full">
        @foreach ($artistasPendientes as $artistaPendiente)
            <div class="bg-gray-200 px-4 py-2 text-primary my-4 lg:w-5/6">

                <span class="block mb-2">
                    Solicitado por: {{ $artistaPendiente->artista->representante->nombre }}
                    {{ $artistaPendiente->artista->representante->apellidos }}</span>


                <div class="grid grid-rows-3 grid-cols-12 gap-4">
                    <div class="lg:row-span-2 row-span-1 lg:col-span-4 col-span-12">
                        <img src="{{ asset('storage/' . $artistaPendiente->artista->imagen) }}" class="h-60 w-full" />
                    </div>

                    <div
                        class="lg:row-span-2 row-span-1 lg:col-start-5 lg:col-span-8 col-span-12 flex flex-col justify-between">
                        <div class="flex lg:flex-row flex-col justify-between">
                            <div class="flex">
                                <span>Nombre artista: </span>
                                <span>&nbsp{{ $artistaPendiente->artista->ART_Nombre }}</span>
                            </div>

                            <div>
                                <button wire:click="validarAprobarArtista('{{ $artistaPendiente->artista->id }}')"
                                    class="bg-green-500 py-1 px-2">Aprobar</button>
                                <button class="bg-yellow-500 py-1 px-2">Agregar observación</button>
                                <button wire:click="validarEliminarArtista('{{ $artistaPendiente->artista->id }}')"
                                    class="bg-red-500 py-1 px-2">Rechazar</button>
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


                    <div class="col-span-4">
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

                    <div class="col-span-4">
                        <span class="block mb-2">Albumes</span>
                        <div class="swiper-container swiperIntegrantes">
                            <div class="swiper-wrapper">
                                @foreach ($artistaPendiente->artista->albumes as $album)
                                    <div class="swiper-slide flex flex-col items-center mr-6">
                                        <img src="{{ asset('storage/' . $album->imagen) }}"
                                            class="h-12 w-12 rounded-full" />
                                        <span>{{ $album->ALB_Nombre }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="col-span-4">
                        <span class="block mb-2">Redes sociales</span>
                        <div class="py-2" style="float:left">

                            @if ($artistaPendiente->artista->facebook != '')
                                <a href="https://www.facebook.com/%7B%7B $artistaActual->facebook }}" target="_blank">
                                    <div style="float:left">
                                        <img src="/face.png" width="40" height="40">
                                    </div>
                                </a>
                            @endif
                            @if ($artistaPendiente->artista->instagram != '')
                                <a href="https://www.instagram.com/%7B%7B $artistaActual->instagram }}" target="_blank">
                                    <div style="float:left">
                                        <img src="/insta.png" width="40" height="40">
                                    </div>
                                </a>
                            @endif
                            @if ($artistaPendiente->artista->twitter != '')
                                <a href="https://twitter.com/%7B%7B $artistaActual->twitter }}" target="_blank">
                                    <div style="float:left">
                                        <img src="/twiter.png" width="40" height="40">
                                    </div>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @else 
        <span>No hay solicitudes de nuevos artistas pendientes</span>
    @endif
</div>

<script>
    window.addEventListener('validarAprobarArtista', function() {
        Swal.fire({
            title: '¿Está seguro?',
            text: `Esta a punto de aprobar la solicitud, por lo que el artista
            se podrá visualizar en la página.`,
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Si, aprobar'
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('confirmarAgregarArtista');

                Swal.fire({
                    title: 'Exito',
                    text: `Se ha aprobado la solicitud`,
                    icon: 'success',
                    timer: 3000,
                }).then((result) => {
                    if (!result.isVisible) {
                        location.href = location.href;
                    }
                })
            }
        });
    });

    window.addEventListener('validarEliminarArtista', function() {
        Swal.fire({
            title: '¿Está seguro?',
            text: `Esta a punto de rechazar la solicitud, por lo que el artista
            no será almacenado y la información se perderá.`,
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Si, rechazar'
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('confirmarEliminarArtista');

                Swal.fire({
                    title: 'Exito',
                    text: `Se ha rechazado la solicitud`,
                    icon: 'success',
                    timer: 3000,
                }).then((result) => {
                    if (!result.isVisible) {
                        location.href = location.href;
                    }
                })
            }
        });
    });

    window.addEventListener("prueba", (event) => {
        console.log(event.detail.test);
    })

    var swiper = new Swiper('.swiperIntegrantes', {
        slidesPerView: 2,
        spaceBetween: 30,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            1024: {
                slidesPerView: 5,
                spaceBetween: 0,
            },
        },
    });
</script>
