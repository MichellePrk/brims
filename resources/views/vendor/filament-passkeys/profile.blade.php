<x-filament::section class="{{ $this->isSimple() ? 'mt-4' : 'mt-0 mb-4' }}">
    <x-slot name="heading">
        {{ __('filament-passkeys::passkeys.passkeys') }}
    </x-slot>

    <x-slot name="description">
        <div class="text-sm text-gray-600 dark:text-gray-400 italic">
            Passkeys let you log in without needing a password. Instead of a password, you can generate a passkey which will be stored in your password manager or browser's secure storage.
        </div>
        {{-- {{ __('filament-passkeys::passkeys.description') }} --}}
    </x-slot>

    <livewire:filament-passkeys />
</x-filament::section>
