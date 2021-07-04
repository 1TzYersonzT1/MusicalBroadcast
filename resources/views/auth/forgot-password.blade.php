@extends("layouts.guest")
@section('contenido')
    <div class="py-60 w-96 container mx-auto text-white min-h-screen">
        <div class="bg-black bg-opacity-20 px-5 py-5">
            <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm ">
            {{ __('¿Olvidaste tu contraseña? No hay problema. Simplemente díganos su dirección de correo electrónico y le enviaremos un enlace para restablecer la contraseña que le permitirá elegir una nueva.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <span>Email</span>
                <x-jet-input id="email" class="block mt-1 w-full text-black" type="email" name="email" :value="old('email')" required
                    autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Restablecer contraseña') }}
                </x-jet-button>
            </div>
        </form>
        </div>
    </div>
@endsection
