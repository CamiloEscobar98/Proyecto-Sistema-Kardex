<div class="p-4">
    <form wire:submit.prevent='save'>
        <!-- ProductCategory -->
        <div class="mb-4">
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
        <div class="mb-4">
            <x-label value="{{ __('models/kardex_movement.attributes.product_id') }}" class="block" />
            <x-select class="w-full" wire:model='product_id'>
                <x-slot name="options">
                    @foreach ($products as $index => $productName)
                        <option value="{{ $index }}">{{ $productName }}</option>
                    @endforeach
                </x-slot>
            </x-select>
        </div>
        <!-- ./Product -->

        <!-- Kardex Movement -->
        <div class="mb-4">
            <x-label value="{{ __('models/kardex_movement.attributes.kardex_movement_type') }}" class="block" />
            <x-select class="w-full" wire:model='kardex_movement_type'>
                <x-slot name="options">
                    <option value="0">@lang('models/kardex_movement.enum_data.prepend-values.single')</option>
                    <option value="1">@lang('models/kardex_movement.enum_data.entry')</option>
                    <option value="2">@lang('models/kardex_movement.enum_data.output')</option>
                </x-slot>
            </x-select>
            <x-input-error for="kardex_movement_type" />
        </div>
        <!-- ./Kardex Movement -->

        <!-- Affected Units -->
        <div class="mb-4">
            <x-label value="{{ __('models/kardex_movement.attributes.affected_units') }}" />
            <x-input type="number" class="w-full" type="number" wire:model='affected_units' />
            <x-input-error for="affected_units" />
        </div>
        <!-- ./Affected Units -->

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
