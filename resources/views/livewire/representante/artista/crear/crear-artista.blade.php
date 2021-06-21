<div class="gap-5 text-white py-4 flex-col">
    <div class="col-span-8">
        <div class="col-span-8 align-content-center">
            <div class="bg-black bg-opacity-20 px-2 py-1 text-center">
                <span class="top-5 mb-2 text-4xl font-bold">Agrega el nombre del artista</span>
            </div>
            <div class="flex justify-center py-1 mt-5">
                <input type="text" wire:model="nombreArtista" placeholder="Escribe el nombre del artista"
                    class="bg-white h-14 px-5 w-96 focus:outline-none rounded-full text-black">
            </div>
        </div>

        <div>
            <div class="bg-black bg-opacity-20 px-2 py-1 text-center mt-5">
                <span class="mb-3 text-4xl font-bold">Escoge un genero</span>
            </div>

            <div class="swiper-container swiperGenerosArtista mt-5" wire:ignore>
                <div class="swiper-wrapper">
                    @foreach ($generos as $index => $genero)
                        <livewire:representante.artista.genero :genero="$genero" :wire:key="$genero->id" />
                    @endforeach
                </div>
            </div>
        </div>

        @if (count($estilos) > 0)
            <div>
                <div class="flex flex-col justify-center my-4">
                    <span class="text-2xl font-bold text-center mt-4">Estilos</span>
                    <span class="text-center">
                        Por favor selecciona uno o más estilos que representen a tu artista
                    </span>
                </div>

                <div class="flex justify-center">
                    @foreach ($estilos as $index => $estilo)
                        <div class="flex flex-col items-center">
                            <div class="flex items-center mb-2 genero">
                                <input type="checkbox" value="{{ $estilo['id'] }}"
                                    wire:model="estilosSeleccionados.{{ $index }}"
                                    class="opacity-0 absolute w-32 h-32 rounded-full" />
                                <div
                                    class="bg-trasparent w-32 h-32 flex rounded-full flex-shrink-0 justify-center items-center mr-2 focus-within:border-red-500">
                                    <img src="https://tailwindcss.com/img/card-left.jpg"
                                        class="rounded-full w-28 h-28" />
                                </div>
                            </div>
                            <span>{{ $estilo['EST_Nombre'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>



    <div class="col-span-8 justify-center mt-5">
        <div class="bg-black bg-opacity-20 px-2 py-1 text-center">
            <span class="mb-3 text-4xl font-bold">Cuentanos ¿que tipo de artista eres?</span>
        </div>

        <div class="flex justify-center gap-5 mt-5">
            <div class="flex flex-col items-center genero">
                <input type="radio" wire:model="tipoArtista" value="1" 
                    class="h-32 w-32 opacity-0 absolute w-32 h-32 rounded-full" />
                <div
                    class="bg-trasparent w-32 h-32 flex rounded-full flex-shrink-0 justify-center items-center mr-2 focus-within:border-red-500">
                    <img src="https://tailwindcss.com/img/card-left.jpg" class="rounded-full w-28 h-28" />
                </div>
                <span>Solista</span>
            </div>

            <div class="flex flex-col items-center genero">
                <input type="radio" wire:model="tipoArtista" value="2"
                    class="h-32 w-32 opacity-0 absolute w-32 h-32 rounded-full" />
                <div
                    class="bg-trasparent w-32 h-32 flex rounded-full flex-shrink-0 justify-center items-center mr-2 focus-within:border-red-500">
                    <img src="https://tailwindcss.com/img/card-left.jpg" class="rounded-full w-28 h-28" />
                </div>
                <span>Banda</span>
            </div>
        </div>
    </div>

    <!-- Imagen artista -->
    <div class=" col-span-8 align-content-center mt-5">
        <div class="bg-black bg-opacity-20 px-2 py-1 text-center">
            <span class="top-5 mb-3 text-4xl font-bold">Sube la imagen del artista</span>
        </div>
        <div class="flex justify-center gap-5 mt-5">
            @if ($imagenArtista)
                <img src="{{ asset($imagenArtista->temporaryUrl()) }}" class="rounded-full w-32 h-32" />
                <svg wire:click="eliminarImagenArtista" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            @else
                <div class="w-80 flex flex-col items-center">
                    <label for="imagenArtista">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-32 w-32 hover:text-green-400 cursor-pointer"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </label>
                    <input type="file" wire:model="imagenArtista" id="imagenArtista" class="hidden" />
                </div>
            @endif
        </div>
    </div>

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
                            <svg wire:click="eliminarIntegrante('{{ $index }}')"
                                xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </div>
                        <span>{{ $integrante['nombre'] }}</span>
                    </div>
                @endforeach
            </div>

            <div x-data="formNuevoIntegrante()" class="relative h-32 w-32 bg-cover rounded-full lg:rounded-t-full lg:rounded-1">
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
                        <svg @click="cerrar()"
                                xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </div>

                    <div class="mb-5">
                        <label>Foto de perfil.</label>

                        @if($imagenIntegrante)
                            <div class="flex mt-4">
                                <img src="{{ $imagenIntegrante->temporaryUrl() }}" class="h-32 w-32 rounded-full" />
                                <svg wire:click="eliminarImagenIntegrante"
                                    xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                 </svg>
                            </div>
                        @else
                            <label for="imagenIntegrante">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-32 w-32 border-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </label>
                            <input type="file" wire:model="imagenIntegrante" id="imagenIntegrante" class="hidden" />
                            @error("imagenIntegrante")
                            <span class="text-red-600">{{ $message }}</span>
                            @enderror
                        @endif
                    </div>

                    <div class="mb-5 flex flex-col">
                        <label for="nombreIntegrante">¿Cuál es su RUT?</label>
                        <input type="text" wire:model="rutIntegrante" class="mt-1" maxlength="9" required />
                        <span>(Sin puntos, ni guión) Ejemplo: 123456789</span>
                        @error("rutIntegrante")
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-5 flex flex-col">
                        <label for="nombreIntegrante">¿Cuál es su nombre?</label>
                        <input type="text" wire:model="nombreIntegrante" class="mt-1" required />
                        @error("nombreIntegrante")
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-5 flex flex-col">
                        <label for="nombreIntegrante">¿Cuáles son sus apellidos</label>
                        <input type="text" wire:model="apellidosIntegrante" class="mt-1" required />
                        @error("apellidosIntegrante")
                            <span class="text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                    <button wire:click="agregarIntegrante" class="py-1 px-5 bg-primary text-white">Agregar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Albumes -->
    <div class="col-span-8 align-content-center mt-5">
        <div class="bg-black bg-opacity-20 px-2 py-1 text-center">
            <span class="top-5 mb-3 text-4xl font-bold">Agrega tus albums aquí</span>
        </div>
        <div class="flex flex-col items-center">
            <div class="flex justify-center mt-5">
                <button data-fancybox data-src="#formNuevoAlbum">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-40 w-40 border-2 border-white" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                </button>

                <div id="formNuevoAlbum" class="bg-white text-primary hidden w-96">
                    <div class="w-80">
                        <div>
                            <span class="text-2xl font-bold">Agregar album</span>
                        </div>

                        @if ($imagenAlbum)

                        @else
                            <div>
                                <label for="imagenAlbum">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-40 w-40 border-2 border-white"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                </label>
                                <input type="file" wire:model="imagenAlbum" id="imagenAlbum" class="hidden" />
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="mt-5"><span>¿No sabes cual/es albumes destacar?
                    No te preocupes, si omites este paso más adelante
                    podrás agregar albumes a tus artistas.</span>
            </div>
        </div>
    </div>
    <!-- Redes sociales -->
    <div class=" col-span-8 align-content-center">
        <div class="bg-black bg-opacity-20 px-2 py-1 mt-5 text-center">
            <span class="top-5 mb-3 text-4xl font-bold">Redes sociales del artista</span>

        </div><br>

        <div class="flex justify-center py-2 gap-16">
            <span class="top-5 mb-3 text-2xl font-bold mt-2">Instagram</span>
            <input type="text" name="face" placeholder="Pega la URL del perfil del artista de instagram"
                class="bg-white h-14 px-5 pr-2 w-96 focus:outline-none rounded-full text-black">
        </div>

        <div class="flex justify-center py-2 gap-16">
            <span class="top-5 mb-3 text-2xl font-bold mt-2">Facebook</span>
            <input type="text" name="face" placeholder="Pega la URL del perfil del artista de facebook"
                class="bg-white h-14 px-5 pr-2 w-96 focus:outline-none rounded-full text-black">
        </div>

        <div class="flex justify-center py-2 gap-20">
            <span class="top-5 mb-3 text-2xl font-bold mt-2">Twitter</span>
            <input type="text" name="tw" placeholder="Pega la URL del perfil del artista de twiter"
                class="bg-white h-14 px-5 pr-2 w-96 focus:outline-none rounded-full text-black">
        </div>
    </div>


    <div class=" col-span-8 align-content-center">
        <div class="bg-black bg-opacity-20 px-2 py-1 mt-5 text-center">
            <span class="top-5 mb-3 text-4xl font-bold">Canales de musica</span>
        </div>

        <div class="flex justify-center py-2 gap-16 mt-5">
            <span class="top-5 mb-3 text-2xl font-bold mt-2">Spotify</span>
            <input type="text" name="face" placeholder="Pega la URL del perfil del artista de spotify"
                class="bg-white h-14 px-5 pr-2 w-96 focus:outline-none rounded-full text-black">
        </div>

        <div class="flex justify-center py-2 gap-16 mt-5">
            <span class="top-5 mb-3 text-2xl font-bold mt-2">Youtube</span>
            <input type="text" name="face" placeholder="Pega la URL del perfil del artista de youtube"
                class="bg-white h-14 px-5 pr-2 w-96 focus:outline-none rounded-full text-black">
        </div>

    </div>

    <div class="col-span-8 flex justify-center mt-10">
        <button wire:click='validarAgregarArtista' class="bg-white text-primary py-1 px-4">
            <span class="text-2xl">Agregar artista</span>
        </button>
    </div>
</div>

<script>
    window.addEventListener("prueba", (event) => {
        alert("prueba en consola!!!");
        console.log(event.detail.test);
    });

    window.addEventListener('solicitudAgregarArtista', () => {
        Swal.fire({
            title: 'Solicitar permiso para agregar artista',
            text: `Se enviara una solicitud a los administradores
            con la información que nos acaba de proporcionar.`,
            icon: 'success',
            showCancelButton: true,
            cancelButtonText: 'Regresar',
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Solicitar permiso',
        }).then((result) => {
            if(result.isConfirmed) {
                Livewire.emit('agregarArtista');

                Swal.fire({
                    title: 'Solicitud enviada',
                    text: `Se ha enviado la solicitud, en cuanto se haya aprobado
                    recibirá un mensaje al correo asociado a su cuenta.`,
                    icon: 'success',
                    timer: 6000,
                    showConfirmButton: true,
                    confirmButtonText: 'Ok'
                });
            }
        });
    });

    $("#agregarArtistaBtn").on("click", function() {
       
    });

    function formNuevoIntegrante() {
        return {
            abrir() { this.show = true},
            cerrar() { this.show = false},
            estaAbierto() { return this.show === true },
        }
    }

    function initializeSwiper() {
        let swiper = new Swiper(".swiperGenerosArtista", {
            slidesPerView: 5,
        });
    }
    window.addEventListener('generoSeleccionado', (event) => {
        initializeSwiper();
    });

    window.onload = function() {
        initializeSwiper();
    }

</script>
