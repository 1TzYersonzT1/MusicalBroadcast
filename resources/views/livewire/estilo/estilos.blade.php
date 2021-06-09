<div>
    @foreach ($estilos as $estilo)
        <div class="flex place-items-center">
            <input type="checkbox" value="" class="mr-2" />{{ $estilo->EST_Nombre }}
        </div>
    @endforeach
</div>
