<div>
    <div class="flex flex-col lg:mr-10">
        <span class="font-bold">Protocolo COVID</span>
        <div class="flex">
            <input type="text" class="bg-primary border-0 p-0 w-36" wire:model='nuevoProtocolo'
                placeholder="Nuevo protocolo" />
            <a wire:click='nuevoItem'>Agregar</a>
        </div>
        <ul class="mt-2 mb-2">
            @foreach ($protocolos as $protocolo)
                <li :wire:key="{{ $loop->index }}">{{ $protocolo }}</li>
            @endforeach
        </ul>
    </div>
</div>
