<div>
    <div class="min-h-screen text-white py-5">
        <div class="">
            <div>
                <span class="text-4xl block mb-5">Solicitudes pendientes</span>
            </div>
            @if (count($talleresPendientes) > 0)
                <div class="swiper-container swiperPendientes">
                    <div class="swiper-wrapper">
                        @foreach ($talleresPendientes as $tallerPendiente)
                            <div class="swiper-slide">
                                <div class="lg:w-96 w-80 bg-white text-primary py-3 px-5">
                                    <div class="flex justify-between items-center">
                                        <span>{{ $tallerPendiente->TAL_Nombre }}</span>
                                        <div class="bg-yellow-400 text-purple-500 px-3 py-1 rounded-full">
                                            <span>Pendiente</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
            @if (count($talleresRevisados) > 0)
                <div class="swiper-container swiperRevisadas">
                    <div class="swiper-wrapper">
                        @foreach ($talleresRevisados as $tallerRevisado)
                            <livewire:organizador.talleres.taller :taller='$tallerRevisado'
                                :wire:key="$tallerRevisado->id" />
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
            @if (count($talleresModificados) > 0)
                <div class="swiper-container swiperRevisadas">
                    <div class="swiper-wrapper">
                        @foreach ($talleresModificados as $tallerModificado)
                            <livewire:organizador.talleres.taller :taller='$tallerModificado'
                                :wire:key="$tallerModificado->id" />
                        @endforeach
                    </div>
                </div>
            @else
                <span>No tienes solicitudes revisadas</span>
            @endif
        </div>

        <div class="grid grid-cols-12">
            <div class="lg:col-start-4 lg:col-span-6 col-start-3 col-span-8 px-4 py-6">
                <div class="grid lg:grid-cols-3">

                    <!-- Talleres aprobados -->
                    <div class="bg-green-400 px-4">
                        <div class="flex flex-col items-center py-5">
                            <div class="flex flex-col items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg>
                                <div class="flex flex-col items-center">
                                    <span class="block mb-1">Talleres aprobados</span>
                                    <span>{{ count($talleresAprobados) }}</span>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Talleres rechazados -->
                    <div class="bg-red-600">
                        <div class="flex flex-col items-center py-5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                            <div class="flex flex-col items-center">

                                <span class="block mb-1">Eliminados/Rechazados</span>
                                <span>{{ $hojaVida[0]->talleres_rechazados }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    var swiper = new Swiper(".swiperPendientes", {
        slidesPerView: 3,
        spaceBetween: 30,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });

    var swiper = new Swiper(".swiperRevisadas", {
        slidesPerView: 3,
        spaceBetween: 30,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
</script>
