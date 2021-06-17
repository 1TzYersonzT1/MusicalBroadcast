<div>
    <div class="flex flex-col items-center justify-center mb-10">
        <span class="text-2xl text-white mb-4">¿Estás interesado/a?</span>
        <button data-fancybox data-src="#formulario-taller"
            class="bg-gradient-to-tr from-white via-black to-primary px-5 py-2 hover:bg-gradient-to-b hover:from-primary hover:via-black hover:to-white">Participar</button>
    </div>
    <div id="formulario-taller" class="hidden formulario-taller">

        <div class="flex flex-col items-center">
            <span class="lg:text-2xl border-b border-gray-900">Formulario de inscripción</span>
            <span>{{ $tallerSeleccionado->TAL_Nombre }}</span>
        </div>


        <form method='post' wire:submit.prevent="inscripcion" autocomplete="off" class="formulario-inscripcion">
            @csrf
            <div class="grid lg:grid-cols-2 gap-8 mt-8">
                <div class="flex flex-col">
                    <label for="rut">Rut</label>
                    <input type="text" wire:model="rut" maxlength="9" class="rounded-full" />
                </div>

                <div class="flex flex-col">
                    <label for="nombre">Nombre</label>
                    <input id="nombre" type="text" wire:model="nombre" maxlength="20" class="rounded-full " />
                </div>

                <div class="flex flex-col">
                    <label for="apellidos">Apellidos</label>
                    <input id="apellidos" type="text" wire:model="apellidos" maxlength="40" class="rounded-full" />
                </div>

                <div class="flex flex-col">
                    <label for="email">Email</label>
                    <input id="email" type="email" wire:model="email" class="rounded-full w-full" />
                </div>

                <div class="flex flex-col">
                    <label for="telefono">Teléfono</label>
                    <input id="telefono" type="tel" wire:model="telefono" pattern="[0-9]{9}"
                        class="rounded-full w-full" />
                    <span>Ejemplo: 912345678</span>
                </div>
            </div>

            @if ($errors)
                @foreach ($errors->all() as $message)
                    <script>
                        $.fancybox.close();
                        Swal.fire({
                            title: 'Error',
                            text: 'Complete los campos solicitados correctamente',
                            icon: 'warning',
                            timer: 4000,
                        }).then((result) => {
                            if(!result.isVisible) {
                                location.href = location.href;
                            }
                        });
                        

                    </script>
                @endforeach
            @endif

            <div class="mt-10 flex justify-center">

                <button type='submit'
                    class="bg-primary rounded-full text-white font-bold px-5 py-2 hover:bg-gradient-to-b hover:from-primary hover:via-black hover:to-white">
                    Participar
                </button>

            </div>
        </form>
    </div>
</div>

@section('js')
    <script>
        window.addEventListener('inscripcionExitosa', function() {
            $.fancybox.close();
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Te has inscrito exitosamente',
                text: 'El organizador se contactará contigo a la brevedad.',
                showConfirmButton: false,
                timer: 4000
            }).then((isVisible) => {
                location.reload();
            });
        });

        window.addEventListener('nuevoIntento', function() {
            $.fancybox.close();
            Swal.fire({
                position: 'center',
                icon: 'info',
                title: 'Ya estas inscrito',
                text: 'Si tienes alguna duda no olvides contactar al organizador.',
                showConfirmButton: false,
                timer: 4500
            }).then((isVisible) => {
                location.reload();
            });
        })

    </script>
@endsection
