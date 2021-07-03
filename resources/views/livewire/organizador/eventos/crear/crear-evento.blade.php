<div class="min-h-screen py-5">
    <div class='container mx-auto text-white bg-black bg-opacity-20 px-5 py-3'>
        <div class="mb-6 lg:mt-0 mt-5"><span class="text-4xl">Organizar nuevo evento.</span></div>
        @if ($errors)
            @foreach ($errors->all() as $message)
                {{ $message }}
            @endforeach
        @endif
        <div class="lg:flex">
            <div class="flex flex-col lg:mr-5">
                <form wire:submit.prevent='validarNuevoEvento' enctype="multipart/form-data">
                    
                    @csrf

                    <div class="lg:flex">
                        <div class="flex flex-col">
                            <span class="font-bold">Titulo</span>
                            <div class="flex flex-col mt-1">
                                <input type="text" class="border-1 border-white rounded-lg bg-primary py-1 px-2 font-light lg:w-96"
                                    wire:model='nombre' maxlength="30"
                                    placeholder="Escriba el titulo del taller (máximo 30 caracteres)" />
                            </div>
                        </div>
                    </div>
                    <div class="mt-2 flex flex-col">
                        <div class="flex mb-3">
                            <div class="flex flex-col mt-3" x-data>
                                <span class="font-bold">Fecha</span>

                                <input type="date" wire:model="fecha" x-bind:min="$wire.hoy"
                                    class="bg-primary text-white p-0 mr-5 mt-1 border-1 border-white rounded-lg px-2" />
                            </div>

                            <div class="flex flex-col mt-3">
                                <span class="font-bold">Hora</span>
                                <div class="flex flex-col">
                                    <input type="time" id="hora" wire:model="hora" class="bg-primary px-2 p-0 mt-1 border-1 border-white rounded-lg">

                                </div>

                            </div>

                        </div>

                        <div class="flex items-center mb-3 mt-3 text-sm">
                            <span class="font-bold">Lugar: </span>
                            <div class="flex flex-col">
                                <input type="text" placeholder="¿Donde planeas realizar el evento?" wire:model='lugar'
                                    class="bg-primary w-64 py-0 px-2 border-1 border-white rounded-lg" />

                            </div>
                        </div>

                        <div class="mt-3">
                            <label for="descripcion" class="font-bold lg:w-96">Descripción</label>
                            <div class="flex flex-col">
                                <textarea placeholder="Escriba una descripción (máximo 255 caracteres)"
                                    wire:model='descripcion' maxlength="255"
                                    class="resize-none lg:w-96 bg-primary h-40 mt-1 mb-1 border-1 border-white rounded-lg" wrap="hard"></textarea>
                                <span>{{ $caracteres_descripcion }} / 255</span>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="flex justify-between">
                <div class="flex flex-col">
                    <input type="file" wire:model="imagen" class="rounded-lg"/>
                    <div wire:loading wire:target="imagen"
                        class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
                        <p class="font-bold">Cargando imagen</p>
                    </div>

                    @error('imagen')

                    @else
                        @if ($imagen)
                            <img src="{{ $imagen->temporaryUrl() }}" class="mt-5 w-80 h-80">
                        @endif
                    @enderror
                </div>

                <div class="ml-10">
                    <button type="submit"
                        class="border border-white rounded-lg px-7 py-4 my-10 lg:my-0 hover:bg-white hover:text-primary">Solicitar
                        permiso</button>
                </div>

            </div>

            </form>
        </div>
    </div>
</div>

<script>
    window.addEventListener("validarNuevoEvento", () => {
        Swal.fire({
            title: '¿Está seguro?',
            text: `Se enviará una solicitud a los administradores
            antes de poder visualizar el evento en el sitio web`,
            icon: 'info',
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            showCancelButton: true,
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Confirmar'
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('nuevoEventoConfirmado');
                Swal.fire({
                    title: 'Exito',
                    text: `Solicitud enviada con exito, recuerda que 
                    debes esperar a que un administrador revise y 
                    apruebe el evento.`,
                    icon: 'success',
                    time: 4000,
                }).then((result) => {
                    if (!result.isVisible) {
                        location.href = '/organizador/eventos/mis-solicitudes';
                    }
                });
            }
        });
    });
</script>
