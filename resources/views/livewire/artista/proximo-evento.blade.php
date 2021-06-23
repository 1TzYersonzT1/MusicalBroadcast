@foreach ($artistaActual->eventos as $evento)
    <div class="swiper-slide">
        <div class="grid lg:grid-cols-8 gap-5">

            <div class="lg:col-span-4 mt-5 lg:w-full">
                <div class="bg-white bg-opacity-20 px-2 py-1 lg:flex-col">
                    <span>Nombre del evento</span>
                </div>
                {{ $evento->EVE_Nombre }}
            </div>

            <div class="lg:col-span-4 mt-5 lg:w-full">
                <div class="bg-white bg-opacity-20 px-2 py-1 lg:flex-col">
                    <span>Fecha</span>
                </div>
                {{ $evento->EVE_Fecha }}
            </div>

            <div class="lg:col-span-4 mt-5">
                <div class="bg-white bg-opacity-20 px-2 py-1 lg:flex-col">
                    <span>Hora</span>
                </div>
                {{ $evento->EVE_Hora }}
            </div>

            <div class="lg:col-span-4 mt-5">
                <div class="bg-white bg-opacity-20 px-2 py-1 lg:flex-col">
                    <span>Lugar</span>
                </div>
                {{ $evento->EVE_Lugar }}
            </div>

            <div class="lg:col-span-8 mt-5">
                <div class="bg-white bg-opacity-20 px-2 py-1 lg:flex-col">
                    <span>Descripcion</span>
                </div>
                {{ $evento->EVE_Descripcion }}
            </div>


        </div>
    </div>
@endforeach
