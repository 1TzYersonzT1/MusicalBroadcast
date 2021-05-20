<div class="grid lg:grid-cols-2 container mx-auto">
    <div class='px-10'>
        @can('crear-taller')
            <div>
                <button class="bg-green-500 px-5 py-1 mb-5 text-white font-bold">Crear taller</button>
            </div>
        @endcan

        <div class="grid gap-10">
            @foreach ($talleres as $taller)
                <div>
                    <div
                        class="flex flex-col lg:flex-row rounded overflow-hidden h-auto lg:h-32 border shadow shadow-lg">
                        <img class="block h-auto lg:w-48 flex-none bg-cover h-24"
                            src="https://pbs.twimg.com/media/DrM0nIdU0AEhG5b.jpg">
                        <div
                            class="bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                            <div class="text-black font-bold text-xl mb-2 leading-tight">
                                <p>{{ $taller->TAL_Nombre }}</p>
                            </div>
                            <a class="bg-blue-800 font-bold px-2 py-2 w-40 text-center text-white hover:text-blue-200 cursor-pointer"
                                wire:click='mostrarTaller({{ $taller->id }})'>Más
                                información</a>
                        </div>
                    </div>
                </div>

            @endforeach
        </div>


    </div>
    <div class="px-10">
        <div class="bg-white-150 mb-4 text-4xl font-bold">
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
