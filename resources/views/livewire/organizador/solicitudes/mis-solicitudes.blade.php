<div>
    <div class="min-h-screen text-white py-10">
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


        <div class="mt-10">
            <div>
                <span class="text-4xl block mb-5">Solicitudes revisadas</span>
            </div>
            @if (count($talleresRevisados) > 0)
                <div class="swiper-container swiperRevisadas">
                    <div class="swiper-wrapper">
                        @foreach ($talleresRevisados as $tallerRevisado)
                            <div class="swiper-slide">
                                <div class="lg:w-96 w-80 bg-white text-primary py-3 px-5">
                                    <div class="flex justify-between items-center">
                                        <span>{{ $tallerRevisado->TAL_Nombre }}</span>
                                        <div class="bg-pink-400 text-purple-500 px-3 py-1 rounded-full">
                                            <span>Revisada</span>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <div>
                                            <span>Observaciones</span>
                                            <p class="font-light">{{ $tallerRevisado->solicitudes[0]->observacion }}
                                            </p>
                                        </div>
                                        <button
                                            class="mt-5 bg-primary text-white px-4 py-2 rounded-full">Modificar</button>
                                    </div>
                                </div>
                            </div>
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
    $('#modificarBtn').on('click', function() {
        $("#lista-solicitudes").addClass("lg:grid-cols-2");
        $("#modificar-preview").removeClass("hidden");
    });

    $("#cerrarBtn").on('click', function() {
        $("#lista-solicitudes").removeClass("lg:grid-cols-2");
        $("#modificar-preview").addClass("hidden");
    });

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
