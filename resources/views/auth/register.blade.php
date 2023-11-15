<x-guest-layout>
    <form action="{{ route('register') }}" method="POST">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label :value="__('Name')" for="name" />
            <x-text-input :value="old('name')" autocomplete="name" autofocus class="mt-1 block w-full" id="name"
                name="name" required type="text" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label :value="__('Email')" for="email" />
            <x-text-input :value="old('email')" autocomplete="username" class="mt-1 block w-full" id="email"
                name="email" required type="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label :value="__('Password')" for="password" />

            <x-text-input autocomplete="new-password" class="mt-1 block w-full" id="password" name="password" required
                type="password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label :value="__('Confirm Password')" for="password_confirmation" />

            <x-text-input autocomplete="new-password" class="mt-1 block w-full" id="password_confirmation"
                name="password_confirmation" required type="password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-4 flex items-center justify-end">
            <a class="focus:ring-primary-500 rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
