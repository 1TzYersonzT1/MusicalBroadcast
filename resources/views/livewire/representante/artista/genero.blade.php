<div class="swiper-slide flex flex-col items-center">
    <div class="flex items-center genero">
        <input type="radio" name="genero" wire:click="generoSeleccionado" 
        class="opacity-0 absolute w-32 h-32 rounded-full" />
        <div
            class="bg-trasparent w-32 h-32 flex rounded-full flex-shrink-0 justify-center items-center mr-2 focus-within:border-red-500">
            <img src="https://tailwindcss.com/img/card-left.jpg" class="rounded-full w-28 h-28" />
        </div>
    </div>
    <span>{{ $genero->GEN_Nombre }}</span>
</div>
