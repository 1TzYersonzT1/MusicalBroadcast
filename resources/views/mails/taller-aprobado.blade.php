<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>

        body {
            display: flex;
            justify-content: center;
        }

        .mail-card {
            background-color: #F5F5F9;
            width: 40rem;
            height: 20rem;
        }

        .mail-head {
            background-color: #003459;
            color: #fff;
            text-align: center;
            padding: 0 0.3rem;
            display: flex;
            flex-direction: column;
        }

        .mail-body {
            padding: 0 0.3rem;
        }

        .grilla {
            display: grid;
            grid-auto-flow: row dense;
        }

    </style>
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
                para organizar el taller <strong>{{ $taller->TAL_Nombre }}</strong>
                ha sido <strong>aprobada.</strong>
                    
                <a href="{{ route('organizador.taller/asistentes') }}"></a>
            </p>
        </div>
    </div>
</body>
</html>