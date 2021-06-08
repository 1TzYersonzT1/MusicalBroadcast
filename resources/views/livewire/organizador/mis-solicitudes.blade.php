<div>
    <div class="grid">

    </div>
</div>

@section('js')

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
            slidesPerView: 'auto',
            spaceBetween: 0,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });

    </script>

@endsection
