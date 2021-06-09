<div>

    @foreach ($generos as $genero)
        <div class="flex items-center">
            <input type="checkbox" value="ck1" class="mr-2" />{{ $genero->GEN_Nombre }}
        </div>
    @endforeach

</div>
