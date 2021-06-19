<div>
    <div class="text-white py-5 min-h-screen">
        <div class=''>
            <span class="text-4xl mb-8 block">
                Tus Artistas 
            </span>
            <div class="flex">
                @can('organizar')
                    <div>
                        <button class="bg-green-500 px-5 py-1 mb-5 text-white font-bold">
                            <a href="{{ route('representante.crearartista') }}">Agregar artista</a>
                        </button>
                    </div>
                    <div>
                        <button class="bg-yellow-500 px-5 py-1 mb-5 text-white font-bold ml-5">
                            <a href="{{ route('organizador.mis-solicitudes') }}">Estado solicitudes</a>
                        </button>
                    </div>
                    <!-- 
                        Creo que deberiamos sacarlo
                        ya que la pagina en la que estamos ya muestra
                        sus artistas
                        <div>
                        <button class="bg-purple-500 px-5 py-1 mb-5 text-white font-bold ml-5">
                            <a href="{{ route('organizador.taller/asistentes') }}">Mis artistas</a>
                        </button>
                    </div> -->
                @endcan

                @can('administrar')
                    <div>
                        <button class="bg-green-500 px-5 py-1 mb-5 text-white font-bold">
                            <a href="{{ route('administrador.solicitudes') }}">Administrar artistas</a>
                        </button>
                    </div>
                @endcan
            </div>

            <div>
                

                @json($artistas)

            </div>
        </div>



    </div>
</div>

<!-- Inicializar swiper talleres -->
<script>
    var mySwiper = {};

    function initializeSwiper(slideActual) {
        mySwiper = new Swiper('.swiperTalleres', {
            slidesPerView: 1,
            spaceBetween: 30,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                1024: {
                    slidesPerView: 3,
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
