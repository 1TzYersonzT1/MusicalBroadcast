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
            <h4>{{ $representante->nombre }} {{ $representante->apellidos }}</h4>
        </div>
        
        <div class="mail-body">
            <p>
                Queremos informarte que la solicitud pendiente para 
                agregar a <strong>{{ $artista->ART_Nombre }}</strong> como artista
                ha sido <strong>aprobada.</strong>
            </p>
            <a href="{{ route('artista.show', $artista->id) }}">Ver perfil</a>
        </div>
    </div>

</body>
</html>