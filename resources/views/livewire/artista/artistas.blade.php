<div>
<div class="swiper-slide">
<div class="grid grid-cols-4 gap-10 mb-10">
@foreach($artistas as $artista)

    
    <div class="col">


    <div class="max-w-md w-full lg:flex">
        <div class=" h-40 lg:w-40 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-1 text-center overflow-hidden"
            style="background-image: url('https://tailwindcss.com/img/card-left.jpg')" title="Woman holding a mug">
        </div>
        <div
            class=" object-contentborder-l border-grey-light  bg-gradient-to-tr from-black via-primary to-blue-900 rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
            

            <div>
                <button
                    class=" font-bold px-2 py-2 w-35 text-center text-white hover:bg-white hover:text-primary cursor-pointer"
                    wire:click="mostrarTaller">{{ $artista->ART_Nombre }}</button>
            </div>
        </div>
    </div>
    <div class="swiper-pagination text-white"></div>
    </div>
  
    @endforeach
    </div>

    <livewire:genero.generos>
    
    
        
    
            
        

</div>
