<div
    class="p-6 bg-white border-b border-gray-200 lg:p-8 dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent dark:border-gray-700">

    <x-section-title>
        <x-slot name='title'>
            @lang('models/default.filters')
        </x-slot>
    </x-section-title>
    <form wire:submit.prevent='search' method="get">
        <div class="grid gap-4 pb-4 lg:grid-cols-1">
            <!-- Name -->
            <div>
                <x-label value="{{ __('models/product_category.attributes.name') }}" class="block" />
                <x-input type="text" class="block w-full" wire:model="name" />
            </div>
            <!-- ./Name -->
        </div>

        <x-button class="rounded-xl">
            @lang('buttons.search')
        </x-button>
    </form>

</div>
