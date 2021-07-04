<div class="min-h-screen text-white py-5">
    <div class="mb-5">
        <span class="font-bold text-4xl">Solicitud de nuevos artistas</span>
    </div>

    @if (count($artistasPendientes) > 0)
        <div class="w-full">
            @foreach ($artistasPendientes as $artistaPendiente)
                <div class="bg-gray-200 px-4 py-6 text-primary my-4 lg:w-full">

                    <div class="flex justify-between items-center mb-5">
                        <div>
                            <span class="font-bold">Solicitado por:</span>
                            <span>{{ $artistaPendiente->artista->representante->nombre }}
                                {{ $artistaPendiente->artista->representante->apellidos }}</span>
                        </div>

                        @if ($artistaPendiente->estado == 0)
                            <div class="bg-yellow-300 rounded-full w-32 py-1 text-center">
                                <span class="text-purple-600">Pendiente</span>
                            </div>
                        @endif

                        @if ($artistaPendiente->estado == 1)
                            <div class="bg-pink-400 rounded-full w-32 py-1 text-center"><span
                                    class="text-white">Revisada</span>
                            </div>
                        @endif

                        @if ($artistaPendiente->estado == 4)
                            <div class="bg-blue-400 rounded-full w-32 py-1 text-center"><span
                                    class="text-white">Modificada</span>
                            </div>
                        @endif

                        @if ($artistaPendiente->estado == 5)
                            <div class="bg-pink-700 rounded-full w-32 py-1 text-center"><span
                                    class="text-white">Pospuesto</span>
                            </div>
                        @endif
                    </div>

                    <div class="grid grid-rows-3 grid-cols-12 gap-4">
                        <div class="lg:row-span-2 row-span-1 lg:col-span-4 col-span-12">
                            <img src="{{ 'https://musicalimages.blob.core.windows.net/images/' . $artistaPendiente->artista->imagen }}"
                                class="h-full w-full" />
                        </div>

                        <div class="lg:row-span-2 row-span-1 lg:col-start-5 lg:col-span-8 col-span-12 flex flex-col">
                            <div class="flex lg:flex-row flex-col justify-between">
                                <div class="flex">
                                    <span class="font-bold">Nombre artista: </span>
                                    <span>&nbsp{{ $artistaPendiente->artista->ART_Nombre }}</span>
                                </div>

                                <div class="flex lg:my-0 my-2">
                                    <button wire:click="validarAprobarArtista('{{ $artistaPendiente->artista->id }}')"
                                        class="bg-green-500 py-1 px-2">Aprobar</button>

                                    <div x-data="{open: false}" x-cloak class="relative">
                                        <button @click="open = true" class="bg-yellow-500 py-1 px-2">Agregar
                                            observación</button>
                                        <div x-show="open"
                                            class="absolute mt-5 bg-white text-primary shadow-md text-white -left-28 px-4 py-2 w-80 bg-opacity-75">
                                            <div class="flex justify-between">
                                                <span class="font-bold">Agregar observación</span>
                                                <svg @click="open = false" xmlns="http://www.w3.org/2000/svg"
                                                    class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                                    stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </div>
                                            <textarea maxlength='255'
                                                placeholder="Agregue y envíe una observación (máximo 255 caracteres)"
                                                wire:model='observacion'
                                                class="mt-5 resize-none lg:w-72 bg-primary h-40 text-white"></textarea>

                                            @error('observacion')
                                                <span class="text-red-400">{{ $message }}</span>
                                            @enderror

                                            <button
                                                wire:click="validarObservacionArtista('{{ $artistaPendiente->artista->id }}')"
                                                class="bg-primary text-white px-4 py-2 mt-4">Agregar
                                                observación</button>

                                        </div>
                                    </div>

                                    <button
                                        wire:click="validarEliminarArtista('{{ $artistaPendiente->artista->id }}')"
                                        class="bg-red-500 py-1 px-2">Rechazar</button>
                                </div>
                            </div>

                            <div class="flex flex-col">
                                <span class="font-bold">Biografia: </span>

                                <textarea disabled
                                    class="resize-none px-0 py-2 h-40 bg-transparent border-0">{{ $artistaPendiente->artista->biografia }}</textarea>

                            </div>

                            <div class="mt-1">
                                <span class="font-bold">Estilos: </span>
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
                        @if ($artistaPendiente->artista->tipo_artista == 2)
                            <div class="lg:col-span-4 col-span-12 h-2 items-center">
                                <span class="block mb-2 font-bold">Integrantes</span>

                                <div class="swiper-container swiperIntegrantes ">
                                    <div class="swiper-wrapper">
                                        @foreach ($artistaPendiente->artista->integrantes as $integrante)
                                            <div class="swiper-slide flex flex-col items-center "
                                                x-data="{ open: false }">

                                                <div x-on:mouseover="open = true" x-on:mouseout="open = false">
                                                    <img src="{{ 'https://musicalimages.blob.core.windows.net/images/' . $integrante->imagen }}"
                                                        class="h-12 w-12 rounded-full" />
                                                </div>
                                                <div>
                                                    <span>{{ $integrante->nombre }}</span>
                                                </div>
                                                <div>
                                                    <span>{{ $integrante->apellidos }}</span>
                                                </div>
                                                <div x-show="open"
                                                    class="bg-white -mt-14 p-4  z-50 text-primary lg:w-34"
                                                    x-transition:enter="transition ease-out duration-300"
                                                    x-transition:enter-start="opacity-0 transform scale-90"
                                                    x-transition:enter-end="opacity-100 transform scale-100"
                                                    x-transition:leave="transition ease-in duration-300"
                                                    x-transition:leave-start="opacity-100 transform scale-100"
                                                    x-transition:leave-end="opacity-0 transform scale-90">

                                                    <div class="mb-5 flex flex-col">
                                                        <span class="font-bold">Instrumentos</span>
                                                        @foreach ($integrante->instrumentos as $instrumento)
                                                            <span>{{ $instrumento->INST_Nombre }}</span>
                                                        @endforeach
                                                    </div>
                                                </div>

                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="swiper-pagination-integrantes"></div>
                            </div>

                        @endif

                        <div class="lg:col-span-4 col-span-12 row-span-2">
                            <span class="block mb-2 font-bold">Albumes</span>
                            <div class="swiper-container swiperAlbumes">
                                <div class="swiper-wrapper">
                                    @foreach ($artistaPendiente->artista->albumes as $album)
                                        <div class="swiper-slide flex flex-col items-center">

                                            <img src="{{ 'https://musicalimages.blob.core.windows.net/images/' . $album->imagen }}"
                                                class="h-12 w-12 rounded-full" />
                                            <span>{{ $album->ALB_Nombre }}</span>

                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="swiper-pagination-albumes"></div>
                        </div>

                        <div class="lg:col-span-4 col-span-12 flex flex-col">
                            <span class="block mb-2 font-bold">Extra</span>
                            <div class="flex items-center">
                                @if ($artistaPendiente->artista->facebook != '')
                                    <a href="https://www.facebook.com/{{ $artistaPendiente->artista->facebook }}"
                                        target="_blank">
                                        <div style="float:left">
                                            <img src="/face.png" width="40" height="40">
                                        </div>
                                    </a>
                                @endif
                                @if ($artistaPendiente->artista->instagram != '')
                                    <a href="https://www.instagram.com/{{ $artistaPendiente->artista->instagram }}"
                                        target="_blank">
                                        <div style="float:left">
                                            <img src="/insta.png" width="40" height="40">
                                        </div>
                                    </a>
                                @endif
                                @if ($artistaPendiente->artista->twitter != '')
                                    <a href="https://twitter.com/{{ $artistaPendiente->artista->twitter }}"
                                        target="_blank">
                                        <div style="float:left">
                                            <img src="/twiter.png" width="40" height="40">
                                        </div>
                                    </a>
                                @endif
                            </div>
                            <div class="flex mt-2 gap-5 lg:flex-row flex-col">
                                @if ($artistaPendiente->artista->spotify != '')
                                    <iframe
                                        src="https://open.spotify.com/follow/1/?uri=spotify:artist:{{ $artistaPendiente->artista->spotify }}&size=detail&theme=light&show-count=0"
                                        width="200" height="56" scrolling="no" frameborder="0"
                                        style="border:none; overflow:hidden;" allowtransparency="true"></iframe>
                                @endif

                                @if ($artistaPendiente->artista->youtube != '')
                                    <div class="g-ytsubscribe "
                                        data-channelid="{{ $artistaPendiente->artista->youtube }}" data-layout="full"
                                        data-count="hidden">
                                    </div>
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
                });
            }
        });
    });


    window.addEventListener("validarObservacionArtista", function() {
        Swal.fire({
            title: '¿Está seguro?',
            text: `Se modificara la solicitud actual con la observación que ha hecho`,
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Agregar'
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('confirmarObservacionArtista');

                Swal.fire({
                    title: 'Exito',
                    text: `Se ha agregado la observación`,
                    icon: 'success',
                    timer: 3000,
                }).then((result) => {
                    if (!result.isVisible) {
                        location.href = location.href;
                    }
                });
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

    var swiper = new Swiper('.swiperAlbumes', {
        slidesPerView: 2,
        spaceBetween: 10,
        pagination: {
            el: ".swiper-pagination-albumes",
            clickable: true,
        },
        breakpoints: {
            1024: {
                slidesPerView: 1,
                spaceBetween: 0,
            },
        },
    });

    var swiper = new Swiper('.swiperIntegrantes', {
        effect: "coverflow",
        slidesPerView: "auto",
        spaceBetween: 10,
        pagination: {
            el: ".swiper-pagination-integrantes",
            clickable: true,
        },
        breakpoints: {
            1024: {
                slidesPerView: 1,
                spaceBetween: 0,
            },
        },
    });
</script>
