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
            <h4>{{ $organizador->nombre }} {{ $organizador->apellidos }}</h4>
        </div>
        
        <div class="mail-body">
            <p>
                Nos da gusto informarte que la solicitud pendiente
                para organizar el evento <strong>{{ $evento->EVE_Nombre }}</strong>
                ha sido <strong>aprobada.</strong>
                    
                <a href="{{ route('organizador.evento/asistentes') }}"></a>
            </p>
        </div>
    </div>
</body>
</html>