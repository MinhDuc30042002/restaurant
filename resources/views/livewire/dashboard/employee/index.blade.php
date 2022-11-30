<div class="overflow-x-auto relative shadow-md sm:rounded-lg">
    <div class="flex justify-between items-center pb-4 bg-white dark:bg-gray-900">

        <!--Action -->

        <div class="w-2/12">
            <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction"
                class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                type="button">
                <span class="sr-only">Action button</span>
                Export Excel
                <svg class="ml-2 w-3 h-3" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            <!-- Dropdown menu -->
            <div id="dropdownAction"
                class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownActionButton">
                    <li>
                        <a wire:click="exportIsRoleToExcel()"
                            class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                            Export Excel (Tất cả)
                        </a>
                    </li>
                    <li>
                        <a wire:click="exportIsRoleToExcel('is_staff')"
                            class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                            Export Excel (Nhân viên)
                        </a>
                    </li>
                    <li>
                        <a wire:click="exportIsRoleToExcel('is_manager')"
                            class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                            Export Excel (Quản lý)
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!--End Action -->

        <!--SelectedRows -->

        <div class="w-4/12">
            <button id="dropdownDefault" data-dropdown-toggle="dropdown" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">Hành động <svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
            <!-- Dropdown menu -->
            <div id="dropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                    <li>
                        <a wire:click="deleteSelectedRows" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Xóa mục đã chọn</a>
                    </li>
                </ul>
            </div>
            <label>đã chọn {{count($selectedRows)}}</label>

        </div>

        <!-- End SelectedRows -->




        <!-- Create Modal -->
        <div class="w-1/12">
            @can('create', \App\Models\User::class)
            <x-jet-button wire:click="$emitTo('forms.store-employee-form', 'showStoreUserForm')">
                {{ __('Create Employee') }}
            </x-jet-button>
            @endcan
        </div>
        <!-- End Create -->

        <!-- Filter By Role -->

        <div class="inline-flex rounded-md shadow-sm" role="group">
            <button wire:click="$set('filteredRole', '')" type="button"
                class="py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-l-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                Tất cả ({{ $employeesCount }})
            </button>
            <button wire:click="$set('filteredRole', 'is_staff')" type="button"
                class="py-2 px-4 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                Nhân viên ({{ $staffsCount }})
            </button>
            <button wire:click="$set('filteredRole', 'is_manager')" type="button"
                class="py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-r-md border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                Quản lý ({{ $managersCount }})
            </button>
        </div>

        <!-- End Filter By Role -->

        <label for="table-search" class="sr-only">Search</label>
        <div class="relative">
            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor"
                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
            <input type="text" id="table-search-users" wire:model="searchTerm"
                class="block p-2 pl-10 w-80 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Search for users">
        </div>
    </div>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="p-4">
                    <div class="flex items-center">
                        <input wire:model="selectPageRows" id="checkbox-all-search" type="checkbox"
                            class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-all-search" class="sr-only">checkbox</label>
                    </div>
                </th>
                <th scope="col" class="py-3 px-6">
                    Họ tên
                </th>
                <th scope="col" class="py-3 px-6">
                    Vai trò
                </th>
                <th scope="col" class="py-3 px-6">
                    Ngày tham gia
                </th>
                <th scope="col" class="py-3 px-6">
                    Hành động
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $emp)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="p-4 w-4">
                        <div class="flex items-center">
                            <input wire:model="selectedRows" id="{{ $emp->id }}" value="{{ $emp->id }}"
                                type="checkbox"
                                class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="{{ $emp->id }}" class="sr-only">checkbox</label>
                        </div>
                    </td>
                    <th scope="row"
                        class="flex items-center py-4 px-6 text-gray-900 whitespace-nowrap dark:text-white">
                        <img class="w-10 h-10 rounded-full"
                            src="https://img-s-msn-com.akamaized.net/tenant/amp/entityid/AA14FPFo.img?w=600&h=788&m=6&x=227&y=116&s=93&d=93"
                            alt="">
                        <div class="pl-3">
                            <div class="text-base font-semibold">{{ $emp->name }}</div>
                            <div class="font-normal text-gray-500">{{ $emp->email }}</div>
                        </div>
                    </th>
                    <td class="py-4 px-6">
                        @if($emp->is_staff) Nhân Viên @else Quản lý @endif
                    </td>
                    <td class="py-4 px-6">
                        <div class="flex items-center">
                            {{-- <div class="h-2.5 w-2.5 rounded-full bg-green-400 mr-2"></div> Online --}}
                            {{$emp->created_at->format('d/m/Y')}}
                        </div>
                    </td>
                    <td class="py-4 px-6">
                        @can('delete', \App\Models\User::class)
                        <!-- Button Delete -->
                            <x-jet-danger-button wire:click="deleteShowModal({{$emp->id}})">
                                {{__('Delete')}}
                            </x-jet-danger-button>
                        <!-- End Button Delete -->
                        @endcan
                        @can('update', \App\Models\User::class)
                        <!-- Button Update -->
                            <x-jet-button wire:click="$emitTo('forms.update-employee-form', 'showUpdateUserForm', {{$emp->id}})" >
                                {{__('Update')}}
                            </x-jet-button>
                        <!-- End Button Update -->
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="p-4">
        {{ $employees->links()}}
    </div>

    <!-- Delete Modal -->
    <x-jet-dialog-modal wire:model="modalConfirmDeleteVisible">
        <x-slot name="title">
            {{ __('Delete Modal Title') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete this item?') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalConfirmDeleteVisible')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
            <x-jet-danger-button class="ml-3" wire:click="delete" wire:loading.attr="disabled">
                {{ __('Delete Item') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
    <!-- End Delete Modal -->
    <!-- Update Modal -->
    <livewire:forms.update-employee-form>
    <!-- End Update Modal -->

    <!-- Create Modal -->
    <livewire:forms.store-employee-form>
     <!-- End Create Modal -->
</div>



