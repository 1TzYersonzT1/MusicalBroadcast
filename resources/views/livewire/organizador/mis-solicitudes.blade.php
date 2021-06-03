<div class="text-primary">
    <div class="flex flex-col justify-center items-center">
        <div class="bg-white px-7 py-5 mb-5">
            @foreach ($talleres as $taller)
                <span class="text-xl block mb-3">{{ $taller->TAL_Nombre }}</span>
                @foreach ($taller->solicitudes as $solicitud)
                    @if ($solicitud->estado == 0)
                        <div class="bg-yellow-300 rounded-full px-10 w-32"><span
                                class="text-xs text-purple-600">Pendiente</span> </div>
                    @endif

                    @if ($solicitud->estado == 1)
                        <div class="bg-pink-400 rounded-full px-10 w-32 "><span class="text-xs">Revisada</span>
                        </div>
                    @endif

                    @if ($solicitud->estado == 3)
                        <div class="bg-green-400 rounded-full px-10 w-32 "><span class="text-xs">Aprobada</span>
                        </div>
                    @endif

                    <span class="block mt-3 mb-2 font-bold">Observaciones:</span>
                    <span class="block w-80 mb-5">{{ $solicitud->observacion }}</span>

                    <a class="mt-4 px-5 py-2 bg-primary text-white">Modificar</a>
                @endforeach
            @endforeach

        </div>
        <div>{{ $talleres->links() }}</div>

    </div>

</div>
