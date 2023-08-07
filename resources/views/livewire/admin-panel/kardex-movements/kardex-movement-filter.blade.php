<div
    class="p-6 bg-white border-b border-gray-200 lg:p-8 dark:bg-gray-800 dark:bg-gradient-to-bl dark:from-gray-700/50 dark:via-transparent dark:border-gray-700">

    <x-section-title>
        <x-slot name='title'>
            @lang('models/default.filters')
        </x-slot>
    </x-section-title>
    <form wire:submit.prevent='search' method="get">
        <div class="grid gap-4 pb-4 lg:grid-cols-3">
            <!-- ProductCategory -->
            <div class="w-full">
                <x-label value="{{ __('models/product.attributes.product_category_id') }}" class="block" />
                <x-select class="w-full" wire:model='product_category_id' wire:change='loadProducts'>
                    <x-slot name="options">
                        @foreach ($productCategories as $index => $productCategoryName)
                            <option value="{{ $index }}">{{ $productCategoryName }}</option>
                        @endforeach
                    </x-slot>
                </x-select>
            </div>
            <!-- ./ProductCategory -->

            <!-- Product -->
            <div class="w-full">
                <x-label value="{{ __('models/kardex_movement.attributes.productid') }}" class="block" />
                <x-select class="w-full" wire:model='product_id'>
                    <x-slot name="options">
                        @foreach ($products as $index => $productName)
                            <option value="{{ $index }}">{{ $productName }}</option>
                        @endforeach
                    </x-slot>
                </x-select>
            </div>
            <!-- ./Product -->

            <!-- Name -->
            <div class="w-full">
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
