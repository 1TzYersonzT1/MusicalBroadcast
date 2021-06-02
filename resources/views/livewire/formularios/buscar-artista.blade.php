<div>
    <div>
        <div class="relative lg:block sm:hidden text-gray-600 mr-5">
            <div>
                <input type="search" @click="open = !open" name="search" placeholder="Escribe lo que estas buscando" wire:model="buscar"
                    class="bg-white h-10 px-5 pr-10 w-80 text-sm focus:outline-none">
            </div>

        </div>
        <ul class="bg-white absolute mt-2 shadow rounded w-80 text-indigo-600" x-show="open" @click.away='open = false'
          >
            @if ($resultados)
                @foreach ($resultados as $resultado)
                    <li class="hover:bg-gray-400 px-5 py-1">{{ $resultado->ART_Nombre }}</li>
                @endforeach
            @endif
        </ul>

    </div>
</div>
