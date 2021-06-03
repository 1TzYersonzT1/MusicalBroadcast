<div>
    <div class="min-h-screen mt-12">
        <div class="swiper-container swiperSolicitudes">
            <div class="swiper-wrapper">
                @foreach ($solicitudes as $solicitud)

                    <livewire:solicitudes.solicitud :solicitud='$solicitud' :wire:key='$solicitud->id' />

                @endforeach

            </div>
        </div>
        <div class="mt-12 text-white w-7/12">
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
            slidesPerView: 'auto',
            freeMode: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                640: {
                    slidesPerView: 'auto',
                 
                },
                768: {
                    slidesPerView: 2,
                
                },
                1024: {
                    slidesPerView: 'auto',
                    spaceBetween: 10,
                },
            },
        });
    }

    window.onload = function() {
        initializeSwiper(0);
    }

</script>
