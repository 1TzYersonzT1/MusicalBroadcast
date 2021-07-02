@section('banner')
    <div class="bg-cover bg-no-repeat"
        style="background-image: url('https://mexico-grlk5lagedl.stackpathdns.com/production/mexico/images/1547572747299933-Carlos-Maycotte.jpg?w=1920&h=800&fit=crop&crop=focalpoint&auto=%5B%22format%22%2C%20%22compress%22%5D&cs=srgb')">
        <div class="flex lg:flex-row justify-around flex-col py-6 h-full ">
            <div class="text-white px-10 py-10 flex flex-col items-center">
                <div
                    class=" h-60 w-60 flex-none bg-cover rounded-full lg:rounded-t-full lg:rounded-1 text-center overflow-hidden">
                    <img src="{{ 'https://musicalimages.blob.core.windows.net/images/' . $artistaActual->imagen }}"
                        class="h-60 w-60" />
                </div>
                <div class="mb-4 text-center text-4xl font-bold shadow-inner">
                    {{ $artistaActual->ART_Nombre }}
                </div>

                @if ($artistaActual->estado == 0)
                    <div x-data="{open: false}" class="relative bg-gray-700 rounded-full px-4 py-1 flex">
                        <span class="block mr-2">Oculto</span>
                        <svg x-on:mouseover="open = true" x-on:mouseout="open = false" xmlns="http://www.w3.org/2000/svg"
                            class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>

                        <div x-show="open" class="p-8 absolute bg-gray-500 bg-opacity-75 -top-40 lg:left-28 -left-28">
                            <div class="col-span-8">
                                <span>El artista no es visible para los usuarios de la página web debido
                                    a que se encuentra con una solicitud en proceso.</span>

                                @if ($artistaActual->solicitud->estado == 0)

                                    <span class="text-yellow-500">Pendiente.</span>

                                @endif

                                @if ($artistaActual->solicitud->estado == 1)

                                    <span class="text-pink-400">Revisada.</span>
                                    <div class="mt-4 w-72">
                                        <span class="text-red-500">Cambios que debes realizar</span>
                                        <span
                                            class="block text-justify">{{ $artistaActual->solicitud->observacion }}</span>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endif

                <div class="py-2 font-bold">
                    @if ($artistaActual->tipo_artista == 1)
                        Solista
                    @endif
                    @if ($artistaActual->tipo_artista == 2)
                        Banda
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

