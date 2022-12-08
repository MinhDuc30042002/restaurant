<div>
    <div class="p-2">
        <x-jet-button class="bg-green-600" wire:click="showModal">
            {{ __('New category') }}
        </x-jet-button>

        @if ($action['saved'])
            <span id="badge-dismiss-green"
                class="float-right inline-flex items-center py-1 px-2 mr-2 text-sm font-medium text-green-800 bg-green-100 rounded dark:bg-green-200 dark:text-green-800">
                Add item successfully.
                <button wire:click="hiddenSaved" type="button"
                    class="inline-flex items-center p-0.5 ml-2 text-sm text-green-400 bg-transparent rounded-sm hover:bg-green-200 hover:text-green-900 dark:hover:bg-green-300 dark:hover:text-green-900"
                    data-dismiss-target="#badge-dismiss-green" aria-label="Remove">
                    <svg aria-hidden="true" class="w-3.5 h-3.5" aria-hidden="true" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Remove badge</span>
                </button>
            </span>
        @endif

    </div>

    <div class="overflow-x-auto relative">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 text-center">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        {{ __('ID') }}
                    </th>
                    <th scope="col" class="py-3 px-6">
                        {{ __('Name') }}
                    </th>
                    <th scope="col" class="py-3 px-6">
                        {{ __('Foods') }}
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
                            <x-jet-button wire:click="showFood({{ $category->id }})">{{ $category->foods_count }}
                            </x-jet-button>
                        </td>
                        <td class="py-4 px-6">
                            <button wire:click="showModalUpdate({{ $category->id }})" type="button"
                                class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-100">Sửa</button>
                            <button wire:click="removeCategory({{ $category->id }})" type="button"
                                class="btn-delete focus:outline-none text-white bg-red-400 hover:bg-red-500 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-100">Xóa</button>
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
                @error('name')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
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
