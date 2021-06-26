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
                Lamentamos informarte que la solicitud pendiente para  
                agregar a <strong>{{ $artista }}</strong> como artista
                ha sido <strong>rechazada</strong>
            </p>

            <p>Recuerda: Si crees que esto
                se trata de un error no dudes en contactar con <a href="{{ route('ayuda') }}">soporte</a></p>
       
        </div>
    </div>

</body>
</html>