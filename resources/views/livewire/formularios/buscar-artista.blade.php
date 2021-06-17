<div class="relative" x-data="{ open: false }" @click.away="open = false" @close.stop="open = false">
    <div class="inline-flex rounded-md">
        <div>
            <input type="search" @click="open = !open" placeholder="Escribe lo que estas buscando"
                wire:model="buscar" class="bg-white h-10 px-5 pr-10 w-80 text-sm focus:outline-none">
        </div>

    </div>
    
    <div x-show="open" class="absolute z-50 mt-2 bg-white">
        
        <ul class="w-80">
            @foreach ($resultados as $resultado)
                <li class="my-3 px-6 py-2 hover:bg-gray-700 h-full hover:text-gray-200 cursor-pointer">
                    <a href="{{ route('artista.show', $resultado->id) }}">{{ $resultado->ART_Nombre }}</a>
                </li>
            @endforeach
        </ul>
    </div>

</div>


