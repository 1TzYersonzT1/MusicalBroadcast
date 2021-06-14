<div>
    <div class="min-h-screen py-5 text-white">
        <span class="text-4xl block mb-5">Solicitudes de taller</span>
        @if(count($solicitudes) > 0)
        <div class="swiper-container swiperSolicitudes">
            <div class="swiper-wrapper">
                @foreach ($solicitudes as $solicitud)
                    <livewire:administrador.solicitudes.solicitud 
                    :solicitud='$solicitud' :slideActual="$loop->index"
                    :wire:key='$solicitud->id' />
                @endforeach

            </div>
        </div>
        <div class="mt-8 text-white lg:w-7/12">
            <span class="text-2xl font-bold">Detalle del taller</span>
            <livewire:administrador.solicitudes.solicitud-preview :solicitudActual='$solicitudes[0]'
                :wire:key='$solicitudes[0]->id' />
        </div>
        @else
            <span>Por el momento, no existen solicitudes de taller</span>
        @endif
    </div>
</div>

<!-- Inicializar swiper talleres -->
<script>
    var mySwiper = {};

    function initializeSwiper(slideActual) {
        mySwiper = new Swiper('.swiperSolicitudes', {
            initialSlide: slideActual,
            slidesPerView: 'auto',
            breakpoints: {
                640: {
                    slidesPerView: 'auto',
                 
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 10,
                },
            },
        });
    }

    window.addEventListener("mostrarSolicitud", (event) => {
        initializeSwiper(event.detail.slideActual);
    });

    window.onload = function() {
        initializeSwiper(0);
    }

</script>
