<div>
    <div class='container mx-auto text-white py-5'>
        <div class="mb-6 lg:mt-0 mt-5"><span class="text-4xl">Revisar y modificar evento.</span></div>
        @if ($errors)
            @foreach ($errors->all() as $message)
                {{ $message }}
            @endforeach
        @endif
        <div class="mb-5"> 
            <span class="mb-1 font-bold text-red-600 text-lg">Observaciones recientes</span>
            <p>{{ $evento->solicitudes[0]->observacion }}</p>
            <span class="mb-1 font-bold text-green-500 text-sm">
                (Modifica solo lo que se menciona en las observaciones, lo demás debe quedar tal  y como estaba antes)
            </span>
        </div>
        <div class="lg:flex">
            <div class="flex flex-col lg:mr-5">
                <form wire:submit.prevent='modificarEvento' enctype="multipart/form-data">
                    <div class="lg:flex">
                        <div class="flex flex-col">
                            <span class="font-bold">Titulo</span>
                            <div class="flex flex-col mt-1">
                                <input type="text" 
                                    wire:model='evento.EVE_Nombre' maxlength="30"
                                    placeholder="Escriba el titulo del taller (máximo 30 caracteres)"
                                    class="border-0 bg-primary px-0 py-1 font-light lg:w-96" />
                            </div>
                        </div>
                    </div>
                    <div class="mt-2 flex flex-col">
                        <div class="flex mb-3">
                            <div class="flex flex-col mt-3" x-data >
                                <span class="font-bold">Fecha</span>
                                <input type="date" wire:model="evento.EVE_Fecha"
                                    x-bind:min="$wire.hoy" class="bg-primary text-white p-0 mr-5 mt-1" />
                            </div>
                            <div class="flex flex-col mt-3">
                                <span class="font-bold">Hora</span>
                                <div class="flex flex-col">
                                    <input type="time" id="hora" wire:model="evento.EVE_Hora" class="bg-primary border-0 p-0 mt-1">

                                </div>

                            </div>

                        </div>
                 
                        <div class="flex items-center mb-3 mt-3 text-sm">
                            <span class="font-bold">Lugar: </span>
                            <div class="flex flex-col">
                                <input type="text" placeholder="¿Donde planeas realizar el evento?" 
                                wire:model='evento.EVE_Lugar' class="border-0 bg-primary w-64 py-0 px-2" />

                            </div>
                        </div>

                        <div class="mt-3">
                            <label for="descripcion" class="font-bold lg:w-96">Descripción</label>
                            <div class="flex flex-col">
                                <textarea 
                                    wire:model='evento.EVE_Descripcion' maxlength="255"
                                    placeholder="Escriba una descripción (máximo 255 caracteres)"
                                    class="resize-none lg:w-96 bg-primary h-40 mt-1 mb-1"></textarea>
                                <span>{{ $caracteres_descripcion }} / 255</span>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="flex flex-col">         
                <div> 
                    <input type="file" wire:model="nuevaImagen" class="mb-5" />
                </div>

                @error('nuevaImagen')

                @else
                    @if($nuevaImagen)
                        <img src="{{ $nuevaImagen->temporaryUrl() }}" class="h-80 w-80" />
                    @else
                        <img src="{{ asset('storage/'.$evento->imagen) }}" class="h-80 w-80"/>
                    @endif
                @enderror
            </div>

            <div class="grid lg:grid-cols-2 lg:grid-rows-2 lg:mt-0 mt-5 ml-5">

                <div>
                    <button type="submit"
                        class="border border-white px-7 py-3 my-10 lg:my-0 hover:bg-white hover:text-primary">Modificar taller</button>
                </div>

            </div>

            </form>
        </div>
    </div>
</div>

<script>

    window.addEventListener("confirmarModificarEvento", (event) => {
        Swal.fire({
            title: '¿Está seguro?',
            text: `Los cambios se guardarán y tu solicitud será revisada por soporte.`,
            icon: 'info',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Guardar cambios',
            cancelButtonText: 'Cancelar',
        }).then((result) => {
            if(result.isConfirmed) {
                Livewire.emit("modificarEventoConfirmado");
                Swal.fire({
                    title: 'Taller modificado',
                    text: 'El taller se ha modificado con exito y su revisión está en proceso.',
                    icon: 'success',
                    time: 4000,
                }).then((result) => {
                    if(!result.isVisible) {
                        location.href = "/organizador/eventos/mis-solicitudes";
                    }
                });
            }
        });
    })

</script>

    
