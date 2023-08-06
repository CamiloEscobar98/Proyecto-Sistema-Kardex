<div class="p-4">
    <form wire:submit.prevent='update'>
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
<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
</div>
