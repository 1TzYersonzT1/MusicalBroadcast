@extends("layouts.guest")
@section('contenido')
    <div class="py-60 w-80 lg:w-96 container mx-auto text-white min-h-screen">

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.update') }}" class="w-80 lg:w-96">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="block">
                <label>Email</label>
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <div class="mt-4">
                <label>Contraseña</label>
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <label>Confirmar contraseña</label>
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Reset Password') }}
                </x-jet-button>
            </div>
        </form>
    </div>
@endsection
