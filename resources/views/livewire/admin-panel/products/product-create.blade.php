<div class="p-4">
    <form wire:submit.prevent='save'>
        <!-- ProductCategory -->
        <div class="mb-4">
            <x-label value="{{ __('models/product.attributes.product_category_id') }}" class="block" />
            <x-select class="w-full" wire:model='product_category_id'>
                <x-slot name="options">
                    @foreach ($productCategories as $index => $productCategoryName)
                        <option value="{{ $index }}">{{ $productCategoryName }}</option>
                    @endforeach
                </x-slot>
            </x-select>
            <x-input-error for="product_category_id" />
        </div>
        <!-- ./ProductCategory -->

        <!-- Name -->
        <div class="mb-4">
            <x-label value="{{ __('models/product.attributes.name') }}" />
            <x-input class="w-full" type="text" wire:model='name' />
            <x-input-error for="name" />
        </div>
        <!-- ./Name -->

        <!-- Description -->
        <div class="mb-4">
            <x-label value="{{ __('models/product.attributes.description') }}" />
            <x-textarea class="w-full" wire:model='description'>
            </x-textarea>
            <x-input-error for="description" />
        </div>
        <!-- ./Description -->

        <!-- Price -->
        <div class="mb-4">
            <x-label value="{{ __('models/product.attributes.price') }}" />
            <x-input type="number" class="w-full" type="number" step="any" wire:model='price' />
            <x-input-error for="price" />
        </div>
        <!-- ./Price -->

        <!-- Stock -->
        <div class="mb-4">
            <x-label value="{{ __('models/product.attributes.stock') }}" />
            <x-input type="number" class="w-full" type="number" wire:model='stock' />
            <x-input-error for="stock" />
        </div>
        <!-- ./Stock -->

        <div class="flex justify-end mt-6">
            <x-secondary-button type='submit'>
                @lang('buttons.save')
            </x-secondary-button>
        </div>
    </form>
</div>
<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}
</div>
