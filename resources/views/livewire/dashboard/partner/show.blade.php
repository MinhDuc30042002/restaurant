<div>
    <div class="md:flex md:items-center md:justify-between py-8 p-4">
        <div class="flex-1 min-w-0">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">Chi tiết đơn hàng #{{$modelId_detail}}</h2>
        </div>
        <!-- print -->
        <button wire:click="generatepdf()"
                    class="inline-flex items-center justify-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-medium text-white hover:bg-green-600 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 transition sm:text-sm">
                    {{ __('Print') }}
                </button>
        <!-- End print -->
    </div>

    <div class="overflow-x-auto relative">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 text-center">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        {{ __('STT') }}
                    </th>
                    <th scope="col" class="py-3 px-6">
                        {{ __('Name') }}
                    </th>
                    <th scope="col" class="py-3 px-6">
                        {{ __('Quantity') }}
                    </th>
                    <th scope="col" class="py-3 px-6">
                        {{ __('Food price') }}
                    </th>
                    <th scope="col" class="py-3 px-6">
                        {{ __('Action') }}
                    </th>
                </tr>
            </thead>

            <tbody>
                @php
                    $stt=0;
                @endphp
                @foreach($detailOrder as  $index => $item)
                    <tr class="bg-white border-b text-center">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap ">
                            {{++$stt}}
                        </th>
                        <td class="py-4 px-6">
                            <span class="text-base font-semibold">
                            {{$item->food_name}}
                            </span>
                        </td>
                        <td class="py-4 px-6">
                            @if($editedProductIndex !==$index)
                            {{$item->quantity}}
                            @else
                            <input type="number" class="w-14 rounded-lg" wire:model.defer="detailOrder.{{$index}}.quantity">
                            @endif
                        </td>
                        <td class="py-4 px-6">
                            {{$item->food_price}}
                        </td>
                        <td class="py-4 px-6">
                            @if($editedProductIndex !== $index)
                            <button wire:click.prevent="editProduct({{$index}})" type="button"
                                class="text-gray-600 hover:text-red-700">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                            </path>
                                        </svg>
                            </button>
                            @else
                            <button wire:click.prevent="saveProduct({{$index}})" type="button" class="text-gray-600 hover:text-red-700"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0120.25 6v12A2.25 2.25 0 0118 20.25H6A2.25 2.25 0 013.75 18V6A2.25 2.25 0 016 3.75h1.5m9 0h-9" />
                              </svg>
                              </button>
                            @endif
                            <button wire:click="deleteInvoice({{$item->id}})" type="button"
                                class="text-gray-600 hover:text-red-700">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                            </path>
                                        </svg>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="p-2">

        </div>
    </div>