<div>
    <div class="min-h-screen py-5 text-white">
        <span class="text-4xl block mb-5">Solicitudes de evento</span>
        @if(count($eventos) > 0)
        <div class="swiper-container swiperSEventos">
            <div class="swiper-wrapper">
                @foreach ($eventos as $evento)
                    <livewire:administrador.eventos.evento 
                    :solicitud="$evento" 
                    :wire:key="$evento->id"
                    :solicitudActual="$loop->index" />
                @endforeach
            </div>
        </div>
        <div class="mt-8 text-white lg:w-7/12">
            <span class="text-2xl font-bold">Detalle del evento</span>
            
            <livewire:administrador.eventos.evento-preview 
            :solicitudActual="$eventos[0]" 
            :wire:key="$eventos[0]->id" />

        </div>
        @else
            <span>Por el momento, no existen solicitudes de evento</span>
        @endif
    </div>
</div>

<script>
    var mySwiper = {};

    function initializeSwiper(slideActual) {
        mySwiper = new Swiper('.swiperSEventos', {
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

    window.addEventListener("mostrarSolicitudEvento", (event) => {
        initializeSwiper(event.detail.slideActual);
    });

    window.onload = function() {
        initializeSwiper(0);
    }

</script>
