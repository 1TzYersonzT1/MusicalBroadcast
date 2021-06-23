@section('banner')
    <div class="bg-cover bg-no-repeat"
        style="background-image: url('https://mexico-grlk5lagedl.stackpathdns.com/production/mexico/images/1547572747299933-Carlos-Maycotte.jpg?w=1920&h=800&fit=crop&crop=focalpoint&auto=%5B%22format%22%2C%20%22compress%22%5D&cs=srgb')">
        <div class="flex lg:flex-row justify-around flex-col py-6 h-full ">
            <div class="text-white px-10 py-10 text-center">
                <div class=" h-60 lg:w-60 flex-none bg-cover rounded-full lg:rounded-t-full lg:rounded-1 text-center overflow-hidden" >
                    <img src="{{asset('storage/'.$artistaActual->imagen) }}" />
                </div>
                <div class="mb-4 text-4xl font-bold shadow-inner">
                    {{ $artistaActual->ART_Nombre }}
                </div>
                <div class="py-2">
                    @if ($artistaActual->tipo_artista == 1)
                        Solista
                    @endif
                    @if ($artistaActual->tipo_artista == 0)
                        Banda
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection

<div>
    <div class="grid lg:grid-cols-8 gap-5 text-white py-4 lg:flex-col">

        <div class=" lg:col-span-6 justify-between">
            <div class="bg-black bg-opacity-20 px-2 py-1 lg:flex-col">
                <span class="top-5 mb-3 text-4xl font-bold">Discografia</span>
            </div>
            @if (count($artistaActual->albumes) > 0)
                <div class="swiper-container swiperDiscografia mt-5">
                    <div class="swiper-wrapper ">

                        @foreach ($artistaActual->albumes as $album)


                            <div class="swiper-slide  lg:w-96">
                                <div class="grid lg:grid-cols-2 ">
                                    <div class="text-center flex flex-col items-center w-full">
                                        <span class="text-white text-2xl">{{ $album->ALB_Nombre }}</span>
                                        <div class="lg:h-40 lg:w-40 w-40 mt-2 h-40 bg-cover rounded-full lg:rounded-t-full lg:rounded-1 text-center "
                                            style="background-image: url('https://tailwindcss.com/img/card-left.jpg')"
                                            title="Woman holding a mug">
                                        </div>
                                    </div>


                                    <div>
                                        <div class="swiper-container swipercancion lg:h-60">
                                            <div class="swiper-wrapper text-center">

                                                <div class="swiper-slide">01.Intro</div>

                                            </div>
                                            <div class="swiper-scrollbar"></div>
                                        </div>
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

        <div class="lg:col-span-2 ">
            <div class="bg-black bg-opacity-20 px-2 py-1 lg:flex-col">
                <div class="text-4xl font-bold ">
                    <span class="text-white">Musica</span>
                </div>
            </div>
            <div>
                @if ($artistaActual->spotify != '' and $artistaActual->youtube != '')
                    <div class="grid grid-cols-8 gap-5 text-white py-4 mt-5">
                        <iframe
                            src="https://open.spotify.com/follow/1/?uri=spotify:artist:{{ $artistaActual->spotify }}&size=detail&theme=dark&show-count=0"
                            width="300" height="56" scrolling="no" frameborder="0" style="border:none; overflow:hidden;"
                            allowtransparency="true"></iframe>
                    </div>
                    <br>
                    <div class="g-ytsubscribe" data-channelid="{{ $artistaActual->youtube }}" data-layout="full"
                        data-theme="dark" data-count="hidden">
                    </div>
                @else
                    <div class="mt-5">
                        <span class="mb-3 text-2xl font-bold">Proximamente..</span>
                    </div>
                @endif
            </div>

        </div>
    </div>

    <div class="grid lg:grid-cols-8 gap-5 text-white py-4 ">
        <div class="lg:col-span-6">
            <div class="bg-black bg-opacity-20 px-2 py-1 ">
                <span class="top-5 mb-3 text-4xl font-bold">Biografia</span>

            </div><br>
            <div>
                {{ $artistaActual->biografia }}
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
                <div class="mt-5">
                    <span class="top-5 mb-3 text-2xl font-bold">Proximamente..</span>
                </div>
            @endif
        </div>
    </div>

    @if (count($artistaActual->integrantes) > 0)
        <div class=" col-span-6 text-white">
            <div class="bg-black bg-opacity-20 px-2 py-1 ">
                <span class="top-5 mb-3 text-4xl font-bold">Integrantes</span>
            </div>
            <div class="swiper-container swiperIntegrante">
                <div class="swiper-wrapper ">
                    @foreach ($artistaActual->integrantes as $integrante)
                        <div class="swiper-slide w-40 text-center" x-data="{ open: false }">


                            <div x-on:mouseover="open = true" x-on:mouseout="open = false"
                                class=" h-40 w-40 flex-none bg-cover rounded-full lg:rounded-t-full lg:rounded-1 text-center overflow-hidden"
                                style="background-image: url('https://tailwindcss.com/img/card-left.jpg')"
                                title="Woman holding a mug">
                            </div>

                            <span>{{ $integrante->nombre }}</span>
                            <div x-show="open" @click.away="open = false"
                                class="bg-white absolute top-12 lg:-left-36 p-4 text-primary lg:w-40"
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 transform scale-90"
                                x-transition:enter-end="opacity-100 transform scale-100"
                                x-transition:leave="transition ease-in duration-300"
                                x-transition:leave-start="opacity-100 transform scale-100"
                                x-transition:leave-end="opacity-0 transform scale-90">

                                <div class="mb-5 flex flex-col">
                                    <div>{{ $integrante->nombre }}</div>
                                    <div>{{ $integrante->apellidos }}</div>
                                    <div>{{ $integrante->INST_Nombre }}</div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div><br><br>
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
    </div>

</div>

<script src="https://apis.google.com/js/platform.js"></script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
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
