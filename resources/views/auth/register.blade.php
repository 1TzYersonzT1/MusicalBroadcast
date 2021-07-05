@extends("layouts.guest")
@section('contenido')
    <div class="py-5 lg:w-96 w-80 container mx-auto text-white min-h-screen">
        <div>
            <x-jet-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('register') }}" class="w-80 lg:w-96">
                @csrf

                <div class="">
                    <span>Rut</span>
                    <x-jet-input id="rut" class="block w-full mt-1 text-primary" type="text" name="rut" maxlength="9" :value="old('rut')"
                        required autofocus autocomplete="rut" />
                    <span>(Sin puntos, ni guión) Ejemplo: 123456789</span>
                </div>

                <div class="mt-4">
                    <span>Nombre</span>
                    <x-jet-input id="nombre" class="block w-full mt-1 text-primary" type="text" name="nombre" :value="old('nombre')"
                        required autofocus autocomplete="nombre" />
                </div>

                <div class="mt-4">
                    <span>Apellido</span>
                    <x-jet-input id="apellido" class="block w-full mt-1 text-primary" type="text" name="apellido" :value="old('apellido')"
                        required autofocus autocomplete="apellido" />
                </div>

                <div class="mt-4">
                    <span>Seleccione el tipo de cuenta</span>

                    <div class="flex items-center"><input type="checkbox" name="tipo_cuenta[]" value="1"><span
                            class="inline-block ml-2">Organizador.</span></div>
                    <div class="flex items-center"><input type="checkbox" name="tipo_cuenta[]" value="2"><span
                            class="inline-block ml-2">Representante.</span></div>
                </div>

                <div class="mt-4">
                    <div x-data="{open: false}" x-cloak class="relative flex items-center justify-between">
                        <span>Email</span>
                        <svg x-on:mouseover="open = true" x-on:mouseout="open = false" xmlns="http://www.w3.org/2000/svg"
                            class="h-6 w-6 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
                    <x-jet-input id="email" class="block w-full mt-1 text-primary" type="email" name="email" :value="old('email')"
                        required />
                </div>

                <div class="mt-4">
                    <span>Numero de celular</span>
                    <x-jet-input id="telefono" class="block w-full mt-1 text-primary" type="tel" pattern="[0-9]{9}" maxlength="9"
                        name="telefono" :value="old('telefono')" required autofocus autocomplete="telefono" />
                    <span>Ejemplo: 912345678</span>
                </div>

                <div class="mt-4">
                    <span>Contraseña</span>
                    <x-jet-input id="password" class="block w-full mt-1 text-primary" type="password" name="password" required
                        autocomplete="new-password" />
                </div>

                <div class="mt-4">
                    <span>Confirmar contraseña</span>
                    <x-jet-input id="password_confirmation" class="block w-full mt-1 text-primary" type="password"
                        name="password_confirmation" required autocomplete="new-password" />
                </div>

                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-4">
                        <x-jet-label for="terms">
                            <div class="flex items-center">
                                <x-jet-checkbox name="terms" id="terms" />

                                <div class="ml-2 text-white">
                                    {!! __('Acepto :terms_of_service', [
    'terms_of_service' => '<a target="_blank" href="' . route('terms.show') . '" class="underline text-sm text-gray-200 hover:text-red-500">' . __('Terminos de servicio') . '</a>',
]) !!}
                                </div>
                            </div>
                        </x-jet-label>
                    </div>
                @endif

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-white hover:text-red-500" href="{{ route('login') }}">
                        {{ __('¿Ya tienes cuenta?') }}
                    </a>

                    <x-jet-button class="ml-4 ">
                        {{ __('Registrarse') }}
                    </x-jet-button>
                </div>
            </form>
        </div>

    </div>
@endsection
