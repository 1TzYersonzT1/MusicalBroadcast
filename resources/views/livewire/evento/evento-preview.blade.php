<div>
    <div class="text-white">

        <div class="mb-4 text-2xl font-bold">
            <span class="block w-80">{{ $eventoActual->EVE_Nombre }}</span>
        </div>

        <div class="mb-10">{{ $eventoActual->EVE_Descripcion }} </div>


        <div class="grid lg:w-96 w-80 grid-cols-2 gap-10 mb-10">

            <div class="col">
                <p class="font-bold">HORARIO</p>
                <p>{{ $eventoActual->EVE_Fecha }} {{ $eventoActual->EVE_Hora }}</p>
            </div>

            <div class="col">
                <p class="font-bold">LUGAR</p>
                <p>{{ $eventoActual->EVE_Lugar }}</p>
            </div>

        </div>

        @can('representar')
            <div x-data="{ open: false }" x-cloak class="relative mb-4 flex flex-col items-center justify-center">
                <span class="font-bold text-2xl block">¿Quieres que tu artista/as participen en este evento?</span>

                <button @click="open = true" class="bg-white text-primary px-4 py-1 mt-2 rounded-lg">Solicitar invitación</button>

                <div x-show.transition="open"
                    class="shadow-md bg-white absolute z-40 grid grid-cols-8 text-primary px-4 py-2">
                    <div class="col-span-8">
                        <div class="flex justify-between">
                            <div><!-- Necesario para centrar --></div>
                            <span class="block font-bold text-center">Solicitar invitación a evento</span>
                            <button @click="open = false">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                        <span class="block text-center font-light mb-2">{{ $eventoActual->EVE_Nombre }}</span>
                    </div>

                    <div class="col-span-8 flex items-center justify-center">
                        <livewire:formularios.invitar-artistas />
                    </div>



                    <div class="col-span-8">
                        @error('artistasSeleccionados')
                            <span class="text-red-400 w-80">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-span-8">
                        <button wire:click="validarPeticiones" class="bg-primary px-2 py-1 mt-2 text-white">Enviar
                            petición</button>

                    </div>
                </div>
            </div>
        @endcan

        <div class="flex flex-col items-start">
            <span class="block font-bold text-2xl mb-5">Artistas invitados</span>

            @if (count($eventoActual->artistas) > 0)

                <div class="grid lg:grid-cols-12 grid-cols-8 gap-10">
                    @foreach ($eventoActual->artistas as $artista)
                        <a href="{{ route('artista.show', $artista->id) }}"
                            class="flex flex-col lg:col-span-2 col-span-4 items-center mb-5 transform hover:scale-110 cursor-pointer">
                            <div class="h-20 w-20 flex-none bg-cover rounded-full rounded-t-full rounded-1 text-center overflow-hidden">
                            <img src="{{'https://musicalimages.blob.core.windows.net/images/' . $artista->imagen }}" />
                            </div>
                            <span>{{ $artista->ART_Nombre }}</span>
                        </a>
                    @endforeach
                </div>
            @else
                <span>El evento aún no cuenta con artistas invitados.</span>
            @endif
        </div>
    </div>
</div>

<script>
    window.addEventListener('confirmarEnvioPeticiones', function() {
        Swal.fire({
            title: '¿Está seguro que deseas inscribirte?',
            text: `Inscribirás al artista o los artistas que has seleccionado
            al evento.`,
            icon: 'success',
            showCancelButton: true,
            cancelButtonText: 'Regresar',
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Inscribirse',
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('envioPeticionesConfirmado');

                Swal.fire({
                    title: 'Artista/as inscrito',
                    text: `Has inscrito exitosamente al artista/as.`,
                    icon: 'success',
                    timer: 6000,
                    showConfirmButton: true,
                    confirmButtonText: 'Ok'
                }).then((result) => {
                    if (!result.isVisible) {
                        location.href = location.href;
                    }
                });
            }
        });
    });
</script>
