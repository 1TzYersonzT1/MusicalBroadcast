<div class="flex lg:flex-row flex-col lg:justify-between py-8 min-h-screen w-full">
    @section('banner')
        @include("banner-artista");
    @endsection

    <!-- Filtro -->
    <div class="lg:mb-0 mb-10 h-full bg-white col-span-2 lg:w-45 border-1 px-5 py-2">
        <form class="">
            <div class="mb-3">
                <span>Buscar</span><br>
                <livewire:formularios.filtro-artista />
            </div>

            <div class="flex lg:flex-col justify-between">
                <div x-data="{open: false}" class="mb-3">
                    <div class="flex justify-between">
                        <span>Genero</span>
                        <svg @click="open=!open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                    <div x-show="open">
                        <livewire:genero.generos />
                    </div>
                </div>

                <div x-data="{open: false}" class="mb-3">
                    <div class="flex justify-between">
                        <span>Tipo artista</span>
                        <svg @click="open=!open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                    <div x-show="open">
                        @foreach ($tipos as $index => $tipo)
                            <div>
                                <input type="checkbox" value="{{ $index + 1 }}"
                                    wire:model="tiposSeleccionados.{{ $index }}" class="mr-2" />
                                {{ $tipo }}
                            </div>
                        @endforeach
                    </div>
                </div>

                <div x-data="{open: false}" class="mb-3">
                    <div class="flex justify-between">
                        <span>Estilos</span>
                        <svg @click="open=!open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                    <div x-show="open">
                        <livewire:estilo.estilos />
                    </div>
                </div>


            </div>
        </form>
    </div>

    <!-- Artistas -->

    @if (count($artistas) > 0)
        <div class='flex col-start-4 col-span-8 flex-col items-center justify-between'>
            <div class="flex flex-col items-center justify-between">
                <div class="swiper-slide">
                    <div class="grid lg:grid-cols-4 md:grid-cols-2 gap-10 mb-10">
                        @foreach ($artistas as $artista)
                            <livewire:artista.artista :artista="$artista" :wire:key="$artista->id" />
                        @endforeach
                        <div class="swiper-pagination text-white"></div>
                    </div>
                </div>
                <div class="justify-self-end">{{ $artistas->links() }}</div>
            </div>
        </div>
    @else
        <span class="text-white">No existen coincidencias</span>
    @endif
</div>
