<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-900 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="bg-[#f5f0e6] min-h-screen">
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                <div class="bg-[#fef9f4] p-6 rounded-lg shadow-md mb-6">
                    @livewire('profile.update-profile-information-form')
                </div>

                <x-section-border class="border-t border-[#e0d7cc]" />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0 bg-[#fef9f4] p-6 rounded-lg shadow-md mb-6">
                    @livewire('profile.update-password-form')
                </div>

                <x-section-border class="border-t border-[#e0d7cc]" />
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10 sm:mt-0 bg-[#fef9f4] p-6 rounded-lg shadow-md mb-6">
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <x-section-border class="border-t border-[#e0d7cc]" />
            @endif

            <div class="mt-10 sm:mt-0 bg-[#fef9f4] p-6 rounded-lg shadow-md mb-6">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-section-border class="border-t border-[#e0d7cc]" />

                <div class="mt-10 sm:mt-0 bg-[#fef9f4] p-6 rounded-lg shadow-md mb-6">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
