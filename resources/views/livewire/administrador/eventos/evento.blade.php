<div class="swiper-slide">
    <div class="lg:w-96">
        <div class="bg-white text-primary rounded-br-lg rounded-tl-lg py-3">
            <div class="flex flex-col px-5">
                <div>
                    <span class="font-bold block">{{ $solicitud->evento->EVE_Nombre }}</span>
                </div>
                <div>
                    <span class="font-bold text-xs">Organiza: </span>
                    <span class="text-xs">{{ $solicitud->evento->organizador->nombre }}</span>
                    <span class="text-xs">{{ $solicitud->evento->organizador->apellidos }}</span>
                </div>
            </div>
            <div class="flex flex-col mt-5 items-center lg:w-96">
                <span class="text-md">Estado </span>

                @if ($solicitud->estado == 0)
                    <div class="bg-yellow-300 rounded-full w-32 py-1 text-center"><span
                            class="text-purple-600">Pendiente</span> </div>
                @endif

                @if ($solicitud->estado == 1)
                    <div class="bg-pink-400 rounded-full w-32 py-1 text-center"><span class="text-white">Revisada</span>
                    </div>
                @endif

                @if ($solicitud->estado == 4)
                    <div class="bg-blue-400 rounded-full w-32 py-1 text-center"><span
                            class="text-white">Modificada</span>
                    </div>
                @endif

                @if ($solicitud->estado == 5)
                    <div class="bg-pink-700 rounded-full w-32 py-1 text-center"><span
                            class="text-white">Pospuesto</span>
                    </div>

                    <div class="flex flex-col items-center mt-4">
                        <span class="text-md">Motivo </span>
                        <p class="px-4">{{ $solicitud->observacion }}</p>
                    </div>
                @endif
            </div>

            <div class="flex flex-col mt-3 items-center lg:w-96">
                <span class="text-md">Visualizar </span>
                <a class="hover:text-green-400" wire:click='mostrarEvento'><svg xmlns="http://www.w3.org/2000/svg"
                        class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                        <path fill-rule="evenodd"
                            d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                            clip-rule="evenodd" />
                    </svg></a>
            </div>
        </div>

    </div>
</div>
