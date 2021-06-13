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
                <p>{{ $solicitudActual->taller->TAL_Fecha }} {{ $solicitudActual->taller->TAL_Hora }}</p>
            </div>

            <div class="col">
                <p class="font-bold">REQUISITOS</p>
                @foreach ($solicitudActual->taller->TAL_Requisitos  as $requisito)
                    <p>{{ $requisito }}</p>
                @endforeach
            </div>

            <div class="col">
                <p class="font-bold">LUGAR</p>
                <p>{{ $solicitudActual->taller->TAL_Lugar }}</p>
            </div>

            <div class="col">
                <p class="font-bold">PROTOCOLO COVID</p>
                @foreach ($solicitudActual->taller->TAL_Protocolo as $protocolo)
                <p>{{ $protocolo }}</p>
                @endforeach
            </div>
        </div>

        <div class="mt-10 flex flex-col items-center justify-center lg:flex lg:flex-row lg:justify-start w-84">

            <a id="aprobarSolicitud"
                class="bg-green-500 rounded-full hover:bg-white hover:text-green-500 cursor-pointer font-bold px-5 py-2 w-52 text-center mb-5">Aprobar
                solicitud</a>


            <a data-fancybox data-src="#formulario-observacion-admin"
                class="bg-yellow-500 rounded-full font-bold px-5 py-2 cursor-pointer hover:bg-white hover:text-yellow-600 w-52 text-center lg:ml-5 mb-5">Agregar
                observación</a>
            <div id="formulario-observacion-admin" class="hidden bg-white">
                <div class="flex flex-col items-center">
                    <span class="text-2xl block border-b-2">Nueva observación</span>
                    <span>{{ $solicitudActual->taller->TAL_Nombre }}</span>

                    <textarea maxlength='255'
                        placeholder="Aregue y envíe una observación al organizador (máximo 255 caracteres)"
                        wire:model='observacion' class="mt-5 resize-none lg:w-96 bg-primary h-40 text-white"></textarea>


                    <a class="border-primary border-2 rounded-full px-3 py-2 mt-4" wire:click='enviarObservacion'>Enviar
                        observaciones</a>
                </div>
            </div>

            <a id="rechazarSolicitud"
                class="bg-red-500 rounded-full font-bold px-5 py-2 w-52 text-center lg:ml-5 mb-5 cursor-pointer hover:text-red-500 hover:bg-white">
                Eliminar solicitud</a>
        </div>

    </div>
</div>




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
                    );
                }
            });
        });

        window.addEventListener("observacionAniadida", function() {
            $.fancybox.close();
            Swal.fire({
                icon: 'success',
                title: 'Observación agregada con exito',
                text: `El organizador recibirá tus comentarios dentro de poco`,
                showConfirmButton: false,
                timer: 8000
            }).then((result) => {
                if (!result.isConfirmed) {
                    location.href = "/administrador/solicitudes";
                }
            })
        });

    </script>

