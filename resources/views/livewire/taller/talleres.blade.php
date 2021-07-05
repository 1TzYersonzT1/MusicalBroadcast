<div>
    <div class="text-white py-5 min-h-screen">
        <div class='bg-black bg-opacity-20 px-5 py-3'>
            <span class="text-4xl mb-8 block">
                Talleres disponibles ({{ count($talleres)}})
            </span>
            <div>
                @if (count($talleres) > 0)
                    <div class="swiper-container swiperTalleres mb-5">
                        <div class="swiper-wrapper rounded-lg">
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
            initialSlide: slideActual,
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
