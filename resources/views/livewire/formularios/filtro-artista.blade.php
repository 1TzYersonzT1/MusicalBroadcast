<div>
    <div>
        <div class="relative lg:block sm:hidden text-gray-600 mr-5">
            <div>
                <input type="search" @click="open = !open" name="search" placeholder="Buscar artista" wire:model="buscar"
                    class="bg-white h-6 px-2 pr-15 w-40 text-sm focus:outline-none">
            </div>

        </div>
        <ul class="bg-white absolute mt-2 shadow rounded w-40 text-indigo-600" x-show="open" @click.away='open = false'
          >
            @if ($resultados)
                @foreach ($resultados as $resultado)
                    <li class="hover:bg-gray-400 px-5 py-1">{{ $resultado->ART_Nombre }}</li>
                @endforeach
            @endif
        </ul>

    </div>
</div>
