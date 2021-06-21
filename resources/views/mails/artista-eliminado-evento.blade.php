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
            flex-direction: row;
        }

        .mail-body {
            padding: 0 0.3rem;
        }

        .grilla {
            display: grid;
            grid-auto-flow: row dense;
        }

        .bold {
            font-weight: 700;
        }

    </style>
</head>
<body>
  
    <div class="mail-card">
        <div class="mail-head">
            <h3>Estimado/a </h3>
            <h4>{{ $representante->nombre }} {{ $representante->apellidos }}</h4>
        </div>
        
        <div class="mail-body">
            <p>
                Lamentamos informarte que con fecha <span class="bold">{{ $fecha }} horas </span>
                el organizador del evento <span class="bold">{{ $evento }}</span> ha eliminado de 
                la lista de participantes a {{ $artista->ART_Nombre }} el cual es un artista que representas,
                por lo que debes informarle que ya no podra asistir. 
            </p>
        </div>

        <p>Recuerda: Si el organizador no se ha puesto en contacto contigo o crees que esto
            se trata de un error no dudes en contactar con <a href="{{ route('ayuda') }}">soporte</a></p>

    </div>

</body>
</html>