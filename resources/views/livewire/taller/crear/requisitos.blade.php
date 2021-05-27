<div>
    <div class="flex flex-col lg:w-96">
        <span class="font-bold">REQUISITOS</span>
        <div class="flex">
            <input type="text" class="bg-primary border-0 p-0 w-32" wire:model='nuevoRequisito'
                placeholder="Nuevo requisito" />
            <a class="ml-4" wire:click='nuevoItem'>Agregar</a>
        </div>
        <ul class="mt-2 mb-2">
            @foreach ($requisitos as $requisito)
               <li :wire:key='$loop->index'>{{ $requisito }}</li>
            @endforeach
        </ul>
    </div>
</div>
