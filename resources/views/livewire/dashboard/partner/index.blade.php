    
<div class="overflow-x-auto relative shadow-md sm:rounded-lg">
    <div class="flex justify-between items-center pb-4 bg-white">
        <div>
        </div>
                    <x-jet-action-message class="mr-3" on="success">
                        {{ __('Password saved, please refresh.') }}
                    </x-jet-action-message>
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative">
            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-500 " aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
            </div>
            <input type="text" wire:model="search" id="table-search-users" class="block m-2 p-2 pl-10 w-80 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Search for users">
        </div>
    </div>
    <table class="w-full text-sm text-left text-gray-500 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
            <tr>
                {{-- <th scope="col" class="p-4">
                    <div class="flex items-center">
                        <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500">
                        <label for="checkbox-all-search" class="sr-only">checkbox</label>
                    </div>
                </th> --}}
                <th scope="col" class="py-3 px-6">
                    {{ __('Name')}}
                </th>
                <th scope="col" class="py-3 px-6">
                    {{ __('Phone number')}}
                </th>
                <th scope="col" class="py-3 px-6">
                    {{ __('Created_at')}}
                </th>
                <th scope="col" class="py-3 px-6">
                    Hành động
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($partner as $item)
            <tr class="bg-white border-b">
                {{-- <td class="p-4 w-4">
                    <div class="flex items-center">
                        <input id="checkbox-table-search-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500">
                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                    </div>
                </td> --}}
                <th scope="row" class="flex items-center py-4 px-6 text-gray-900 whitespace-nowrap">
                    <img class="w-10 h-10 rounded-full" src="{{asset('image/panda.jpg')}}" alt="">
                    <div class="pl-3">
                        <a href="#" wire:click="showModalDeatail({{$item->id}})"><div class="text-base font-semibold">{{$item->name}}</div></a>
                        <div class="font-normal text-gray-500">{{$item->email}}</div>
                    </div>  
                </th>
                <td class="py-4 px-6">
                    <div class="flex items-center">
                       {{$item->phone}}
                    </div>
                </td>
                <td class="py-4 px-6">
                    {{$item->created_at->format('d-m-Y')}}
                </td>
                <td class="py-4 px-6">
                    <x-jet-secondary-button class="" wire:click="showOrder({{$item->id}})">
                        {{ __('Invoice history')}}
                    </x-jet-secondary-button>
                    
                </td>
            @endforeach
        </tbody>
    </table>
    {{$partner->links()}}
   
    <x-jet-dialog-modal wire:model="orderdetail" maxWidth="4xl">
        <x-slot name="title">
            {{ __('Invoice history')}}
        </x-slot>
        <x-slot name="content">
            <table class="w-full text-sm text-left text-gray-500 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                    <tr>
                        {{-- <th scope="col" class="p-4">
                            <div class="flex items-center">
                                <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500">
                                <label for="checkbox-all-search" class="sr-only">checkbox</label>
                            </div>
                        </th> --}}
                        <th scope="col" class="py-3 px-6">
                            {{ __('ID')}}
                        </th>
                        <th scope="col" class="py-3 px-6">
                            {{ __('Date')}}
                        </th>
                        <th scope="col" class="py-3 px-6">
                            {{ __('Amount')}}
                        </th>
                        <th scope="col" class="py-3 px-6">
                            {{ __('State')}}
                        </th>
                        <th scope="col" class="py-3 px-6">
                            {{ __('Action')}}
                        </th>
                    </tr>
                </thead>
                <tbody>
                   @if(isset($this->modelId))
                   @foreach ($order as $item)
                   <tr class="bg-white border-b">

                       <td class="py-4 px-6">
                           <div class="flex items-center">
                              {{$item->id}}
                           </div>
                       </td>
                       <td class="py-4 px-6">
                        {{$item->created_at->format('d-m-Y')}}
                    </td>
                       <td class="py-4 px-9">
                           <div class="flex items-center">
                              {{$item->amount}}
                           </div>
                       </td>
                       <td class="py-4 px-6">
                        <div class="flex items-center">
                            @if($item->state == 'Đã hủy')
                            <span class="bg-red-100 text-red-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-200 dark:text-red-900">{{$item->state}}</span>
                            @elseif($item->state == 'Chờ thanh toán')
                            <span class="bg-yellow-100 text-yellow-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-200 dark:text-yellow-900">{{$item->state}}</span>
                            @elseif($item->state == 'Đã thanh toán')
                            <span class="bg-green-100 text-green-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">{{$item->state}}</span>
                           @endif
                        </div>
                    </td>
                       <td class="py-4 px-6">
                           <x-jet-secondary-button wire:click="detail({{$item->id}})">
                               {{ __('Detail')}}
                           </x-jet-secondary-button>
                           <x-jet-secondary-button wire:click="showUpdateState({{$item->id}})">
                            {{ __('Update')}}
                        </x-jet-secondary-button>
                        @if($item->state == 'Đã hủy')
                        <x-jet-danger-button wire:click="deleteInvoice({{$item->id}})">
                            {{ __('Delete')}}
                        </x-jet-danger-button>
                        @elseif($item->state == 'Đã thanh toán')
                        <x-jet-secondary-button class="bg-green-600 text-white" wire:click="generatepdf({{$item->id}})">
                            {{ __('Print')}}
                        </x-jet-secondary-button>
                        @endif
                        <x-jet-dialog-modal wire:model="modalConfirmDeleteVisible">
                            <x-slot name="title">
                                {{ __('Delete')}}
                            </x-slot>   
                            <x-slot name="content">
                                {{ __('Are you sure you want to delete ?')}}
                            </x-slot>
                            <x-slot name="footer">
                                <x-jet-danger-button class="ml-3 mx-4" wire:click="deleteInvoice({{$item->id}})" wire:loading.attr="disabled">
                                    {{ __('Delete') }}
                                </x-jet-danger-button>
                                    <x-jet-secondary-button wire:click="$toggle('modalConfirmDeleteVisible')" wire:loading.attr="disabled">
                                        {{ __('Cancel') }}
                                    </x-jet-secondary-button>
                            </x-slot>
                        </x-jet-dialog-modal>
                        
                       </td>
                   @endforeach
                   @endif
                </tbody>
            </table>
        </x-slot>
        <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('orderdetail')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
    
    <x-jet-dialog-modal wire:model="order_detail" maxWidth="4xl">
        <x-slot name="title">
            {{ __('Order detail')}}
            @if(isset($this->modelId_detail))
            @foreach ($detailOrder as $item)
            #{{$item->id}}
            @endforeach
            @endif
        </x-slot>
        <x-slot name="content">
             <table class="w-full text-sm text-left text-gray-500 ">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            {{ __('Food name')}}
                        </th>
                        <th scope="col" class="py-3 px-6">
                            {{ __('Food price')}}
                        </th>
                        <th scope="col" class="py-3 px-6 ">
                            {{ __('Quantity')}}
                        </th>
                        <th scope="col" class="py-3 px-6">
                            {{ __('Amount')}}
                        </th>
                    </tr>
                </thead>
                <tbody>
                   @if(isset($this->modelId_detail))
                   @foreach ($detailOrder as $item)
                   <tr class="bg-white border-b">
                    <td class="py-4 px-6">
                        <div class="flex items-center">
                        {{$item->food_name}}
                        </div>
                    </td>
                    <td class="py-4 px-6">
                        <div class="flex items-center">
                        {{$item->food_price}}
                        </div>
                    </td>
                    <td class="py-4 px-9">
                        <div class="flex items-center">
                        {{$item->quantity}}
                        </div>
                    </td>
                    <td class="py-4 px-6">
                        <div class="flex items-center">
                        {{$item->amount}}
                        </div>
                    </td>
                </tr>
                   @endforeach
                   @endif
                </tbody>
            </table>
            {{-- <div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
                <div class="flex justify-between items-center pb-4 border-b border-gray-200 dark:border-gray-700 mb-3">
                  <div class="flex flex-col">
                    <div class="text-3xl font-bold mb-1">
                      <img class="inline-block w-13 h-auto ltr:mr-2 rtl:ml-2" src="https://ap.poly.edu.vn/images/logo.png">
                    </div>
                    <p class="text-sm">Toà nhà Innovation, lô 24,<br> Công viên phần mềm Quang Trung, Quận 12, Hồ Chí Minh</p>
                  </div>
                  <div class="text-4xl text-center uppercase font-bold">{{ __('Invoice')}}</div>
                </div>
                <div class="flex flex-row justify-between py-3">
                  <div class="flex-1">
                    <p><strong>Người nhận:</strong><br>
                        Andreas-Doe<br>
                    Andreas-Doe@domain.com<br>
                    +123 456 7890</p>
                  </div>
                  @if(isset($this->modelId_detail))
            @foreach ($detailOrder as $item)
                  <div class="flex-1">
                    <div class="flex justify-between mb-2">
                      <div class="flex-1 font-semibold">ID Hóa đơn:</div><div class="flex-1 ltr:text-right rtl:text-left">#{{$item->id}}</div>
                    </div>
                    <div class="flex justify-between mb-2">
                      <div class="flex-1 font-semibold">Ngày tạo:</div><div class="flex-1 ltr:text-right rtl:text-left">{{$item->created_at->format('d/m/Y')}}</div>
                    </div>
                    <div class="flex justify-between mb-2">
                        @foreach($order2 as $order2)
                      <div class="flex-1 font-semibold">Trạng thái:</div><div class="flex-1 ltr:text-right rtl:text-left">{{$order2->state}}</div>
                      @endforeach
                    </div>
                  </div>
            
                </div>
                <div class="py-4">
                  <table class="table-bordered w-full ltr:text-left rtl:text-right text-gray-600">
                    <thead class="border-b dark:border-gray-700">
                      <tr class="bg-gray-100 dark:bg-gray-900 dark:bg-opacity-20">
                        <th>{{ __('Food name')}}</th>
                        <th class="text-center">{{ __('Quantity')}}</th>
                        <th class="text-center">{{ __('Food price')}}</th>
                        <th class="text-center">{{ __('Amount')}}</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>
                          <div class="flex flex-wrap flex-row items-center">
                            <div class="self-center"><img class="h-8 w-8" src="../src/img/products/product1.jpg"></div>
                            <div class="leading-5 dark:text-gray-300 flex-1 ltr:ml-2 rtl:mr-2 mb-1">  
                              {{$item->food_name}}
                            </div>
                          </div>
                        </td>
                        <td class="text-center">{{$item->quantity}}</td>
                        <td class="text-center">{{$item->food_price}}</td>
                        <td class="text-center">{{$item->amount}}</td>
                      </tr>
                    </tbody>
                    <tfoot>
                      <tr>
                        <td colspan="2"></td>
                        <td class="text-center"><b>Tổng tạm</b></td>
                        
                        <td class="text-center">{{$sub_total}}</td>
                      </tr>
                      <tr>
                        <td colspan="2"></td>
                        <td class="text-center"><b>Thuế</b></td>
                        <td class="text-center">10%</td>
                      </tr>
                      <tr>
                        <td colspan="2"></td>
                        <td class="text-center"><b>Tổng</b></td>
                        <td class="text-center font-bold">{{$total}}Đ</td>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
              @endforeach
              @endif --}}
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('order_detail')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
    <x-jet-dialog-modal wire:model="showState" maxWidth="2xl">
        <x-slot name="title">
            {{ __('Cập nhật trạng thái đơn hàng')}}
        </x-slot>
        <x-slot name="content">
<label for="state" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Trạng thái</label>
<select id="state" wire:model="state" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    <option selected>Chọn trạng thái</option>
    <option value="Đã thanh toán" >Đã thanh toán</option>
    <option value="Chờ thanh toán">Chờ thanh toán</option>
    <option value="Đã hủy">Đã hủy</option>
</select>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="updateState()">
                {{ __('Cập nhật') }}
            </x-jet-secondary-button>
                <x-jet-secondary-button wire:click="$toggle('showState')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>


