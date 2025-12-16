@extends('partials.layout')
@section('title', __('Confirm Password'))

@section('content')
    <div class="card w-96 bg-base-100 shadow-xl mx-auto">
        <div class="card-body">
            <p class="text-sm text-base-content mb-4">
                {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
            </p>

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <fieldset class="fieldset">
                    <legend class="fieldset-legend">@lang('Password')</legend>
                    <input
                        type="password"
                        name="password"
                        class="input"
                        placeholder="@lang('Password')"
                        required
                        autocomplete="current-password"
                    />
                    @error('password')
                        <p class="label">{{ $message }}</p>
                    @enderror
                </fieldset>

                <div class="flex justify-end mt-4">
                    <button class="btn btn-primary">
                        {{ __('Confirm') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
