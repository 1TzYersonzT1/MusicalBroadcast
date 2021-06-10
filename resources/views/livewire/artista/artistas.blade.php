<div>
    <div class="flex lg:flex-row justify-between flex-col py-8 min-h-screen">

        <!-- Filtro -->
        <div class="lg:mb-0 mb-10 h-full bg-white col-span-2 lg:w-45 border-1 px-5 py-2">
            <form class="">
                <div class="mb-3">
                    <span>Buscar</span><br>
                    <livewire:formularios.filtro-artista />
                </div>

                <div class="flex lg:flex-col justify-between">
                    <div class="mb-3">
                        <span>Genero</span>
                        <livewire:genero.generos />
                    </div>

                    <div class="mb-3">
                        <div>
                            <span>Artista</span>
                        </div>
                        <div>
                            <div class="flex items-center"><input type="checkbox" value="0" class="mr-2" />Solistas
                            </div>
                            <div class="flex items-center"><input type="checkbox" value="1" class="mr-2" />Bandas</div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div>
                            <span>Estilo</span>
                        </div>
                        <div>
                            <livewire:estilo.estilos />
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- Artistas -->

        @if(count($artistas) > 0)
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
            <span>No existen coincidencias</span>
        @endif
    </div>
</div>

<script>
    window.addEventListener('verArtista', function() {
       location.href = '/artista';
    });
</script>
