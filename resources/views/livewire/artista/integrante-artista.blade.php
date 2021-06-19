<div>
    <div class="flex flex-col items-center justify-center mb-10">
        <span class="text-2xl text-white mb-4">¿Quieres agregar a un integrante?</span>
        <button data-fancybox data-src="#formulario-integrante"
            class="bg-gradient-to-tr from-white via-black to-primary px-5 py-2 hover:bg-gradient-to-b hover:from-primary hover:via-black hover:to-white">Agregar</button>
    </div>
    <div id="formulario-integrante" class="hidden formulario-integrante">

        <div class="flex flex-col items-center">
            <span class="lg:text-2xl border-b border-gray-900">Formulario de agregacion</span>
            
        </div>


        <form method='post' wire:submit.prevent="inscripcion" autocomplete="off" class="formulario-inscripcion">
            @csrf
            <div class="grid lg:grid-cols-2 gap-8 mt-8">

                <div class="flex flex-col">
                    <label for="nombre">Nombre</label>
                    <input id="nombre" type="text" wire:model="nombre" class="rounded-full " />
                </div>

                <div class="flex flex-col">
                    <label for="apellidos">Apellidos</label>
                    <input id="apellidos" type="text" wire:model="apellidos" class="rounded-full" />
                </div>

                <div class="lg:col-span-2  gap-5 lg:flex  justify-center py-2">
                <span class="text-2xl font-bold text-center">Instrumentos</span>
                </div>

                <div class="swiper-container swiperGeneros">
                    <div class="swiper-wrapper ">
                   
                        
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div><br><br>
                    <div class="swiper-pagination"></div>
                </div>
            </div>

            <div class="mt-10 flex justify-center">

                <button type='submit'
                    class="bg-primary rounded-full text-white font-bold px-5 py-2 hover:bg-gradient-to-b hover:from-primary hover:via-black hover:to-white">
                    Agregar
                </button>

            </div>
        </form>
    </div>
</div>

@section('js')
    <script>
        window.addEventListener('AgregacionExitosa', function() {
            $.fancybox.close();
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Lo has agregado exitosamente',
                showConfirmButton: false,
                timer: 4000
            }).then((isVisible) => {
                location.reload();
            });
        });

        window.addEventListener('nuevoIntento', function() {
            $.fancybox.close();
            Swal.fire({
                position: 'center',
                icon: 'info',
                title: 'Ya está agregado',
                text: 'Si tienes alguna duda no olvides contactar al administrador.',
                showConfirmButton: false,
                timer: 4500
            }).then((isVisible) => {
                location.reload();
            });
        })

    </script>
@endsection


   <script>
        var swiper = new Swiper(".swiperGeneros", {
            slidesPerView: 4,
            spaceBetween: -100,
            slidesPerGroup: 4,
            loop: true,
            loopFillGroupWithBlank: true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });

    </script>