<div>
    <div class="text-white py-5 min-h-screen">
        <div class=''>
            <span class="text-4xl mb-8 block">
                Talleres disponibles ({{ count($talleres)}})
            </span>
            <div class="flex">
                @can('organizar')
                    <div>
                        <button class="bg-green-500 px-5 py-1 mb-5 text-white font-bold">
                            <a href="{{ route('organizador.creartaller') }}">Crear taller</a>
                        </button>
                    </div>
                    <div>
                        <button class="bg-yellow-500 px-5 py-1 mb-5 text-white font-bold ml-5">
                            <a href="{{ route('organizador.mis-solicitudes') }}">Estado solicitudes</a>
                        </button>
                    </div>
                    <div>
                        <button class="bg-purple-500 px-5 py-1 mb-5 text-white font-bold ml-5">
                            <a href="{{ route('organizador.taller/asistentes') }}">Mis talleres</a>
                        </button>
                    </div>
                @endcan

                @can('administrar')
                    <div>
                        <button class="bg-green-500 px-5 py-1 mb-5 text-white font-bold">
                            <a href="{{ route('administrador.talleres') }}">Administrar talleres</a>
                        </button>
                    </div>
                @endcan
            </div>

            <div>
                @if (count($talleres) > 0)
                    <div class="swiper-container swiperTalleres mb-5">
                        <div class="swiper-wrapper">
                            @foreach ($talleres as $taller)
                                <livewire:taller.taller :slideActual='$loop->index' :taller='$taller'
                                    :wire:key='$taller->id' />
                            @endforeach
                        </div>

                    </div>

                    <livewire:taller.taller-preview :tallerActual='$talleres[0]' :wire:key="$talleres[0]->id">
                    @else
                    <span>Sin registros</span>
                @endif
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
