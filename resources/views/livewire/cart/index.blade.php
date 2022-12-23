<div>
    @if ($cart->count() == 0)
        <div class="bg-white">
            <div class="max-w-2xl mx-auto pt-16 pb-24 px-4 sm:pt-24 sm:pb-32 sm:px-6 lg:max-w-7xl">
                <div class="max-w-4xl mx-auto">
                    <div class="text-center">
                        <h1 class="text-3xl font-extrabold tracking-tight text-gray-900">
                            Hiện tại giỏ hàng của bạn chưa có món ăn nào
                        </h1>
                        <p class="mt-2 text-gray-700">
                            Trước khi tiến hành thanh toán, bạn phải thêm một số món ăn vào giỏ hàng của mình.
                        </p>
                        <a class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-medium text-white hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 transition mt-5 px-8 py-3"
                            href="/">
                            Bắt đầu chọn món
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="bg-white">
            <div class="max-w-2xl mx-auto pt-16 pb-24 px-4 sm:pt-24 sm:pb-32 sm:px-6 lg:max-w-7xl">
                <div class="max-w-4xl mx-auto">
                    <h1 class="text-3xl font-extrabold tracking-tight text-gray-900">Giỏ hàng</h1>

                    <div class="mt-12">
                        <section aria-labelledby="cart-heading">
                            <h2 id="cart-heading" class="sr-only">
                                Các món ăn trong giỏ hàng của bạn
                            </h2>

                            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                                <table class="w-full text-sm text-left text-gray-500 ">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                        <tr>
                                            <th scope="col" class="py-3 px-6">
                                                <span class="sr-only">Image</span>
                                            </th>
                                            <th scope="col" class="py-3 px-6">

                                            </th>
                                            <th scope="col" class="py-3 px-6">

                                            </th>
                                            <th scope="col" class="py-3 px-6">

                                            </th>
                                            <th scope="col" class="py-3 px-6">

                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($cart as $key => $item)
                                            <tr wire:loading.class='opacity-50' class="bg-white border-b">
                                                <td class="p-4 w-32">
                                                    <img src="{{ asset('images/products/' . $item->options['image']) }}"
                                                        alt="{{ $item->options['image'] }}">
                                                </td>
                                                <td class="py-4 px-6 font-semibold text-gray-900 ">
                                                    <p class="mb-2">{{ $item->name }}</p>
                                                    <p class="text-gray-600 text-xs mb-2">
                                                        {{ number_format($item->price, 0, '', '.') }} đ</p>
                                                </td>
                                                <td class="py-4 px-6">
                                                    <div class="flex items-center space-x-3">
                                                        <p wire:click="decreaseQty('{{ $key }}', {{ $item->qty }})"
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
                                                            <input wire:model="order.{{ $key }}.qty"
                                                                wire:target="order.{{ $key }}.qty"
                                                                wire:loading.class="opacity-50"
                                                                class="shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md block w-20 text-center sm:text-sm show-spinners disabled:bg-white"
                                                                type="text" min="1" max="99" disabled>
                                                        </div>
                                                        <button
                                                            wire:click="increaseQty('{{ $key }}', {{ $item->qty }})"
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
                                                <td class="py-4 px-6 font-semibold text-gray-900 dark:text-white">
                                                    {{ number_format($item->price * $item->qty, 0, '', '.') }}

                                                </td>
                                                <td class="py-4 px-6">
                                                    <button wire:click='removeItem("{{ $item->rowId }}")'
                                                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">
                                                        {{ __('Remove') }}
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </section>

                        <!-- Order summary -->
                        <section aria-labelledby="summary-heading" class="mt-10 sm:ml-32 sm:pl-6">
                            <h2 id="summary-heading" class="sr-only">
                                Order summary
                            </h2>

                            <div>
                                <dl class="space-y-4">
                                    <div class="flex items-center justify-between">
                                        <dt class="text-base font-medium text-gray-900">Tổng thu</dt>
                                        <dd class="ml-4 text-base font-medium text-gray-900">
                                            <svg wire:loading.flex="1" wire:target="cart.items"
                                                class="hidden animate-spin h-5 w-5 text-blue-600"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10"
                                                    stroke="currentColor" stroke-width="4" />
                                                <path class="opacity-75" fill="currentColor"
                                                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z" />
                                            </svg> <span wire:loading.remove wire:target="cart.items">
                                                {{ number_format($total, 0, '', '.') }} đ
                                            </span>
                                        </dd>
                                    </div>
                                </dl>
                                <p class="mt-1 text-sm text-gray-500">Phí vận chuyển và thuế sẽ được tính khi thanh
                                    toán.</p>
                            </div>

                            <div class="mt-10">
                                <a class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-medium text-white hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 transition block w-full py-3 px-4"
                                    href="/checkout">
                                    Tiến hành thanh toán
                                </a>
                            </div>

                            <div class="mt-6 text-sm text-center">
                                <p>
                                    Hoặc
                                    <a href="/" class="text-blue-600 font-medium hover:text-blue-500">
                                        Tiếp tục chọn món<span aria-hidden="true"> &rarr;</span>
                                    </a>
                                </p>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
