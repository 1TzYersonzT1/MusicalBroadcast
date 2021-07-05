<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Soporte</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css" />

    <link rel="preconnect" href="https://fonts.gstatic.com">

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ mix('css/extra.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script>

    @livewireStyles
</head>

<body class="antialiased bg-primary font-body">

    <div class="min-h-screen flex flex-col justify-between text-white">
        @livewire('navigation-menu')

        <div class="flex mx-auto container py-5 text-lg lg:w-full w-80">
            <aside class="min-h-screen sticky top-0 w-full">
                <nav class="py-4 lg:px-6 px-2 flex flex-col items-start overflow-y-auto">
                    <div class="mb-10"> 
                        <span class="font-bold text-2xl border-b-2">Invitado</span>
                        <ul class="mt-2">
                            <li class="hover:text-gray-400 py-1 cursor-pointer">
                                <a  href="#inscribirse-taller">Inscribirse a un taller.</a>
                            </li>
                            <li class="hover:text-gray-400 py-1 cursor-pointer">
                               <a href="#eliminado-taller">¿Que debo hacer si fui eliminado de un taller?</a>
                            </li>
                            <li class="hover:text-gray-200 py-1 cursor-pointer">
                                <a href="#anular-inscripcion">¿Como puedo anular mi inscripción a un taller?</a>
                            </li>
                            <li class="hover:text-gray-200 py-1 cursor-pointer">
                                <a href="#reinscribirse-taller">¿Puedo volver a inscribirme a un taller del cual fui eliminado?</a>
                            </li>
                        </ul>
                   </div>

                   <div class="mb-10"> 
                        <span class="font-bold text-2xl border-b-2">Organizador</span>
                        <ul class="mt-2">
                            <li class="hover:text-gray-400 py-1 cursor-pointer">
                                <a href="#organizar-taller">Organizar un taller.</a>
                            </li>
                            <li class="hover:text-gray-400 py-1 cursor-pointer">
                                <a href="#significa-pendiente-taller">¿Que significado el estado pendiente en mi solicitud de taller?</a>
                            </li>
                            <li class="hover:text-gray-400 py-1 cursor-pointer">¿Cuál es el máximo de personas que puedo reunir?
                                </li> 
                            <li class="hover:text-gray-400 py-1 cursor-pointer">¿Cuanto debo esperar para que mi taller esté aprobado?</li> 
                            <li class="hover:text-gray-400 py-1 cursor-pointer">¿Puedo enseñar a menores de edad?</li> 
                        </ul>
                   </div>
                </nav>
            </aside>
            
            <main>
                <div>
                    <span class="text-3xl">Invitado</span>
                    <div class="mb-10 py-4" id="inscribirse-taller"> 
                        <span class="text-2xl font-bold">Inscribirse a un taller</span>
                        <div class="font-light text-justify">
                            <p class="mb-3">Al momento de inscribirte a un taller es necesario que le indiques al organizador
                                tus datos personales y de contacto con el fin de que te pueda identificar
                                de entre los demás asistentes y/o comunicarse contigo en caso de que
                                exista algún problema con la realización del taller. En caso de que aún no sepas que hacemos
                                con la información que nos proporcionas echale un vistazo a nuestros 
                                <a href="{{ route('terminos-condiciones') }}" class="font-bold">términos y condiciones de uso.</a>
                                El proceso de inscripción al taller no te debe tomar más de 5 minutos y te recomendamos
                                encarecidamente que nos proporciones información real y filedigna para evitar
                                que el organizador te elimine.
                            </p>
    
                            <p>Una vez que te hayas inscrito exitosamente al taller que has seleccionado serás notificado al correo que proporcionaste en
                                el formulario de inscripción. Es posible que al mismo correo te lleguen nuevas notificaciones en caso de que el taller se haya 
                                pospuesto, cancelado o te hayan eliminado de este por algún motivo especifico.
                            </p>
                        </div>
                    </div>

    
                    <div class="mb-10" id="eliminado-taller"> 
                        <span class="text-2xl font-bold">¿Que debo hacer si me eliminaron de un taller? </span>
                        <div class="font-light">
                            <p>En caso de que te hayas inscrito a un taller y al tiempo después has sido notificado
                                de que se te ha eliminado y no podrás participar debes tener en consideración
                                lo siguiente:
                            </p>
        
                            <ol style="list-style-type: number" class="my-4">
                                <li>Si no has utilizado información filedigna o real es posible que se te 
                                    haya eliminado por falta al reglamento.</li>
                                <li>Si has realizado un mal uso del formulario de inscripción, es posible
                                    que el organizador te haya eliminado por falta a la moral.</li>
                            </ol>
        
                            <p><span class="font-bold">Nota: </span> Si las condiciones mencionadas anteriormente no aplican a tu caso y crees que esto aún se trata
                                de un error, en primer lugar debes contactarte con el organizador del evento al cuál te haz 
                                inscrito. Si no tienes exito puedes contactarte con el correo de soporte <span class="font-bold">jorge.vnarvaez@gmail.com</span>
                        </div>
                    </div>
        
                    <div class="mb-10" id="anular-inscripcion"> 
                        <span class="text-2xl font-bold">¿Cómo puedo anular mi inscripción a un taller? </span>
                        <div class="font-light">
                            <p>En caso de que te hayas inscrito a un taller y ya no quieres o puedes participar en él,
                                la única forma que existe hasta el momento para anular tu inscripción es comunicarte directamente
                                con el organizador del taller ya sea por teléfono o correo electronico, los cuáles
                                puedes encontrar en la información del mismo taller al cuál te has inscrito y deseas abandonar.
                            </p>
        
                         
                        </div>
                    </div>

                    <div class="mb-20" id="reinscribirse-taller"> 
                        <span class="text-2xl font-bold">¿Puedo volver a inscribirme a un taller del cual fui eliminado?</span>
                        <div class="font-light">
                            <p>En caso de que te hayan eliminado de un taller es posible que te vuelvas a inscribir, pero ten en cuenta
                                que pronto esto ya no te será posible con el <span class="font-bold">nuevo sistema de comportamiento</span>,
                                además de que volverás a ser eliminado una y otra vez.
                            </p>
                        </div>
                    </div>
                </div>

                <div>
                    <span class="text-3xl">Organizador</span>
                    <div class="mb-10 py-4" id="organizar-taller"> 
                        <span class="text-2xl font-bold">Organizar un taller</span>
                        <div class="font-light text-justify">
                            <p class="mb-3">Importante: Esta funcionalidad solo esta disponible para aquellos
                                usuarios que se han registrado como organizadores. 

                                Antes de organizar un taller usted debe saber que la información que nos proporcione
                                será revisada por los administradores del sitio. Se le informará en todo momento
                                el estado en el que se encuentra su solicitud, para ello puede dirigirse a 
                                <span class="font-bold">Talleres/Mis Solicitudes</span> desde la barra de 
                                navegación.
                            </p>
                        </div>
                    </div>
    
                    <div class="mb-10" id="significa-pendiente-taller"> 
                        <span class="text-2xl font-bold">¿Que significado el estado pendiente en mi solicitud de taller?</span>
                        <div class="font-light">
                            <p>Tu solicitud para organizar un taller al igual que una planta durante su ciclo de vida 
                                se clasifica en los distintos estados que experimenta, en este caso el primer
                                estado que se le asigna a tu solicitud es pendiente, esto quiere decir que los administradores
                                están revisando la información que has proporcionado y dentro de poco se te informará
                                la decisión que han tomado. 
                            </p>

                            <p><span class="font-bold">Importante: </span>El taller no se visualizará en la página principal mientras su solicitud
                                se encuentre en estado pendiente, revisada, modificada o pospuesta. Para más información acerca
                                de los demás estados consulte <a href="estados-solicitud-taller" class="font-bold">estados de soliticud</a>
                            </p>
                        </div>
                    </div>
                </div>
            </main>
        </div>

        @include('footer')
    </div>

    @livewireScripts

</body>

</html>
