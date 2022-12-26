<div>
    <div class="md:flex md:items-center md:justify-between py-8 p-4">
        <div class="flex-1 min-w-0">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">Nhân sự</h2>
        </div>
        <!-- Create Modal -->
        <div class="mt-4 flex md:mt-0 md:ml-4">
            @can('create', \App\Models\User::class)
                <button wire:click="$emitTo('forms.store-employee-form', 'showStoreUserForm')"
                    class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-medium text-white hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 transition sm:text-sm">
                    {{ __('Create Employee') }}
                </button>
            @endcan
        </div>
        <!-- End Create -->
    </div>
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
            <div class="flex p-2 justify-between items-center pb-4 bg-white dark:bg-gray-900">

                <!--Action -->

                <div class="w-2/12">
                    <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction"
                        class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                        type="button">
                        <span class="sr-only">Action button</span>
                        Export Excel
                        <svg class="ml-2 w-3 h-3" aria-hidden="true" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownAction"
                        class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="dropdownActionButton">
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

                <!-- Filter By Group -->
                <div class="w-2/12">
                    <button id="multiLevelDropdownButton" data-dropdown-toggle="dropdown"
                        class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                        type="button">Hiện theo <svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg></button>
                    <!-- Dropdown menu -->
                    <div id="dropdown"
                        class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                            aria-labelledby="multiLevelDropdownButton">
                            @foreach ($list_group as $item)
                                <li>
                                    <a wire:click="$set('filteredGroup', {{ $item->id }})"
                                        class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                        {{ $item->name }}
                                        {{-- <span class="bg-yellow-700 text-white text-xs font-semibold mr-2 px-2.5 py-0.5 rounded-full dark:bg-blue-200 dark:text-blue-800">@dump($filteredGroup)</span> --}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- End Filter By Group -->

                <!--SelectedRows -->
                <div class="w-2/12">
                    @if ($selectedRows)
                        <button type="button" wire:click="deleteSelectedRows"
                            class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Xóa</button>
                        <label>{{ count($selectedRows) }} đã chọn</label>
                    @endif
                </div>
                <!-- End SelectedRows -->

                <!-- Filter By Role -->
                <div class="w-5/12 inline-flex rounded-md shadow-sm" role="group">
                    <button wire:click="resetAll()" type="button"
                        class="py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-l-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                        Tất cả <span
                            class="bg-blue-700 text-white text-xs font-semibold mr-2 px-2.5 py-0.5 rounded-full dark:bg-blue-200 dark:text-blue-800">{{ $employeesCount }}</span>
                    </button>
                    <button wire:click="$set('filteredRole', 'is_staff')" type="button"
                        class="py-2 px-4 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                        Nhân viên
                        <span
                            class="bg-red-700 text-white text-xs font-semibold mr-2 px-2.5 py-0.5 rounded-full dark:bg-blue-200 dark:text-blue-800">{{ $staffsCount }}</span>
                    </button>
                    <button wire:click="$set('filteredRole', 'is_manager')" type="button"
                        class="py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-r-md border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                        Quản lý
                        <span
                            class="bg-yellow-700 text-white text-xs font-semibold mr-2 px-2.5 py-0.5 rounded-full dark:bg-blue-200 dark:text-blue-800">{{ $managersCount }}</span>
                    </button>
                </div>
                <!-- End Filter By Role -->

                <!-- Search -->
                <div class="">
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
                <!-- End Search -->
            </div>
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="p-4">
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Họ tên
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Vai trò
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Chức vụ
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Ngày tham gia
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Hành động
                        </th>
                    </tr>
                </thead>
                <tbody wire:loading.class="opacity-50">
                    @foreach ($employees as $emp)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="p-4 w-4">
                                <div class="flex items-center">
                                    <input wire:model="selectedRows" id="{{ $emp->id }}"
                                        value="{{ $emp->id }}" type="checkbox"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="{{ $emp->id }}" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <th scope="row"
                                class="flex items-center py-4 px-6 text-gray-900 whitespace-nowrap dark:text-white">
                                @if ($emp->profile_photo_path)
                                    <img class="w-10 h-10 rounded-full"
                                        src="{{asset($emp->profile_photo_path)}}"
                                        alt="">
                                @else
                                    <div
                                        class="overflow-hidden relative w-10 h-10 bg-gray-100 rounded-full dark:bg-gray-600">
                                        <svg class="absolute -left-1 w-12 h-12 text-gray-400" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </div>
                                @endif
                                <div class="pl-3">
                                    <div class="text-base font-semibold">{{ $emp->name }}</div>
                                    <div class="font-normal text-gray-500">{{ $emp->email }}</div>
                                </div>
                            </th>
                            <td class="py-4 px-6">
                                @if ($emp->is_manager)
                                    Quản lý
                                @endif
                                @if ($emp->is_staff)
                                    Nhân viên
                                @endif
                                @if ($emp->is_manager == false && $emp->is_staff == false)
                                    Người dùng
                                @endif
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    {{-- <div class="h-2.5 w-2.5 rounded-full bg-green-400 mr-2"></div> Online --}}
                                    @foreach ($emp->groups as $item1)
                                        {{ $item1->name }}
                                    @endforeach
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    {{-- <div class="h-2.5 w-2.5 rounded-full bg-green-400 mr-2"></div> Online --}}
                                    {{ $emp->created_at->format('d/m/Y') }}
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                @can('delete', \App\Models\User::class)
                                    <!-- Button Delete -->
                                    <button class="text-gray-600 hover:text-red-700"
                                        wire:click="$emitTo('forms.destroy-employee-form', 'showDestroyUserForm', {{ $emp->id }})">
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                            </path>
                                        </svg>
                                    </button>
                                    <!-- End Button Delete -->
                                @endcan
                                @can('update', \App\Models\User::class)
                                    <!-- Button Update -->
                                    <button class="text-gray-600 hover:text-blue-700"
                                        wire:click="$emitTo('forms.update-employee-form', 'showUpdateUserForm', {{ $emp->id }})">
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                            </path>
                                        </svg>
                                    </button>
                                    <!-- End Button Update -->
                                @endcan
                                <!-- Button Show -->
                                <button class="text-gray-600 hover:text-blue-700"
                                    wire:click="$emitTo('forms.show-employee-form', 'showUserForm', {{ $emp->id }})">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                        </path>
                                    </svg>
                                </button>
                                <!-- End Button Show -->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if (count($employees) >= 10)
                <div class="flex space-x-2 justify-center my-4">
                    <button wire:click="loadMoreFoods" type="button"
                        class="inline-block px-6 py-2.5 bg-white-600 text-blue font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">
                        Xem thêm >>
                    </button>
                </div>
            @endif

            <!-- Delete Modal -->
            <livewire:forms.destroy-employee-form>
                <!-- End Delete Modal -->
                <!-- Update Modal -->
                <livewire:forms.update-employee-form>
                    <!-- End Update Modal -->

                    <!-- Create Modal -->
                    <livewire:forms.store-employee-form />
                    <!-- End Create Modal -->

                    <!-- Show Modal Form -->
                    <livewire:forms.show-employee-form />
                    <!-- End Show-->
        </div>
    </div>
</div>
