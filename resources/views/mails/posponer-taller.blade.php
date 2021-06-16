<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
  
    <div class="bg-gray-100">
        <div class="flex justify-center bg-primary text-white">
            <span class="font-bold">{{ $asistente->nombre }} {{ $asistente->apellidos }}</span>
        </div>
        
        <div class="flex justify-center">
            <p>
                Lamentamos informarte que el organizador del taller 
                {{ $taller->TAL_Nombre }} al cuál te has inscrito
                recientemente ha decidido posponerlo.
            </p>
        </div>

    </div>

</body>
</html>