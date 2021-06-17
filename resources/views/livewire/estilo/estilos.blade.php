<div>
    @foreach($estilos as $index => $estilo)
    <div>
        <input type="checkbox" wire:model="seleccionados.{{ $index }}" 
                value="{{ $estilo->EST_Nombre }}"
                class="mr-2">
        {{ $estilo->EST_Nombre }}
    </div>
    @endforeach
</div>




