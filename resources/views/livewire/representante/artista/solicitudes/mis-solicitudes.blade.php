<div class="min-h-screen text-white py-5">
    <div>
        <div class="">
            <div>
                <span class="text-4xl block mb-5">Artistas pendientes</span>
            </div>
            @if (count($artistasPendientes) > 0)
                <div class="swiper-container swiperPendientes">
                    <div class="swiper-wrapper">
                        @foreach ($artistasPendientes as $artistaPendiente)
                            <livewire:representante.artista.solicitudes.artista :artista="$artistaPendiente"
                                :wire:key="$artistaPendiente->id" />
                        @endforeach
                    </div>
                </div>
            @else
                <span>No tienes solicitudes pendientes</span>
            @endif
        </div>


        <div class="mt-10 mb-16">
            <div>
                <span class="text-4xl block mb-5">Solicitudes revisadas</span>
            </div>
            @if (count($artistasRevisados) > 0)
                <div class="swiper-container swiperRevisadas">
                    <div class="swiper-wrapper">
                        @foreach ($artistasRevisados as $artistaRevisado)
                            <livewire:representante.artista.solicitudes.artista :artista="$artistaRevisado"
                                :wire:key="$artistaRevisado->id" />
                        @endforeach
                    </div>
                </div>
            @else
                <span>No tienes solicitudes revisadas</span>
            @endif
        </div>

        <div class="mt-10 mb-16">
            <div>
                <span class="text-4xl block mb-5">Solicitudes modificadas</span>
            </div>
            @if (count($artistasModificados) > 0)
                <div class="swiper-container swiperModificadas">
                    <div class="swiper-wrapper">
                        @foreach ($artistasModificados as $artistaModificado)
                            <livewire:representante.artista.solicitudes.artista :artista="$artistaModificado"
                                :wire:key="$artistaModificado->id" />
                        @endforeach
                    </div>
                </div>
            @else
                <span>No tienes solicitudes revisadas</span>
            @endif
        </div>
    </div>
</div>


<script>
    var swiper = new Swiper(".swiperPendientes", {
        loop: false,
        grabCursor: true,
        slidePerView: 'auto',
        spaceBetween: 30,
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

    var swiper = new Swiper(".swiperRevisadas", {
        loop: false,
        grabCursor: true,
        slidePerView: 'auto',
        spaceBetween: 30,
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

    var swiper = new Swiper(".swiperModificadas", {
        loop: false,
        grabCursor: true,
        slidePerView: 'auto',
        spaceBetween: 30,
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
</script>
