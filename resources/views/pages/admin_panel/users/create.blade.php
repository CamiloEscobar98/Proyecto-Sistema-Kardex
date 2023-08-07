<x-app-layout>
    <x-slot name="header">
        <a href="{{ route('admin_panel.users.index') }}"
            class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            @lang('models/user.form-titles.create')
        </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto mt-10 sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl dark:bg-gray-800 sm:rounded-lg">
                @livewire('admin-panel.users.user-create')
            </div>
        </div>
    </div>
</x-app-layout>
