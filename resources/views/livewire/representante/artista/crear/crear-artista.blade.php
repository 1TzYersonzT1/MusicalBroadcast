<div class="grid lg:grid-cols-5 gap-5 text-white py-4 flex-col">
    <div class="col-span-8 ">
        <div class=" col-span-8 align-content-center ">
            <div class="bg-black bg-opacity-20 px-2 py-1 text-center">
                <span class="top-5 mb-2 text-4xl font-bold">Agrega el nombre del artista</span>
            </div>
            <div class="flex justify-center py-1 mt-5">
                <input type="text" wire:model="nombre" placeholder="Escribe el nombre del artista"
                    class="bg-white h-14 px-5 w-96 focus:outline-none rounded-full text-black">
            </div>
        </div>

        <div>
            <div class="bg-black bg-opacity-20 px-2 py-1 text-center mt-5">
                <span class="mb-3 text-4xl font-bold">Escoge un genero</span>
            </div>

            <div class="swiper-container swiperGenerosArtista mt-5">
                <div class="swiper-wrapper">
                    @foreach ($generos as $index => $genero)
                        <livewire:representante.artista.genero :genero="$genero" :wire:key="$genero->id" />
                    @endforeach
                </div>
            </div>


        </div>

        <div>
            <div class="lg:col-span-2  gap-5 lg:flex  justify-center py-2">
                <span class="text-2xl font-bold text-center my-10">Estilos</span>
            </div>

            <div class="swiper-container swiperEstilosArtista">
                <div class="swiper-wrapper">
                    @foreach ($estilos as $estilo)
                        <div class="swiper-slide flex flex-col items-center">
                            <div class="flex items-center mb-2 genero">
                                <input type="checkbox" name="estilo"
                                    class="opacity-0 absolute w-32 h-32 rounded-full" />
                                <div
                                    class="bg-trasparent w-32 h-32 flex rounded-full flex-shrink-0 justify-center items-center mr-2 focus-within:border-red-500">
                                    <img src="https://tailwindcss.com/img/card-left.jpg"
                                        class="rounded-full w-28 h-28" />
                                </div>
                            </div>
                            <span>{{ $estilo->EST_Nombre }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>


    <div class="col-span-8 justify-center mt-5">
        <div class="bg-black bg-opacity-20 px-2 py-1 text-center">
            <span class="top-5 mb-3 text-4xl font-bold">Cuentanos ¿que tipo de artista eres?</span>

        </div><br>
        <div class="flex justify-center gap-5 ">
            <div>
                <label class="w-32 ">
                    <input class=" h-40 w-40 bg-center bg-no-repeat bg-cover border-10" type="radio"
                        style="background-image: url('https://tailwindcss.com/img/card-left.jpg');" name="cap1" />
                    <div class="text-2xl font-bold text-center">
                        <span>Solista</span>
                    </div>
                </label>
            </div>
            <div>
                <label class="w-32 ">
                    <input class=" h-40 w-40 bg-center bg-no-repeat bg-cover border-10" type="radio"
                        style="background-image: url('https://tailwindcss.com/img/card-left.jpg');" name="cap1" />
                    <div class="text-2xl font-bold text-center">
                        <span>Banda</span>
                    </div>
                </label>
            </div>
        </div>

    </div>

    <div class=" col-span-8 align-content-center mt-5">
        <div class="bg-black bg-opacity-20 px-2 py-1 text-center">
            <span class="top-5 mb-3 text-4xl font-bold">¿Tienes más integrantes? Agragalos aqui</span>

        </div>
        <div class="flex justify-center">
            <div class=" h-40 lg:w-40  bg-cover rounded-full lg:rounded-t-full lg:rounded-1 "
                style="background-image: url('https://tailwindcss.com/img/card-left.jpg')">
            </div>



        </div>


    </div>


    <div class=" col-span-8 align-content-center mt-5">
        <div class="bg-black bg-opacity-20 px-2 py-1 text-center">
            <span class="top-5 mb-3 text-4xl font-bold">Sube la imagen del artista</span>

        </div>
        <div class="flex justify-center gap-5">

            <div class="mt-5 h-40 lg:w-40 bg-cover rounded-full lg:rounded-t-full lg:rounded-1 "
                style="background-image: url('https://tailwindcss.com/img/card-left.jpg')">
            </div>

            <div class="w-80 mt-20"><input type="file" wire:model="imagen" />
                <div wire:loading wire:target="imagen"
                    class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
                    <p class="font-bold">Cargando imagen</p>
                </div>
            </div>

        </div>
    </div>

    <div class=" col-span-8 align-content-center mt-5">
        <div class="bg-black bg-opacity-20 px-2 py-1 text-center">
            <span class="top-5 mb-3 text-4xl font-bold">Agrega tus albums aqui</span>

        </div>
        <div class="flex justify-center mt-5">
            <div class=" h-40 lg:w-40  bg-cover rounded-full lg:rounded-t-full lg:rounded-1 "
                style="background-image: url('https://tailwindcss.com/img/card-left.jpg')">
            </div>


        </div>


    </div>

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
</div>

<script>
    function initializeSwiper() {
        var swiper = new Swiper(".swiperGenerosArtista", {
            slidesPerView: 5,
        });

        var swiper2 = new Swiper(".swiperEstilosArtista", {
            slidesPerView: 5,
        });
    }

    window.addEventListener('onContentChanged', (event) => {
        initializeSwiper();
    });

    window.onload = function() {
        initializeSwiper();
    }

</script>
