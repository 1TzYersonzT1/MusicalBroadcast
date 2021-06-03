<div>
    <div class="text-white px-10">

        <div class="mb-4 text-4xl font-bold">
            {{ $tallerActual->TAL_Nombre }}
        </div>
        
        <div class="mb-10">{{ $tallerActual->TAL_Descripcion }} </div>

        
        <div class="grid grid-cols-2 gap-10 mb-10">

            <div>
                <p class="font-bold">ORGANIZADOR</p>
                <p>{{ $tallerActual->organizador->nombre }} {{ $tallerActual->organizador->apellidos }}</p>
            </div>
            <div class="col">
                <p class="font-bold">HORARIO</p>
                <p>{{ $tallerActual->TAL_Horario }}</p>
            </div>

            <div class="col">
                <p class="font-bold">REQUISITOS</p>
                <p>{{ $tallerActual->TAL_Requisitos }}</p>
            </div>

            <div class="col">
                <p class="font-bold">LUGAR</p>
                <p>{{ $tallerActual->TAL_Lugar }}</p>
            </div>

            <div class="col">
                <p class="font-bold">PROTOCOLO COVID</p>
                <p>{{ $tallerActual->TAL_Protocolo }}</p>
            </div>
        </div>
        
        <livewire:taller.inscripcion-form-taller :tallerSeleccionado='$tallerActual' :wire:key="$tallerActual->id"> 

    </div>
</div>
