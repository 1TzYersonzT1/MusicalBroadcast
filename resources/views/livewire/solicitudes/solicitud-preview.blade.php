<div id="cuerpo">
    <div class="mt-10">

        <div class="grid grid-cols-2 gap-4">
            <div>
                <p class="font-bold">TITULO</p>
                <p>{{ $solicitudActual->taller->TAL_Nombre }}</p>
            </div>
            <div>
                <p class="font-bold">ORGANIZADOR</p>
                <p>{{ $solicitudActual->taller->organizador->nombre }}
                    {{ $solicitudActual->taller->organizador->apellidos }}</p>
            </div>
            <div>
                <p class="font-bold col-span-2">DESCRIPCIÓN</p>
                <p>{{ $solicitudActual->taller->TAL_Descripcion }}</p>
            </div>

            <div class="col">
                <p class="font-bold">HORARIO</p>
                <p>{{ $solicitudActual->taller->TAL_Horario }}</p>
            </div>

            <div class="col">
                <p class="font-bold">REQUISITOS</p>
                <p>{{ $solicitudActual->taller->TAL_Requisitos }}</p>
            </div>

            <div class="col">
                <p class="font-bold">LUGAR</p>
                <p>{{ $solicitudActual->taller->TAL_Lugar }}</p>
            </div>

            <div class="col">
                <p class="font-bold">PROTOCOLO COVID</p>
                <p>{{ $solicitudActual->taller->TAL_Protocolo }}</p>
            </div>
        </div>

        <div class="mt-10 flex">

            <a id="aprobarSolicitud"
                class="bg-green-500 rounded-full hover:bg-white hover:text-green-500 cursor-pointer font-bold px-5 py-2 mr-5">Aprobar
                solicitud</a>
            <a class="bg-yellow-500 rounded-full font-bold px-5 py-2 mr-5">Agregar observación</a>
            <a class="bg-red-500 rounded-full font-bold px-5 py-2">Eliminar solicitud</a>
        </div>

    </div>
</div>


@section('js')

    <script>
        $("#aprobarSolicitud").on('click', function() {
            Swal.fire({
                title: '¿Está seguro?',
                text: "Estas a punto de aprobar un taller",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, aprobar'
            }).then((result) => {
                if (result.isConfirmed) {

                    Livewire.emit('aprobarTaller');

                    Swal.fire(
                        'Aprobado',
                        'El taller ha sido aprobado con exito.',
                        'success'
                    )
                }
            });
        });

    </script>

@endsection
