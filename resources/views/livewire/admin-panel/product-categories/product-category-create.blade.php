<div class="p-4">
    <form wire:submit.prevent='save'>
        <!-- Name -->
        <div class="mb-4">
            <x-label value="{{ __('models/product_category.attributes.name') }}" />
            <x-input class="w-full" type="text" wire:model='name' />
            <x-input-error for="name" />
        </div>
        <!-- ./Name -->

        <div class="flex justify-end mt-6">
            <x-secondary-button type='submit'>
                @lang('buttons.save')
            </x-secondary-button>
        </div>
    </form>
</div>
