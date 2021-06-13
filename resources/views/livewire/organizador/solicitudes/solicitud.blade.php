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
        </div>
        <button>
            <a href="{{ route('organizador.modificar-solicitud', $tallerRevisado->id) }}">Modificar</a></button>
     
    </div>
</div>


