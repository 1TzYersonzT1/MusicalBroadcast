<div>
    <div class="swiper-container swiperSolicitudes">
        <div class="swiper-wrapper">
            @foreach ($solicitudes as $solicitud)
                <div class="swiper-slide">
                    <div class="bg-white py-3 px-5">
                        <div class="flex justify-between">
                            <span class="text-xl">{{ $solicitud->TAL_Nombre }}</span>
                            @if ($solicitud->estado == 0)
                                <div class="bg-yellow-500 text-purple-600 py-1 px-4 font-bold rounded-full">
                                    Pendiente</div>
                            @elseif($solicitud->estado == 1)
                                <div class="bg-pink-500 text-purple-600  py-1 px-4 font-bold rounded-full">Revisada
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
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

    var swiper = new Swiper(".swiperSolicitudes", {
        slidesPerView: 3,
        spaceBetween: 30,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });

</script>
