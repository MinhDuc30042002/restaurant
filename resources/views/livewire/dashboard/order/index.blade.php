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

        <div x-show="currentTab === 'orders'">
            {{-- Table orders --}}
            <div wire:loading.class='opacity-75'
                class="bg-white shadow sm:rounded-lg mt-6 -mx-4 sm:-mx-0 overflow-hidden">
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
                                                    <a href="/dashboard/orders/{{ $action }}/{{ $order->id }}">
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
                                                                style="background-color: #20c929"></span>
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
                                <button wire:click="nextPage('page')" wire:loading.attr="disabled"
                                    dusk="nextPage.before"
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
        {{-- Table orders pending --}}
        <div x-show="currentTab === 'pending'">
            {{-- Table orders --}}
            <div wire:loading.class='opacity-75'
                class="bg-white shadow sm:rounded-lg mt-6 -mx-4 sm:-mx-0 overflow-hidden">
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
                                        @foreach ($orders_pending as $order_pending)
                                            <tr class="relative hover:bg-slate-50">
                                                <td
                                                    class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                    <a href="/dashboard/orders/{{ $action }}/{{ $order->id }}">
                                                        <span class="absolute inset-0"></span>
                                                        #<b>{{ $order_pending->id }}</b>
                                                    </a>
                                                </td>
                                                <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    <p class="relative hover:text-blue-600">
                                                        {{ $order_pending->name }}
                                                    </p>
                                                </td>
                                                <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    <p class="relative hover:text-blue-600">
                                                        {{ $order_pending->phone }}
                                                    </p>
                                                </td>
                                                <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    @if ($order_pending->state === 'Chờ xác nhận')
                                                        <div class="flex items-center space-x-1">
                                                            <span class="block w-2 h-2 rounded-full"
                                                                style="background-color: #fbbf24"></span>
                                                            <span class="pl-2">{{ $order_pending->state }}</span>
                                                        </div>
                                                    @else
                                                        <div class="flex items-center space-x-1">
                                                            <span class="block w-2 h-2 rounded-full"
                                                                style="background-color: #327ae5"></span>
                                                            <span class="pl-2">{{ $order_pending->state }}</span>
                                                        </div>
                                                    @endif

                                                </td>
                                                <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    {{ $order_pending->lines_count }} món ăn
                                                </td>
                                                <td
                                                    class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-right text-gray-900 tabular-nums">
                                                    {{ number_format($order_pending->amount, 0, '', '.') }} đ
                                                </td>
                                                <td
                                                    class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-right text-gray-900 tabular-nums">
                                                    {{ $order_pending->created_at }}
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
                                <button wire:click="nextPage('page')" wire:loading.attr="disabled"
                                    dusk="nextPage.before"
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

        <div x-show="currentTab === 'handle'">
            {{-- Table orders --}}
            <div wire:loading.class='opacity-75'
                class="bg-white shadow sm:rounded-lg mt-6 -mx-4 sm:-mx-0 overflow-hidden">
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
                                        @foreach ($orders_handle as $order_handle)
                                            <tr class="relative hover:bg-slate-50">
                                                <td
                                                    class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                    <a href="/dashboard/orders/{{ $action }}/{{ $order->id }}">
                                                        <span class="absolute inset-0"></span>
                                                        #<b>{{ $order_handle->id }}</b>
                                                    </a>
                                                </td>
                                                <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    <p class="relative hover:text-blue-600">
                                                        {{ $order_handle->name }}
                                                    </p>
                                                </td>
                                                <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    <p class="relative hover:text-blue-600">
                                                        {{ $order_handle->phone }}
                                                    </p>
                                                </td>
                                                <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    @if ($order_handle->state === 'Chờ xác nhận')
                                                        <div class="flex items-center space-x-1">
                                                            <span class="block w-2 h-2 rounded-full"
                                                                style="background-color: #fbbf24"></span>
                                                            <span class="pl-2">{{ $order_handle->state }}</span>
                                                        </div>
                                                    @else
                                                        <div class="flex items-center space-x-1">
                                                            <span class="block w-2 h-2 rounded-full"
                                                                style="background-color: #20c929"></span>
                                                            <span class="pl-2">{{ $order_handle->state }}</span>
                                                        </div>
                                                    @endif

                                                </td>
                                                <td class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                    {{ $order_handle->lines_count }} món ăn
                                                </td>
                                                <td
                                                    class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-right text-gray-900 tabular-nums">
                                                    {{ number_format($order_handle->amount, 0, '', '.') }} đ
                                                </td>
                                                <td
                                                    class="px-4 sm:px-6 py-4 whitespace-nowrap text-sm text-right text-gray-900 tabular-nums">
                                                    {{ $order_handle->created_at }}
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
                                <button wire:click="nextPage('page')" wire:loading.attr="disabled"
                                    dusk="nextPage.before"
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
    </div>
</div>
