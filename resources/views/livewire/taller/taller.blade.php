<div class="swiper-slide">
    <div class="lg:flex">
        <div class="flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden"
            title="Woman holding a mug"><img src="{{ 'https://musicalimages.blob.core.windows.net/images/' . $taller->imagen }}" class="h-48 lg:w-48 w-80" />
        </div>
        <div
            class="object-content border-l border-grey-light 
            w-96 bg-gradient-to-tr from-black via-primary to-blue-900 rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
            <div class="mb-8">

                <div class="text-black font-bold text-xl mb-2 text-white">
                    {{ $taller->TAL_Nombre }}</div>

            </div>

            <div>
                <button
                    class="font-bold px-2 py-2 w-40 text-center text-white hover:bg-white hover:text-primary cursor-pointer"
                    wire:click="mostrarTaller">Más
                    información</button>
            </div>
        </div>
    </div>
    <div class="swiper-pagination text-white"></div>
</div>
