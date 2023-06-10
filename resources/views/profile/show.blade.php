<x-app-layout>
    <div class="layout-wrapper layout-content-navbar">

        <div class="layout-container">
            @include('components.sidebar-dashboard')

            <div class="layout-page">
                @livewire('navigation-menu')

                <div class="content-wrapper">
                    {{-- <x-slot name="header">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ __('Profile') }}
                    </h2>
                    </x-slot> --}}
                    @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                        <div class="container-xxl">
                            @livewire('profile.update-profile-information-form')

                        </div>
                        <x-section-border />
                     
                    @endif

                    @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                    <div class="mt-10 sm:mt-0">
                        @livewire('profile.update-password-form')
                    </div>

                    <x-section-border />
                    @endif

                    {{-- @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                    <div class="mt-10 sm:mt-0">
                        @livewire('profile.two-factor-authentication-form')
                    </div>

                    <x-section-border />
                    @endif --}}

                    {{-- <div class="mt-10 sm:mt-0">
                        @livewire('profile.logout-other-browser-sessions-form')
                    </div> --}}

                    @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                    <x-section-border />

                    <div class="mt-10 sm:mt-0 mb-4">
                        @livewire('profile.delete-user-form')
                    </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</x-app-layout>