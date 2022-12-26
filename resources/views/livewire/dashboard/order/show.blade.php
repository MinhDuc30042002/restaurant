<div class="py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
        <div class="md:flex md:items-center md:justify-between">
            <div class="flex-1 min-w-0">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                    Đơn hàng: #{{ $order_detail->id }}
                </h2>
                <div class="mt-1 flex flex-col sm:flex-row sm:flex-wrap sm:mt-0 sm:space-x-6">
                    <div class="mt-2 flex items-center text-sm text-gray-500">
                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg> {{ $order_detail->created_at }}
                    </div>
                    <div class="mt-2 flex items-center text-sm text-gray-500 space-x-1">
                        @if ($order_detail->state == 'Đã xác nhận')
                            <span class="block w-2 h-2 rounded-full" style="background-color: #20c929"></span>
                            <span>{{ $order_detail->state }}</span>
                        @else
                            <span class="block w-2 h-2 rounded-full" style="background-color: #fbbf24"></span>
                            <span>{{ $order_detail->state }}</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-5 flex mx-auto gap-4">
            <div class="mt-6 w-4/6 mx-auto">
                <div class="bg-white shadow sm:rounded-lg -mx-4 sm:-mx-0 mb-5 overflow-hidden">
                    <div class="border-b border-gray-200 px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Chi tiết đơn hàng
                        </h3>
                    </div>
                    <div class="px-4 py-6 sm:p-6">
                        <div class="space-y-6 -mx-4 -m-6 sm:-mx-6">
                            <div class="relative overflow-auto">
                                <table class="min-w-full">
                                    <thead>
                                        <tr class="border-b border-gray-200">
                                            <th scope="col"
                                                class="px-3 py-3 sm:px-6 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase">
                                            </th>
                                            <th scope="col"
                                                class="mx-auto block w-max px-3 py-3 sm:px-6 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase">
                                                Số lượng
                                            </th>
                                            <th scope="col"
                                                class="mx-auto px-3 py-3 sm:px-6 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase">
                                                Giá
                                            </th>
                                            <th scope="col"
                                                class="mx-auto px-3 py-3 sm:px-6 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase">
                                                Tổng
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200">
                                        @foreach ($order_lines as $key => $line)
                                            <tr>
                                                <td
                                                    class="px-3 py-4 sm:px-6 whitespace-nowrap w-full max-w-sm text-sm text-gray-5">
                                                    <div class="flex items-center">
                                                        <div class="h-10 w-10 flex-shrink-0">
                                                            <img class="h-10 w-10 rounded object-center object-cover"
                                                                src="{{ asset('storage/upload/' . $line->food_image) }}"
                                                                alt="{{ $line->food_image }}">
                                                        </div>
                                                        <div class="ml-4 max-w-xs flex flex-col">
                                                            <div
                                                                class="font-medium text-gray-700 hover:text-blue-700 truncate ...">
                                                                <p>
                                                                    {{ $line->food_name }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td
                                                    class="px-3 py-4 sm:px-6 whitespace-nowrap text-center text-sm text-black">
                                                    <div class="flex items-center space-x-3">
                                                        <p wire:click="decreaseQty('{{ $key }}', {{ $line->quantity }})"
                                                            class="inline-flex items-center p-1 text-sm font-medium text-gray-500 bg-white rounded-full border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200">
                                                            <span class="sr-only">Quantity button</span>
                                                            <svg class="w-4 h-4" aria-hidden="true" fill="currentColor"
                                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd"
                                                                    d="M3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                                                    clip-rule="evenodd"></path>
                                                            </svg>
                                                        </p>
                                                        <div>
                                                            <input value="{{ $line->quantity }}"
                                                                wire:loading.class="opacity-50"
                                                                class="shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md block w-20 text-center sm:text-sm show-spinners disabled:bg-white"
                                                                type="text" min="1" max="99" disabled>
                                                        </div>
                                                        <button
                                                            wire:click="increaseQty('{{ $key }}', {{ $line->quantity }})"
                                                            class="inline-flex items-center p-1 text-sm font-medium text-gray-500 bg-white rounded-full border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                                                            <span class="sr-only">Quantity button</span>
                                                            <svg class="w-4 h-4" aria-hidden="true" fill="currentColor"
                                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                <path fill-rule="evenodd"
                                                                    d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                                    clip-rule="evenodd"></path>
                                                            </svg>
                                                        </button>
                                                    </div>
                                                </td>
                                                <td
                                                    class="px-3 py-4 sm:px-6 whitespace-nowrap text-right text-sm text-black tabular-nums">
                                                    <b>
                                                        {{ number_format($line->food_price, 0, '', '.') }} đ
                                                    </b>
                                                </td>
                                                <td
                                                    class="px-3 py-4 sm:px-6 whitespace-nowrap text-right text-sm text-black tabular-nums">
                                                    <b>
                                                        {{ number_format($line->food_price * $line->quantity, 0, '', '.') }}
                                                        đ
                                                    </b>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="mt-4">
                    <!-- print -->
                    <button wire:click="generatepdf({{ $order_detail->id }})"
                        class="inline-flex items-center justify-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-medium text-white hover:bg-green-600 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 transition sm:text-sm">
                        {{ __('Print') }}
                    </button>
                    <!-- End print -->
                    <!-- Confirm order -->
                    @if ($order_detail->state === 'Chờ xác nhận')
                        <button wire:click="changeState({{ $order_detail->id }})"
                            class="inline-flex items-center justify-center px-4 py-2 bg-blue-500 border border-transparent rounded-md font-medium text-white hover:bg-blue-600 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 transition sm:text-sm">
                            Duyệt đơn hàng
                        </button>
                    @endif
                    <!-- End confirm order -->
                </div>
            </div>
            <div class="mt-6 w-2/6 mx-auto">
                <div class=" bg-white shadow sm:rounded-lg -mx-4 sm:-mx-0 overflow-hidden">
                    <div class="border-b border-gray-200 px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Thông tin khách hàng
                        </h3>
                    </div>
                    <div class="px-4 py-6 sm:p-6">
                        <div class="divide-y divide-gray-200 -mx-4 -m-6 sm:-mx-6">
                            <div class="flex items-center px-3 py-4 sm:py-5 sm:px-6">
                                <div class="flex-shrink-0 mr-4">
                                    <svg class="w-10 h-10 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="flex justify-between items-center w-full">
                                    <p class="text-sm font-medium hover:text-blue-600">
                                        {{ $order_detail->name }}
                                    </p>
                                    <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="text-sm px-3 py-4 sm:py-5 sm:px-6">
                                <h4 class="font-medium uppercase text-xs">
                                    Thông tin liên hệ
                                </h4>
                                <ul class="mt-3 space-y-1">
                                    <li class="">
                                        {{ $order_detail->email }}
                                    </li>
                                    <li class="text-gray-500">
                                        {{ $order_detail->phone }}
                                    </li>
                                </ul>
                            </div>

                            <div class="text-sm px-3 py-4 sm:py-5 sm:px-6">
                                <h4 class="font-medium uppercase text-xs">
                                    Địa chỉ giao hàng
                                </h4>
                                <address class="mt-2 not-italic">
                                    {{ $order_detail->address }}
                                </address>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 bg-white shadow sm:rounded-lg -mx-4 sm:-mx-0 overflow-hidden">
                    <div class="border-b border-gray-200 px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Thanh toán
                        </h3>
                    </div>
                    <div class="px-4 py-6 sm:p-6">
                        <div class="-mx-4 sm:-m-6">
                            <dl class="sm:divide-y sm:divide-gray-200">
                                <div class="px-3 py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Tạm thu
                                    </dt>
                                    <dd
                                        class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 sm:text-right tabular-nums">
                                        <b>
                                            {{ number_format($subtotal, 0, '', '.') }} đ
                                        </b>
                                    </dd>
                                </div>
                                <div class="px-3 py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Phí vận chuyển
                                    </dt>
                                    <dd
                                        class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 sm:text-right tabular-nums">
                                        <b>
                                            {{ number_format($order_detail->ship_rate, 0, '', '.') }} đ
                                        </b>
                                    </dd>
                                </div>
                                <div class="px-3 py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Thuế đơn hàng
                                    </dt>
                                    <dd
                                        class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 sm:text-right tabular-nums">
                                        <b>
                                            {{ number_format($taxRate, 0, '', '.') }} đ
                                        </b>
                                    </dd>
                                </div>
                                <div class="px-3 py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Tổng thu
                                    </dt>
                                    <dd
                                        class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 sm:text-right tabular-nums">
                                        <b>{{ number_format($amount, 0, '', '.') }} đ</b>
                                    </dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