<div>
    <div class="grid lg:grid-cols-8 grid-cols-6 gap-5 text-white py-4 lg:flex-col">

        <div class="lg:col-span-6 col-span-6 justify-between">
            <div class="bg-black bg-opacity-20 px-2 py-1 lg:flex-col">
                <span class="top-5 mb-3 text-4xl font-bold">Discografia</span>
            </div>
            @if (count($artistaActual->albumes) > 0)
                <div class="swiper-container swiperDiscografia mt-5">
                    <div class="swiper-wrapper ">

                        @foreach ($artistaActual->albumes as $album)
                            <div class="swiper-slide lg:w-96">
                                <div class="grid lg:grid-cols-2 items-center">
                                    <div class="text-center flex flex-col items-center w-full">
                                        <span class="text-white text-2xl">{{ $album->ALB_Nombre }}</span>
                                        <div
                                            class="lg:h-40 lg:w-40 w-40 mt-2 h-40 bg-cover rounded-full lg:rounded-t-full lg:rounded-1 text-center ">
                                            <img src="{{ 'https://musicalimages.blob.core.windows.net/images/' . $album->imagen }}"
                                                class="h-40 w-40" />
                                        </div>
                                    </div>



                                    <div class="swiper-container swipercancion">
                                        <div class="swiper-wrapper text-center flex items-end">
                                            <ul>
                                                @foreach ($album->canciones as $index => $cancion)
                                                    <li>{{ $index + 1 }}.{{ $cancion->CAN_Nombre }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="swiper-scrollbar"></div>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div><br><br>
                    <div class="swiper-pagination"></div>
                </div>

            @else
                <div class="mt-5">
                    <span class="mb-3 text-2xl font-bold">Proximamente..</span>
                </div>
            @endif
        </div>

        <div class="lg:col-span-2 col-span-6">
            <div class="bg-black bg-opacity-20 px-2 py-1 lg:flex-col">
                <div class="text-4xl font-bold ">
                    <span class="text-white">Musica</span>
                </div>
            </div>
            <div class="py-5 px-2">
                @if ($artistaActual->spotify != '' or $artistaActual->youtube != '')
                    <div class="text-white mb-6">
                        <iframe
                            src="https://open.spotify.com/follow/1/?uri=spotify:artist:{{ $artistaActual->spotify }}&size=detail&theme=dark&show-count=0"
                            width="300" height="56" scrolling="no" frameborder="0" allowtransparency="true"></iframe>
                    </div>
                    <div>
                        <div class="g-ytsubscribe" data-channelid="{{ $artistaActual->youtube }}" data-layout="full"
                            data-theme="dark" data-count="hidden">
                        </div>
                    </div>
                @else
                    <div class="my-5 px-2">
                        <span class="text-2xl font-bold">Proximamente..</span>
                    </div>
                @endif
            </div>

        </div>
    </div>

    <div class="grid lg:grid-cols-8 col-span-6 gap-5 text-white">
        <div class="lg:col-span-6">
            <div class="bg-black bg-opacity-20 px-2 py-1">
                <span class="top-5 mb-3 text-4xl font-bold">Biografia</span>
            </div>
            <div class="py-5">
                <textarea disabled
                    class="resize-none h-40 w-full bg-transparent border-0">{{ $artistaActual->biografia }}</textarea>
            </div>

        </div>

        <div class="lg:col-span-2">
            <div class="bg-black bg-opacity-20 px-2 py-1">
                <div class="text-4xl font-bold">
                    <span class="text-white">Proximo Evento</span>
                </div>
            </div>
            @if (count($artistaActual->eventos) > 0)
                <div class="swiper-container swiperevento ">
                    <div class="swiper-wrapper ">

                        <livewire:artista.proximo-evento :artistaActual="$artistaActual" />
                    </div><br><br>
                    <div class="swiper-pagination"></div>
                </div>
            @else
                <div class="my-5">
                    <span class="px-2 text-2xl font-bold">Proximamente..</span>
                </div>
            @endif
        </div>
    </div>

    @if (count($artistaActual->integrantes) > 0)
        <div class=" col-span-6 text-white">
            <div class="bg-black bg-opacity-20 px-2 py-1 ">
                <span class="top-5 mb-3 text-4xl font-bold">Integrantes</span>
            </div>
            <div class="swiper-container swiperIntegrante py-5">
                <div class="swiper-wrapper ">
                    @foreach ($artistaActual->integrantes as $integrante)
                        <div class="swiper-slide w-40 text-center text-white" x-data="{ open: false }">


                            <div x-on:mouseover="open = true" x-on:mouseout="open = false"
                                class=" h-40 w-40 flex-none bg-cover rounded-full lg:rounded-t-full lg:rounded-1 text-center overflow-hidden">
                                <img src="{{ 'https://musicalimages.blob.core.windows.net/images/' . $integrante->imagen }}"
                                    class="h-40 w-40" />
                            </div>
                            <div>
                                <span>{{ $integrante->nombre }}</span>
                            </div>
                            <div>
                                <span>{{ $integrante->apellidos }}</span>
                            </div>


                            <div x-show="open" @click.away="open = false"
                                class="bg-white absolute top-12 lg:-left-36 p-4 text-primary lg:w-52"
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
                <div class="swiper-pagination"></div>
            </div>
        </div>
    @endif

    <div class="py-2" style="float:left">

        @if ($artistaActual->facebook != '')
            <a href="https://www.facebook.com{{ $artistaActual->facebook }}" target="_blank">
                <div style="float:left">
                    <img src="/face.png" width="40" height="40">
                </div>
            </a>
        @endif
        @if ($artistaActual->instagram != '')
            <a href="https://www.instagram.com{{ $artistaActual->instagram }}" target="_blank">
                <div style="float:left">
                    <img src="/insta.png" width="40" height="40">
                </div>
            </a>
        @endif
        @if ($artistaActual->twitter != '')
            <a href="https://twitter.com/{{ $artistaActual->twitter }}" target="_blank">
                <div style="float:left">
                    <img src="/twiter.png" width="40" height="40">
                </div>
            </a>
        @endif
        @can('modificar-artista', $artistaActual)
            <button>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" class="text-white" />
                </svg>
            </button>
        @endcan
    </div>

</div>

<script>
    var swiper = new Swiper(".swiperDiscografia", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        coverflowEffect: {
            rotate: 50,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows: true,
        },
        pagination: {
            el: ".swiper-pagination",
        },
        breakpoints: {
            640: {
                slidesPerView: "auto",
                spaceBetween: 10,
            },
            768: {
                slidesPerView: "auto",
                spaceBetween: 20,
            },
            1024: {
                slidesPerView: "auto",
                spaceBetween: 40,
            },
        },
    });
</script>

<script>
    var swiper = new Swiper(".swiperIntegrante", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        coverflowEffect: {
            rotate: 50,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows: true,
        },
        pagination: {
            el: ".swiper-pagination",
        },
    });
</script>

<script>
    var swiper = new Swiper(".swipercancion", {
        direction: "vertical",
        slidesPerView: 10,
        freeMode: true,
        scrollbar: {
            el: ".swiper-scrollbar",
        },
        mousewheel: true,
    });
</script>

<script>
    var swiper = new Swiper(".swiperevento", {
        effect: "cube",
        grabCursor: true,
        cubeEffect: {
            shadow: true,
            slideShadows: true,
            shadowOffset: 20,
            shadowScale: 0.94,
        },
        pagination: {
            el: ".swiper-pagination",
        },
    });
</script>
