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
            <x-jet-button wire:click="showCreateModal">
                {{ __('Create Employee') }}
            </x-jet-button>
            @endcan
        </div>
        <!-- End Create -->

        <!-- Filter By Role -->

        <div class="inline-flex rounded-md shadow-sm" role="group">
            <button wire:click="resetPage" type="button"
                class="py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-l-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                Tất cả ({{ $userCount }})
            </button>
            <button wire:click="filterUserByRole('is_staff')" type="button"
                class="py-2 px-4 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                Nhân viên ({{ $isStaffCount }})
            </button>
            <button wire:click="filterUserByRole('is_manager')" type="button"
                class="py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-r-md border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                Quản lý ({{ $isManagerCount }})
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
            @foreach ($user as $item)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="p-4 w-4">
                        <div class="flex items-center">
                            <input wire:model="selectedRows" id="{{ $item->id }}" value="{{ $item->id }}"
                                type="checkbox"
                                class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="{{ $item->id }}" class="sr-only">checkbox</label>
                        </div>
                    </td>
                    <th scope="row"
                        class="flex items-center py-4 px-6 text-gray-900 whitespace-nowrap dark:text-white">
                        <img class="w-10 h-10 rounded-full"
                            src="https://img-s-msn-com.akamaized.net/tenant/amp/entityid/AA14FPFo.img?w=600&h=788&m=6&x=227&y=116&s=93&d=93"
                            alt="">
                        <div class="pl-3">
                            <div class="text-base font-semibold">{{ $item->name }}</div>
                            <div class="font-normal text-gray-500">{{ $item->email }}</div>
                        </div>
                    </th>
                    <td class="py-4 px-6">
                        @if($item->is_staff) Nhân Viên @else Quản lý @endif
                    </td>
                    <td class="py-4 px-6">
                        <div class="flex items-center">
                            {{-- <div class="h-2.5 w-2.5 rounded-full bg-green-400 mr-2"></div> Online --}}
                            {{$item->created_at->format('d/m/Y')}}
                        </div>
                    </td>
                    <td class="py-4 px-6">
                        @can('delete', \App\Models\User::class)
                        <!-- Button Delete -->
                            <x-jet-danger-button wire:click="deleteShowModal({{$item->id}})">
                                {{__('Delete')}}
                            </x-jet-danger-button>
                        <!-- End Button Delete -->
                        @endcan
                        @can('update', \App\Models\User::class)
                        <!-- Button Update -->
                            <x-jet-button wire:click="updateShowModal({{$item->id}})">
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
        {{ $user->links()}}
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
    <x-jet-dialog-modal wire:model="modalUpdateFormVisible">
        <x-slot name="title">
            {{ __('Update User') }}
        </x-slot>
        <x-slot name="content">
            <form>
                <div class="relative z-0 mb-6 w-full group">
                    <input type="text" wire:model="name" id="" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Họ Tên</label>
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <input type="email" wire:model="email" id="floating_email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
                </div>
            </form>
        </x-slot>
        <x-slot name="footer">
            <x-jet-button wire:click="$toggle('modalUpdateFormVisible')">
                {{ __('Close') }}
            </x-jet-button>
            <x-jet-button wire:click="update" class="ml-1">
                {{ __('Update') }}
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

    <!-- End Update Modal -->

    <!-- Create Modal -->
    <x-jet-dialog-modal wire:model="modalCreateFormVisible">
        <x-slot name="title">
            {{ __('Create Employee') }}
        </x-slot>
        <x-slot name="content">
            <form>
                <div class="relative z-0 mb-6 w-full group">
                    <input type="text" wire:model="name" id="" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Họ Tên</label>
                    @error('name') <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span class="font-medium"> {{ $message }}</span></p> @enderror

                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <input type="email" wire:model="email" id="floating_email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                    <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
                    @error('email')<p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span class="font-medium">{{ $message }}</span> </p> @enderror
                </div>
                <div class="relative z-0 mb-6 w-full group">
                    <label class="inline-flex relative items-center cursor-pointer">
                    <input type="checkbox" wire:model="is_manager" value="1" class="sr-only peer">
                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                    <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Quản lý</span>
                    </label>
                    <label class="inline-flex relative items-center cursor-pointer">
                    <input type="checkbox" wire:model="is_staff" value="1" class="sr-only peer">
                    <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                    <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Nhân viên</span>
                    </label>
                </div>

            </form>
        </x-slot>
        <x-slot name="footer">
            <x-jet-button wire:click="$toggle('modalCreateFormVisible')">
                {{ __('Close') }}
            </x-jet-button>
            <x-jet-secondary-button wire:click="create" class="text-white bg-blue-700 ml-1">{{__('Create')}}</x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>

     <!-- End Create Modal -->
</div>



