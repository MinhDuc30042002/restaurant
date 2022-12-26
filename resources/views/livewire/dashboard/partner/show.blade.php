{{-- <div>
    <div class="md:flex md:items-center md:justify-between py-8 p-4">
        <div class="flex-1 min-w-0">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">Chi tiết đơn hàng
                #{{ $modelId_detail }}</h2>
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
                    $stt = 0;
                @endphp
                @foreach ($detailOrder as $index => $item)
                    <tr class="bg-white border-b text-center">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap ">
                            {{ ++$stt }}
                        </th>
                        <td class="py-4 px-6">
                            <span class="text-base font-semibold">
                                {{ $item->food_name }}
                            </span>
                        </td>
                        <td class="py-4 px-6">
                            @if ($editedProductIndex !== $index)
                                {{ $item->quantity }}
                            @else
                                <input type="number" class="w-14 rounded-lg"
                                    wire:model.defer="detailOrder.{{ $index }}.quantity">
                            @endif
                        </td>
                        <td class="py-4 px-6">
                            {{ $item->food_price }}
                        </td>
                        <td class="py-4 px-6">
                            @if ($editedProductIndex !== $index)
                                <button wire:click.prevent="editProduct({{ $index }})" type="button"
                                    class="text-gray-600 hover:text-red-700">
                                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                        </path>
                                    </svg>
                                </button>
                            @else
                                <button wire:click.prevent="saveProduct({{ $index }})" type="button"
                                    class="text-gray-600 hover:text-red-700"><svg xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M16.5 3.75V16.5L12 14.25 7.5 16.5V3.75m9 0H18A2.25 2.25 0 0120.25 6v12A2.25 2.25 0 0118 20.25H6A2.25 2.25 0 013.75 18V6A2.25 2.25 0 016 3.75h1.5m9 0h-9" />
                                    </svg>
                                </button>
                            @endif
                            <button wire:click="deleteInvoice({{ $item->id }})" type="button"
                                class="text-gray-600 hover:text-red-700">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
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
</div> --}}


