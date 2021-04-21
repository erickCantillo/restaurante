<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="flex">
            <div class="mt-4 px-1 pr-4">
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="identificacion" value="{{ __('Identificación') }}" />
                <x-jet-input id="identificacion" class="block mt-1 w-full" type="text" name="identificacion" :value="old('identificacion')" required />
            </div>
        </div>
        <div class="flex">
            <div class="mt-4 px-1 pr-4">
                <x-jet-label for="empresa" value="{{ __('Empresa') }}" />
                <x-jet-input id="empresa" class="block mt-1 w-full" type="text" name="empresa" :value="old('empresa')" required /> 
            </div>

            <div class="mt-4">
                <x-jet-label for="gerencia" value="{{ __('Gerencia') }}" />
                <x-jet-input id="gerencia" class="block mt-1 w-full" type="text" name="gerencia" :value="old('gerencia')" required /> 
            </div>
        </div>
        <div class="flex">
            <div class="mt-4 px-1 pr-4">
                <x-jet-label for="lugar_trabajo" value="{{ __('Lugar trabajo') }}" />
                <x-jet-input id="lugar_trabajo" class="block mt-1 w-full" type="text" name="lugar_trabajo" :value="old('lugar_trabajo')" required /> 
            </div>

            <div class="mt-4">
                <x-jet-label for="cargo" value="{{ __('Cargo') }}" />
                <x-jet-input id="cargo" class="block mt-1 w-full" type="text" name="cargo" :value="old('cargo')" required /> 
            </div>
        </div>
        <div class="flex">
            <div class="mt-4 px-1 pr-4">
                <x-jet-label for="celular" value="{{ __('Celular') }}" />
                <x-jet-input id="celular" class="block mt-1 w-full" type="text" name="celular" :value="old('celular')" required /> 
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>
        </div>
        <div class="flex">
            <div class="mt-4 px-1 pr-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>
        </div>
            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
