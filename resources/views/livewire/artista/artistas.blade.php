<div>
    
   @foreach ($artistas as $artista)
        {{$artista->ART_Nombre}}
        {{$artista->id }}
    @endforeach

    <livewire:genero.generos>

    <livewire:estilo.estilos>
</div>
