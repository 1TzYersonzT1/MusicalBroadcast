<div>
    <div class="min-h-screen mt-12 text-white">
        <div class="mb-14"><span class="text-4xl border-b-4">Talleres aprobados</span></div>
        @if (count($talleres) > 0)
            <div class="grid lg:grid-cols-2">
                @foreach ($talleres as $taller)
                    <div>
                        <div>
                            <div class="mb-8 flex lg:flex-row flex-col justify-between lg:w-full w-80 lg:items-center">
                                <div class="flex flex-col">
                                    <span class="text-2xl">{{ $taller->TAL_Nombre }}</span>
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

                       
                        <div class="mt-14">
                            @if(count($taller->asistentes) > 0)
                            <table class="px-0">
                                <thead>
                                    <th class="px-3">Rut</th>
                                    <th class="px-3">Nombre</th>
                                    <th class="px-3">Email</th>
                                    <th class="px-3">Teléfono</th>
                                </thead>
                                <tbody>
                                    @foreach($taller->asistentes as $asistente)
                                        <tr>
                                            <td class="px-3">{{ $asistente->rut }}</td>
                                            <td class="px-3">{{ $asistente->nombre }} {{ $asistente->apellidos}}</td>
                                            <td class="px-3">{{ $asistente->email }}</td>
                                            <td class="px-3">{{ $asistente->telefono }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @else
                                <span>Oops!! Nadie se ha inscrito aún, ten paciencia :D</span>
                            @endif
                        </div>
                     
                    </div>
                @endforeach
            </div>

            <div class="flex justify-center mt-20">{{ $talleres->links() }}</div>
        @else
            <span>No tienes talleres aprobados</span>
        @endif
    </div>
</div>

<script>

</script>
