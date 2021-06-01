<div>
    
   @foreach ($artistas as $artista)
    {{$artista->ART_Nombre}}
    @endforeach

    <livewire:genero.generos>

    <livewire:estilo.estilos>
</div>
