<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        <span class="text-white"> {{ __('Información personal') }}</span>
    </x-slot>

    <x-slot name="description">
        <span class="text-gray-400"> {{ __('Actualiza tu información personal y de contacto.') }}</span>
    </x-slot>

    <x-slot name="form">
        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="nombre" value="{{ __('Nombre') }}" class="text-primary" />
            <x-jet-input id="nombre" type="text" class="mt-1 block w-full" wire:model.defer="state.nombre"
                autocomplete="nombre" />
            <x-jet-input-error for="nombre" class="mt-2" />
        </div>

        <!-- Apellidos -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="apellidos" value="{{ __('Apellidos') }}" class="text-primary" />
            <x-jet-input id="apellidos" type="text" class="mt-1 block w-full" wire:model.defer="state.apellidos"
                autocomplete="apellidos" />
            <x-jet-input-error for="apellidos" class="mt-2" />
        </div>

        <!-- Telefono -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="telefono" value="{{ __('Teléfono') }}" class="text-primary" />
            <x-jet-input id="telefono" type="tel"  pattern="[0-9]{9}" class="mt-1 block w-full" wire:model.defer="state.telefono"
                autocomplete="telefono" />
            <x-jet-input-error for="telefono" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email') }}" class="text-primary" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Actualizado con exito!') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Guardar cambios') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
