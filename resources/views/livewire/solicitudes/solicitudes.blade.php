<div>
    <div class="min-h-screen mt-12">
            <div class="swiper-container swiperSolicitudes">
                <div class="swiper-wrapper">
                    @foreach ($solicitudes as $solicitud)
                        <div class="swiper-slide">
                            <livewire:solicitudes.solicitud :solicitud='$solicitud' :wire:key='$solicitud->id' />
                        </div>
                    @endforeach

                </div>
            </div>
            <div class="mt-12 text-white">
                <span class="text-2xl font-bold">Detalle del taller</span>
                <livewire:solicitudes.solicitud-preview :solicitudActual='$solicitudes[0]'
                    :wire:key='$solicitudes[0]->id' />
            </div>
    </div>
</div>

<!-- Inicializar swiper talleres -->
<script>
    var mySwiper = {};

    function initializeSwiper() {
        mySwiper = new Swiper('.swiperSolicitudes', {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: 'auto',
            coverflowEffect: {
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: true,
            },
        });
    }

    window.onload = function() {
        initializeSwiper(0);
    }

</script>
