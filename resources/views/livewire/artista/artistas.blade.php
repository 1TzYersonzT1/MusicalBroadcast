<div class="text-white">

    @foreach ($artistas as $artista)
        {{ $artista->ART_Nombre }}
    @endforeach

    <div class="flex- flex-col">
        <span class="text-xl">Género</span>
        <livewire:genero.generos>

            <span class="text-xl">Estilo</span>
            <livewire:estilo.estilos>
    </div>
</div>
