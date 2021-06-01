<nav x-data="{ open: false }" class="bg-gray-900">
    <!-- Primary Navigation Menu -->

    <div class="container mx-auto px-5">
        <div class="flex font-regular justify-between h-16">
            <div class="flex justify-between">

                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="">
                        <x-jet-application-mark class="block h-9 w-auto" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex text-white">
                    <x-jet-nav-link href="/">
                        <x-slot name='slot'>
                            <p class="text-white hover:transform hover:scale-125">{{ __('Inicio') }}</p>
                        </x-slot>
                    </x-jet-nav-link>

                    <x-jet-nav-link href="{{ route('artistas.index') }}">
                        <x-slot name='slot'>
                            <p class="text-white hover:transform hover:scale-125">{{ __('Artistas') }}</p>
                        </x-slot>
                    </x-jet-nav-link>

                    <x-jet-nav-link href="{{ route('talleres.index') }}">
                        <x-slot name='slot'>
                            <p class="text-white hover:transform hover:scale-125">{{ __('Talleres') }}</p>
                        </x-slot>
                    </x-jet-nav-link>

                    <x-jet-nav-link href="/">
                        <x-slot name='slot'>
                            <p class="text-white hover:transform hover:scale-125">{{ __('Actividades') }}</p>
                        </x-slot>
                    </x-jet-nav-link>
                </div>


            </div>

            <div class="hidden sm:flex sm:items-center">
                <!-- Settings Dropdown -->

                <livewire:formularios.buscar-artista>


                    @guest
                        <div class="lg:block sm:hidden">
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

        <div class="pt-2 pb-3 space-y-1">
            <x-jet-responsive-nav-link href="/">
                <span class="text-white flex justify-center">{{ __('Artistas') }}</span>
            </x-jet-responsive-nav-link>
        </div>

        <div class="pt-2 pb-3 space-y-1">
            <x-jet-responsive-nav-link href="{{ route('talleres.index') }}">
                <span class="text-white flex justify-center">{{ __('Talleres') }}</span>
            </x-jet-responsive-nav-link>
        </div>

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

                        <x-jet-responsive-nav-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                    this.closest('form').submit();">
                            {{ __('Cerrar sesión') }}
                        </x-jet-responsive-nav-link>
                    </form>

                @endauth

            </div>
        </div>
    </div>
</nav>
