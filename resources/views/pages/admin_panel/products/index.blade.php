<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            @lang('models/product.title')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <x-button-link class="mb-4" href="{{ route('admin_panel.product_categories.create') }}">
                @lang('buttons.add')
            </x-button-link>
            <div class="overflow-hidden bg-white shadow-xl dark:bg-gray-800 sm:rounded-lg">
                @livewire('admin-panel.products.product-filter')
            </div>
        </div>
        <div class="mx-auto mt-10 max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl dark:bg-gray-800 sm:rounded-lg">
                @livewire('admin-panel.products.product-list', compact('products'))
            </div>
        </div>
    </div>
</x-app-layout>
