<div>
    @foreach ($estilos as $estilo)
        <livewire:estilo.estilo :estilo='$estilo' :wire:key='$estilo->id' />
    @endforeach
</div>

