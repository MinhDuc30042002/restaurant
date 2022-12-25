<div>
    <div class="md:flex md:items-center md:justify-between py-8 p-4">
        <div class="flex-1 min-w-0">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">Thể loại món ăn</h2>
        </div>
        <!-- Create Modal -->
        <div class="mt-4 flex md:mt-0 md:ml-4">
            @can('create', \App\Models\User::class)
                <button wire:click="showModal"
                    class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-medium text-white hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 transition sm:text-sm">
                    Thêm thể loại mới
                </button>
            @endcan
        </div>
        <!-- End Create -->
    </div>
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="overflow-x-auto relative">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 text-center">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            STT
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Tên thể loại
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Số lượng món ăn
                        </th>
                        <th scope="col" class="py-3 px-6">
                            {{ __('Action') }}
                        </th>
                    </tr>
                </thead>

                <tbody wire:loading.class="opacity-50">
                    @foreach ($data as $category)
                        <tr class="bg-white border-b text-center">
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap ">
                                {{ $loop->iteration }}
                            </th>
                            <td class="py-4 px-6">
                                <span class="text-base font-semibold">
                                    {{ $category->name }}
                                </span>
                            </td>
                            <td class="py-4 px-6">
                                <button
                                    class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                                    wire:click="showFood({{ $category->id }})">{{ $category->foods_count }}
                                </button>
                            </td>
                            <td class="py-4 px-6">
                                <button wire:click="showModalUpdate({{ $category->id }})" type="button"
                                    class="text-gray-600 hover:text-red-700">
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                        </path>
                                    </svg>
                                </button>
                                <button wire:click="removeCategory({{ $category->id }})" type="button"
                                    class="text-gray-600 hover:text-red-700">
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                        </path>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="p-2">
                {{ $data->links() }}
            </div>
        </div>
    </div>


    <div>
        <x-jet-dialog-modal wire:model="modalDialog">
            <x-slot name="title">
                Tạo mới thể loại
            </x-slot>

            <x-slot name="content" class="p-2">
                <x-jet-label class="mb-2">Tên thể loại</x-jet-label>
                <x-jet-input wire:model="name" class="w-full p-2 border border-gray-600" />
                @error('name')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </x-slot>

            <x-slot name="footer">
                <x-jet-button wire:click="storeCategory">
                    {{ __('Create') }}
                </x-jet-button>
            </x-slot>
        </x-jet-dialog-modal>
    </div>

    <div>
        <x-jet-dialog-modal wire:model="modalUpdate">
            <x-slot name="title">
                Sửa thể loại <label class="font-semibold text-gray">{{ $name }}</label>
            </x-slot>

            <x-slot name="content" class="p-2">
                <x-jet-label class="mb-2">Tên thể loại</x-jet-label>
                <x-jet-input wire:model="name" value="{{ $name }}" class="w-full p-2 border border-gray-600" />
                @error('name')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$set('modalUpdate', false)" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
                <x-jet-button class="bg-blue-400 ml-2" wire:click="updateCategory">
                    {{ __('Update') }}
                </x-jet-button>
            </x-slot>
        </x-jet-dialog-modal>
    </div>

    <div>
        <x-jet-confirmation-modal wire:model="modalDelete">
            <x-slot name="title">
            </x-slot>

            <x-slot name="content">
                Bạn có chắc rằng bạn muốn xóa? Khi bị xóa, tất cả các tài nguyên và dữ liệu của nó sẽ bị xóa vĩnh viễn.
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$set('modalDelete', false)" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
                <x-jet-danger-button class="ml-3" wire:click="delete" wire:loading.attr="disabled">
                    {{ __('Delete') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-confirmation-modal>
    </div>
</div>
