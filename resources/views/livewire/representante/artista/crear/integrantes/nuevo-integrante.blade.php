<div x-data="formularios()" class="col-span-8 my-5">
    <div class="bg-black bg-opacity-20 px-2 my-5 text-center">
        <span class="top-5 mb-3 text-4xl font-bold">¿Tienes más integrantes? Agregalos aquí</span>
    </div>
    <div class="flex flex-col items-center">
        <div class="flex flex-wrap justify-center content-center mt-5">

            @foreach ($integrantes as $index => $integrante)
                <div class="flex mr-5">
                    <button>
                        <div class="flex flex-col items-center">
                            <img src="{{ 'https://musicalimages.blob.core.windows.net/images/' . $integrante['imagen'] }}"
                                class="rounded-full w-28 h-28" />
                            <span>{{ $integrante['nombre'] }}</span>
                        </div>
                    </button>
                    <svg wire:click="eliminarIntegrante('{{ $index }}')" xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </div>
            @endforeach
            <div>
                <button @click="abrir()">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-32 w-32 hover:text-green-400 cursor-pointer"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </button>
            </div>
        </div>

        <div class="relative h-2 w-32 bg-cover rounded-full lg:rounded-t-full lg:rounded-1">
            <div x-show.transition.out="estaAbierto()"
                class="bg-white z-50 lg:w-96 w-80 absolute lg:left-54 -right-24 p-4 text-primary shadow-md border-4 overflow-y-auto">
                <div class="flex justify-between items-center">
                    <span class="font-bold text-2xl block text-center mb-5">Agregar integrante.</span>
                    <svg @click="cerrar()" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </div>

                <div class="mb-5">
                    <label>Foto de perfil.</label>

                    @error('imagenIntegrante')
                        <label for="imagenIntegrante">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-32 w-32 border-2" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                    d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </label>
                        <input type="file" wire:model="imagenIntegrante" id="imagenIntegrante" class="hidden" />
                        @error('imagenIntegrante')
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    @else
                        @if ($imagenIntegrante)
                            <div class="flex mt-4">
                                <img src="{{ $imagenIntegrante->temporaryUrl() }}" class="h-32 w-32 rounded-full" />
                                <svg wire:click="eliminarImagenIntegrante" xmlns="http://www.w3.org/2000/svg"
                                    class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </div>
                        @else
                            <label for="imagenIntegrante">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-32 w-32 border-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                        d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </label>
                            <input type="file" wire:model="imagenIntegrante" id="imagenIntegrante" class="hidden" />
                            @error('imagenIntegrante')
                                <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        @endif
                    @enderror


                </div>

                <div class="mb-5 flex flex-col">
                    <label for="nombreIntegrante">¿Cuál es su RUT?</label>
                    <input type="text" wire:model="rutIntegrante" class="mt-1" maxlength="9" required />
                    <span>(Sin puntos, ni guión) Ejemplo: 123456789</span>
                    @error('rutIntegrante')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-5 flex flex-col">
                    <label for="nombreIntegrante">¿Cuál es su nombre?</label>
                    <input type="text" wire:model="nombreIntegrante" class="mt-1" required />
                    @error('nombreIntegrante')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-5 flex flex-col">
                    <label for="nombreIntegrante">¿Cuáles son sus apellidos</label>
                    <input type="text" wire:model="apellidosIntegrante" class="mt-1" required />
                    @error('apellidosIntegrante')
                        <span class="text-red-600">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col items-center">
                    <div class="lg:col-span-2 gap-5 lg:flex flex-col justify-center py-2">
                        <span class="block text-2xl font-bold text-center">Instrumentos</span>
                        @error('instrumentosSeleccionados')
                            <span class="text-red-400">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-wrap justify-center mx-4 w-80 my-3">
                        @foreach ($instrumentos as $index => $instrumento)
                            <div class="flex flex-col mx-2 my-2 items-center">
                                <div class="flex items-center mb-2 instrumento">
                                    <input type="checkbox" value="{{ $instrumento->id }}"
                                        wire:model="instrumentosSeleccionados.{{ $index }}"
                                        class="opacity-0 absolute w-10 h-10 rounded-full" />
                                    <div
                                        class="bg-trasparent w-10 h-10 flex flex-shrink-0 justify-center items-center focus-within:bg-green-400">
                                        <img src="{{ $instrumento->imagen }}" />
                                    </div>
                                </div>
                                <span>{{ $instrumento->INST_Nombre }}</span>
                            </div>
                        @endforeach
                    </div>


                </div>

                <button wire:click="agregarIntegrante" class="py-1 px-5 bg-primary text-white">Agregar</button>
            </div>

        </div>
    </div>
</div>
</div>

<script>
    var swiper = new Swiper(".swiperInstrumentos", {
        slidesPerView: 4,
        spaceBetween: -100,
        slidesPerGroup: 4,
        loop: true,
        loopFillGroupWithBlank: true,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
</script>
