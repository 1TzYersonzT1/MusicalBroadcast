<div class="lg:grid lg:grid-cols-2 mt-10 container mx-auto">
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
                        <div class="swiper-slide max-w-md w-full lg:flex">
                            <div class="h-48 lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden"
                                style="background-image: url('https://tailwindcss.com/img/card-left.jpg')"
                                title="Woman holding a mug">
                            </div>
                            <div
                                class="object-contentborder-l border-grey-light  bg-gradient-to-tr from-black via-primary to-blue-900 rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                                <div class="mb-8">

                                    <div class="text-black font-bold text-xl mb-2 text-white">
                                        {{ $taller->TAL_Nombre }}</div>

                                </div>

                                <div>
                                    <button
                                        class="font-bold px-2 py-2 w-40 text-center text-white hover:bg-white hover:text-primary cursor-pointer"
                                        wire:click='mostrarTaller({{ $taller->id }}, {{ $loop->index }})'>Más
                                        información</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>

        </div>



    </div>

    <div class="px-10 text-white shadow-inner">
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

        <div class="flex flex-col items-center justify-center mb-10">
            <span class="text-2xl text-white mb-4">¿Estás interesado/a?</span>
            <button data-fancybox data-src="#formulario-taller"
                class="bg-gradient-to-tr from-white via-black to-primary px-5 py-2 hover:bg-gradient-to-b hover:from-primary hover:via-black hover:to-white">Participar</button>
        </div>

    </div>

    <div id="formulario-taller" class="hidden formulario-taller">

        <div class="flex flex-col items-center">
            <span class="lg:text-2xl border-b border-gray-900">Formulario de inscripción</span>
            <span>{{ $tallerActual->TAL_Nombre }}</span>
        </div>

        <div class="grid lg:grid-cols-2 gap-8 mt-8">

            <div class="flex flex-col">
                <label for="nombre">Nombre</label>
                <input id="nombre" type="text" name="nombre" class="rounded-full lg:w-40" />

            </div>

            <div class="flex flex-col">
                <label for="apellidos">Apellidos</label>
                <input id="apellidos" type="text" name="apellidos" class="rounded-full" />
            </div>

            <div class="flex flex-col">
                <label for="email">Email</label>
                <input id="email" type="text" name="email" class="rounded-full w-full" />
            </div>

            <div class="flex flex-col">
                <label for="telefono">Teléfono</label>
                <input id="telefono" type="text" name="telefono" class="rounded-full w-full" />
            </div>

        </div>

        <div class="mt-10 flex justify-center">
            <button
                class="bg-primary rounded-full text-white font-bold px-5 py-2 hover:bg-gradient-to-b hover:from-primary hover:via-black hover:to-white">
                Participar
            </button>
        </div>

    </div>


</div>
