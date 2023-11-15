<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status :status="session('status')" class="mb-4" />

    <form action="{{ route('login') }}" method="POST">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label :value="__('Email')" for="email" />
            <x-text-input :value="old('email')" autocomplete="username" autofocus class="mt-1 block w-full" id="email"
                name="email" required type="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label :value="__('Password')" for="password" />

            <x-text-input autocomplete="current-password" class="mt-1 block w-full" id="password" name="password"
                required type="password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="mt-4 block">
            <label class="inline-flex items-center" for="remember_me">
                <input class="focus:ring-primary-500 rounded border-gray-300 text-indigo-600 shadow-sm" id="remember_me"
                    name="remember" type="checkbox">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="mt-4 flex items-center justify-end">
            @if (Route::has('password.request'))
                <a class="focus:ring-primary-500 rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
