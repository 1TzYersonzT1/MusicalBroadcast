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
            <h4>{{ $asistente->nombre }} {{ $asistente->apellidos }}</h4>
        </div>
        
        <div class="mail-body">
            <p>
                Lamentamos informarte que con fecha <span class="bold">{{ $fecha }} horas </span>
                el organizador del taller <span class="bold">{{ $taller }}</span> te ha eliminado,
                por lo que ya no podrás asistir. 
            </p>
        </div>

        <p>Recuerda: Si el organizador no se ha puesto en contacto contigo o crees que esto
            se trata de un error no dudes en contactar con <a href="{{ route('ayuda') }}">soporte</a></p>

    </div>

</body>
</html>