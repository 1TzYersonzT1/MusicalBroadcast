<div class="grid grid-cols-12 col-span-12">
        <div class="lg:col-span-5 col-span-12">
            <div class="mb-8 flex lg:flex-row flex-col justify-between lg:w-full w-80 lg:items-center">
                <div class="flex flex-col">
                    <span class="text-3xl">{{ $taller->TAL_Nombre }}</span>
                    <span>Cupos restantes: {{ $taller->TAL_Aforo }}</span>
                </div>
                <div><span>{{ $taller->TAL_Horario }}</span></div>
            </div>

            <div class="mb-8">
                <p>{{ $taller->TAL_Descripcion }}</p>
            </div>

            <div class="flex justify-between">
                <div>
                    <span class="font-bold">Requisitos</span>
                    <p>{{ $taller->TAL_Requisitos }}</p>
                </div>

                <div>
                    <span class="font-bold">Protocolo COVID</span>
                    <p>{{ $taller->TAL_Protocolo }}</p>
                </div>
            </div>
        </div>

        
        <div class="lg:col-start-8 lg:col-span-5 col-span-12">
            @if(count($taller->asistentes) > 0)
            <div class="flex justify-center mb-5">
                <span class="text-2xl">Asistentes</span>
            </div>
            <div class="overflow-auto">
            <table class="px-0 text-primary">
                <thead class="bg-gray-100">
                    <th class="px-6 py-4">Rut</th>
                    <th class="px-6 py-4">Nombre</th>
                    <th class="px-6 py-4">Email</th>
                    <th class="px-6 py-4">Teléfono</th>
                    <th class="px-6 py-4"></th>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($taller->asistentes as $asistente)
                        <livewire:taller.asistentes.asistente :asistente='$asistente' :wire:key="$asistente->rut" />
                    @endforeach
                </tbody>
            </table>
        </div>
            @else
                <span class="block lg:mt-0 mt-10">Oops!! Nadie se ha inscrito aún, ten paciencia :D</span>
            @endif
        </div>
 </div>

 
