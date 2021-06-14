<div>
    <div class="text-white">

        <div class="mb-4 text-4xl font-bold">
            {{ $eventoActual->EVE_Nombre }}
        </div>

        <div class="mb-10">{{ $eventoActual->EVE_Descripcion }} </div>


        <div class="grid grid-cols-2 gap-10 mb-10">

            <div class="col">
                <p class="font-bold">HORARIO</p>
                <p>{{ $eventoActual->EVE_Fecha }} {{ $eventoActual->EVE_Hora }}</p>
            </div>

            <div class="col">
                <p class="font-bold">LUGAR</p>
                <p>{{ $eventoActual->EVE_Lugar }}</p>
            </div>

        </div>
    </div>
</div>
