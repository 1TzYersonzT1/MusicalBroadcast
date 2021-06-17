<div class="grid grid-cols-12 gap-20">
    <div class="lg:col-span-5 col-span-5">
        <div class="grid lg:grid-cols-2">
            <div class="mb-8 flex lg:flex-row col-span-2 flex-col justify-between lg:items-center">
                <div class="flex flex-col">
                    <span class="text-2xl">{{ $taller->TAL_Nombre }}</span>
                    <span>Cupos restantes: {{ $taller->TAL_Aforo }}</span>
                </div>
                <div>
                    <span>{{ $taller->TAL_Fecha }} {{ $taller->TAL_Hora }}</span>
                </div>
            </div>

            <div class="mb-8 col-span-2">
                <p>{{ $taller->TAL_Descripcion }}</p>
            </div>

            <div class="flex justify-between col-span-2">
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

            <div class="mt-10 flex flex-col w-80 items-center">
                <span>¿Tienes problemas para llevar a cabo este taller?</span>
                <button data-fancybox data-src="#posponerTallerForm" class="mt-4 bg-white text-primary px-5 py-2">Posponer</button>
                <div id="posponerTallerForm" class="hidden bg-white lg:w-96 w-80">
                    <div class="flex flex-col items-center">
                       <div class="flex flex-col items-center mb-2">
                            <span>Posponer taller</span>
                            <span class="font-bold">{{ $taller->TAL_Nombre }}</span> 
                       </div>

                        <div class="flex flex-col items-center mb-5">
                            <span>Motivo</span>
                            <textarea maxlength='255'
                                placeholder="Indique el motivo por el cuál está posponiendo el taller, de esta forma los asistentes serán informados (máximo 255 caracteres)"
                                wire:model='observacion' class="resize-none lg:w-80 px-2 bg-primary h-40 text-white"></textarea>
                                
                        </div>

                        <div class="flex flex-col items-center mb-5">
                            <span>Nueva fecha</span>
                            <div class="flex justify-between">
                                <input type="date" wire:model="fecha" />
                                <input type="time" wire:model="hora" />
                            </div>
                        </div>

                        <button id="posponerTallerAlert" class="mt-5 px-4 py-2 rounded-full bg-primary text-white">Posponer</button>
                    </div>
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
    
    @if($errors)
        <script> 
                alert('ooo');
        </script>
    @endif
</div>

<script>
    $("#posponerTallerAlert").on("click", function() {
        $.fancybox.close();
        Swal.fire({
            title: "¿Está seguro?",
            text: `Estas a punto de posponer el evento, 
            de modo que los asistentes serán informados con 
            la información que acabas de escribir`,
            icon: "info",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: "Cancelar",
            confirmButtonText: "Si, posponer",
        }).then((result) => {
            if(result.isConfirmed) {
                Livewire.emit("posponerTaller");
            }
        });
    })
</script>




 
