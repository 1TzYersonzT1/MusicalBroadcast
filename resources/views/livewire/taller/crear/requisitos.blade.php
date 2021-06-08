<div>
    <div class="flex flex-col mb-5">
        <span class="font-bold">Requisitos</span>
        <div class="flex">
            <input type="text" class="bg-primary border-0 p-0 w-36" wire:model='nuevoRequisito'
                placeholder="Nuevo requisito" />
                <a wire:click='nuevoItem'>Agregar</a>
        </div>
        <ul class="mt-2 mb-2">
            @foreach ($requisitos as $requisito)
                <li :wire:key='$loop->index'>{{ $requisito }}</li>
            @endforeach
        </ul>
    </div>
</div>
