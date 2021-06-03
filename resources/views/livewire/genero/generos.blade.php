<div>

     @foreach ($generos as $genero)
       <input type="checkbox" name="generos[]">{{ $genero->GEN_Nombre }}
    @endforeach

</div>
