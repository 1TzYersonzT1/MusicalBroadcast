<div>
    <div class="grid lg:grid-cols-5 gap-5 text-white py-4 flex-col">
        <div class="col-span-8 ">

            <div class=" col-span-8 align-content-center">
                <div class="bg-black bg-opacity-20 px-2 py-1 text-center">
                    <span class="top-5 mb-2 text-4xl font-bold">Agrega el nombre del artista</span>

                </div>
                <div class="flex justify-center py-2">
                    <input type="text" name="nombreART" placeholder="Escribe el nombre del artista"
                        class="bg-white h-14 px-5 pr-2 w-96 focus:outline-none rounded-full text-black">
                </div>


            </div>



            <div class="bg-black bg-opacity-20 px-2 py-1 text-center">
                <span class="top-5 mb-3 text-4xl font-bold">Escoge un genero</span>

            </div><br>

            <div class="swiper-container swiperGeneros">
                <div class="swiper-wrapper ">
                    @foreach ($generos as $genero)

                        <div class="swiper-slide">
                            <div class="lg:col-span-2 gap-5 lg:flex justify-center">
                                <label class="w-32">
                                    <input class="h-32 w-36 bg-center bg-no-repeat bg-cover border-0" type="radio "
                                        style="background-image: url('https://tailwindcss.com/img/card-left.jpg');"
                                        name="cap1" />

                                </label>
                            </div>

                        </div>

                    @endforeach
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div><br><br>
                <div class="swiper-pagination"></div>
            </div>



            <div class="lg:col-span-2  gap-5 lg:flex  justify-center py-2">
                <span class="text-2xl font-bold text-center">Estilos</span>
            </div>

            <div class="swiper-container swiperGeneros">
                <div class="swiper-wrapper ">
                    @foreach ($estilos as $estilo)

                        <div class="swiper-slide">
                            <div class="lg:col-span-2 gap-5 lg:flex justify-center">
                                <label class="w-32 ">
                                    <input class="h-32 w-36 bg-center bg-no-repeat bg-cover border-10" type="checkbox"
                                        style="background-image: url('https://tailwindcss.com/img/card-left.jpg');"
                                        name="cap1" />

                                </label>
                            </div>

                        </div>

                    @endforeach
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div><br><br>
                <div class="swiper-pagination"></div>
            </div>


            <div class="col-span-8 justify-center">
                <div class="bg-black bg-opacity-20 px-2 py-1 text-center">
                    <span class="top-5 mb-3 text-4xl font-bold">Cuentanos ¿que tipo de artista eres?</span>

                </div><br>
                <div class="flex justify-center gap-5 ">
                    <div>
                        <label class="w-32 ">
                            <input class=" h-40 w-40 bg-center bg-no-repeat bg-cover border-10" type="radio"
                                style="background-image: url('https://tailwindcss.com/img/card-left.jpg');"
                                name="cap1" />
                            <div class="text-2xl font-bold text-center">
                                <span>Solista</span>
                            </div>
                        </label>
                    </div>
                    <div>
                        <label class="w-32 ">
                            <input class=" h-40 w-40 bg-center bg-no-repeat bg-cover border-10" type="radio"
                                style="background-image: url('https://tailwindcss.com/img/card-left.jpg');"
                                name="cap1" />
                            <div class="text-2xl font-bold text-center">
                                <span>Banda</span>
                            </div>
                        </label>
                    </div>
                </div>

            </div>

            <div class=" col-span-8 align-content-center">
                <div class="bg-black bg-opacity-20 px-2 py-1 text-center">
                    <span class="top-5 mb-3 text-4xl font-bold">¿Tienes más integrantes? Agragalos aqui</span>

                </div>
                <div class="flex justify-center">
                    <div class=" h-40 lg:w-40  bg-cover rounded-full lg:rounded-t-full lg:rounded-1 "
                        style="background-image: url('https://tailwindcss.com/img/card-left.jpg')">
                    </div>
                </div>


            </div>


            <div class=" col-span-8 align-content-center">
                <div class="bg-black bg-opacity-20 px-2 py-1 text-center">
                    <span class="top-5 mb-3 text-4xl font-bold">Sube la imagen del artista</span>

                </div>
                <div class="flex justify-center">
                    <div class=" h-40 lg:w-40  bg-cover rounded-full lg:rounded-t-full lg:rounded-1 "
                        style="background-image: url('https://tailwindcss.com/img/card-left.jpg')">
                    </div>
                </div>


            </div>

            

            <div class=" col-span-8 align-content-center">
                <div class="bg-black bg-opacity-20 px-2 py-1 text-center">
                    <span class="top-5 mb-3 text-4xl font-bold">Agrega tus albums aqui</span>

                </div>
                <div class="flex justify-center">
                    <div class=" h-40 lg:w-40  bg-cover rounded-full lg:rounded-t-full lg:rounded-1 "
                        style="background-image: url('https://tailwindcss.com/img/card-left.jpg')">
                    </div>
                </div>


            </div>

            <div class=" col-span-8 align-content-center">
                <div class="bg-black bg-opacity-20 px-2 py-1 mt-5 text-center">
                    <span class="top-5 mb-3 text-4xl font-bold">Redes sociales del artista</span>

                </div><br>

                    <div class="flex justify-center py-2">
                        <span class="top-5 mb-3 text-2xl font-bold mt-2">Instagram</span>
                        <input type="text" name="face" placeholder="Pega la URL del perfil del artista de instagram"
                            class="bg-white h-14 px-5 pr-2 w-96 focus:outline-none rounded-full text-black">
                    </div>

                    <div class="flex justify-center py-2">
                        <span class="top-5 mb-3 text-2xl font-bold mt-2">Facebook</span>
                        <input type="text" name="face" placeholder="Pega la URL del perfil del artista de facebook"
                            class="bg-white h-14 px-5 pr-2 w-96 focus:outline-none rounded-full text-black">
                    </div>

                    <div class="flex justify-center py-2">
                        <span class="top-5 mb-3 text-2xl font-bold mt-2">Twitter</span>
                        <input type="text" name="tw" placeholder="Pega la URL del perfil del artista de twiter"
                            class="bg-white h-14 px-5 pr-2 w-96 focus:outline-none rounded-full text-black">
                    </div>


            </div>



        </div>

    </div>
    <script>
        var swiper = new Swiper(".swiperGeneros", {
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
