<div>
    <button data-fancybox data-src="#formulario-modificar" 
        class="mt-5 bg-primary text-white px-4 py-2 rounded-full">Modificar</button>

    <livewire:organizador.solicitudes.modificar-solicitud :solicitudSeleccionada="$solicitudActual"
        :wire:key="$solicitudActual->id" />
</div>
