<div>
    <div class="text-white">

        <div class="mb-4 text-2xl font-bold">
            <span class="block w-80">{{ $eventoActual->EVE_Nombre }}</span>
        </div>

        <div class="mb-10">{{ $eventoActual->EVE_Descripcion }} </div>


        <div class="grid lg:w-96 w-80 grid-cols-2 gap-10 mb-10">

            <div class="col">
                <p class="font-bold">HORARIO</p>
                <p>{{ $eventoActual->EVE_Fecha }} {{ $eventoActual->EVE_Hora }}</p>
            </div>

            <div class="col">
                <p class="font-bold">LUGAR</p>
                <p>{{ $eventoActual->EVE_Lugar }}</p>
            </div>

        </div>

        <div class="flex flex-col items-start"> 
            <span class="block font-bold text-2xl mb-5">Artistas invitados</span>
                
            @if(count($eventoActual->artistas) > 0)

            <div class="grid lg:grid-cols-12 grid-cols-8 gap-10">
                @foreach($eventoActual->artistas as $artista)
                <a href="{{ route('artista.show', $artista->id) }}" class="flex flex-col lg:col-span-2 col-span-4 items-center mb-5 transform hover:scale-110 cursor-pointer">
                        <div class="h-20 w-20 flex-none bg-cover rounded-full rounded-t-full rounded-1 text-center overflow-hidden"
                        style="background-image: url('https://tailwindcss.com/img/card-left.jpg')" title="Woman holding a mug">
                        </div>
                        <span>{{ $artista->ART_Nombre }}</span>
                </a>
                @endforeach
            </div>
            @else
                <span>El evento aún no cuenta con artistas invitados.</span>
            @endif
        </div>
    </div>
</div>
