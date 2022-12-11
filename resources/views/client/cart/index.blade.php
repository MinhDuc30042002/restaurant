<x-layout.client>
    @section('content')
        <div>
            <div class="bg-white">
                <div class="max-w-2xl mx-auto pt-16 pb-24 px-4 sm:pt-24 sm:pb-32 sm:px-6 lg:max-w-7xl">
                    <div class="max-w-4xl mx-auto">
                        <h1 class="text-3xl font-extrabold tracking-tight text-gray-900">Shopping Cart</h1>

                        <form wire:submit.prevent="save" class="mt-12">
                            <section aria-labelledby="cart-heading">
                                <h2 id="cart-heading" class="sr-only">
                                    Items in your shopping cart
                                </h2>

                                <ul role="list" class="border-t border-b border-gray-200 divide-y divide-gray-200">
                                    <li class="flex py-6 sm:py-10">
                                        <div class="flex-shrink-0">
                                            <img src="https://dashboard-api.flyfood.vn/system/product_images/4049/image.jpg"
                                                alt="Image order"
                                                class="rounded-lg object-center object-cover w-24 h-28 sm:w-32 sm:h-36">
                                        </div>

                                        <div class="relative ml-4 flex-1 flex flex-col justify-between sm:ml-6">
                                            <div>
                                                <div class="flex justify-between sm:grid sm:grid-cols-2">
                                                    <div class="pr-6">
                                                        <h3 class="text-sm">
                                                            <a href="https://demo.cartify.dev/products/organic-cloud-blouse"
                                                                class="font-medium text-gray-700 hover:text-gray-800 line-clamp-2">
                                                                Combo lẩu nướng cá chình
                                                            </a>
                                                        </h3>
                                                    </div>

                                                    <p
                                                        class="flex justify-end text-sm font-medium text-gray-900 text-right">
                                                        <svg wire:loading.flex="1" wire:target="cart.items.0.quantity"
                                                            class="hidden animate-spin h-5 w-5 text-blue-600"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24">
                                                            <circle class="opacity-25" cx="12" cy="12"
                                                                r="10" stroke="currentColor" stroke-width="4" />
                                                            <path class="opacity-75" fill="currentColor"
                                                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z" />
                                                        </svg> <span wire:loading.remove
                                                            wire:target="cart.items.0.quantity">
                                                            2.230.000 đ
                                                        </span>
                                                    </p>
                                                </div>

                                                <div
                                                    class="mt-4 flex items-center sm:block sm:absolute sm:top-0 sm:left-1/2 sm:mt-0">
                                                    <label class="block font-medium text-sm text-gray-700 sr-only"
                                                        for="item-0-quantity">
                                                        Quantity
                                                    </label>
                                                    <input
                                                        class="shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md block w-20 text-center sm:text-sm show-spinners disabled:bg-gray-100"
                                                        type="number" wire:model.defer="cart.items.0.quantity"
                                                        wire:change.debounce.500ms="save" wire:loading.attr="disabled"
                                                        wire:target="items.0.quantity" id="item-0-quantity" min="1">
                                                </div>
                                            </div>

                                            <div class="mt-4 flex items-end justify-between">
                                                <p class="flex items-center text-sm text-gray-900 space-x-2">
                                                    1.230.000 đ
                                                </p>
                                                <button wire:click="delete('1')" type="button"
                                                    class="flex text-sm font-medium text-blue-600 hover:text-blue-500">
                                                    <span>Remove</span>
                                                </button>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
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
                                                    120.000.00 đ
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
                                        or
                                        <a href="/" class="text-blue-600 font-medium hover:text-blue-500">
                                            Tiếp tục chọn món<span aria-hidden="true"> &rarr;</span>
                                        </a>
                                    </p>
                                </div>
                            </section>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
</x-layout.client>
