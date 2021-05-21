<div class="lg:grid grid-cols-2 mt-10 container mx-auto">
    <div class='px-10'>
        <div class="flex">
            @can('crear-taller') <div>
                    <button class="bg-green-500 px-5 py-1 mb-5 text-white font-bold">Crear taller</button>
                </div>
            @endcan

            @can('ver-solicitudes')
                <div>
                    <button class="bg-yellow-500 px-5 py-1 mb-5 text-white font-bold ml-5">Estado solicitudes</button>
                </div>
            @endcan
        </div>

        <div>
            <div class="swiper-container mySwiper mb-5">
                <div class="swiper-wrapper">
                    @foreach ($talleres as $taller)
                        <div
                            class="swiper-slide flex flex-col lg:flex-row rounded overflow-hidden sm:w-100 h-24 shadow-lg">
                            <img class="block h-auto lg:w-48 flex-none bg-cover h-24"
                                src="https://pbs.twimg.com/media/DrM0nIdU0AEhG5b.jpg">
                            <div
                                class="object-cover bg-gradient-to-b from-primary to-gray-900 w-full rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                                <div class="text-black font-bold text-xl mb-2 leading-tight">
                                    <p class="text-white">{{ $taller->TAL_Nombre }}</p>
                                </div>
                                <button
                                    class="font-bold px-2 py-2 w-40 text-center text-white hover:bg-white hover:text-primary cursor-pointer"
                                    wire:click='mostrarTaller({{ $taller->id }}, {{ $loop->index }})'>Más
                                    información</button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="swiper-pagination mb-10"></div>

    </div>
   
    <div class="px-10 text-white">
        <div class="mb-4 text-4xl font-bold">
            {{ $tallerActual->TAL_Nombre }}
        </div>

        <div class="mb-10">{{ $tallerActual->TAL_Descripcion }}</div>


        <div class="grid grid-cols-2 gap-10 mb-10">
            <div class="col">
                <p class="font-bold">ORGANIZADOR</p>
                <p>{{ $tallerActual->organizador->nombre }} {{ $tallerActual->organizador->apellido }}</p>
            </div>

            <div class="col">
                <p class="font-bold">HORARIO</p>
                <p>{{ $tallerActual->TAL_Horario }}</p>
            </div>

            <div class="col">
                <p class="font-bold">REQUISITOS</p>
                <p>{{ $tallerActual->TAL_Requisitos }}</p>
            </div>

            <div class="col">
                <p class="font-bold">LUGAR</p>
                <p>{{ $tallerActual->TAL_Lugar }}</p>
            </div>

            <div class="col">
                <p class="font-bold">PROTOCOLO COVID</p>
                <p>{{ $tallerActual->TAL_Protocolo }}</p>
            </div>
        </div>



    </div>
</div>
