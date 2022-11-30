<div>
    <div class="p-2">
        <x-jet-button class="bg-green-600" wire:click="showModal">
            {{ __('New category') }}
        </x-jet-button>

        <x-jet-action-message class="mr-3" on="storeCategory">
            {{ __('Created.') }}
        </x-jet-action-message>
    </div>

    <div class="overflow-x-auto relative">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 text-center">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        {{ __('ID') }}
                    </th>
                    <th scope="col" class="py-3 px-6">
                        {{ __('Name category') }}
                    </th>
                    <th scope="col" class="py-3 px-6">
                        {{ __('Action') }}
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $category)
                    <tr class="bg-white border-b text-center">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap ">
                            {{ $category->id }}
                        </th>
                        <td class="py-4 px-6">
                            {{ $category->name }}
                        </td>
                        <td class="py-4 px-6">
                            <button wire:click="showModalUpdate({{ $category->id }})" type="button"
                                class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900" ">Sửa</button>
                            <button wire:click="removeCategory({{ $category->id }})" type="button"
                                class="btn-delete focus:outline-none text-white bg-red-400 hover:bg-red-500 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">Xóa</button>
                        </td>
                    </tr>
 @endforeach
            </tbody>
        </table>
        <div class="p-2">
            {{ $data->links() }}
        </div>
    </div>

    <div>
        <x-jet-dialog-modal wire:model="modalDialog">
            <x-slot name="title">
                {{ __('Create new category') }}
            </x-slot>

            <x-slot name="content" class="p-2">
                <x-jet-label class="mb-2">{{ __('Name category') }}</x-jet-label>
                <x-jet-input wire:model="name" class="w-full p-2 border border-gray-600" />
            </x-slot>

            <x-slot name="footer">
                <x-jet-button wire:click="storeCategory">
                    {{ __('Create new category') }}
                </x-jet-button>
            </x-slot>
        </x-jet-dialog-modal>
    </div>

    <div>
        <x-jet-dialog-modal wire:model="modalUpdate">
            <x-slot name="title">
                {{ __('Update category') }}
            </x-slot>

            <x-slot name="content" class="p-2">
                <x-jet-label class="mb-2">{{ __('Name category') }}</x-jet-label>
                <x-jet-input wire:model="name" value="{{ $name }}" class="w-full p-2 border border-gray-600" />
            </x-slot>

            <x-slot name="footer">
                <x-jet-button class="bg-yellow-400" wire:click="updateCategory">
                    {{ __('Update new category') }}
                </x-jet-button>
            </x-slot>
        </x-jet-dialog-modal>
    </div>
</div>
