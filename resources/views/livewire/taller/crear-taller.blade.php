<div>
    <div class='px-4 container mx-auto text-white'>
        <div class="mb-6"><span class="text-3xl">Organizar nuevo taller.</span></div>

        <div class="lg:flex">
            <div class="flex flex-col lg:mr-5">
                <form wire:submit.prevent='nuevoTaller'>
                    <div class="lg:flex">
                        <div class="flex flex-col">
                            <span class="font-bold">Titulo</span>
                            <input type="text" class="border-0 bg-primary p-0 lg:w-96" wire:model='titulo'
                                placeholder="Escriba el titulo del taller (máximo 30 caracteres)" />
                        </div>
                    </div>
                    <div class="mt-2 flex flex-col">
                        <div class="flex mb-3">
                            <div class="flex flex-col">
                                <span class="font-bold">Fecha</span>
                                <x-date-picker id="fecha" wire:model.lazy='fecha' />
                            </div>
                            <div class="flex flex-col">
                                <span class="font-bold">Hora</span>
                                <input type="time" class="bg-primary border-0 p-0" id="hora" wire:model="hora">
                            </div>

                        </div>
                        <div class="flex items-center mb-2">
                            <span class="font-bold">Aforo:</span>
                            <input type="number" min='1' max='12' class="bg-primary p-0 px-2 w-16 ml-3 mr-3" id="aforo"
                                wire:model='aforo' /><span>personas.</span>
                        </div>
                        <div class="flex items-center mb-3 text-sm">
                            <span class="font-bold">Lugar: </span>
                            <input type="text" class="border-0 bg-primary w-64 py-0 px-2"
                                placeholder="¿Donde planeas realizar el taller?" wire:model='lugar' />
                        </div>
                        <label for="descripcion" class="font-bold lg:w-96">Descripción</label>
                        <textarea class="resize-none lg:w-96 bg-primary h-40"
                            placeholder="Escriba una descripción (máximo 255 caracteres)"
                            wire:model='descripcion'></textarea>

                    </div>
            </div>


            <div class="grid lg:grid-cols-2 lg:grid-rows-2 lg:mt-0 mt-5">

                <livewire:taller.crear.requisitos :requisitos='$requisitos' />

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
