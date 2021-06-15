<div id="cuerpo">
    <div class="mt-4">
        <div class="lg:w-5/6 flex lg:flex-row flex-col justify-between"> 
            <div> 
                <img src="{{ asset($solicitudActual->evento->imagen) }}" 
                class="h-80 w-80 lg:m-0 mb-5 mr-5"/>
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <p class="font-bold">TITULO</p>
                    <p>{{ $solicitudActual->evento->EVE_Nombre }}</p>
                </div>
                <div>
                    <p class="font-bold">ORGANIZADOR</p>
                    <p>{{ $solicitudActual->evento->organizador->nombre }}
                        {{ $solicitudActual->evento->organizador->apellidos }}</p>
                </div>
                <div>
                    <p class="font-bold col-span-2">DESCRIPCIÓN</p>
                    <p>{{ $solicitudActual->evento->EVE_Descripcion }}</p>
                </div>
    
                <div class="col">
                    <p class="font-bold">HORARIO</p>
                    <p>{{ $solicitudActual->evento->EVE_Fecha }} {{ $solicitudActual->evento->EVE_Hora }}</p>
                </div>
    
                <div class="col">
                    <p class="font-bold">LUGAR</p>
                    <p>{{ $solicitudActual->evento->EVE_Lugar }}</p>
                </div>
            </div>
        </div>
    

        <div class="mt-6 flex flex-col items-center justify-center lg:flex lg:flex-row lg:justify-start w-84">
            <a id="aprobarEvento"
                class="bg-green-500 rounded-full hover:bg-white hover:text-green-500 cursor-pointer font-bold px-5 py-2 w-52 text-center mb-5">Aprobar
                solicitud</a>

            <a data-fancybox data-src="#formulario-observacion-admin"
                class="bg-yellow-500 rounded-full font-bold px-5 py-2 cursor-pointer hover:bg-white hover:text-yellow-600 w-52 text-center lg:ml-5 mb-5">Agregar
                observación</a>
            <div id="formulario-observacion-admin" class="hidden bg-white">
                <div class="flex flex-col items-center">
                    <span class="text-2xl block border-b-2">Nueva observación</span>
                    <span>{{ $solicitudActual->evento->EVE_Nombre }}</span>

                    <textarea maxlength='255'
                        placeholder="Agregue y envíe una observación al organizador (máximo 255 caracteres)"
                        wire:model='observacion' class="mt-5 resize-none lg:w-96 bg-primary h-40 text-white"></textarea>

                    @error('observacion')
                        <script>
                            $.fancybox.close();
                            Swal.fire({
                                    title: 'Observación (*)',
                                    text: `Debe agregar una observación detallada para que el organizador 
                                    tenga presente que cambios debe realizar.`,
                                    icon: 'error',
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                    location.href = '/administrador/solicitudes/eventos';
                                }
                            });
                        </script>
                    @enderror

                    <a class="border-primary border-2 rounded-full px-3 py-2 mt-4" wire:click='enviarObservacion'>Enviar
                        observaciones</a>
                </div>
            </div>
        </div>

    </div>
</div>


<script>
  
    $("#aprobarEvento").on('click', function() {
          Swal.fire({
              title: '¿Está seguro?',
              text: `Estas a punto de aprobar el evento`,
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si, aprobar',
          }).then((result) => {
              if(result.isConfirmed) {
                  Livewire.emit('aprobarEvento');

                  Swal.fire({
                    title: 'Exito',
                    text: `Se ha aprobado el evento exitosamente.`,
                    icon: 'success',
                  });
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
                    location.href = "/administrador/solicitudes/eventos";
                }
            })
    });
  
  </script>