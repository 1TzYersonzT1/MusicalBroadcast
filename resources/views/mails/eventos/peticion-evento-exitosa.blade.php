<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
  
    <div class="mail-card">
        <div class="mail-head">
            <h3>Estimado/a </h3>
            <h4>{{ $artista->representante->nombre }} {{ $artista->representante->apellidos }}</h4>
        </div>
        
        <div class="mail-body">
            <p>
                Tu inscripcion al evento <strong>{{ $evento->EVE_Nombre }}</strong> con el artista
                <strong>{{ $artista->ART_Nombre }}</strong> se ha realizado con exito.
            </p>
         
        </div>
    </div>

</body>
</html>