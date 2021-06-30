<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <div class="flex-shrink-0 flex items-center">
                <a href="/"><img src="/logo-1b.png" class="w-18 h-14" /></a>
            </div>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="">
                <x-jet-label for="rut" value="{{ __('Rut') }}" />
                <x-jet-input id="rut" class="block mt-1 w-full" type="text" name="rut" maxlength="9" :value="old('rut')"
                    required autofocus autocomplete="rut" />
                <span class="text-primary">(Sin puntos, ni guión) Ejemplo: 123456789</span>
            </div>

            <div class="mt-4">
                <x-jet-label for="nombre" value="{{ __('Nombre') }}" />
                <x-jet-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" :value="old('nombre')"
                    required autofocus autocomplete="nombre" />
            </div>

            <div class="mt-4">
                <x-jet-label for="apellido" value="{{ __('Apellido') }}" />
                <x-jet-input id="apellido" class="block mt-1 w-full" type="text" name="apellido"
                    :value="old('apellido')" required autofocus autocomplete="apellido" />
            </div>

            <div class="mt-4">
                <x-jet-label for="tipo_cuenta" value="{{ __('Seleccione uno o más roles') }}" />

                <div class="flex items-center"><input type="checkbox" name="tipo_cuenta[]" value="1"><span class="inline-block ml-2">Organizador.</span></div>
                <div class="flex items-center"><input type="checkbox" name="tipo_cuenta[]" value="2"><span class="inline-block ml-2">Representante.</span></div>
            </div>

            <div class="mt-4">
                <div x-data="{open: false}" x-cloak
                    class="relative flex items-center justify-between">
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <svg x-on:mouseover="open = true" x-on:mouseout="open = false" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary"
                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>

                    <div x-show.transition="open" x-on:mouseout="open = false"
                        class="absolute -top-24 bg-gray-600 text-white bg-opacity-75 py-2 px-4">
                        <span>Te recomendamos crear un correo dedicado para tu cuenta
                            ya que recibiras notificaciones y tu correo será visible
                            para todos los usuarios del sitio web.
                        </span>
                    </div>
                </div>
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required />
            </div>

            <div class="mt-4">
                <x-jet-label for="telefono" value="{{ __('Teléfono') }}" />
                <x-jet-input id="telefono" class="block mt-1 w-full" type="tel" pattern="[0-9]{9}" maxlength="9"
                    name="telefono" :value="old('telefono')" required autofocus autocomplete="telefono" />
                <span class="text-primary">Ejemplo: 912345678</span>
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Contraseña') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirmar contraseña') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms" />

                            <div class="ml-2">
                                {!! __('Acepto :terms_of_service', [
                                    'terms_of_service' => '<a target="_blank" href="' . route('terms.show') . '" class="underline text-sm text-gray-200 hover:text-gray-500">' . __('Terminos de servicio') . '</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-white hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('¿Ya tienes cuenta?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Registrarse') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
