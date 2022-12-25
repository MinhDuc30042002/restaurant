<div>
    <div class="md:flex md:items-center md:justify-between py-8 p-4">
        <div class="flex-1 min-w-0">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">Nhóm</h2>
        </div>
        <!-- Create Modal -->
        <div class="mt-4 flex md:mt-0 md:ml-4">
            {{-- @can('create', \App\Models\User::class) --}}
            <button wire:click="$emitTo('dashboard.group.store', 'showStoreGroupModal')"
                class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-medium text-white hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 transition sm:text-sm">
                Tạo nhóm mới
            </button>
            {{-- @endcan --}}
            {{-- <a href="{{route('groups.create')}}">
                create
            </a> --}}
        </div>
        <!-- End Create -->
    </div>
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-4">
                        <div class="flex items-center">
                            <input id="checkbox-all" type="checkbox"
                                class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-all" class="sr-only">checkbox</label>
                        </div>
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Nhóm người dùng
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Số quyền hạn
                    </th>
                    <th scope="col" class="py-3 px-6">

                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($groups as $item)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="p-4 w-4">
                            <div class="flex items-center">
                                <input id="checkbox-table-1" type="checkbox"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-table-1" class="sr-only">checkbox</label>
                            </div>
                        </td>
                        <th scope="row"
                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $item->name }}
                        </th>
                        <td class="py-4 px-6">
                            {{ $item->permissions->count() }}
                        </td>
                        <td class="py-4 px-6">
                            {{-- <x-jet-confirmation-modal>
                            {{__('Delete')}}
                        </x-jet-confirmation-modal> --}}

                            <x-jet-button
                                wire:click="$emitTo('dashboard.group.update', 'showUpdateGroupModal', {{ $item->id }})">
                                {{ __('Update') }}
                            </x-jet-button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if (count($groups) >= 10)
            <div class="flex space-x-2 justify-center my-4">
                <button wire:click="buttonShowMore" type="button" class="inline-block px-6 py-2.5 bg-white-600 text-blue font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                    Xem thêm >>
                </button>
              </div>
        @endif

        <livewire:dashboard.group.update />
        <livewire:dashboard.group.store />
    </div>
</div>
