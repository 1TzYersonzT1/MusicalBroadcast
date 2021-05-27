<div>
    <div class="flex flex-col lg:w-96">
        <span class="font-bold">PROTOCOLO COVID</span>
        <div class="flex">
            <input type="text" class="bg-primary border-0 p-0" wire:model='nuevoProtocolo'
                placeholder="Nuevo protocolo" />
            <a class="ml-4" wire:click='nuevoItem'>Agregar</a>
        </div>
        <ul class="mt-2 mb-2">
            @foreach ($protocolos as $protocolo)
                <li :wire:key="{{ $loop->index }}">{{ $protocolo }}</li>
            @endforeach
        </ul>
    </div>
</div>
