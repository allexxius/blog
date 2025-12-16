<section>
    <header>
        <h2 class="text-lg font-medium text-base-content">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-base-content">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <fieldset class="fieldset">
            <legend class="fieldset-legend">{{ __('Current Password') }}</legend>
            <input
                type="password"
                name="current_password"
                class="input w-full"
                placeholder="{{ __('Current Password') }}"
                autocomplete="current-password"
            />
            @if ($errors->updatePassword->has('current_password'))
                <p class="label">
                    {{ $errors->updatePassword->first('current_password') }}
                </p>
            @endif
        </fieldset>

        <fieldset class="fieldset">
            <legend class="fieldset-legend">{{ __('New Password') }}</legend>
            <input
                type="password"
                name="password"
                class="input w-full"
                placeholder="{{ __('New Password') }}"
                autocomplete="new-password"
            />
            @if ($errors->updatePassword->has('password'))
                <p class="label">
                    {{ $errors->updatePassword->first('password') }}
                </p>
            @endif
        </fieldset>

        <fieldset class="fieldset">
            <legend class="fieldset-legend">{{ __('Confirm Password') }}</legend>
            <input
                type="password"
                name="password_confirmation"
                class="input w-full"
                placeholder="{{ __('Confirm Password') }}"
                autocomplete="new-password"
            />
            @if ($errors->updatePassword->has('password_confirmation'))
                <p class="label">
                    {{ $errors->updatePassword->first('password_confirmation') }}
                </p>
            @endif
        </fieldset>

        <div class="flex items-center gap-4">
            <button class="btn btn-primary">
                {{ __('Save') }}
            </button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-base-content"
                >
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>
