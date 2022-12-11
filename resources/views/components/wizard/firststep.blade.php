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
                                </svg> <span
                                    class="ml-4 text-sm font-medium text-gray-500 cursor-pointer text-blue-600">
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
                                    class="ml-4 text-sm font-medium text-gray-500 cursor-pointer hover:text-gray-600">
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
                    <div>
                        <h2 class="text-lg font-medium text-gray-900">Contact information</h2>

                        <div class="mt-4">
                            <div>
                                <label class="block font-medium text-sm text-gray-700" for="contactEmail">
                                    Email
                                </label>
                                <input
                                    class="shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md mt-1 block w-full sm:text-sm"
                                    type="text" wire:model.defer="cart.customer_email" id="contactEmail">
                            </div>
                        </div>
                    </div>

                    <!-- Shipping address -->
                    <div class="mt-10 border-t border-slate-200 pt-10">
                        <h2 class="text-lg font-medium text-gray-900">Shipping information</h2>

                        <div class="mt-4 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-4">
                            <!-- Name -->
                            <div>
                                <label class="block font-medium text-sm text-gray-700" for="shippingName">
                                    Name
                                </label>
                                <input
                                    class="shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md mt-1 block w-full sm:text-sm"
                                    type="text" wire:model.defer="shipping_address.name" id="shippingName">
                            </div>
                            <!-- Phone -->
                            <div>
                                <label class="block font-medium text-sm text-gray-700" for="shippingPhone">
                                    Phone
                                </label>
                                <input
                                    class="shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md mt-1 block w-full sm:text-sm"
                                    type="text" wire:model.defer="shipping_address.phone" id="shippingPhone">
                            </div>
                            <!-- Company -->
                            <div class="sm:col-span-2">
                                <label class="block font-medium text-sm text-gray-700" for="shippingCompanyName">
                                    Company
                                </label>
                                <input
                                    class="shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md mt-1 block w-full sm:text-sm"
                                    type="text" wire:model.defer="shipping_address.company_name"
                                    id="shippingCompanyName">
                            </div>
                            <!-- Address -->
                            <div class="sm:col-span-2">
                                <label class="block font-medium text-sm text-gray-700" for="shippingAddress">
                                    Address
                                </label>
                                <input
                                    class="shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md mt-1 block w-full sm:text-sm"
                                    type="text" wire:model.defer="shipping_address.address" id="shippingAddress">
                            </div>
                            <!-- City -->
                            <div>
                                <label class="block font-medium text-sm text-gray-700" for="shippingCity">
                                    City
                                </label>
                                <input
                                    class="shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md mt-1 block w-full sm:text-sm"
                                    type="text" wire:model.defer="shipping_address.city" id="shippingCity">
                            </div>
                            <!-- Country -->
                            <div>
                                <label class="block font-medium text-sm text-gray-700" for="shippingCountry">
                                    Country
                                </label>
                                <select
                                    class="border border-gray-300 rounded-md focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 mt-1 block w-full sm:text-sm"
                                    wire:model.defer="shipping_address.country_id" id="shippingCountry">
                                    <option value="">Please select</option>
                                    <option value="1">
                                        Vietnam
                                    </option>
                                </select>
                            </div>
                            <!-- State -->
                            <div>
                                <label class="block font-medium text-sm text-gray-700" for="shippingState">
                                    State/Province
                                </label>
                                <input
                                    class="shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md mt-1 block w-full sm:text-sm"
                                    type="text" wire:model.defer="shipping_address.state" id="shippingState">
                            </div>
                            <!-- Zip/Postcode -->
                            <div>
                                <label class="block font-medium text-sm text-gray-700" for="shippingPostalCode">
                                    Zip/Postal Code
                                </label>
                                <input
                                    class="shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md mt-1 block w-full sm:text-sm"
                                    type="text" wire:model.defer="shipping_address.postcode"
                                    id="shippingPostalCode">
                            </div>
                        </div>
                    </div>
                    @yield('box', $slot ?? '')
                </div>
            </div>
        </div>
    </div>
</section>
