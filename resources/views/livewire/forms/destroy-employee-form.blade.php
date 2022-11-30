<x-jet-dialog-modal wire:model="open">
    <x-slot name="title">
        {{ __('Delete Modal Title') }}
    </x-slot>

    <x-slot name="content">
        {{ __('Are you sure you want to delete this item?') }}
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$set('open', false)" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-secondary-button>
        <x-jet-danger-button class="ml-3" wire:click="submit" wire:loading.attr="disabled">
            {{ __('Delete Item') }}
        </x-jet-danger-button>
    </x-slot>
</x-jet-dialog-modal>
