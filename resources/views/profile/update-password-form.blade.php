<x-form-section submit="updatePassword">
    <x-slot name="title">
        {{ __('Update Password') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Ensure your account is using a long, random password to stay secure.') }}
    </x-slot>

    <x-slot name="form">
        {{-- <div class="col-span-6 sm:col-span-4">
            <x-label for="current_password" value="{{ __('Current Password') }}" />
            <x-input id="current_password" type="password" class="mt-1 block w-full" wire:model.defer="state.current_password" autocomplete="current-password" />
            <x-input-error for="current_password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="password" value="{{ __('New Password') }}" />
            <x-input id="password" type="password" class="mt-1 block w-full" wire:model.defer="state.password" autocomplete="new-password" />
            <x-input-error for="password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
            <x-input id="password_confirmation" type="password" class="mt-1 block w-full" wire:model.defer="state.password_confirmation" autocomplete="new-password" />
            <x-input-error for="password_confirmation" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        <x-button>
            {{ __('Save') }}
        </x-button> --}}

        <div>
                <div class="form-group">
                    <label for="current_password">{{ __('Current Password') }}</label>
                    <input id="current_password" type="password" name="current_password" class="form-control" autocomplete="current-password" />
                    <span class="text-danger">{{ $errors->first('current_password') }}</span>
                </div>
        
                <div class="form-group">
                    <label for="password">{{ __('New Password') }}</label>
                    <input id="password" type="password" name="password" class="form-control" autocomplete="new-password" />
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                </div>
        
                <div class="form-group">
                    <label for="password_confirmation">{{ __('Confirm Password') }}</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" autocomplete="new-password" />
                    <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                </div>
        
                <button type="submit" class="btn btn-primary mt-4">{{ __('Save') }}</button>
        
    </x-slot>
</x-form-section>
