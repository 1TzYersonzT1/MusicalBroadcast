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
                Lamentamos informarte que el organizador de un taller al cuál 
                te has inscrito ha decidido posponerlo. A continuación te dejamos más
                detalles.
            </p>

            <div class="grilla"> 
                <div class="grid-item"> 
                    Taller
                </div>
               
                <div class="grid-item"> 
                    {{ $taller->TAL_Nombre }}
                </div>

                <div class="grid-item"> 
                    Fecha
                </div>
                
                <div class="grid-item"> 
                    {{ $taller->TAL_Fecha }}  {{ $taller->TAL_Hora }}
                </div>
            </div>
        </div>

    </div>

</body>
</html>