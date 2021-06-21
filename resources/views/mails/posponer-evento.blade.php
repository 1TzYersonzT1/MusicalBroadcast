<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ mix('css/extra.css') }}" />
</head>
<body>
  
    <div class="mail-card">
        <div class="mail-head">
            <h3>Estimado/a </h3>
            <h4>{{ $representante->nombre }} {{ $representante->apellidos }}</h4>
        </div>
        
        <div class="mail-body">
            <p>
                Lamentamos informarte que el organizador del evento <strong>{{ $evento->EVE_Nombre }}</strong> al cuál 
                has inscrito a tu artista <strong>{{ $artista }}</strong> ha decidido posponerlo. A continuación te dejamos más
                detalles.
            </p>

            <div class="grilla"> 
                <div class="grid-item"> 
                    Evento
                </div>
               
                <div class="grid-item"> 
                    {{ $evento->EVE_Nombre }}
                </div>

                <div class="grid-item"> 
                    Nueva fecha
                </div>
                
                <div class="grid-item"> 
                    {{ $evento->EVE_Fecha }}  {{ $evento->EVE_Hora }}
                </div>
            </div>
        </div>

    </div>

</body>
</html>