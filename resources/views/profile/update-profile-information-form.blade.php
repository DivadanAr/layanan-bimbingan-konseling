<x-form-section submit="updateProfileInformation">
    <x-slot name="form" class="rounded">
        <div style="margin-top: -45px">
            <h5 class="card-header">Profile Details</h5>
            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
        </div>
        <div x-data="{ photoName: null, photoPreview: null }" class="col-span-6 sm:col-span-4">

            <img src="{{ $this->user->profile_photo_url }}" style="width: 70px" id="imagePreview" alt="">

            <div class="mt-2" x-show="photoPreview" style="display: none;">
                <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                    x-bind:style="'background-image: url(\'' + photoPreview + '\'); margin-top: -30px;'">
                </span>
            </div>

            <div class="mt-2">
                <label class="mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                    <input type="file" class="hidden" id="imageInput" wire:model="photo" x-ref="photo" />
                </label>

                @if ($this->user->profile_photo_path)
                <x-secondary-button type="button" wire:click="deleteProfilePhoto">
                    {{ __('Remove Photo') }}
                </x-secondary-button>
                @endif
            </div>

            <p class="text-muted mt-2">Allowed JPG, GIF or PNG. Max size of 800K</p>
        </div>

        @endif
        <div class="card-body" style="margin-top: -20px">
            <div class="row">
                <div class="mb-3 col-md-6">
                    <x-label for="name" value="{{ __('Name') }}" />
                    <x-input id="name" type="text" class="form-control" wire:model.defer="state.name"
                        autocomplete="name" />
                    <x-input-error for="name" class="mt-2" />
                </div>

                <div class="mb-3 col-md-6">
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" type="email" class="form-control" wire:model.defer="state.email"
                        autocomplete="username" />
                    <x-input-error for="email" class="mt-2" />

                    @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && !
                    $this->user->hasVerifiedEmail())
                    <p class="text-sm mt-2">
                        {{ __('Your email address is unverified.') }}

                        <button type="button"
                            class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            wire:click.prevent="sendEmailVerification">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if ($this->verificationLinkSent)
                    <p class="mt-2 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                    @endif
                    @endif
                </div>

            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2" wire:loading.attr="disabled" wire:target="photo">Save
                    changes</button>
                <button type="reset" class="btn btn-outline-secondary">Cancel</button>

            </div>

        </div>
        <script>
            const imageInput = document.getElementById('imageInput');
            const imagePreview = document.getElementById('imagePreview');

            imageInput.addEventListener('change', function () {
                const file = this.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        imagePreview.src = e.target.result;
                    };
                    reader.readAsDataURL(file);
                } else {
                    imagePreview.src = '';
                }
            });
        </script>
    </x-slot>
</x-form-section>