<div class=" col-span-8 align-content-center mt-5">
    <div class="bg-black bg-opacity-20 px-2 my-5 text-center">
        <span class="top-5 mb-3 text-4xl font-bold">¿Tienes más integrantes? Agregalos aquí</span>
    </div>
    <div class="flex justify-center content-center">

        <div class="flex">
            @foreach ($integrantes as $index => $integrante)
                <div class="flex flex-col items-center mr-5">
                    <div class="flex">
                        <img src="{{ asset('storage/' . $integrante['imagen']) }}" class="rounded-full w-28 h-28" />
                        <svg wire:click="eliminarIntegrante('{{ $index }}')" xmlns="http://www.w3.org/2000/svg"
                            class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </div>
                    <span>{{ $integrante['nombre'] }}</span>
                </div>
            @endforeach
        </div>

        <div x-data="formNuevoIntegrante()" @click.away='cerrar()' class="relative h-32 w-32 bg-cover rounded-full lg:rounded-t-full lg:rounded-1">
            <div>
                <button @click="abrir()">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-32 w-32 hover:text-green-400 cursor-pointer"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </button>
            </div>

            <div x-show.transition.out="estaAbierto()" class="bg-white absolute top-0 left-40 p-4 text-primary w-96">
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


                <div class="lg:col-span-2  gap-5 lg:flex  justify-center py-2">
                    <span class="text-2xl font-bold text-center">Instrumentos</span>
                </div>

                <!--<div class="swiper-container swiperInstrumentos">
                    <div class="swiper-wrapper ">


                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div><br><br>
                    <div class="swiper-pagination"></div>
                </div>-->

                <button wire:click="agregarIntegrante" class="py-1 px-5 bg-primary text-white">Agregar</button>
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
