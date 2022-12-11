<div>

    <div class="grid grid-cols-2 gap-4">
        <div class="bg-white shadow sm:rounded-lg -mx-4 sm:-mx-0 overflow-hidden">
            <div class="border-b border-gray-200 px-4 py-5 sm:px-6">
                <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-nowrap">
                    <div class="ml-4 mt-2">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            {{ __('Information') }}
                        </h3>
                    </div>
                </div>
            </div>
            <div class="px-4 py-6 sm:p-6">
                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label class="block font-medium text-sm text-gray-700 mb-2" for="title">
                            {{ __('Name') }}
                        </label>
                        <input wire:model.defer="food.name"
                            class="shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md mt-1 block w-full sm:text-sm"
                            type="text">
                    </div>

                    <div>
                        <label class="block font-medium text-sm text-gray-700 mb-2" for="slug">
                            {{ __('Price') }}
                        </label>
                        <div class="flex">
                            <span
                                class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                VNĐ
                            </span>
                            <input type="text" wire:model="food.price"
                                class="rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5">
                        </div>
                    </div>

                    <div>
                        <label class="block font-medium text-sm text-gray-700 mb-2" for="description">
                            {{ __('Description') }}
                        </label>
                        <textarea rows="4" wire:model="food.description"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $foodDetail->description }}</textarea>

                    </div>
                </div>
            </div>
            <div class="border-t border-gray-200 px-4 py-3 sm:px-6">
                <div class="flex items-center justify-end gap-3">
                    @if (session()->has('success'))
                        <div x-data="{ show: true }" x-init="setTimeout(() => { show = false }, 3000)" x-show="show">
                            <div class="flex items-center p-4 mb-4 w-full max-w-xs text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
                                role="alert">
                                <div
                                    class="inline-flex flex-shrink-0 justify-center items-center w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="sr-only">Check icon</span>
                                </div>
                                <div class="ml-3 text-sm font-normal"> {{ session()->get('success') }}</div>
                            </div>
                        </div>
                    @endif
                    <button wire:click="displayDialog" type="button"
                        class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">{{ __('Delete') }}</button>
                    <button type="button" wire:click="updateFood('{{ $foodDetail->id }}')"
                        class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">{{ __('Changes') }}</button>
                </div>
            </div>
        </div>

        <div class="bg-white shadow sm:rounded-lg -mx-4 sm:-mx-0 overflow-hidden">
            <div class="bg-white shadow sm:rounded-lg -mx-4 sm:-mx-0 overflow-hidden">
                <div class="px-4 py-6 sm:p-6">
                    <img src="{{ asset('storage/upload/' . $foodDetail->image) }}" onerror="this.src='https://dashboard-api.flyfood.vn/system/product_images/4014/image.jpg'" alt="Water Bottles">
                </div>
            </div>
        </div>
    </div>


    <x-jet-dialog-modal wire:model="displayModal">
        <x-slot name="title">
        </x-slot>

        <x-slot name="content" class="p-2">
            <div class="p-6 text-center">
                <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 " fill="none"
                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 ">
                    {{ __('Are you sure you want to delete this resource?') }}</h3>
                <button type="button" wire:click="destroyFood('{{ $foodDetail->id }}')"
                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                    {{ __('Yes') }}
                </button>
                <button type="button" wire:click='hiddenDialog'
                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">{{ __('Cancel') }}</button>
            </div>
        </x-slot>

        <x-slot name="footer">

        </x-slot>
    </x-jet-dialog-modal>
</div>
