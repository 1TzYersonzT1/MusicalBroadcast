@section('banner')
    <div class="bg-cover bg-no-repeat" style="background-image: url('https://mexico-grlk5lagedl.stackpathdns.com/production/mexico/images/1547572747299933-Carlos-Maycotte.jpg?w=1920&h=800&fit=crop&crop=focalpoint&auto=%5B%22format%22%2C%20%22compress%22%5D&cs=srgb')">
        <div class="flex lg:flex-row justify-around flex-col py-6 h-full ">
            <div class="text-white px-10 py-10 text-center">
                <div class=" h-60 lg:w-60 flex-none bg-cover rounded-full lg:rounded-t-full lg:rounded-1 text-center overflow-hidden"
                    style="background-image: url('https://tailwindcss.com/img/card-left.jpg')" title="Woman holding a mug">
                </div>
                <div class="mb-4 text-4xl font-bold ">

                    {{ $artistaActual->ART_Nombre }}

                </div>
                <div class="py-2">
                    @if ($artistaActual->tipo_artista == 1)
                        Solista
                    @endif
                    @if ($artistaActual->tipo_artista == 0)
                        Banda
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
@endsection
    
<div>
    <div class="grid lg:grid-cols-8 gap-5 text-white py-4 flex-col">
    
        <div class=" col-span-6">
                    <div class="bg-black bg-opacity-20 px-2 py-1 ">
                        <span class="top-5 mb-3 text-4xl font-bold">Discografia</span>
                        
                    </div><br>
                    <div class="swiper-container swiperDiscografia">
                        <div class="swiper-wrapper ">

                            <div class="swiper-slide w-80">
                                <div class=" h-40 lg:w-40 w-80 flex-none bg-cover rounded-full lg:rounded-t-full lg:rounded-1 text-center overflow-hidden"
                                    style="background-image: url('https://tailwindcss.com/img/card-left.jpg')"
                                    title="Woman holding a mug">
                                </div>  
                            </div>
                            <div class="swiper-slide w-80">
                                <div class=" h-40 lg:w-40 w-80 flex-none bg-cover rounded-full lg:rounded-t-full lg:rounded-1 text-center overflow-hidden"
                                    style="background-image: url('https://tailwindcss.com/img/card-left.jpg')"
                                    title="Woman holding a mug">
                                </div>  
                            </div>
                            <div class="swiper-slide w-80">
                                <div class=" h-40 lg:w-40 w-80 flex-none bg-cover rounded-full lg:rounded-t-full lg:rounded-1 text-center overflow-hidden"
                                    style="background-image: url('https://tailwindcss.com/img/card-left.jpg')"
                                    title="Woman holding a mug">
                                </div>  
                            </div>
                              
                                  
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
            
        </div>

        <div class="lg:col-span-2 "> 
            <div class="bg-black bg-opacity-20 px-2 py-1">
                <div class="text-4xl font-bold ">
                    <span class="text-white">Musica</span>
                </div>
            </div> 
            <div ><br>
                <div class="grid grid-cols-8 gap-5 text-white py-4">
                    <iframe src="https://open.spotify.com/follow/1/?uri=spotify:artist:4zig82wPnO2yb43Lx4x8s6?si=RaGP9uHPTDu-UBlrrVzSNQ&dl_branch=1&size=detail&theme=dark&show-count=0" width="300" height="56" scrolling="no" frameborder="0" style="border:none; overflow:hidden;" allowtransparency="true"></iframe>
                </div><br>
                <div class="g-ytsubscribe" data-channelid="UCpLP_h0sHPynXomznPGto2g" data-layout="full" data-theme="dark" data-count="hidden">                
                </div>  
            </div>
                    
        </div>
    </div>

    <div class="grid lg:grid-cols-8 gap-5 text-white py-4">
        <div class=" lg:col-span-6">
            <div class="bg-black bg-opacity-20 px-2 py-1 ">
                <span class="top-5 mb-3 text-4xl font-bold">Biografia</span>
                
            </div><br>
            <div >
                {{ $artistaActual->biografia }}
            </div>
            
        </div>
        <div class="lg:col-span-2"> 
            <div class="bg-black bg-opacity-20 px-2 py-1">
                <div class="text-4xl font-bold">
                    <span class="text-white">Proximo Evento</span>
                </div>
            </div> 
            <div ><br>
                {{ $artistaActual->biografia }}
            </div>
                    
        </div>
    </div>


    <div class="py-2" style="float:left">
        <a href="https://es-la.facebook.com/">
        <div style="float:left">
            <img src="/face.png" width="40" height="40" > 
        </div>         
        </a>
        <a href="https://www.instagram.com/?hl=es-la">
        <div style="float:left">
            <img src="/insta.png" width="40" height="40">
        </div>                 
        </a>
        <a href="https://twitter.com/?lang=es">
        <div style="float:left">
            <img src="/twiter.png" width="40" height="40">
        </div>
        </a>
    </div>  
    
</div>

<script src="https://apis.google.com/js/platform.js"></script>

<script>
      var swiper = new Swiper(".swiperDiscografia", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        coverflowEffect: {
          rotate: 50,
          stretch: 0,
          depth: 100,
          modifier: 1,
          slideShadows: true,
        },
        pagination: {
          el: ".swiper-pagination",
        },
      });
    </script>