<x-jet-dialog-modal wire:model="open">
    <x-slot name="title">
        {{ __('Create Employee') }}
    </x-slot>
    <x-slot name="content">
        <form wire:submit.prevent="submit">
            <div class="relative z-0 mb-6 w-full group">
                <input type="text" wire:model="firstname" id="" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Họ</label>
                @error('firstname') <span id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span class="font-medium"> {{ $message }}</span></span> @enderror
            </div>
            <div class="relative z-0 mb-6 w-full group">
                <input type="text" wire:model="lastname" id="" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Tên</label>
                @error('lastname') <label id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span class="font-medium"> {{ $message }}</span></label> @enderror
            </div>
            <div class="relative z-0 mb-6 w-full group">
                <input type="email" wire:model="email" id="floating_email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">{{__('Email')}}</label>
                @error('email')<span id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span class="font-medium">{{ $message }}</span> </span> @enderror
            </div>
            <div class="relative z-0 mb-6 w-full group">
                <input type="number" wire:model="phone_number" id="phone_number" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="phone_number" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">{{__('Phone Number')}}</label>
                @error('phone_number')<span id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span class="font-medium">{{ $message }}</span> </span> @enderror
            </div>
            <div class="relative z-0 mb-6 w-full group">
                <input type="address" wire:model="address" id="address" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="address" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">{{__('Address')}}</label>
                @error('address')<span id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span class="font-medium">{{ $message }}</span> </span> @enderror
            </div>
            <div class="relative z-0 mb-6 w-full group">
                <label for="underline_select" class="sr-only">Chức vụ</label>
                <select id="underline_select" wire:model="group_id" class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                    <option selected>Chức vụ</option>
                    @foreach ($list_group as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
                @error('group_id')<span id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span class="font-medium">{{ $message }}</span> </span> @enderror
            </div>
            <div  class="relative z-0 mb-6 w-full group flex">
                <label for="address" class="text-gray-500 dark:text-gray-400 duration-300 ">{{__('Gender')}}</label>
               <div class="flex flex-row ml-4">
                <div class="flex items-center ml-3">
                    <input id="male" type="radio" value="male" wire:model="gender" name="gender" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="male" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{__('Male')}}</label>
                </div>
                <div class="flex items-center ml-3">
                    <input id="female" type="radio" value="female" wire:model="gender" name="gender" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="female" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{__('Female')}}</label>
                </div>
               </div>
               @error('gender')<span id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span class="font-medium">{{ $message }}</span> </span> @enderror
            </div>
            <div class="relative z-0 mb-6 w-full group">
                <label class="inline-flex relative items-center cursor-pointer">
                <input type="checkbox" wire:model="is_manager" value="1" class="sr-only peer">
                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Quản lý</span>
                </label>
                <label class="inline-flex relative items-center cursor-pointer">
                <input type="checkbox" wire:model="is_staff" value="1" class="sr-only peer">
                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Nhân viên</span>
                </label>
            </div>
        </form>
    </x-slot>
    <x-slot name="footer">
        <x-jet-button wire:click="$set('open', false)">
            {{ __('Close') }}
        </x-jet-button>
        <x-jet-secondary-button type="submit" wire:click="submit" class="text-white bg-blue-700 ml-1">{{__('Create')}}</x-jet-secondary-button>
    </x-slot>
</x-jet-dialog-modal>

