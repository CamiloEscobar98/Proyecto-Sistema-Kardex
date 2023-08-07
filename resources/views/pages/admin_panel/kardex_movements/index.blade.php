<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            @lang('models/kardex_movement.title')
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-screen-xl mx-auto sm:px-6 lg:px-8">
            <x-button-link class="mb-4" href="{{ route('admin_panel.kardex_movements.create') }}">
                @lang('buttons.add')
            </x-button-link>
            <div class="overflow-hidden bg-white shadow-xl dark:bg-gray-800 sm:rounded-lg">
                @livewire('admin-panel.kardex-movements.kardex-movement-filter')
            </div>
        </div>
        <div class="max-w-screen-xl mx-auto mt-10 sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl dark:bg-gray-800 sm:rounded-lg">
                @livewire('admin-panel.kardex-movements.kardex-movement-list', compact('kardexMovements'))
            </div>
        </div>
    </div>
</x-app-layout>
