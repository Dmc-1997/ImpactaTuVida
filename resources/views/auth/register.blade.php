<x-guest-layout>
    <style>
        .text-danger {
            color: red;
        }
    </style>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <a href="{{ route('index') }}">
                <img src="{{ asset('images/logo.png') }}" width="300px">
            </a>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <label>Nombre Completo <span class="text-danger">*</span></label>
                <x-jet-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>
            {{-- <div>
                <x-jet-label for="surname" value="Apellido" />
                <x-jet-input id="surname" class="block w-full mt-1" type="text" name="surname" :value="old('surname')" required autofocus autocomplete="surname" />
            </div> --}}
            <div class="mt-4">
                <label>Empresa<span class="text-danger"></span></label>
                <x-jet-input id="company" class="block w-full mt-1" type="text" name="company" :value="old('company')" autofocus autocomplete="company" />
            </div>
            {{-- <div>
                <x-jet-label for="nit" value="NIT" />
                <x-jet-input id="nit" class="block w-full mt-1" type="text" name="nit" :value="old('nit')" required autofocus autocomplete="nit" />
            </div> --}}
            {{-- <div>
                <label>País</label>
                <x-jet-input id="country" class="block w-full mt-1" type="text" name="country" :value="old('country')" required autofocus autocomplete="country" />
            </div> --}}
            <div class="mt-4">
                <label>Teléfono<span class="text-danger">*</span></label>
                <x-jet-input id="phone" class="block w-full mt-1" type="text" name="phone" :value="old('phone')" required autofocus autocomplete="phone" />
            </div>

            {{-- <div>
                <x-jet-label for="address" value="Dirección" />
                <x-jet-input id="address" class="block w-full mt-1" type="text" name="address" :value="old('address')" required autofocus autocomplete="address" />
            </div> --}}

            <div class="mt-4">
                <label>Email<span class="text-danger">*</span></label>
                <x-jet-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <label>Contraseña<span class="text-danger">*</span></label>
                <x-jet-input id="password" class="block w-full mt-1" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <label>Confirmar Contraseña<span class="text-danger">*</span></label>
                <x-jet-input id="password_confirmation" class="block w-full mt-1" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="text-sm text-gray-600 underline hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="text-sm text-gray-600 underline hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="text-sm text-gray-600 underline hover:text-gray-900" href="{{ route('login') }}">
                    Ya tengo cuenta
                </a>

                <x-jet-button class="ml-4">
                    CREAR CUENTA
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
