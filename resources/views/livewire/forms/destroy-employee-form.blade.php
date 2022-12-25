<x-jet-confirmation-modal wire:model="open">
    <x-slot name="title">
        Xóa Tài Khoản
    </x-slot>

    <x-slot name="content">
        Bạn có chắc rằng bạn muốn xóa tài khoản của bạn? Khi tài khoản bị xóa, tất cả các tài nguyên và dữ liệu của nó sẽ bị xóa vĩnh viễn.
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$set('open', false)" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-secondary-button>
        <x-jet-danger-button class="ml-3" wire:click="submit" wire:loading.attr="disabled">
            {{ __('Delete') }}
        </x-jet-danger-button>
    </x-slot>
</x-jet-confirmation-modal>
