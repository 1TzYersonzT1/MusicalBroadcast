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
                Lamentamos informarte que el organizador de {{ $taller->TAL_Nombre }} al cuál 
                te has inscrito ha decidido cancelarlo. Lamentamos si esto te generó algún 
                inconveniente, pero recuerda que siempre puedes inscribirte a más talleres en
                nuestra página dedicada a <a href={{ route('talleres.index') }} class="font-bold">talleres</a>
            </p>
        </div>
    </div>
</body>
</html>