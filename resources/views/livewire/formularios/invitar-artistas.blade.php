<div>
    <div class="flex lg:flex-row flex-col">
        <span class="block text-center font-light mb-2 mr-4">Busca uno o más artistas</span>
        <input type="text" wire:model="nombreArtista" class="p-0" />
    </div>

    <div class="">
        <div class="">
            @foreach ($resultados as $index => $resultado)
                <div class="">
                    <input type="checkbox" value="{{ $resultado->id }}" :wire:key="{{ $resultado->id }}"
                    wire:model="artistasSeleccionados.{{ $index }}" class="inline-flex" />{{ $resultado->ART_Nombre }}
                </div>
            @endforeach
        </div>
    </div>
</div>