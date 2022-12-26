<div class="max-w-6xl mx-auto py-16 px-4 sm:px-6 lg:px-8">
    <div class="lg:col-start-2">
        <h1 class="text-4xl font-extrabold tracking-tight text-gray-900 sm:text-5xl">Cảm ơn bạn đã đặt hàng tại FPoly !
        </h1>
        <p class="mt-2 text-base text-gray-500">
            Chúng tôi đánh giá cao đơn đặt hàng của bạn, chúng tôi hiện đang xử lý nó. Vì vậy,chúng tôi sẽ gửi cho bạn phản hồi xác nhận sớm nhất!</p>
        <div class="mt-16 grid grid-cols-2 sm:grid-cols-4 gap-6">
            <dl class="text-sm font-medium">
                <dt class="text-gray-900">Số thứ tự</dt>
                <dd class="mt-2 text-blue-600">{{ $identify }}</dd>
            </dl>
            <dl class="text-sm font-medium">
                <dt class="text-gray-900">Trạng thái</dt>
                <dd class="mt-2 text-blue-600">
                    <div class="flex items-center text-sm text-gray-500 space-x-1">
                        <span class="block w-2 h-2 rounded-full" style="background-color: #fbbf24"></span>
                        <span>{{ $order->state }}</span>
                    </div>
                </dd>
            </dl>
            <dl class="text-sm font-medium">
                <dt class="text-gray-900">Tên người đặt hàng</dt>
                <dd class="mt-2 text-blue-600">
                    <div class="flex items-center text-sm text-gray-500 space-x-1">
                        <span>{{ $order->name }}</span>
                    </div>
                </dd>
            </dl>
            <dl class="text-sm font-medium">
                <dt class="text-gray-900">Ngày tạo
                </dt>
                <dd class="mt-2 text-blue-600">
                    <div class="flex items-center text-sm text-gray-500 space-x-1">
                        {{ $order->created_at }}
                    </div>
                </dd>
            </dl>
        </div>
        <ul role="list"
            class="mt-6 text-sm font-medium text-gray-500 border-t border-gray-200 divide-y divide-gray-200">
            @foreach ($order_lines as $order_line)
                <li class="flex py-6 space-x-6">
                    <img src="{{ asset('images/products/' . $order_line->food_image) }}" alt="Organic Raglan Pullover"
                        class="flex-none w-24 h-28 bg-gray-100 rounded-md object-center object-cover sm:w-32 sm:h-36">
                    <div class="flex-auto flex flex-col space-y-1">
                        <h3 class="text-gray-700 hover:text-gray-800">
                            <p>{{ $order_line->food_name }}</p>
                        </h3>
                        <div class="mt-6 flex-1 flex items-end">
                            <dl class="hidden sm:flex text-sm divide-x divide-gray-200 space-x-4 sm:space-x-6">
                                <div class="flex">
                                    <dt class="font-medium text-gray-900">Số lượng</dt>
                                    <dd class="ml-2 text-gray-700">
                                        x{{ $order_line->quantity }}
                                    </dd>
                                </div>
                                <div class="pl-4 flex sm:pl-6">
                                    <dt class="font-medium text-gray-900">Giá</dt>
                                    <dd class="ml-2 text-gray-700">
                                        {{ number_format($order_line->food_price, 0, '', '.') }} đ
                                    </dd>
                                </div>
                            </dl>
                            <dl class="sm:hidden flex text-sm divide-x divide-gray-200 space-x-4 sm:space-x-6">
                                <div class="flex">
                                    <dt class="font-medium text-gray-900 sr-only">Price</dt>
                                    <dd class="text-gray-700">

                                    </dd>
                                </div>
                            </dl>
                        </div>
                    </div>

                    <p class="hidden sm:block flex-none font-medium text-gray-900">
                        {{ number_format($order_line->amount, 0, '', '.') }} đ
                    </p>
                </li>
            @endforeach

        </ul>

        <dl class="text-sm font-medium text-gray-500 space-y-6 border-t border-gray-200 pt-6">
            <div class="flex justify-between">
                <dt>{{ __('Subtotal') }}</dt>
                <dd class="text-gray-900">
                    {{ number_format($order->subtotal_float, 0, '', '.') }} đ
                </dd>
            </div>

            <div class="flex justify-between">
                <dt>{{ __('Taxes') }}</dt>
                <dd class="text-gray-900">
                    {{ number_format($order->tax_float, 0, '', '.') }} đ
                </dd>
            </div>

            <div class="flex justify-between">
                <dt>{{ __('Shipping') }}</dt>
                <dd class="text-gray-900">
                    {{ number_format($order->ship_rate, 0, '', '.') }} đ
                </dd>
            </div>

            <div class="flex items-center justify-between border-t border-gray-200 text-gray-900 pt-6">
                <dt class="text-base">{{ __('Total') }}</dt>
                <dd class="text-base">
                    {{ number_format($order->amount, 0, '', '.') }} đ
                </dd>
            </div>
        </dl>

        <div class="mt-16 border-t border-gray-200 py-6 text-right">
            <a href="/" class="text-sm font-medium text-blue-600 hover:text-blue-500">
                Tiếp tục <span aria-hidden="true"> →</span>
            </a>
        </div>
    </div>
</div>
