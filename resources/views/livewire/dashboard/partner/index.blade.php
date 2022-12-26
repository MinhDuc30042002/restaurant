{{-- <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
    <div class="flex justify-between items-center pb-4 bg-white">
        <x-jet-action-message class="mr-3" on="success">
            {{ __('Password saved, please refresh.') }}
        </x-jet-action-message>
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative">
            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-500 " aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                        clip-rule="evenodd"></path>
                </svg>
            </div>
            <input type="text" wire:model="search" id="table-search-users"
                class="block m-2 p-2 pl-10 w-80 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                placeholder="Search for users">
        </div>
    </div>
    <table class="w-full text-sm text-left text-gray-500 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
            <tr>
                <th scope="col" class="py-3 px-6">
                    {{ __('Name') }}
                </th>
                <th scope="col" class="py-3 px-6">
                    {{ __('Phone number') }}
                </th>
                <th scope="col" class="py-3 px-6">
                    {{ __('Created_at') }}
                </th>
                <th scope="col" class="py-3 px-6">
                    Hành động
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($partner as $item)
                <tr class="bg-white border-b">
                    <th scope="row" class="flex items-center py-4 px-6 text-gray-900 whitespace-nowrap">

                        <div class="pl-3">
                            <a href="#" wire:click="showModalDeatail({{ $item->id }})">
                                <div class="text-base font-semibold">{{ $item->name }}</div>
                            </a>
                            <div class="font-normal text-gray-500">{{ $item->email }}</div>
                        </div>
                    </th>
                    <td class="py-4 px-6">
                        <div class="flex items-center">
                            {{ $item->phone }}
                        </div>
                    </td>
                    <td class="py-4 px-6">
                        {{ $item->created_at }}
                    </td>
                    <td class="py-4 px-6">
                        <x-jet-secondary-button class="" wire:click="showOrder({{ $item->id }})">
                            {{ __('Invoice history') }}
                        </x-jet-secondary-button>
                    </td>
            @endforeach
        </tbody>
    </table>
    {{ $partner->links() }}

    <x-jet-dialog-modal wire:model="orderdetail" maxWidth="4xl">
        <x-slot name="title">
            {{ __('Invoice history') }}
        </x-slot>
        <x-slot name="content">
            <table class="w-full text-sm text-left text-gray-500 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            {{ __('ID') }}
                        </th>
                        <th scope="col" class="py-3 px-6">
                            {{ __('Date') }}
                        </th>
                        <th scope="col" class="py-3 px-6">
                            {{ __('Amount') }}
                        </th>
                        <th scope="col" class="py-3 px-6">
                            {{ __('State') }}
                        </th>
                        <th scope="col" class="py-3 px-6">
                            {{ __('Action') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if (isset($this->modelId))
                        @foreach ($order as $item)
                            <tr class="bg-white border-b">

                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        {{ $item->id }}
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    {{ $item->created_at }}
                                </td>
                                <td class="py-4 px-9">
                                    <div class="flex items-center">
                                        {{ $item->amount }}
                                    </div>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        @if ($item->state == 'Đã hủy')
                                            <span
                                                class="bg-red-100 text-red-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-200 dark:text-red-900">{{ $item->state }}</span>
                                        @elseif($item->state == 'Chờ thanh toán')
                                            <span
                                                class="bg-yellow-100 text-yellow-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-200 dark:text-yellow-900">{{ $item->state }}</span>
                                        @elseif($item->state == 'Đã thanh toán')
                                            <span
                                                class="bg-green-100 text-green-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">{{ $item->state }}</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="py-4 px-6">

                                    <a href="{{ route('partners.show', $item->id) }}">
                                        <x-jet-secondary-button wire:click="">
                                            {{ __('Detail') }}
                                        </x-jet-secondary-button>
                                    </a>
                                    <x-jet-secondary-button wire:click="showUpdateState({{ $item->id }})">
                                        {{ __('Update') }}
                                    </x-jet-secondary-button>
                                    @if ($item->state == 'Đã hủy')
                                        <x-jet-danger-button wire:click="deleteInvoice({{ $item->id }})">
                                            {{ __('Delete') }}
                                        </x-jet-danger-button>
                                    @elseif($item->state == 'Đã thanh toán')
                                    @endif
                                    <x-jet-dialog-modal wire:model="modalConfirmDeleteVisible">
                                        <x-slot name="title">
                                            {{ __('Delete') }}
                                        </x-slot>
                                        <x-slot name="content">
                                            {{ __('Are you sure you want to delete ?') }}
                                        </x-slot>
                                        <x-slot name="footer">
                                            <x-jet-danger-button class="ml-3 mx-4"
                                                wire:click="deleteInvoice({{ $item->id }})"
                                                wire:loading.attr="disabled">
                                                {{ __('Delete') }}
                                            </x-jet-danger-button>
                                            <x-jet-secondary-button
                                                wire:click="$toggle('modalConfirmDeleteVisible')"
                                                wire:loading.attr="disabled">
                                                {{ __('Cancel') }}
                                            </x-jet-secondary-button>
                                        </x-slot>
                                    </x-jet-dialog-modal>

                                </td>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('orderdetail')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>

    <x-jet-dialog-modal wire:model="showState" maxWidth="2xl">
        <x-slot name="title">
            {{ __('Cập nhật trạng thái đơn hàng') }}
        </x-slot>
        <x-slot name="content">
            <label for="state" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Trạng
                thái</label>
            <select id="state" wire:model="state"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Chọn trạng thái</option>
                <option value="Đã thanh toán">Đã thanh toán</option>
                <option value="Chờ thanh toán">Chờ thanh toán</option>
                <option value="Đã hủy">Đã hủy</option>
            </select>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="updateState()">
                {{ __('Cập nhật') }}
            </x-jet-secondary-button>
            <x-jet-secondary-button wire:click="$toggle('showState')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
</div> --}}

<div class="py-6">
    {{-- Tag title --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
        <div class="md:flex md:items-center md:justify-between">
            <div class="flex-1 min-w-0">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">Đơn hàng</h2>
            </div>
            <div class="mt-4 flex md:mt-0">
                <div class="relative">
                    <input type="text" wire:model="search" id="table-search-users"
                        class="block m-2 p-2 w-80 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Tìm kiếm đơn hàng">
                </div>
            </div>
        </div>
    </div>
    <div x-data="{ currentTab: 'orders' }">
        <div class="sm:hidden">
            <label class="block font-medium text-sm text-gray-700 sr-only" for="tabs">
                Select a tab
            </label>
            <select
                class="border border-gray-300 rounded-md focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 block w-full"
                @change="currentTab = $event.target.value" id="tabs">
                <option :selected="currentTab === 'orders'" value="orders" selected="selected">
                    Tất cả đơn hàng
                </option>
                <option :selected="currentTab === 'pending'" value="pending">
                    Chờ xác nhận
                </option>
                <option :selected="currentTab === 'handle'" value="handle">
                    Đã xác nhận
                </option>
            </select>
        </div>
        <div class="hidden sm:block">
            <div class="border-b border-gray-200">
                <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                    <a @click="currentTab = 'orders'" href="javascript:void(0)"
                        class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm border-blue-500 text-blue-500"
                        :class="{
                            'border-blue-500 text-blue-500': currentTab ==
                                'orders',
                            'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': currentTab !=
                                'orders'
                        }">
                        Tất cả đơn hàng
                    </a>

                    <a @click="currentTab = 'pending'" href="javascript:void(0)"
                        class="border-transparent whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm text-gray-500 hover:text-gray-700 hover:border-gray-300"
                        :class="{
                            'border-blue-500 text-blue-500': currentTab ==
                                'pending',
                            'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': currentTab !=
                                'pending'
                        }">
                        Chờ xác nhận
                    </a>
                    <a @click="currentTab = 'handle'" href="javascript:void(0)"
                        class="border-transparent whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm text-gray-500 hover:text-gray-700 hover:border-gray-300"
                        :class="{
                            'border-blue-500 text-blue-500': currentTab ==
                                'handle',
                            'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': currentTab !=
                                'handle'
                        }">
                        Đã xác nhận
                    </a>
                </nav>
            </div>
        </div>

        {{-- Table orders --}}
        <div wire:loading.class='opacity-75' class="bg-white shadow sm:rounded-lg mt-6 -mx-4 sm:-mx-0 overflow-hidden">
            <div class="px-4 py-6 sm:p-6">
                <div class="overflow-x-auto -mx-4 -my-6 sm:-m-6">
                    <div class="align-middle inline-block min-w-full">
                        <div class="overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-slate-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Số thứ tự
                                        </th>
                                        <th scope="col"
                                            class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Tên khách hàng
                                        </th>
                                        <th scope="col"
                                            class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Số điện thoại
                                        </th>
                                        <th scope="col"
                                            class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Trạng thái
                                        </th>
                                        <th scope="col"
                                            class="px-4 sm:px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Số lượng món
                                        </th>
                                        <th scope="col"
                                            class="px-4 sm:px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider tabular-nums">
                                            Tổng tiền
                                        </th>
                                        <th scope="col"
                                            class="px-4 sm:px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Ngày đặt
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    @foreach ($orders as $order)
                                        <tr class="relative hover:bg-slate-50">
                                            <td
                                                class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                <a href="/dashboard/partners/{{ $order->id }}">
                                                    <span class="absolute inset-0"></span>
                                                    #<b>{{ $order->id }}</b>
                                                </a>
                                            </td>
                                            <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                <p class="relative hover:text-blue-600">
                                                    {{ $order->name }}
                                                </p>
                                            </td>
                                            <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                <p class="relative hover:text-blue-600">
                                                    {{ $order->phone }}
                                                </p>
                                            </td>
                                            <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                @if ($order->state === 'Chờ xác nhận')
                                                    <div class="flex items-center space-x-1">
                                                        <span class="block w-2 h-2 rounded-full"
                                                            style="background-color: #fbbf24"></span>
                                                        <span class="pl-2">{{ $order->state }}</span>
                                                    </div>
                                                @else
                                                    <div class="flex items-center space-x-1">
                                                        <span class="block w-2 h-2 rounded-full"
                                                            style="background-color: #327ae5"></span>
                                                        <span class="pl-2">{{ $order->state }}</span>
                                                    </div>
                                                @endif

                                            </td>
                                            <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                {{ $order->lines_count }} món ăn
                                            </td>
                                            <td
                                                class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-right text-gray-900 tabular-nums">
                                                {{ number_format($order->amount, 0, '', '.') }} đ
                                            </td>
                                            <td
                                                class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-right text-gray-900 tabular-nums">
                                                {{ $order->created_at }}
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Pagination Links --}}
    <div class="mt-6">
        <div>
            <nav role="navigation" aria-label="Pagination Navigation"
                class="flex items-center justify-between overflow-x-auto">
                <div class="flex justify-between flex-1 sm:hidden">
                    <span>
                        <span
                            class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md select-none">
                            « Previous
                        </span>
                    </span>

                    <span>
                        <button wire:click="nextPage('page')" wire:loading.attr="disabled" dusk="nextPage.before"
                            class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                            Next »
                        </button>
                    </span>
                </div>

                <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-center">
                    <button wire:click='onScrollLoadMore'
                        class="mt-4 inline-flex items-center justify-center px-4 py-2 bg-blue-100 rounded-md font-medium sm:text-sm text-blue-700 hover:bg-blue-200 active:bg-blue-300 transition w-1/2 mx-auto md:w-auto text-sm">
                        Xem thêm
                    </button>
                </div>
            </nav>
        </div>

    </div>
</div>
