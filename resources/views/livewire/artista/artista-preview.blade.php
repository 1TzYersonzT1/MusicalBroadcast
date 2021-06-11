<div>

    <div>
        <div class="text-white px-10 text-center">
            <div class="mb-4 text-4xl font-bold">

                {{ $artistaActual->ART_Nombre }}

            </div>
        </div>
    </div>


    <div class="flex lg:flex-row justify-between flex-col py-8 min-h-screen">



        <div class="px-5 py-2 ">
            <div class="text-white ">
                <div class="bg-black px-5 py-1">
                    <div class="top-5 mb-4 text-4xl font-bold ">
                        Discografía
                    </div>
                </div>
                <div>
            
                </div>
            </div>
        </div>




        <div class="lg:mb-0 mb-10 h-20 lg:w-50 border-1  py-2">
            <div class="text-white px-10 ">
                <div class="bg-black px-5 py-1">
                    <div class="mb-4 text-4xl font-bold ">
                        Musica
                    </div>
                </div>
                <a href="https://www.spotify.com/bo/">
                <div>Spotify
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 20 20" fill="currentColor" >
                        <path 
                            d="M18 3a1 1 0 00-1.196-.98l-10 2A1 1 0 006 5v9.114A4.369 4.369 0 005 14c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V7.82l8-1.6v5.894A4.37 4.37 0 0015 12c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V3z" />
                    
                    </svg>
                    </a>
                    <a href="https://www.youtube.com/">Youtube
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" viewBox="0 0 20 20" fill="currentColor">
                    
                        <path
                            d="M18 3a1 1 0 00-1.196-.98l-10 2A1 1 0 006 5v9.114A4.369 4.369 0 005 14c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V7.82l8-1.6v5.894A4.37 4.37 0 0015 12c-1.657 0-3 .895-3 2s1.343 2 3 2 3-.895 3-2V3z" />
                    </svg>
                    </a>
                </div>
            </div>
        </div>



    </div>





    <div class="flex lg:flex-row justify-between flex-col py-8 min-h-0">

        <div>
            <div class="lg:mb-0 mb-10 h-full lg:w-50 border-1 px-5 py-2">
                <div class="text-white px-10">
                    <div class="bg-black px-5 py-1">
                        <div class="mb-4 text-4xl font-bold">
                            Biografia
                        </div>
                    </div>
                    <div>
                        {{ $artistaActual->biografia }}
                    </div>
                </div>
            </div>
        </div>


        <div>
            @if ($artistaActual->tipo_artista == 1)
                <div class="text-white px-10">
                    <div class="bg-black px-5 py-1">
                        <div class="mb-4 text-4xl font-bold">
                            Solista

                        </div>
                    </div>
                </div>
            @endif
            @if ($artistaActual->tipo_artista == 0)
                <div class="text-white px-10">
                    <div class="bg-black px-5 py-1">
                        <div class="mb-4 text-4xl font-bold">
                         Banda

                        </div>
                    </div>
                </div>
            @endif
        </div>

    </div>

</div>
