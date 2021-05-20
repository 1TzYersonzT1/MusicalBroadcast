<nav x-data="{ open: false }" class="bg-gray-900 border-b border-gray-100 mb-12 sm:mx-auto">
    <!-- Primary Navigation Menu -->

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex font-regular justify-between h-16">
            <div class="flex justify-between">

                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="">
                        <x-jet-application-mark class="block h-9 w-auto" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-jet-nav-link href="/">
                        <x-slot name='slot'>
                            <p class="text-white">{{ __('Inicio') }}</p>
                        </x-slot>
                    </x-jet-nav-link>

                    <x-jet-nav-link href="/">
                        <x-slot name='slot'>
                            <p class="text-white">{{ __('Artistas') }}</p>
                        </x-slot>
                    </x-jet-nav-link>

                    <x-jet-nav-link href="{{ route('talleres.index') }}">
                        <x-slot name='slot'>
                            <p class="text-white">{{ __('Talleres') }}</p>
                        </x-slot>
                    </x-jet-nav-link>

                    <x-jet-nav-link href="/">
                        <x-slot name='slot'>
                            <p class="text-white">{{ __('Actividades') }}</p>
                        </x-slot>
                    </x-jet-nav-link>
                </div>


            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- Settings Dropdown -->


                <div class="relative lg:block sm:hidden text-gray-600 mr-5">
                    <input type="search" name="serch" placeholder="Buscar"
                        class="bg-white h-10 px-5 pr-10 w-80 rounded-full text-sm focus:outline-none">
                    <button type="submit" class="absolute right-0 top-0 mt-3 mr-4">
                        <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                            viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;"
                            xml:space="preserve" width="512px" height="512px">
                            <path
                                d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                        </svg>
                    </button>
                </div>

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
                                        {{ Auth::user()->nombre}} {{ Auth::user()->apellido}}

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
                {{ __('Inicio') }}
            </x-jet-responsive-nav-link>
        </div>

        <div class="pt-2 pb-3 space-y-1">
            <x-jet-responsive-nav-link href="/">
                {{ __('Artistas') }}
            </x-jet-responsive-nav-link>
        </div>

        <div class="pt-2 pb-3 space-y-1">
            <x-jet-responsive-nav-link href="/">
                {{ __('Talleres') }}
            </x-jet-responsive-nav-link>
        </div>

        <div class="pt-2 pb-3 space-y-1">
            <x-jet-responsive-nav-link href="/">
                {{ __('Actividades') }}
            </x-jet-responsive-nav-link>
        </div>

        <div class="pt-2 pb-3 space-y-1">
            <x-jet-responsive-nav-link href="{{ route('login') }}">
                {{ __('Iniciar sesión') }}
            </x-jet-responsive-nav-link>
        </div>

        <div class="pt-2 pb-3 space-y-1">
            <x-jet-responsive-nav-link href="{{ route('register') }}">
                {{ __('Registrarse') }}
            </x-jet-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                @auth
                    <div>
                        <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-white">{{ Auth::user()->email }}</div>
                    </div>
                @endauth
            </div>

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