<div class="py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
        <div class="md:flex md:items-center md:justify-between">
            <div class="flex-1 min-w-0">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">
                    Đơn hàng: #{{ $modelId_detail }}
                </h2>
                <div class="mt-1 flex flex-col sm:flex-row sm:flex-wrap sm:mt-0 sm:space-x-6">
                    <div class="mt-2 flex items-center text-sm text-gray-500">
                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                            fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg> {{ $order->created_at }}
                    </div>
                    <div class="mt-2 flex items-center text-sm text-gray-500 space-x-1">
                        <span class="block w-2 h-2 rounded-full" style="background-color: #fbbf24"></span>
                        <span>{{ $order->state }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-5 flex mx-auto gap-4">
            <div class="mt-6 w-4/6 mx-auto">
                <div class="bg-white shadow sm:rounded-lg -mx-4 sm:-mx-0 mb-5 overflow-hidden">
                    <div class="border-b border-gray-200 px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Chi tiết đơn hàng
                        </h3>
                    </div>
                    <div class="px-4 py-6 sm:p-6">
                        <div class="space-y-6 -mx-4 -m-6 sm:-mx-6">
                            <div class="relative overflow-auto">
                                <table class="min-w-full">
                                    <thead>
                                        <tr class="border-b border-gray-200">
                                            <th scope="col"
                                                class="px-3 py-3 sm:px-6 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase">
                                            </th>
                                            <th scope="col"
                                                class="block w-max px-3 py-3 sm:px-6 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase">
                                                Số lượng
                                            </th>
                                            <th scope="col"
                                                class="mx-auto px-3 py-3 sm:px-6 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase">
                                                Giá
                                            </th>
                                            <th scope="col"
                                                class="mx-auto px-3 py-3 sm:px-6 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase">
                                                Tổng
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200">
                                        @foreach ($detailOrder as $line)
                                            <tr>
                                                <td
                                                    class="px-3 py-4 sm:px-6 whitespace-nowrap w-full max-w-sm text-sm text-gray-5">
                                                    <div class="flex items-center">
                                                        <div class="h-10 w-10 flex-shrink-0">
                                                            <img class="h-10 w-10 rounded object-center object-cover"
                                                                src="{{ asset('storage/upload/' . $line->food_image) }}"
                                                                alt="{{ $line->food_image }}">
                                                        </div>
                                                        <div class="ml-4 max-w-xs flex flex-col">
                                                            <div
                                                                class="font-medium text-gray-700 hover:text-blue-700 truncate ...">
                                                                <p>
                                                                    {{ $line->food_name }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td
                                                    class="px-3 py-4 sm:px-6 whitespace-nowrap text-center text-sm text-black">
                                                    <b>
                                                        {{ $line->quantity }}
                                                    </b>
                                                </td>
                                                <td
                                                    class="px-3 py-4 sm:px-6 whitespace-nowrap text-right text-sm text-black tabular-nums">
                                                    <b>
                                                        {{ number_format($line->food_price, 0, '', '.') }} đ
                                                    </b>
                                                </td>
                                                <td
                                                    class="px-3 py-4 sm:px-6 whitespace-nowrap text-right text-sm text-black tabular-nums">
                                                    <b>
                                                        {{ number_format($line->amount, 0, '', '.') }} đ
                                                    </b>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="mt-4">
                    <!-- print -->
                    <button wire:click="generatepdf()"
                        class="inline-flex items-center justify-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-medium text-white hover:bg-green-600 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 transition sm:text-sm">
                        {{ __('Print') }}
                    </button>
                    <!-- End print -->
                </div>
            </div>
            <div class="mt-6 w-2/6 mx-auto">
                <div class=" bg-white shadow sm:rounded-lg -mx-4 sm:-mx-0 overflow-hidden">
                    <div class="border-b border-gray-200 px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Thông tin khách hàng
                        </h3>
                    </div>
                    <div class="px-4 py-6 sm:p-6">
                        <div class="divide-y divide-gray-200 -mx-4 -m-6 sm:-mx-6">
                            <div class="flex items-center px-3 py-4 sm:py-5 sm:px-6">
                                <div class="flex-shrink-0 mr-4">
                                    <svg class="w-10 h-10 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="flex justify-between items-center w-full">
                                    <p class="text-sm font-medium hover:text-blue-600">
                                        {{ $order->name }}
                                    </p>
                                    <svg class="w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="text-sm px-3 py-4 sm:py-5 sm:px-6">
                                <h4 class="font-medium uppercase text-xs">
                                    Thông tin liên hệ
                                </h4>
                                <ul class="mt-3 space-y-1">
                                    <li class="">
                                        {{ $order->email }}
                                    </li>
                                    <li class="text-gray-500">
                                        {{ $order->phone }}
                                    </li>
                                </ul>
                            </div>

                            <div class="text-sm px-3 py-4 sm:py-5 sm:px-6">
                                <h4 class="font-medium uppercase text-xs">
                                    Địa chỉ giao hàng
                                </h4>
                                <address class="mt-2 not-italic">
                                    {{ $order->address }}
                                </address>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4 bg-white shadow sm:rounded-lg -mx-4 sm:-mx-0 overflow-hidden">
                    <div class="border-b border-gray-200 px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Thanh toán
                        </h3>
                    </div>
                    <div class="px-4 py-6 sm:p-6">
                        <div class="-mx-4 sm:-m-6">
                            <dl class="sm:divide-y sm:divide-gray-200">
                                <div class="px-3 py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Tạm thu
                                    </dt>
                                    <dd
                                        class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 sm:text-right tabular-nums">
                                        <b>
                                            {{ number_format($order->subtotal_float, 0, '', '.') }} đ
                                        </b>
                                    </dd>
                                </div>
                                <div class="px-3 py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Phí vận chuyển
                                    </dt>
                                    <dd
                                        class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 sm:text-right tabular-nums">
                                        <b>
                                            {{ number_format($order->ship_rate, 0, '', '.') }} đ
                                        </b>
                                    </dd>
                                </div>
                                <div class="px-3 py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Thuế đơn hàng
                                    </dt>
                                    <dd
                                        class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 sm:text-right tabular-nums">
                                        <b>
                                            {{ number_format($order->tax_float, 0, '', '.') }} đ
                                        </b>
                                    </dd>
                                </div>
                                <div class="px-3 py-4 sm:py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Tổng thu
                                    </dt>
                                    <dd
                                        class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2 sm:text-right tabular-nums">
                                        <b>{{ number_format($order->amount, 0, '', '.') }} đ</b>
                                    </dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
