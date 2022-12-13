<header
    class="relative max-w-7xl mx-auto bg-gray-50 py-6 lg:bg-transparent lg:grid lg:grid-cols-2 lg:gap-x-16 lg:px-8 lg:pt-16 lg:pb-10">
    <div class="max-w-2xl mx-auto flex px-4 lg:max-w-lg lg:w-full lg:px-0">

    </div>
</header>
<div class="relative grid grid-cols-1 gap-x-16 max-w-7xl mx-auto lg:px-8 lg:grid-cols-2">
    <h1 class="sr-only">Thanh toán</h1>

    <section
        class="bg-gray-50 pt-6 pb-12 md:px-10 lg:max-w-lg lg:w-full lg:mx-auto lg:px-0 lg:pt-0 lg:pb-24 lg:bg-transparent lg:row-start-1 lg:col-start-2">
        <div class="max-w-2xl mx-auto px-4 lg:max-w-none lg:px-0">
            <h2 class="sr-only">Order summary</h2>

            <ul class="text-sm font-medium text-gray-900 divide-y divide-gray-200">
                <li class="flex items-start space-x-4 pb-6">
                    <div class="flex-shrink-0">
                        <img class="w-20 h-auto rounded-md"
                            src="https://demo.cartify.dev/storage/media/565/conversions/organic-chambray-embroidered-button-down-chambray-1-thumb.jpg"
                            alt="organic-chambray-embroidered-button-down-chambray-1.jpg">

                    </div>
                    <div class="ml-6 flex-1 flex flex-col">
                        <div class="flex">
                            <div class="min-w-0 flex-1">
                                <h4 class="text-sm">
                                    <a href="https://demo.cartify.dev/products/organic-chambray-embroidered-button-down"
                                        class="font-medium text-gray-700 hover:text-gray-800">
                                        Organic Chambray Embroidered Button Down
                                    </a>
                                </h4>
                                <p class="mt-1 text-sm text-gray-500">
                                    Chambray
                                </p>
                                <p class="mt-1 text-sm text-gray-500">
                                    XS
                                </p>
                            </div>
                        </div>
                        <div class="flex-1 pt-2 flex items-end justify-between">
                            <p class="mt-1 text-sm font-medium text-gray-900">
                                $98.00
                            </p>

                            <div class="ml-4 text-sm font-medium text-gray-900">
                                x1
                            </div>
                        </div>
                    </div>
                </li>
            </ul>

            <dl class="text-sm font-medium text-gray-900 space-y-6 border-t border-gray-200 pt-6 lg:block">
                <div class="flex items-center justify-between">
                    <dt class="text-sm">Subtotal</dt>
                    <dd class="text-sm font-medium text-gray-900">
                        $98.00
                    </dd>
                </div>
                <div class="flex items-center justify-between">
                    <dt class="text-sm">Taxes</dt>
                    <dd class="text-sm font-medium text-gray-900">
                        <span class="font-normal text-gray-500">Calculated at next step</span>
                    </dd>
                </div>
                <div class="flex items-center justify-between">
                    <dt class="text-sm">Shipping</dt>
                    <dd class="text-sm font-medium text-gray-900">
                        <span class="font-normal text-gray-500">Calculated at next step</span>
                    </dd>
                </div>
                <div class="flex items-center justify-between border-t border-gray-200 pt-6">
                    <dt class="text-base font-medium">Total</dt>
                    <dd class="text-base font-medium text-gray-900">
                        $98.00
                    </dd>
                </div>
            </dl>
        </div>
    </section>
    <livewire:client.wizard.checkout.wizard />
</div>
