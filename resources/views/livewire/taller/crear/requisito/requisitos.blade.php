<div>
    <div class="flex flex-col mb-5">
        <span class="font-bold">Requisitos</span>
        <div class="flex mt-1">
            <input type="text" wire:model='nuevoRequisito'
                placeholder="Nuevo requisito" class="bg-primary border-0 p-0 w-36 mr-2"/>
                <a wire:click='nuevoItem'>Agregar</a>
        </div>
        <ul class="mt-2 mb-2">
            @foreach ($requisitos as $index => $requisito)
                <livewire:taller.crear.requisito.requisito :requisito='$requisito' :wire:key="$index" />
            @endforeach
        </ul>
    </div>
</div>

