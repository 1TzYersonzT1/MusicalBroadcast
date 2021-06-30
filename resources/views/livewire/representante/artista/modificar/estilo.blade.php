<div class="flex flex-col items-center">
    <div class="mb-2 genero">
        <input type="checkbox" value={{ $info['id'] }} :wire:key="$info['id']"
            wire:model="estilosSeleccionados.{{ $info['id'] }}" class="opacity-0 absolute w-32 h-32 rounded-full" />
        <div
            class="bg-trasparent w-32 h-32 flex rounded-full flex-shrink-0 justify-center items-center mr-2 focus-within:border-red-500">
            <img src="https://tailwindcss.com/img/card-left.jpg" class="rounded-full w-28 h-28" />
        </div>
    </div>
    <span>{{ $info['EST_Nombre'] }}</span>

</div>
