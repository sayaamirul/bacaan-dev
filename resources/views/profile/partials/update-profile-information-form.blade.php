<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form action="{{ route('verification.send') }}" id="send-verification" method="post">
        @csrf
    </form>

    <form action="{{ route('profile.update') }}" class="mt-6 space-y-6" method="post">
        @csrf
        @method('patch')

        <div>
            <x-input-label :value="__('Name')" for="name" />
            <x-text-input :value="old('name', $user->name)" autocomplete="name" autofocus class="mt-1 block w-full" id="name"
                name="name" required type="text" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <div>
            <x-input-label :value="__('Email')" for="email" />
            <x-text-input :value="old('email', $user->email)" autocomplete="username" class="mt-1 block w-full" id="email"
                name="email" required type="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="mt-2 text-sm text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button
                            class="focus:ring-primary-500 rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2"
                            form="send-verification">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-sm font-medium text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p class="text-sm text-gray-600" x-data="{ show: true }" x-init="setTimeout(() => show = false, 2000)" x-show="show"
                    x-transition>{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
