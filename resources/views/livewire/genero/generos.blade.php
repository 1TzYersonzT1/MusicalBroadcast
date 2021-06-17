<div>
    @foreach ($generos as $index => $genero)
    <div class="flex items-center">
        <input type="checkbox" wire:model='seleccionados.{{ $index }}' 
            value="{{ $genero->id }}"
            class="mr-2" />
        {{ $genero->GEN_Nombre }}
    </div>
    @endforeach
</div>


