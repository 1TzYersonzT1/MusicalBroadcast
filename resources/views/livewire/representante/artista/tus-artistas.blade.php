<div class="text-white py-5 min-h-screen">
    <div class=''>
        <span class="text-4xl mb-8 block">
            Tus Artistas
        </span>
        @if (count($artistas) > 0)
            <div class="swiper-container swiperArtistas">
                <div class="swiper-wrapper">
                    @foreach ($artistas as $artista)
                        <div class="swiper-slide bg-gray-200 h-full w-80 py-2 px-3 text-primary rounded-lg">
                            <div class="flex flex-col items-center mb-2">
                                <span class="text-xl block mb-2">{{ $artista->ART_Nombre }}</span>
                                <img src="{{ 'https://musicalimages.blob.core.windows.net/images/' . $artista->imagen }}"
                                    class="w-72 h-60" />
                            </div>
                            <div class="flex flex-col">
                                <span class="text-xl">Estilos</span>
                                <span>
                                    @foreach ($artista->estilos as $estilo)
                                        @if ($loop->last)
                                            {{ $estilo->EST_Nombre }}.
                                        @else
                                            {{ $estilo->EST_Nombre }},
                                        @endif
                                    @endforeach
                                </span>
                            </div>
                            <a href="{{ route('artista.show', $artista->id) }}"
                                class="mt-4 inline-flex px-6 py-1 bg-primary text-white rounded-lg">
                                Perfil
                            </a>
                            <a href="{{ route('representante.modificar-artista', $artista->id) }}"
                                class="mt-4 inline-flex px-6 py-1 bg-primary text-white rounded-lg">
                                Modificar Perfil
                            </a>
                        </div>
                    @endforeach
                </div>

            </div>
            <div class="swiper-pagination"></div>
        @else
            <span>No hay registro de que representes a uno o más artistas.</span>
        @endif
    </div>
</div>


<!-- Inicializar swiper talleres -->
<script>
    var mySwiper = {};

    function initializeSwiper(slideActual) {
        mySwiper = new Swiper('.swiperArtistas', {
            slidesPerView: 1,
            spaceBetween: 30,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 50,
                },
            },

        });
    }

    window.addEventListener('onContentChanged', (event) => {
        initializeSwiper(event.detail.slideActual);
    });

    window.onload = function() {
        initializeSwiper(0);
    }
</script>
