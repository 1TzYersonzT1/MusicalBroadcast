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
    <div class="flex lg:flex-row justify-around flex-col py-6 h-full">

        <div class="px-5 py-2 ">
            <div class="text-white px-5 flex flex-col items-center">
                <div class="bg-black px-2 py-1 relative">
                    <div class="top-5 mb-3 text-4xl font-bold">
                        Discografía
                        
                    </div>
                </div>
                <div class="lg:w-96 w-20">
                     <div class=" h-40 lg:w-40 flex-none bg-cover rounded-full lg:rounded-t-full lg:rounded-1 text-center overflow-hidden"
                    style="background-image: url('https://tailwindcss.com/img/card-left.jpg')" title="Woman holding a mug">
                    </div>
                    {{ $artistaActual->biografia }}
                </div>
            </div>
        </div>

        <div class="py-2 ">
            <div class="text-white px-flex ">
                <div class="bg-black px-4 py-1">
                    <div class="mb-3 text-4xl font-bold">
                        Musica
                    </div>
                </div>
                <div ><br>
                    <div>
                        <iframe src="https://open.spotify.com/follow/1/?uri=spotify:artist:4zig82wPnO2yb43Lx4x8s6?si=RaGP9uHPTDu-UBlrrVzSNQ&dl_branch=1&size=detail&theme=dark&show-count=0" width="300" height="56" scrolling="no" frameborder="0" style="border:none; overflow:hidden;" allowtransparency="true"></iframe>
                    </div>
                    <br>
                    <div class="g-ytsubscribe" data-channelid="UCpLP_h0sHPynXomznPGto2g" data-layout="full" data-theme="dark" data-count="hidden">
                    
                    </div>  
                </div>
            </div>
        </div>
    </div>


    <div class="flex lg:flex-row justify-around flex-col py-8 h-full">
            <div class="px-5 py-2 ">
                <div class="text-white px-5">
                    <div class="bg-black px-2 py-1">
                        <div class="top-5 mb-3 text-4xl font-bold ">
                            Biografia
                        </div>
                    </div>

                    <div>
                        {{ $artistaActual->biografia }}
                    </div>
                </div>
            </div>
        
            <div class=" py-2 ">
                <div class="text-white px-flex">
                    <div class="bg-black px-5 py-1">
                        <div class="top-5 mb-3 text-4xl font-bold ">
                             Proximo<br>
                             Evento

                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>

<script src="https://apis.google.com/js/platform.js"></script>