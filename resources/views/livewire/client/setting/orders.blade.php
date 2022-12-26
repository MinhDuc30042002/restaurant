<div class="w-full mx-auto px-4 lg:px-0">
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-2 lg:px-8">
            <div x-data="{ currentTab: 'orders' }" class="max-w-2xl mx-auto px-4 lg:max-w-4xl lg:px-0">
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

                {{-- Orders --}}
                <section wire:loading.class='opacity-75' x-show="currentTab === 'orders'"
                    aria-labelledby="recent-heading" class="mt-16">
                    <h2 id="recent-heading" class="sr-only">
                        Recent orders
                    </h2>
                    <div class="max-w-7xl mx-auto sm:px-2 lg:px-8">
                        <div class="max-w-2xl mx-auto space-y-8 sm:px-4 lg:max-w-4xl lg:px-0">
                            @foreach ($orders as $order)
                                {{-- Order --}}
                                <div
                                    class="bg-white border-t border-b border-gray-200 shadow-sm overflow-hidden sm:rounded-lg sm:border">
                                    <h3 class="sr-only">
                                        Đặt hàng ngày
                                        <time>{{ $order->created_at }}</time>
                                    </h3>

                                    <div
                                        class="bg-slate-50 px-4 py-6 border-b border-slate-200 sm:bg-white sm:p-6 md:flex md:items-center md:justify-between md:space-x-6 lg:space-x-8">
                                        <dl
                                            class="divide-y divide-gray-200 space-y-4 text-sm text-gray-600 flex-auto md:divide-y-0 md:space-y-0 md:grid md:grid-cols-3 md:gap-x-6 lg:w-1/2 lg:gap-x-8">
                                            <div class="flex justify-between md:block">
                                                <dt class="font-medium text-gray-900">Số thứ tự</dt>
                                                <dd class="md:mt-1 text-gray-500"># <b>{{ $order->id }}</b>
                                                </dd>
                                            </div>
                                            <div class="flex justify-between pt-4 md:block md:pt-0">
                                                <dt class="font-medium text-gray-900">Ngày đặt hàng</dt>
                                                <dd class="md:mt-1 text-gray-500 block min-w-max">
                                                    {{ $order->created_at }}</dd>
                                            </div>
                                            <div
                                                class="flex justify-between pt-4 font-medium text-gray-900 md:block md:pt-0">
                                                <dt>Tổng giá trị</dt>
                                                <dd class="md:mt-1">
                                                    {{ number_format($order->amount, 0, '', '.') }} đ
                                                </dd>
                                            </div>
                                        </dl>
                                        <div class="space-y-4 mt-6 sm:flex sm:space-x-4 sm:space-y-0 md:mt-0">
                                            <a class="inline-flex items-center justify-center px-4 py-2 bg-blue-100 border border-transparent rounded-md font-medium sm:text-sm text-blue-700 hover:bg-blue-200 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:bg-blue-300 transition w-full flex items-center justify-center md:w-auto text-sm"
                                                href="/setting/order/{{ $order->id }}">
                                                <span>Xem đơn hàng</span>
                                                <span class="sr-only">{{ $order->id }}</span>
                                            </a>
                                        </div>
                                    </div>

                                    <h4 class="sr-only">Items</h4>
                                    <ul role="list"
                                        class="text-sm font-medium text-gray-500 divide-y divide-gray-200">
                                        @foreach ($order->lines()->get() as $item)
                                            <!-- Items order -->
                                            <li class="flex p-4 sm:p-6 space-x-6">
                                                <img src="{{ asset('storage/upload/' . $item->food_image) }}"
                                                    alt="{{ $item->food_image }}"
                                                    class="flex-none w-28 h-28 bg-gray-100 rounded-md object-center object-cover sm:w-32 sm:h-32">
                                                <div class="flex-auto flex flex-col space-y-1">
                                                    <h3 class="text-gray-700 hover:text-gray-800 whitespace-normal">
                                                        <a href="">
                                                            {{ $item->food_name }}
                                                        </a>
                                                    </h3>
                                                    <div class="mt-6 flex-1 flex items-end">
                                                        <dl
                                                            class="flex text-sm divide-x divide-gray-200 space-x-4 sm:space-x-6">
                                                            <div class="flex">
                                                                <dt class="font-medium text-gray-900">Số lượng
                                                                </dt>
                                                                <dd class="ml-2 text-gray-700">
                                                                    x {{ $item->quantity }}
                                                                </dd>
                                                            </div>
                                                            <div class="pl-4 flex sm:pl-6">
                                                                <dt class="font-medium text-gray-900">Giá
                                                                </dt>
                                                                <dd class="ml-2 text-gray-700">
                                                                    {{ number_format($item->food_price, 0, '', '.') }}
                                                                    đ
                                                                </dd>
                                                            </div>
                                                        </dl>
                                                    </div>
                                                </div>

                                                <p class="hidden sm:block flex-none font-medium text-gray-900">
                                                    {{ number_format($item->amount, 0, '', '.') }}
                                                    đ
                                                </p>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                            @endforeach
                            <div class="w-full">
                                <button wire:click='onScrollLoadMore'
                                    class="mt-4 inline-flex items-center justify-center px-4 py-2 bg-blue-100 border border-transparent rounded-md font-medium sm:text-sm text-blue-700 hover:bg-blue-200 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:bg-blue-300 transition w-1/2 mx-auto md:w-auto text-sm">
                                    Xem thêm
                                </button>
                            </div>
                        </div>
                    </div>
                </section>

                {{-- Pending --}}
                <section wire:loading.class='opacity-75' x-show="currentTab === 'pending'" class="mt-16">
                    <h2 id="recent-heading" class="sr-only">
                        Recent orders
                    </h2>
                    <div class="max-w-7xl mx-auto sm:px-2 lg:px-8">
                        <div class="max-w-2xl mx-auto space-y-8 sm:px-4 lg:max-w-4xl lg:px-0">
                            @foreach ($orders_pending as $order_pending)
                                {{-- Order --}}
                                <div
                                    class="bg-white border-t border-b border-gray-200 shadow-sm overflow-hidden sm:rounded-lg sm:border">
                                    <h3 class="sr-only">
                                        Đặt hàng ngày
                                        <time>{{ $order_pending->created_at }}</time>
                                    </h3>

                                    <div
                                        class="bg-slate-50 px-4 py-6 border-b border-slate-200 sm:bg-white sm:p-6 md:flex md:items-center md:justify-between md:space-x-6 lg:space-x-8">
                                        <dl
                                            class="divide-y divide-gray-200 space-y-4 text-sm text-gray-600 flex-auto md:divide-y-0 md:space-y-0 md:grid md:grid-cols-3 md:gap-x-6 lg:w-1/2 lg:gap-x-8">
                                            <div class="flex justify-between md:block">
                                                <dt class="font-medium text-gray-900">Số thứ tự</dt>
                                                <dd class="md:mt-1 text-gray-500">#
                                                    <b>{{ $order_pending->id }}</b>
                                                </dd>
                                            </div>
                                            <div class="flex justify-between pt-4 md:block md:pt-0">
                                                <dt class="font-medium text-gray-900">Ngày đặt hàng</dt>
                                                <dd class="md:mt-1 text-gray-500 block min-w-max">
                                                    {{ $order_pending->created_at }}</dd>
                                            </div>
                                            <div
                                                class="flex justify-between pt-4 font-medium text-gray-900 md:block md:pt-0">
                                                <dt>Tổng giá trị</dt>
                                                <dd class="md:mt-1">
                                                    {{ number_format($order_pending->amount, 0, '', '.') }} đ
                                                </dd>
                                            </div>
                                        </dl>
                                        <div class="space-y-4 mt-6 sm:flex sm:space-x-4 sm:space-y-0 md:mt-0">
                                            <a class="inline-flex items-center justify-center px-4 py-2 bg-blue-100 border border-transparent rounded-md font-medium sm:text-sm text-blue-700 hover:bg-blue-200 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:bg-blue-300 transition w-full flex items-center justify-center md:w-auto text-sm"
                                                href="/setting/order/{{ $order_pending->id }}">
                                                <span>Xem đơn hàng</span>
                                                <span class="sr-only">{{ $order_pending->id }}</span>
                                            </a>
                                        </div>
                                    </div>

                                    <h4 class="sr-only">Items</h4>
                                    <ul role="list"
                                        class="text-sm font-medium text-gray-500 divide-y divide-gray-200">
                                        @foreach ($order_pending->lines()->get() as $item)
                                            <!-- Items order -->
                                            <li class="flex p-4 sm:p-6 space-x-6">
                                                <img src="{{ asset('storage/upload/' . $item->food_image) }}"
                                                    alt="{{ $item->food_image }}"
                                                    class="flex-none w-28 h-28 bg-gray-100 rounded-md object-center object-cover sm:w-32 sm:h-32">
                                                <div class="flex-auto flex flex-col space-y-1">
                                                    <h3 class="text-gray-700 hover:text-gray-800">
                                                        <p>
                                                            {{ $item->food_name }}</p>
                                                    </h3>
                                                    <div class="mt-6 flex-1 flex items-end">
                                                        <dl
                                                            class="flex text-sm divide-x divide-gray-200 space-x-4 sm:space-x-6">
                                                            <div class="flex">
                                                                <dt class="font-medium text-gray-900">Số lượng
                                                                </dt>
                                                                <dd class="ml-2 text-gray-700">
                                                                    x {{ $item->quantity }}
                                                                </dd>
                                                            </div>
                                                            <div class="pl-4 flex sm:pl-6">
                                                                <dt class="font-medium text-gray-900">Giá
                                                                </dt>
                                                                <dd class="ml-2 text-gray-700">
                                                                    {{ number_format($item->food_price, 0, '', '.') }}
                                                                    đ
                                                                </dd>
                                                            </div>
                                                        </dl>
                                                    </div>
                                                </div>

                                                <p class="hidden sm:block flex-none font-medium text-gray-900">
                                                    {{ number_format($item->amount, 0, '', '.') }}
                                                    đ
                                                </p>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                            @endforeach
                            <div class="w-full">
                                <button wire:click='onScrollLoadMore'
                                    class="mt-4 inline-flex items-center justify-center px-4 py-2 bg-blue-100 border border-transparent rounded-md font-medium sm:text-sm text-blue-700 hover:bg-blue-200 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:bg-blue-300 transition w-1/2 mx-auto md:w-auto text-sm">
                                    Xem thêm
                                </button>
                            </div>
                        </div>
                    </div>
                </section>

                {{-- Handle --}}
                <section wire:loading.class='opacity-75' x-show="currentTab === 'handle'" class="mt-16">
                    <h2 id="recent-heading" class="sr-only">
                        Recent orders
                    </h2>
                    <div class="max-w-7xl mx-auto sm:px-2 lg:px-8">
                        <div class="max-w-2xl mx-auto space-y-8 sm:px-4 lg:max-w-4xl lg:px-0">
                            @foreach ($orders_handle as $order_handle)
                                {{-- Order --}}
                                <div
                                    class="bg-white border-t border-b border-gray-200 shadow-sm overflow-hidden sm:rounded-lg sm:border">
                                    <h3 class="sr-only">
                                        Đặt hàng ngày
                                        <time>{{ $order_handle->created_at }}</time>
                                    </h3>

                                    <div
                                        class="bg-slate-50 px-4 py-6 border-b border-slate-200 sm:bg-white sm:p-6 md:flex md:items-center md:justify-between md:space-x-6 lg:space-x-8">
                                        <dl
                                            class="divide-y divide-gray-200 space-y-4 text-sm text-gray-600 flex-auto md:divide-y-0 md:space-y-0 md:grid md:grid-cols-3 md:gap-x-6 lg:w-1/2 lg:gap-x-8">
                                            <div class="flex justify-between md:block">
                                                <dt class="font-medium text-gray-900">Số thứ tự</dt>
                                                <dd class="md:mt-1 text-gray-500">#
                                                    <b>{{ $order_handle->id }}</b>
                                                </dd>
                                            </div>
                                            <div class="flex justify-between pt-4 md:block md:pt-0">
                                                <dt class="font-medium text-gray-900">Ngày đặt hàng</dt>
                                                <dd class="md:mt-1 text-gray-500 block min-w-max">
                                                    {{ $order_handle->created_at }}</dd>
                                            </div>
                                            <div
                                                class="flex justify-between pt-4 font-medium text-gray-900 md:block md:pt-0">
                                                <dt>Tổng giá trị</dt>
                                                <dd class="md:mt-1">
                                                    {{ number_format($order_handle->amount, 0, '', '.') }} đ
                                                </dd>
                                            </div>
                                        </dl>
                                        <div class="space-y-4 mt-6 sm:flex sm:space-x-4 sm:space-y-0 md:mt-0">
                                            <a class="inline-flex items-center justify-center px-4 py-2 bg-blue-100 border border-transparent rounded-md font-medium sm:text-sm text-blue-700 hover:bg-blue-200 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:bg-blue-300 transition w-full flex items-center justify-center md:w-auto text-sm"
                                                href="/setting/order/{{ $order_handle->id }}">
                                                <span>Xem đơn hàng</span>
                                                <span class="sr-only">{{ $order_handle->id }}</span>
                                            </a>
                                        </div>
                                    </div>

                                    <h4 class="sr-only">Items</h4>
                                    <ul role="list"
                                        class="text-sm font-medium text-gray-500 divide-y divide-gray-200">
                                        @foreach ($order_handle->lines()->get() as $item)
                                            <!-- Items order -->
                                            <li class="flex p-4 sm:p-6 space-x-6">
                                                <img src="{{ asset('storage/upload/' . $item->food_image) }}"
                                                    alt="{{ $item->food_image }}"
                                                    class="flex-none w-28 h-28 bg-gray-100 rounded-md object-center object-cover sm:w-32 sm:h-32">
                                                <div class="flex-auto flex flex-col space-y-1">
                                                    <h3 class="text-gray-700 hover:text-gray-800">
                                                        <p>
                                                            {{ $item->food_name }}</p>
                                                    </h3>
                                                    <div class="mt-6 flex-1 flex items-end">
                                                        <dl
                                                            class="flex text-sm divide-x divide-gray-200 space-x-4 sm:space-x-6">
                                                            <div class="flex">
                                                                <dt class="font-medium text-gray-900">Số lượng
                                                                </dt>
                                                                <dd class="ml-2 text-gray-700">
                                                                    x {{ $item->quantity }}
                                                                </dd>
                                                            </div>
                                                            <div class="pl-4 flex sm:pl-6">
                                                                <dt class="font-medium text-gray-900">Giá
                                                                </dt>
                                                                <dd class="ml-2 text-gray-700">
                                                                    {{ number_format($item->food_price, 0, '', '.') }}
                                                                    đ
                                                                </dd>
                                                            </div>
                                                        </dl>
                                                    </div>
                                                </div>

                                                <p class="hidden sm:block flex-none font-medium text-gray-900">
                                                    {{ number_format($item->amount, 0, '', '.') }}
                                                    đ
                                                </p>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                            @endforeach
                            <div class="w-full">
                                <button wire:click='onScrollLoadMore'
                                    class="mt-4 inline-flex items-center justify-center px-4 py-2 bg-blue-100 border border-transparent rounded-md font-medium sm:text-sm text-blue-700 hover:bg-blue-200 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:bg-blue-300 transition w-1/2 mx-auto md:w-auto text-sm">
                                    Xem thêm
                                </button>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>

    </div>
</div>
