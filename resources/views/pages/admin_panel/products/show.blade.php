<x-app-layout>
    <x-slot name="header">
        <a href="{{ route('admin_panel.products.index') }}"
            class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            @lang('models/product.form-titles.edit')
        </a>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl dark:bg-gray-800 sm:rounded-lg">
                @livewire('admin-panel.products.product-edit', compact('product'), key($user->id))
            </div>
        </div>
    </div>
</x-app-layout>
