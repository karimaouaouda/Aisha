<x-filament-panels::page>

    @if (Laravel\Fortify\Features::canUpdateProfileInformation())
        @livewire('profile.update-profile-information-form')
    @endif

    <x-filament::section collapsible collapsed>
        <x-slot name="heading">
            add your Address
        </x-slot>

        <x-slot name="description">
            adding your address help <span class="text-sky-500 font-semibold">AISHA</span> make experience more
            powerfull
        </x-slot>

        <form wire:submit="create">
            {{ $this->address }}

            <div class="w-full mt-4 flex justify-end">
                <button class="px-4 py-2 text-white bg-blue-500 hover:bg-indigo-600 anim-300 rounded-md">
                    save
                </button>
            </div>
        </form>

        <x-filament-actions::modals />
    </x-filament::section>

    @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
        @livewire('profile.update-password-form')
    @endif

    @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
        @livewire('profile.two-factor-authentication-form')
    @endif


    @livewire('profile.logout-other-browser-sessions-form')

    @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
        <x-section-border />

        @livewire('profile.delete-user-form') 
    @endif

</x-filament-panels::page>
