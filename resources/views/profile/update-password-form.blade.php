<x-jet-form-section submit="updatePassword" class=" mb-3">
    <x-slot name="title">
    </x-slot>

    <x-slot name="description">
    </x-slot>

    <x-slot name="form">
        <h3>Actualice su contraseña</h3>
        <p>Asegure su cuenta con una contraseña fuerte</p>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="current_password" value="Contraseña actual" />
            <x-jet-input id="current_password" type="password" class="mt-1 block w-full form-control" wire:model.defer="state.current_password" autocomplete="current-password" />
            <x-jet-input-error for="current_password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="password" value="Nueva Contraseña" />
            <x-jet-input id="password" type="password" class="mt-1 block w-full form-control" wire:model.defer="state.password" autocomplete="new-password" />
            <x-jet-input-error for="password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="password_confirmation" value="Confirme contraseña" />
            <x-jet-input id="password_confirmation" type="password" class="mt-1 block w-full form-control" wire:model.defer="state.password_confirmation" autocomplete="new-password" />
            <x-jet-input-error for="password_confirmation" class="mt-2" />
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3 btn-outline-primary" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button class="btn btn-primary">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
