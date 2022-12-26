<div>

    <header
        class="relative max-w-7xl mx-auto bg-gray-50 py-6 lg:bg-transparent lg:grid lg:grid-cols-2 lg:gap-x-16 lg:px-8 lg:pt-16 lg:pb-10">
        <div class="max-w-2xl mx-auto flex px-4 lg:max-w-lg lg:w-full lg:px-0">
            <div class="hidden mb-6 sm:block">
                <nav class="flex" aria-label="Progress">
                    <ol role="list" class="flex items-center space-x-4">
                        <li class="flex items-center">
                            <a href="/cart" class="text-sm font-medium text-gray-500 hover:text-gray-700">
                                {{ __('Cart') }}
                            </a>
                        </li>

                        <li class="flex items-center">
                            <svg class="flex-shrink-0 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg> <span class="ml-4 text-sm font-medium text-gray-500 cursor-pointer text-blue-600">
                                {{ __('Information') }}
                            </span>
                        </li>
                    </ol>
                </nav>
            </div>

        </div>
    </header>
    <div class="relative grid grid-cols-1 gap-x-16 max-w-7xl mx-auto lg:px-8 lg:grid-cols-3">
        <section class="py-16 lg:max-w-lg lg:w-full lg:mx-auto lg:pt-0 lg:pb-24 lg:row-start-1 lg:col-start-1">
            <div class="max-w-2xl mx-auto px-4 lg:max-w-none lg:px-0">
                <div>
                    <div>
                        <!-- Shipping address -->
                        <div>
                            <h2 class="text-lg font-medium text-gray-900">{{ __('Billing Information') }}</h2>

                            <div class="mt-4">
                                <div>
                                    <label class="block font-medium text-sm text-gray-700" for="contactEmail">
                                        {{ __('Email') }}
                                    </label>
                                    <input
                                        class="shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md mt-1 block w-full sm:text-sm"
                                        type="text" wire:model.defer="fillable.email">
                                    @error('fillable.email')
                                        <x-jet-input-error class="mt-4" for="fillable.email">{{ $message }}
                                        </x-jet-input-error>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-4">
                                <label class="block font-medium text-sm text-gray-700" for="shippingName">
                                    {{ __('Name') }}
                                </label>
                                <input
                                    class="shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md mt-1 block w-full sm:text-sm"
                                    type="text" wire:model.defer="fillable.name">
                                @error('fillable.name')
                                    <x-jet-input-error class="mt-4" for="fillable.name">{{ $message }}
                                    </x-jet-input-error>
                                @enderror
                            </div>
                            <div class="mt-4 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                                <!-- Phone -->
                                <div>
                                    <label class="block font-medium text-sm text-gray-700" for="shippingPhone">
                                        {{ __('Phone Number') }}
                                    </label>
                                    <input
                                        class="shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md mt-1 block w-full sm:text-sm"
                                        type="text" wire:model.defer="fillable.phone">
                                    @error('fillable.phone')
                                        <x-jet-input-error class="mt-4 whitespace-nowrap" for="fillable.phone">
                                            {{ $message }}
                                        </x-jet-input-error>
                                    @enderror
                                </div>
                                <!-- City -->
                                <div>
                                    <label class="block font-medium text-sm text-gray-700" for="shippingCity">
                                        {{ __('City') }} <label class="text-gray-400" for="">(Tùy
                                            chọn)</label>
                                    </label>
                                    <input
                                        class="shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md mt-1 block w-full sm:text-sm"
                                        type="text" wire:model.defer="fillable.city">
                                </div>
                                <!-- Address -->
                                <div class="sm:col-span-2">
                                    <label class="block font-medium text-sm text-gray-700" for="shippingAddress">
                                        {{ __('Address') }}
                                    </label>
                                    <input
                                        class="shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md mt-1 block w-full sm:text-sm"
                                        type="text" wire:model.defer="fillable.address">
                                </div>
                            </div>
                        </div>

                        <div class="mt-10 pt-6 border-t border-gray-200 sm:flex sm:items-center sm:justify-between">
                            <button wire:click='autoRefill'
                                class="inline-flex items-center justify-center px-4 py-2 text-sm border border-transparent rounded-md font-medium focus:outline-none focus:ring disabled:opacity-25 disabled:cursor-not-allowed transition bg-blue-600 text-white hover:bg-blue-500 focus:border-blue-700 focus:ring-blue-200 active:bg-blue-600 block w-full sm:ml-6 sm:order-last sm:w-auto">
                                Điền nhanh
                            </button>

                            <a href="/cart"
                                class="flex items-center justify-center mt-4 text-sm text-gray-500 sm:mt-0 sm:text-left hover:text-gray-700">
                                <svg class="mr-2 w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M7 16l-4-4m0 0l4-4m-4 4h18">
                                    </path>
                                </svg> Xem giỏ hàng
                            </a>
                        </div>
                        </form>
                    </div>
                </div>
        </section>
        <section class="py-16 lg:max-w-lg lg:w-full lg:mx-auto lg:pt-0 lg:pb-24 lg:row-start-1 lg:col-start-2">
            <div class="max-w-2xl mx-auto px-4 lg:max-w-none lg:px-0">
                <div>
                    <fieldset>
                        <legend class="text-lg font-medium text-gray-900">{{ __('Shipping method') }}</legend>
                        <div class="mt-4 space-y-4">
                            <label
                                class="relative block border rounded-lg shadow-sm px-6 py-4 cursor-pointer sm:flex sm:justify-between focus:outline-none {{ $setClicked ? 'border-blue-300 bg-blue-50' : 'border-gray-200 bg-white' }}">
                                <input wire:click="chooseShipRate"
                                    class="border-gray-300 shadow-sm  focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 sr-only"
                                    type="radio" value="6">
                                <div class="flex items-center">
                                    <div class="text-sm">
                                        <p class="font-medium text-gray-900">
                                            {{ __('Standard') }}
                                        </p>
                                        <p class="text-gray-500">
                                            Từ 20 phút đến 25 phút
                                        </p>
                                    </div>
                                </div>
                                <div class="mt-2 flex self-center text-sm sm:mt-0 sm:block sm:ml-4 sm:text-right">
                                    <div class="font-medium text-gray-900">
                                        25.000 đ
                                    </div>
                                </div>

                                <div class="absolute -inset-px rounded-lg border pointer-events-none border-gray-200"
                                    aria-hidden="true"></div>
                            </label>
                            @error('shipRate')
                                <x-jet-input-error class="mt-4" for="shipRate">{{ $message }}
                                </x-jet-input-error>
                            @enderror
                        </div>
                    </fieldset>
                </div>

                <div class="mt-3">
                    <fieldset>
                        <legend class="text-lg font-medium text-gray-900">Phương thức thanh toán</legend>
                        <div class="mt-4 space-y-4">
                            <label
                                class="relative block border rounded-lg shadow-sm px-6 py-4 cursor-pointer sm:flex sm:justify-between focus:outline-none">
                                <input
                                    class="border-gray-300 shadow-sm  focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 sr-only"
                                    type="radio" value="6">
                                <div class="flex items-center">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                                        </svg>

                                    </div>
                                    <div class="text-sm ml-3">
                                        <p class="font-medium text-gray-900">
                                            Thanh toán bằng tiền mặt
                                        </p>
                                    </div>
                                </div>
                                <div class="absolute -inset-px rounded-lg border pointer-events-none border-gray-200"
                                    aria-hidden="true"></div>
                            </label>
                            @error('shipRate')
                                <x-jet-input-error class="mt-4" for="shipRate">{{ $message }}
                                </x-jet-input-error>
                            @enderror
                        </div>
                        <div class="mt-4 space-y-4">
                            <label
                                class="relative block border rounded-lg shadow-sm px-6 py-4 cursor-pointer sm:flex sm:justify-between focus:outline-none">
                                <input
                                    class="border-gray-300 shadow-sm  focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 sr-only"
                                    type="radio" value="6">
                                <div class="flex items-center">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z" />
                                        </svg>
                                    </div>
                                    <div class="text-sm ml-3">
                                        <p class="font-medium text-gray-900">
                                            Thanh toán online
                                        </p>
                                    </div>
                                </div>

                                <div class="absolute -inset-px rounded-lg border pointer-events-none border-gray-200"
                                    aria-hidden="true"></div>
                            </label>
                            @error('shipRate')
                                <x-jet-input-error class="mt-4" for="shipRate">{{ $message }}
                                </x-jet-input-error>
                            @enderror
                        </div>
                    </fieldset>
                </div>
        </section>
        <section wire:loading.class='opacity-50'
            class="bg-gray-50 pt-6 pb-12 md:px-10 lg:max-w-lg lg:w-full lg:mx-auto lg:px-0 lg:pt-0 lg:pb-24 lg:bg-transparent lg:row-start-1 lg:col-start-3">
            <div class="max-w-2xl mx-auto px-4 lg:max-w-none lg:px-0">
                <h2 class="sr-only">Order summary</h2>

                <ul class="text-sm font-medium text-gray-900 divide-y divide-gray-200">
                    @foreach ($data as $item)
                        <li class="flex items-start space-x-4 pb-6">
                            <div class="flex-shrink-0">
                                <img class="w-20 h-auto rounded-md"
                                    src="{{ asset('images/products/' . $item->options['image']) }}"
                                    alt="{{ $item->options['image'] }}">

                            </div>
                            <div class="ml-6 flex-1 flex flex-col">
                                <div class="flex">
                                    <div class="min-w-0 flex-1">
                                        <h4 class="text-sm">
                                            <p class="font-medium text-gray-700 hover:text-gray-800">
                                                {{ $item->name }}
                                            </p>
                                        </h4>
                                    </div>
                                </div>
                                <div class="flex-1 pt-2 flex items-end justify-between">
                                    <p class="mt-1 text-sm font-medium text-gray-900">
                                        {{ number_format($item->price, 0, '', '.') }} đ
                                    </p>

                                    <div class="ml-4 text-sm font-medium text-gray-900">
                                        x{{ $item->qty }}
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>

                <dl class="text-sm font-medium text-gray-900 space-y-6 border-t border-gray-200 pt-6 lg:block">
                    <div class="flex items-center justify-between">
                        <dt class="text-sm">{{ __('Subtotal') }}</dt>
                        <dd class="text-sm font-medium text-gray-900">
                            {{ number_format($subtotal, 0, '', '.') }} đ
                        </dd>
                    </div>
                    <div class="flex items-center justify-between">
                        <dt class="text-sm">{{ __('Taxes') }}</dt>
                        <dd class="text-sm font-medium text-gray-900">
                            <span class="font-normal text-gray-500">{{ number_format($taxRate, 0, '', '.') }} đ</span>
                        </dd>
                    </div>
                    <div class="flex items-center justify-between">
                        <dt class="text-sm">{{ __('Shipping') }}</dt>
                        <dd class="text-sm font-medium text-gray-900">
                            <span wire:model.defer='shipRate'
                                class="font-normal text-gray-500">{{ number_format($shipRate, 0, '', '.') }}
                                đ</span>
                        </dd>
                    </div>
                    <div class="flex items-center justify-between border-t border-gray-200 pt-6">
                        <dt class="text-base font-medium">{{ __('Total') }}</dt>
                        <dd wire:model='totalOrder' class="text-base font-medium text-gray-900">
                            {{ number_format($subtotal + $taxRate + $shipRate, 0, '', '.') }} đ
                        </dd>
                    </div>
                    <div>
                        <button wire:click='sendOrder'
                            class="inline-flex items-center justify-center px-4 py-2 text-sm border border-transparent rounded-md font-medium focus:outline-none focus:ring disabled:opacity-25 disabled:cursor-not-allowed transition bg-blue-600 text-white hover:bg-blue-500 focus:border-blue-700 focus:ring-blue-200 active:bg-blue-600 block w-full sm:order-last sm:w-auto">
                            Đặt hàng
                        </button>
                    </div>
                </dl>
            </div>
        </section>
    </div>
</div>
