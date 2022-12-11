<section class="py-16 lg:max-w-lg lg:w-full lg:mx-auto lg:pt-0 lg:pb-24 lg:row-start-1 lg:col-start-1">
    <div class="max-w-2xl mx-auto px-4 lg:max-w-none lg:px-0">
        <div>
            <div>
                <div class="hidden mb-6 sm:block">
                    <nav class="flex" aria-label="Progress">
                        <ol role="list" class="flex items-center space-x-4">
                            <li class="flex items-center">
                                <a href="https://demo.cartify.dev/cart"
                                    class="text-sm font-medium text-gray-500 hover:text-gray-700">
                                    Giỏ hàng
                                </a>
                            </li>

                            <li class="flex items-center">
                                <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg> <span class="ml-4 text-sm font-medium text-gray-500">
                                    Thông tin
                                </span>
                            </li>
                            <li class="flex items-center">
                                <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg> <span
                                    class="ml-4 text-sm font-medium text-gray-500 cursor-pointer text-blue-600">
                                    Vận chuyển
                                </span>
                            </li>
                            <li class="flex items-center">
                                <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg> <span
                                    class="ml-4 text-sm font-medium text-gray-500 cursor-pointer hover:text-gray-600">
                                    Thanh toán
                                </span>
                            </li>
                        </ol>
                    </nav>
                </div>

                <div>
                    <!-- Shipping address -->
                    <div>
                        <fieldset>
                            <legend class="text-lg font-medium text-gray-900">Phương thức vận chuyển</legend>
                            <div class="mt-4 space-y-4">
                                <label
                                    class="relative block border rounded-lg shadow-sm px-6 py-4 cursor-pointer sm:flex sm:justify-between focus:outline-none border-gray-200 bg-white">
                                    <input
                                        class="shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 sr-only"
                                        type="radio" wire:model="cart.shipping_method" name="shipping-method"
                                        value="6">
                                    <div class="flex items-center">
                                        <div class="text-sm">
                                            <p class="font-medium text-gray-900">
                                                Tiêu chuẩn
                                            </p>
                                            <p class="text-gray-500">
                                                Từ 3-4 ngày
                                            </p>
                                        </div>
                                    </div>
                                    <div class="mt-2 flex self-center text-sm sm:mt-0 sm:block sm:ml-4 sm:text-right">
                                        <div class="font-medium text-gray-900">
                                            30.000 đ
                                        </div>
                                    </div>
                                    <div class="absolute -inset-px rounded-lg border pointer-events-none border-gray-200"
                                        aria-hidden="true"></div>
                                </label>
                                <label
                                    class="relative block border rounded-lg shadow-sm px-6 py-4 cursor-pointer sm:flex sm:justify-between focus:outline-none border-gray-200 bg-white">
                                    <input
                                        class="shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 sr-only"
                                        type="radio" wire:model="cart.shipping_method" name="shipping-method"
                                        value="7">
                                    <div class="flex items-center">
                                        <div class="text-sm">
                                            <p class="font-medium text-gray-900">
                                                Tốc hành
                                            </p>
                                            <p class="text-gray-500">
                                                Từ 2 đến 3 ngày
                                            </p>
                                        </div>
                                    </div>
                                    <div class="mt-2 flex self-center text-sm sm:mt-0 sm:block sm:ml-4 sm:text-right">
                                        <div class="font-medium text-gray-900">
                                            45.000 đ
                                        </div>
                                    </div>
                                    <div class="absolute -inset-px rounded-lg border pointer-events-none border-gray-200"
                                        aria-hidden="true"></div>
                                </label>
                            </div>
                        </fieldset>
                    </div>
                    @yield('box', $slot ?? '')
                </div>
            </div>
        </div>
    </div>
</section>
