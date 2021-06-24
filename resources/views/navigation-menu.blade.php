<nav x-data="{ open: false }" class="bg-gray-900">
    <!-- Primary Navigation Menu -->

    <div class="container mx-auto px-5">
        <div class="flex font-regular justify-between h-16">
            <div class="flex justify-between">

                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                   <a href="/"><img src="/logo-1b.png" class="w-18 h-14"/></a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex text-white">
                    <x-jet-nav-link href="/">
                        <x-slot name='slot'>
                            <p class="text-white hover:transform hover:scale-125">{{ __('Inicio') }}</p>
                        </x-slot>
                    </x-jet-nav-link>


                    @auth
                        <div class="hidden sm:flex sm:items-center">
                            <div class="relative" x-data="{ open: false }" @click.away="open = false"
                                @close.stop="open = false">
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                        class="inline-flex items-center px-3 pt-1 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-gray-900 hover:text-gray-200 focus:outline-none transition">
                                        Artista

                                        <svg @click="open=!open" class="ml-2 -mr-0.5 h-4 w-4"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />

                                        </svg>

                                    </button>
                                </span>
                                @can('representar')
                                    <div x-show="open" class="absolute z-50 mt-2 bg-white">
                                        <!-- Account Management -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Menu artistas') }}
                                        </div>

                                        <x-jet-dropdown-link href="{{ route('representante.crearartista') }}">
                                            {{ __('Agregar artista') }}
                                        </x-jet-dropdown-link>

                                        <x-jet-dropdown-link href="{{ route('artistas.index') }}">
                                            {{ __('Artistas') }}
                                        </x-jet-dropdown-link>

                                        <x-jet-dropdown-link href="{{ route('representante.tusartistas') }}">
                                            {{ __('Tus artistas') }}
                                        </x-jet-dropdown-link>

                                    
                                    </div>
                                @elsecan('administrar')
                                    <div x-show="open" class="absolute z-50 mt-2 bg-white">
                                        <!-- Account Management -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Administrar artistas') }}
                                        </div>

                                        <x-jet-dropdown-link href="{{ route('administrador.artistas') }}">
                                            {{ __('Nuevos artistas') }}
                                        </x-jet-dropdown-link>

                                        <x-jet-dropdown-link href="{{ route('artistas.index') }}">
                                            {{ __('Artistas') }}
                                        </x-jet-dropdown-link>
                                    </div>
                                @endcan
                            </div>
                        </div>
                    @endauth

                    @guest
                        <x-jet-nav-link href="{{ route('artistas.index') }}">
                            <x-slot name='slot'>
                                <p class="text-white hover:transform hover:scale-125">{{ __('Artistas') }}</p>
                            </x-slot>
                        </x-jet-nav-link>
                    @endguest

                    @auth
                        <div class="hidden sm:flex sm:items-center">
                            <div class="relative" x-data="{ open: false }" @click.away="open = false"
                                @close.stop="open = false">
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                        class="inline-flex items-center px-3 pt-1 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-gray-900 hover:text-gray-200 focus:outline-none transition">
                                        Talleres

                                        <svg @click="open=!open" class="ml-2 -mr-0.5 h-4 w-4"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />

                                        </svg>

                                    </button>
                                </span>
                                @can('organizar')
                                    <div x-show="open" class="absolute z-50 mt-2 bg-white">
                                        <!-- Account Management -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Menu talleres') }}
                                        </div>

                                        <x-jet-dropdown-link href="{{ route('talleres.index') }}">
                                            {{ __('Talleres') }}
                                        </x-jet-dropdown-link>

                                        <x-jet-dropdown-link href="{{ route('organizador.creartaller') }}">
                                            {{ __('Crear taller') }}
                                        </x-jet-dropdown-link>

                                        <x-jet-dropdown-link href="{{ route('organizador.mis-solicitudes') }}">
                                            {{ __('Estado solicitud') }}
                                        </x-jet-dropdown-link>

                                        <x-jet-dropdown-link href="{{ route('organizador.taller/asistentes') }}">
                                            {{ __('Mis talleres') }}
                                        </x-jet-dropdown-link>
                                    </div>
                                @elsecan('administrar')
                                    <div x-show="open" class="absolute z-50 mt-2 bg-white">
                                        <!-- Account Management -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Administrar taller') }}
                                        </div>

                                        <x-jet-dropdown-link href="{{ route('talleres.index') }}">
                                            {{ __('Talleres') }}
                                        </x-jet-dropdown-link>

                                        <x-jet-dropdown-link href="{{ route('administrador.talleres') }}">
                                            {{ __('Nuevos talleres') }}
                                        </x-jet-dropdown-link>
                                    </div>
                                @endcan
                            </div>
                        </div>
                    @endauth

                    @guest
                        <x-jet-nav-link href="{{ route('talleres.index') }}">
                            <x-slot name='slot'>
                                <p class="text-white hover:transform hover:scale-125">{{ __('Talleres') }}</p>
                            </x-slot>
                        </x-jet-nav-link>
                    @endguest

                    @auth
                        <div class="hidden sm:flex sm:items-center">
                            <div class="relative" x-data="{ open: false }" @click.away="open = false"
                                @close.stop="open = false">
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                        class="inline-flex items-center px-3 pt-1 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-gray-900 hover:text-gray-200 focus:outline-none transition">
                                        Actividades

                                        <svg @click="open=!open" class="ml-2 -mr-0.5 h-4 w-4"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />

                                        </svg>

                                    </button>
                                </span>
                                @can('organizar')
                                    <div x-show="open" class="absolute z-50 mt-2 bg-white">
                                        <!-- Account Management -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Menu actividades') }}
                                        </div>

                                        <x-jet-dropdown-link href="{{ route('eventos.index') }}">
                                            {{ __('Eventos') }}
                                        </x-jet-dropdown-link>

                                        <x-jet-dropdown-link href="{{ route('organizador.crearevento') }}">
                                            {{ __('Crear evento') }}
                                        </x-jet-dropdown-link>

                                        <x-jet-dropdown-link href="{{ route('organizador.mis-eventos') }}">
                                            {{ __('Mis solicitudes') }}
                                        </x-jet-dropdown-link>

                                        <x-jet-dropdown-link href="{{ route('organizador.evento/asistentes') }}">
                                            {{ __('Mis eventos') }}
                                        </x-jet-dropdown-link>
                                    </div>
                                @elsecan('administrar')
                                    <div x-show="open" class="absolute z-50 mt-2 bg-white">
                                        <!-- Account Management -->
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Administrar evento') }}
                                        </div>

                                        <x-jet-dropdown-link href="{{ route('eventos.index') }}">
                                            {{ __('Eventos') }}
                                        </x-jet-dropdown-link>

                                        <x-jet-dropdown-link href="{{ route('administrador.eventos') }}">
                                            {{ __('Nuevos eventos') }}
                                        </x-jet-dropdown-link>
                                    </div>
                                @endcan
                            </div>
                        </div>
                    @endauth

                    @guest
                        <x-jet-nav-link href="{{ route('eventos.index') }}">
                            <x-slot name='slot'>
                                <p class="text-white hover:transform hover:scale-125">{{ __('Actividades') }}</p>
                            </x-slot>
                        </x-jet-nav-link>
                    @endguest
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center">
                <!-- Settings Dropdown -->

                <div class="relative" x-data='{ open: false }'>

                    <livewire:formularios.buscar-artista>

                </div>


                @guest
                    <div class="lg:block sm:hidden ml-5">
                        <x-jet-nav-link href="{{ route('login') }}">
                            <x-slot name='slot'>
                                <p class="text-white mr-5">{{ __('Iniciar sesión') }}</p>
                            </x-slot>
                        </x-jet-nav-link>

                        <x-jet-nav-link href="{{ route('register') }}">
                            <x-slot name='slot'>
                                <p class="text-white">{{ __('Registrarse') }}</p>
                            </x-slot>
                        </x-jet-nav-link>
                    </div>
                @endguest

                <div class="ml-3 relative">

                    @auth
                        <x-jet-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-gray-900 hover:text-gray-200 focus:outline-none transition">
                                        {{ Auth::user()->nombre }} {{ Auth::user()->apellidos }}

                                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </span>

                            </x-slot>

                            <x-slot name="content">
                                <!-- Account Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Administración de cuenta') }}
                                </div>

                                <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                    {{ __('Perfil') }}
                                </x-jet-dropdown-link>

                                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                    <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                        {{ __('API Tokens') }}
                                    </x-jet-dropdown-link>
                                @endif

                                <div class="border-t border-gray-100"></div>

                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-jet-dropdown-link href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                                                                                                                                                                                            this.closest('form').submit();">
                                        {{ __('Cerrar sesión') }}
                                    </x-jet-dropdown-link>
                                </form>
                            </x-slot>
                        </x-jet-dropdown>
                    @endauth
                </div>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-jet-responsive-nav-link href="/">
                <span class="text-white flex justify-center">{{ __('Inicio') }}</span>
            </x-jet-responsive-nav-link>
        </div>

        <!-- Artistas responsive -->
        @guest
            <div class="pt-2 pb-3 space-y-1">
                <x-jet-responsive-nav-link href="{{ route('artistas.index') }}">
                    <span class="text-white flex justify-center">{{ __('Artistas') }}</span>
                </x-jet-responsive-nav-link>
            </div>
        @endguest
        @auth
            <div class="sm:flex sm:items-center">
                @can('representar')
                    <div x-data="{open: false}">
                        <div class="pt-2 pb-3 space-y-1">
                            <x-jet-responsive-nav-link class="flex justify-center focus:border-red-500">
                                <span class="text-white flex justify-center"> {{ __('Artistas') }}</span>
                                <svg @click="open = !open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </x-jet-responsive-nav-link>
                        </div>

                        <div x-show="open" class="bg-primary bg-opacity-40">
                            <div class="pt-2 pb-3 space-y-1">
                                <x-jet-responsive-nav-link href="{{ route('artistas.index') }}">
                                    <span class="text-white flex justify-center"> {{ __('Artistas') }}</span>
                                </x-jet-responsive-nav-link>
                            </div>

                            <div class="pt-2 pb-3 space-y-1">
                                <x-jet-responsive-nav-link href="{{ route('representante.crearartista') }}">
                                    <span class="text-white flex justify-center">{{ __('Agregar artista') }}</span>
                                </x-jet-responsive-nav-link>
                            </div>

                            <div class="pt-2 pb-3 space-y-1">
                                <x-jet-responsive-nav-link href="{{ route('representante.tusartistas') }}">
                                    <span class="text-white flex justify-center">{{ __('Tus artistas') }}</span>
                                </x-jet-responsive-nav-link>
                            </div>
                        </div>
                    </div>
                @elsecan('administrar')
                    <div x-data="{open: false}">
                        <div class="pt-2 pb-3 space-y-1">
                            <x-jet-responsive-nav-link class="flex justify-center focus:border-red-500">
                                <span class="text-white flex justify-center"> {{ __('Artistas') }}</span>
                                <svg @click="open = !open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </x-jet-responsive-nav-link>
                        </div>

                        <div x-show="open" class="bg-primary bg-opacity-40">
                            <div class="pt-2 pb-3 space-y-1">
                                <x-jet-responsive-nav-link href="{{ route('artistas.index') }}">
                                    <span class="text-white flex justify-center"> {{ __('Artistas') }}</span>
                                </x-jet-responsive-nav-link>
                            </div>

                            <div class="pt-2 pb-3 space-y-1">
                                <x-jet-responsive-nav-link href="{{ route('administrador.artistas') }}">
                                    <span class="text-white flex justify-center">{{ __('Nuevos artistas') }}</span>
                                </x-jet-responsive-nav-link>
                            </div>


                        </div>
                    </div>
                @endcan
            </div>
        @endauth

        <!-- Talleres -->
        @guest
            <div class="pt-2 pb-3 space-y-1">
                <x-jet-responsive-nav-link href="{{ route('artistas.index') }}">
                    <span class="text-white flex justify-center">{{ __('Talleres') }}</span>
                </x-jet-responsive-nav-link>
            </div>
        @endguest

        @auth
            <div class="sm:flex sm:items-center">
                @can('organizar')
                    <div x-data="{ open: false }">
                        <div class="pt-2 pb-3 space-y-1">
                            <x-jet-responsive-nav-link class="flex justify-center focus:border-red-500">
                                <span class="text-white flex justify-center"> {{ __('Talleres') }}</span>
                                <svg @click="open = !open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </x-jet-responsive-nav-link>
                        </div>

                        <div x-show="open" class="bg-primary bg-opacity-40">
                            <div class="pt-2 pb-3 space-y-1">
                                <x-jet-responsive-nav-link href="{{ route('talleres.index') }}">
                                    <span class="text-white flex justify-center"> {{ __('Talleres') }}</span>
                                </x-jet-responsive-nav-link>
                            </div>

                            <div class="pt-2 pb-3 space-y-1">
                                <x-jet-responsive-nav-link href="{{ route('organizador.creartaller') }}">
                                    <span class="text-white flex justify-center">{{ __('Crear taller') }}</span>
                                </x-jet-responsive-nav-link>
                            </div>

                            <div class="pt-2 pb-3 space-y-1">
                                <x-jet-responsive-nav-link href="{{ route('organizador.mis-solicitudes') }}">
                                    <span class="text-white flex justify-center">{{ __('Estado solicitud') }}</span>
                                </x-jet-responsive-nav-link>
                            </div>

                            <div class="pt-2 pb-3 space-y-1">
                                <x-jet-responsive-nav-link href="{{ route('organizador.taller/asistentes') }}">
                                    <span class="text-white flex justify-center">  {{ __('Mis talleres') }}</span>
                                </x-jet-responsive-nav-link>
                            </div>
                        </div>
                    </div>
                @elsecan('administrar')
                    <div x-data="{open: false}">
                        <div class="pt-2 pb-3 space-y-1">
                            <x-jet-responsive-nav-link class="flex justify-center focus:border-red-500">
                                <span class="text-white flex justify-center"> {{ __('Talleres') }}</span>
                                <svg @click="open = !open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </x-jet-responsive-nav-link>
                        </div>

                        <div x-show="open" class="bg-primary bg-opacity-40">
                            <div class="pt-2 pb-3 space-y-1">
                                <x-jet-responsive-nav-link href="{{ route('talleres.index') }}">
                                    <span class="text-white flex justify-center"> {{ __('Talleres') }}</span>
                                </x-jet-responsive-nav-link>
                            </div>

                            <div class="pt-2 pb-3 space-y-1">
                                <x-jet-responsive-nav-link href="{{ route('administrador.talleres') }}">
                                    <span class="text-white flex justify-center">{{ __('Nuevos talleres') }}</span>
                                </x-jet-responsive-nav-link>
                            </div>
                        </div>
                    </div>
                @endcan
            </div>
        @endauth

        <div class="pt-2 pb-3 space-y-1">
            <x-jet-responsive-nav-link href="/">
                <span class="text-white flex justify-center">{{ __('Actividades') }}</span>
            </x-jet-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-3 pb-5 border-t border-gray-200">
            @guest

                <div class="pt-2 pb-3 space-y-1">
                    <x-jet-responsive-nav-link href="{{ route('login') }}">
                        <span class="text-white flex justify-center">{{ __('Iniciar sesión') }}</span>
                    </x-jet-responsive-nav-link>
                </div>

                <div class="pt-2 pb-3 space-y-1">
                    <x-jet-responsive-nav-link href="{{ route('register') }}">
                        <span class="text-white flex justify-center"> {{ __('Registrarse') }}</span>
                    </x-jet-responsive-nav-link>
                </div>
            @endguest

            @auth
                <div class="flex items-center px-4">

                    <div>
                        <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-white">{{ Auth::user()->email }}</div>
                    </div>

                </div>
            @endauth
            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                @auth

                    <x-jet-responsive-nav-link href="{{ route('profile.show') }}"
                        :active="request()->routeIs('profile.show')">
                        {{ __('Perfil') }}
                    </x-jet-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-jet-responsive-nav-link href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                                                                                this.closest('form').submit();">
                            {{ __('Cerrar sesión') }}
                        </x-jet-responsive-nav-link>
                    </form>

                @endauth

            </div>
        </div>
    </div>
</nav>
