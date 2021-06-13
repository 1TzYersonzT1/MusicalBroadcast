<div>
    @foreach($estilos as $index => $estilo)
    <div>
        <div>
            <input type="checkbox" wire:model="seleccionados.{{ $index }}" value="{{ $estilo->EST_Nombre }}">{{ $estilo->EST_Nombre }}
        </div>
    </div>
    @endforeach
</div>




