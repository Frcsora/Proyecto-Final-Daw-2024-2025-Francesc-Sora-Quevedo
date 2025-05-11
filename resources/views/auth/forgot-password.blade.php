<x-layout :image="$image" :imageFondo="$imageFondo" :socialmedias="$socialmedias">
    <x-slot:title>Forgot-password</x-slot:title>
    <x-card>
        <div class="mb-4 text-sm">
            {{ __('¿Has olvidado tu contraseña? No te preocupes, puedes recuperarla a través de tu correo electrónico.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button>
                    {{ __('Email Password Reset Link') }}
                </x-primary-button>
            </div>
        </form>
    </x-card>

</x-layout>
