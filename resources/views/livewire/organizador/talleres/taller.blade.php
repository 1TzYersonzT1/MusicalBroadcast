<div class="swiper-slide">
    <div class="lg:w-96 w-80 bg-white text-primary py-3 px-5 rounded-lg">
        <div class="flex justify-between items-center">
            <div class="flex flex-col">
                <img src="{{ 'https://musicalimages.blob.core.windows.net/images/' . $taller->imagen }}" class="w-32 h-32" />
                <span>{{ $taller->TAL_Nombre }}</span>
            </div>

            @if ($taller->solicitudes[0]->estado == 0)
                <div class="bg-yellow-400 text-purple-500 px-3 py-1 rounded-full">
                    <span>Pendiente</span>
                </div>
            @endif

            @if ($taller->solicitudes[0]->estado == 1)
                <div class="bg-pink-400 rounded-full w-32 py-1 text-center">
                    <span class="text-purple-600">Revisada</span>
                </div>
            @endif

            @if ($taller->solicitudes[0]->estado == 4)
                <div class="bg-blue-400 rounded-full w-32 py-1 text-center"><span
                        class="text-purple-600">Modificada</span>
                </div>
            @endif
        </div>

        @if ($taller->solicitudes[0]->estado != 0)
            <div class="mt-3">
                <div>
                    <span>Observaciones</span>
                    <p class="font-light">{{ $taller->solicitudes[0]->observacion }}
                    </p>
                </div>
            </div>
        @endif
        <button
            class="mt-4 bg-primary rounded-lg text-white px-3 py-1 hover:bg-transparent hover:text-primary hover:border-1 hover:border-b-black flex items-center">
            <a href="{{ route('organizador.modificar-taller', $taller->id) }}">
                Modificar
            </a>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
            </svg>
        </button>
    </div>
</div>
