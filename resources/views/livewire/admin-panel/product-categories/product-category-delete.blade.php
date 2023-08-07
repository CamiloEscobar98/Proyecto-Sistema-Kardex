<div>
    <button wire:click="$set('modal', true)" class="px-3 py-1 text-center text-white bg-red-600 rounded-r-xl">
        <i class="fas fa-xs fa-trash"></i>
    </button>

    <x-confirmation-modal wire:model='modal'>
        <x-slot name="title">
        </x-slot>
        <x-slot name="content">
            <p class="font-bold uppercase">@lang('models/product_category.messages.confirm_delete')</p>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('modal')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button class="ml-3" wire:click="delete" wire:loading.attr="disabled">
                {{ __('Delete') }}
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>
</div>
