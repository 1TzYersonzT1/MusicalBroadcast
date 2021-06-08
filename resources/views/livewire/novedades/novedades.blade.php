<div>
    <div class="swiper-container swiperNovedades">
        <div class="swiper-wrapper">
            @foreach ($novedades as $novedad)
                <div class="swiper-slide">
                    <div class="lg:flex flex-col px-5 items-center">
                        <div class="mb-5 text-center"><span class="text-2xl text-white">{{ $novedad->titulo }}</span></div>
                        <div class="flex lg:w-5/12 lg:flex-row flex-col items-center justify-center">
                            <img class="w-36 h-36" src="{{ asset('xsusangrelogo.png') }}" />
                            <div class="flex items-center">
                                <div class="flex flex-col lg:ml-10 justify-between">
                                    <span class="text-white lg:mt-0 mt-10 mb-20">{{ $novedad->descripcion }} </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>

<script>
    var mySwiper = new Swiper(".swiperNovedades", {
        spaceBetween: 30,
        centeredSlides: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
    });

</script>
