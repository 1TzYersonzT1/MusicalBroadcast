<x-jet-form-section submit="updatePassword">
    <x-slot name="title">
        <span class="text-white"> {{ __('Cambiar contraseña') }}</span>
    </x-slot>

    <x-slot name="description">
        <span class="text-gray-400">{{ __('Asegurate de que estas utilizando una contraseña segura para tu cuenta.') }}</span>
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="current_password" value="{{ __('Contraseña actual') }}" class="text-primary" />
            <x-jet-input id="current_password" type="password" class="mt-1 block w-full" wire:model.defer="state.current_password" autocomplete="current-password" />
            <x-jet-input-error for="current_password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="password" value="{{ __('Nueva contraseña') }}" class="text-primary" />
            <x-jet-input id="password" type="password" class="mt-1 block w-full" wire:model.defer="state.password" autocomplete="new-password" />
            <x-jet-input-error for="password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="password_confirmation" value="{{ __('Confirmar contraseña') }}" class="text-primary" />
            <x-jet-input id="password_confirmation" type="password" class="mt-1 block w-full" wire:model.defer="state.password_confirmation" autocomplete="new-password" />
            <x-jet-input-error for="password_confirmation" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Contraseña cambiada con exito!') }}
        </x-jet-action-message>

        <x-jet-button>
            {{ __('Guardar cambios') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
