<div>
    <div class='container mx-auto text-white'>
        <div class="mb-6 lg:mt-0 mt-5"><span class="text-4xl">Organizar nuevo taller.</span></div>
        @if ($errors)
            @foreach ($errors->all() as $message)
                {{ $message }}
            @endforeach
        @endif
        <div class="lg:flex">
            <div class="flex flex-col lg:mr-5">
                <form wire:submit.prevent='nuevoTaller' enctype="multipart/form-data">
                    <div class="lg:flex">
                        <div class="flex flex-col">
                            <span class="font-bold">Titulo</span>
                            <div class="flex flex-col mt-1">
                                <input type="text" class="border-0 bg-primary px-0 py-1 font-light lg:w-96"
                                    wire:model='titulo' maxlength="30"
                                    placeholder="Escriba el titulo del taller (máximo 30 caracteres)" />
                            </div>
                        </div>
                    </div>
                    <div class="mt-2 flex flex-col">
                        <div class="flex mb-3">
                            <div class="flex flex-col mt-3">
                                <span class="font-bold">Fecha</span>
                                <input type="date" wire:model="fecha"
                                    class="bg-primary text-white p-0 mr-5 mt-1" />
                            </div>
                            <div class="flex flex-col mt-3">
                                <span class="font-bold">Hora</span>
                                <div class="flex flex-col">
                                    <input type="time" id="hora" wire:model="hora" class="bg-primary border-0 p-0 mt-1">

                                </div>

                            </div>

                        </div>
                        <div class="flex items-center mb-2 mt-3">
                            <span class="font-bold">Aforo:</span>
                            <div class="flex flex-col">
                                <input type="number" min='1' max='12' id="aforo" wire:model='aforo'
                                    class="bg-primary p-0 px-2 w-16 ml-3 mr-3" />

                            </div><span>personas.</span>
                        </div>
                        <div class="flex items-center mb-3 mt-3 text-sm">
                            <span class="font-bold">Lugar: </span>
                            <div class="flex flex-col">
                                <input type="text" placeholder="¿Donde planeas realizar el taller?" wire:model='lugar'
                                    class="border-0 bg-primary w-64 py-0 px-2" />

                            </div>
                        </div>

                        <div class="mt-3">
                            <label for="descripcion" class="font-bold lg:w-96">Descripción</label>
                            <div class="flex flex-col">
                                <textarea placeholder="Escriba una descripción (máximo 255 caracteres)"
                                    wire:model='descripcion' maxlength="255"
                                    class="resize-none lg:w-96 bg-primary h-40 mt-1 mb-1"></textarea>
                                <span>{{ $caracteres_descripcion }} / 255</span>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="w-80"><input type="file" wire:model="imagen" />
                <div wire:loading wire:target="imagen" 
                        class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
                    <p class="font-bold">Cargando imagen</p>
                  </div>
             
                @error('imagen')
                
                @else
                    @if ($imagen )
                    <img src="{{ $imagen->temporaryUrl() }}" class="mt-5">
                    @endif
                @enderror
            </div>

            <div class="grid lg:grid-cols-2 lg:grid-rows-2 lg:mt-0 mt-5 ml-5">

         

                <livewire:taller.crear.requisito.requisitos :requisitos='$requisitos' />

                <livewire:taller.crear.protocolos :protocolos='$protocolos' />

                <div class="justify-self-center self-center">
                    <button type="submit"
                        class="border border-white px-7 py-3 my-10 lg:my-0 hover:bg-white hover:text-primary">Solicitar
                        permiso</button>
                </div>

            </div>

            </form>
        </div>
    </div>
</div>

<script>
    window.addEventListener("nuevoTaller", function() {
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: 'Solicitud enviada',
            text: `Recuerda que debes esperar a que se apruebe el taller, puedes
            revisar el estado de tu solicitud en todo momento o contactarte con soporte si tienes alguna duda`,
            showConfirmButton: false,
            timer: 10000
        }).then((isVisible) => {
            if (!isVisible.isComfirmed) {
                location.href = "/talleres";
            }
        });
    });

</script>
