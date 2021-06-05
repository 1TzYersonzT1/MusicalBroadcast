<div>
    <div class="lg:grid lg:grid-cols-2 w-80 mr-5 gap-5">
        <div class="flex flex-col mb-5">
            <span class="text-lg font-bold">Titulo</span>
            <input type="text" wire:model='titulo' class="bg-primary p-0 border-0 w-48" />
        </div>

        <div>
            <label for="descripcion" class="font-bold lg:w-96">Descripción</label>
            <div class="flex flex-col">
                <textarea class="resize-none lg:w-96 bg-primary h-40"
                    placeholder="Escriba una descripción (máximo 255 caracteres)" wire:model='descripcion'></textarea>
            </div>
        </div>

        <div class="flex items-center mb-3 text-sm">
            <span class="font-bold">Lugar: </span>
            <div class="flex flex-col">
                <input type="text" class="border-0 bg-primary w-64 py-0 px-2"
                    placeholder="¿Donde planeas realizar el taller?" wire:model='lugar' />

            </div>
        </div>
    </div>
</div>