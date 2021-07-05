<div class="grid lg:grid-cols-12 grid-cols-4 gap-x-20">
    <div class="lg:col-span-5 col-span-4">
        <div class="grid lg:grid-cols-2 grid-cols-12">
            <div class="lg:col-span-1 col-span-12">
                <span class="text-2xl">{{ $evento->EVE_Nombre }}</span>
            </div>
            <div class="lg:col-span-1 col-span-12">
                <div class="flex flex-col lg:mt-0 mt-4 lg:items-end">
                    <span>{{ $evento->EVE_Fecha }} {{ $evento->EVE_Hora }}</span>
                    @if ($evento->solicitudes[0]->estado == 5)
                        <div class="bg-pink-700 mt-1 rounded-full w-32 py-1 text-center justify-self-end">
                            <span class="text-white">Pospuesto</span>
                        </div>
                    @endif
                </div>
            </div>
            <div class="lg:col-span-2 col-span-12">
                <textarea maxlength="255" disabled='disabled'
                    class="resize-none w-full bg-black bg-opacity-10 h-40 border-0 mt-1 mb-1 disabled rounded-lg"
                    wrap="hard">{{ $evento->EVE_Descripcion }}</textarea>
            </div>
        </div>
    </div>


    <div class="lg:col-start-6 lg:col-span-6 col-span-4 lg:overflow-visible overflow-x-auto">
        @if (count($evento->artistas) > 0)
            <table class="text-primary">
                <thead class="bg-gray-200">
                    <th class="px-8 py-2">Artista</th>
                    <th class="px-8 py-2">Estilos</th>
                    <th class="px-8 py-2">Representante</th>
                    <th class="px-8 py-2">Email</th>
                    <th class="px-8 py-2">Teléfono</th>
                    <th class="px-8 py-2"></th>
                </thead>
                <tbody class="bg-gray-100">
                    @foreach ($evento->artistas as $index => $artista)
                        <tr>
                            <td class="px-4 py-2">{{ $artista->ART_Nombre }}</td>
                            <td class="px-4 py-2">
                                <span>
                                    @foreach ($artista->estilos as $estilo)
                                        @if ($loop->last)
                                            {{ $estilo->EST_Nombre }}.
                                        @else
                                            {{ $estilo->EST_Nombre }},
                                        @endif
                                    @endforeach
                                </span>
                            </td>
                            <td class="px-4 py-2">{{ $artista->representante->nombre }}
                                {{ $artista->representante->apellidos }}</td>
                            <td class="px-4 py-2">{{ $artista->representante->email }}</td>
                            <td class="px-4 py-2">{{ $artista->representante->telefono }}</td>
                            <td class="px-4 py-2">
                                <button wire:click="eliminarArtista('{{ $index }}')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hover:text-red-400"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <span>Oops!! Nadie se ha inscrito aún, ten paciencia :D</span>
        @endif
    </div>


    <div class="col-span-4 mt-10 flex flex-col w-72 items-center">
        <span>¿Tienes problemas para llevar a cabo este evento?</span>
        <div>
            <button data-fancybox data-src="#posponerEventoForm"
                class="mt-4 mr-4 bg-white text-primary px-5 py-2 rounded-full">Posponer</button>
            <div id="posponerEventoForm" class="hidden bg-white lg:w-96 w-80">
                <div>
                    <form wire:submit.prevent="posponerEvento" class="flex flex-col items-center">
                        <div class="flex flex-col items-center mb-2">
                            <span class="text-xl">Posponer evento</span>
                            <span>{{ $evento->EVE_Nombre }}</span>
                        </div>

                        <div class="flex flex-col items-center mb-5">
                            <span>Motivo</span>
                            <textarea maxlength='255'
                                placeholder="Indique el motivo por el cuál está posponiendo el taller, de esta forma los asistentes serán informados (máximo 255 caracteres)"
                                wire:model='observacion_pospuesto'
                                class="resize-none lg:w-80 w-72 px-2 bg-primary h-40 text-white"></textarea>
                            @if ($errors)
                                @foreach ($errors->all() as $message)
                                    <script>
                                        $.fancybox.close();
                                        Swal.fire({
                                            title: 'Error',
                                            text: 'Complete los campos solicitados',
                                            icon: 'warning',
                                            timer: 4000,
                                        }).then((result) => {
                                            if (!result.isVisible) {
                                                location.href = location.href;
                                            }
                                        });
                                    </script>
                                @endforeach
                            @endif
                        </div>

                        <div class="flex flex-col items-center mb-5">
                            <span>Nueva fecha</span>
                            <div class="flex justify-between">
                                <input type="date" wire:model="fecha" />
                                <input type="time" wire:model="hora" />
                            </div>
                        </div>
                        <button type="submit"
                            class="mt-5 px-4 py-2 rounded-full bg-primary text-white hover:bg-primary hover:text-white">
                            Posponer
                        </button>
                    </form>
                </div>
            </div>

            <button data-fancybox data-src="#cancelarEventoForm"
                class="mt-4 bg-white text-primary px-5 py-2 rounded-full">
                Cancelar
            </button>
            <div id="cancelarEventoForm" class="hidden bg-white lg:w-96 w-80">
                <div>
                    <form wire:submit.prevent="cancelarEvento" class="flex flex-col items-center">
                        <div class="flex flex-col items-center mb-2">
                            <span class="text-xl">Cancelar evento</span>
                            <span>{{ $evento->EVE_Nombre }}</span>
                        </div>

                        <div class="flex flex-col items-center mb-5">
                            <span>Motivo</span>
                            <textarea maxlength='255'
                                placeholder="Indique el motivo por el cuál está posponiendo el evento, de esta forma los asistentes serán informados (máximo 255 caracteres)"
                                wire:model='observacion_cancelado'
                                class="resize-none w-72 px-4 bg-primary h-40 text-white"></textarea>
                        </div>


                        <button type="submit"
                            class="mt-5 px-4 py-2 rounded-full bg-primary text-white hover:bg-primary hover:text-white">
                            Cancelar evento
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    window.addEventListener("eliminarArtistaEvento", function() {
        Swal.fire({
            title: 'Eliminar participante ¿Está seguro?',
            text: `No podrás volver a inscribir a este participante por tu cuenta
            y se le notificará a su representante que ya no formará parte del evento.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, eliminar'
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit("eliminarArtistaConfirmado");
                Swal.fire({
                    title: "Artista eliminado",
                    text: 'Se ha eliminado al artista',
                    icon: 'success',
                    timer: 2000,
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.href = location.href;
                    }
                })
            }
        });
    });

    window.addEventListener("posponerEvento", function() {
        $.fancybox.close();
        Swal.fire({
            title: "¿Está seguro?",
            text: `Estas a punto de posponer el evento, 
            de modo que los asistentes y administradores serán informados con 
            la información que acabas de escribir`,
            icon: "info",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: "Cancelar",
            confirmButtonText: "Si, posponer",
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit("posponerEventoConfirmado");
                Swal.fire({
                    title: 'Evento pospuesto',
                    icon: `success`,
                    timer: 3000
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.href = location.href;
                    }
                });
            }
        });
    });

    window.addEventListener("cancelarEvento", function() {
        $.fancybox.close();
        Swal.fire({
            title: "¿Está seguro?",
            text: `Estas a punto de cancelar el evento, 
            de modo que los asistentes y administradores serán informados con 
            la decisión que acabas de tomar.`,
            icon: "info",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: "Cancelar",
            confirmButtonText: "Si, cancelar",
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit("cancelarEventoConfirmado");
                Swal.fire({
                    title: 'Evento cancelado',
                    icon: `success`,
                    timer: 3000
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.href = location.href;
                    }
                });
            }
        });
    });
</script>
