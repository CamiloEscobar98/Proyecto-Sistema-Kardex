<div class="p-4">
    <form wire:submit.prevent='update'>
        <!-- Name -->
        <div class="mb-4">
            <x-label value="{{ __('models/user.attributes.name') }}" />
            <x-input class="w-full" type="text" wire:model='name' />
            <x-input-error for="name" />
        </div>
        <!-- ./Name -->

        <!-- Email -->
        <div class="mb-4">
            <x-label value="{{ __('models/user.attributes.email') }}" />
            <x-input class="w-full" type="email" wire:model='email' />
            <x-input-error for="email" />
        </div>
        <!-- ./Email -->

        <div class="flex justify-end mt-6">
            <x-secondary-button type='submit'>
                @lang('buttons.save')
            </x-secondary-button>
        </div>
    </form>
</div>
