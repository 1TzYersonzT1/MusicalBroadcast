<div class="grid grid-cols-12 gap-20">
    <div class="lg:col-span-5 col-span-5">
        <div class="grid grid-flow-col grid-rows-3">
            <div class="mb-8 flex lg:flex-row flex-col justify-between lg:items-center">
                <div class="flex flex-col">
                    <span class="text-2xl">{{ $taller->TAL_Nombre }}</span>
                    <span>Cupos restantes: {{ $taller->TAL_Aforo }}</span>
                </div>
                <div>
                    <span>{{ $taller->TAL_Fecha }} {{ $taller->TAL_Hora }}</span>
                </div>
            </div>

            <div class="mb-8">
                <p>{{ $taller->TAL_Descripcion }}</p>
            </div>

            <div class="flex justify-between">
                <div>
                    <span class="font-bold">REQUISITOS</span>
                    @foreach($taller->TAL_Requisitos as $requisito)
                        <p>{{ $requisito }}</p>
                    @endforeach
                </div>

                <div>
                    <span class="font-bold">PROTOCOLO COVID</span>
                    @foreach($taller->TAL_Protocolo as $protocolo)
                    <p>{{ $protocolo }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

   
    <div class="lg:col-start-7 lg:col-span-3 col-start-1 col-span-5 lg:overflow-visible overflow-x-auto">
        @if(count($taller->asistentes) > 0)
        <table class="text-primary">
            <thead class="bg-gray-200">
                <th class="px-8 py-2">Rut</th>
                <th class="px-8 py-2">Nombre</th>
                <th class="px-8 py-2">Email</th>
                <th class="px-8 py-2">Teléfono</th>
                <th class="px-8 py-2"></th>
            </thead>
            <tbody class="bg-gray-100">
                @foreach($taller->asistentes as $index => $asistente)
                    <livewire:taller.asistentes.asistente :asistente="$asistente" :wire:key="$asistente->rut" />
                @endforeach
            </tbody>
        </table>
        @else
            <span>Oops!! Nadie se ha inscrito aún, ten paciencia :D</span>
        @endif
    </div>
</div>

<script>

    window.addEventListener("prueba", (event) => {
        alert(event.detail.test.rut);
    })

</script>




 
