<div>
    <div>
        <div class="p-2">
            <x-jet-button class="bg-green-600" wire:click="showCreateModal">
                {{ __('Create') }}
            </x-jet-button>
            @if ($action['saved'])
                <span id="badge-dismiss-green"
                    class="float-right inline-flex items-center py-1 px-2 mr-2 text-sm font-medium text-green-800 bg-green-100 rounded dark:bg-green-200 dark:text-green-800">
                    Add item successfully.
                    <button wire:click="hiddenSaved" type="button"
                        class="inline-flex items-center p-0.5 ml-2 text-sm text-green-400 bg-transparent rounded-sm hover:bg-green-200 hover:text-green-900 dark:hover:bg-green-300 dark:hover:text-green-900"
                        data-dismiss-target="#badge-dismiss-green" aria-label="Remove">
                        <svg aria-hidden="true" class="w-3.5 h-3.5" aria-hidden="true" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Remove badge</span>
                    </button>
                </span>
            @endif
        </div>

        <div class="p-4 grid gap-6 mb-6 md:grid-cols-2">
            <select wire:model="select" id="countries"
                class="w-1/2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                <option disabled>{{ __('Lens') }}</option>
                @foreach ($list_categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

            <form class="flex justify-end">
                <label for="simple-search" class="sr-only">{{ __('Search') }}</label>
                <div class="relative w-1/2">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input wire:model="search" type="text" id="simple-search"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search" required>
                </div>
            </form>
        </div>



        <div class="grid grid-cols-4 gap-4 p-4">
            @foreach ($data as $food)
                <div wire:loading.class="opacity-50"
                    class="max-w-sm bg-white rounded-lg shadow-md hover:border-red-600">
                    <a href="{{ url('/dashboard/food/' . $food->id) }}">
                        <img class="rounded-t-lg h-40 object-contain w-full" src="{{ asset('storage/upload/' . $food->image) }}"
                            onerror="this.src='https://dashboard-api.flyfood.vn/system/product_images/4014/image.jpg'"
                            alt="Image" />
                    </a>

                    <div class="p-5 align-bottom">
                        <a href="#">
                            <p class="mb-2 text-gray-900 truncate">
                                {{ $food->name }}
                            </p>
                            <p class="mb-2 text-gray-900">
                                {{ number_format($food->price, 0, '', '.') }} đ
                            </p>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div>
        <x-jet-dialog-modal maxWidth="3xl" wire:model="modalDialog.create">
            <x-slot name="title">
                {{ __('Create new food') }}
            </x-slot>

            <x-slot name="content" class="p-2">
                <div class="grid gap-6 mb-5 md:grid-cols-3">
                    <div class="form-group">
                        <x-jet-label class="mb-2">{{ __('Name') }}</x-jet-label>
                        <x-jet-input wire:model="fillable.name" class=" w-full p-2 border border-gray-600" />
                        @error('fillable.name')
                            <span class="text-red-500">{{ __($message) }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <x-jet-label class="mb-2">{{ __('Price') }}</x-jet-label>
                        <x-jet-input wire:model="fillable.price" class="w-full p-2 border border-gray-600" />
                        @error('fillable.price')
                            <span class="text-red-500">{{ __($message) }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <x-jet-label class="mb-2">{{ __('Available quantity') }}</x-jet-label>
                        <x-jet-input wire:model="fillable.available_quantity"
                            class="w-full p-2 border border-gray-600" />
                        @error('fillable.available_quantity')
                            <span class="text-red-500">{{ __($message) }}</span>
                        @enderror
                    </div>
                </div>
                <div class="form-group mb-5">
                    <x-jet-label class="mb-2">{{ __('Category') }}</x-jet-label>
                    <select wire:model="fillable.category"
                        class="w-full mb-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5">
                        <option value="0">{{ __('Lens') }}</option>
                        @foreach ($list_categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('fillable.category')
                        <span class="text-red-500">{{ __($message) }}</span>
                    @enderror
                </div>
                <div class="form-group mb-5">
                    <x-jet-label class="mb-2">{{ __('Description') }}</x-jet-label>
                    <textarea wire:model="fillable.description" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Write your thoughts here..."></textarea>
                </div>
                <div class="form-group mb-5">
                    <x-jet-label class="mb-2">{{ __('Select A New Photo') }}</x-jet-label>
                    <div class="flex items-center justify-center w-full">
                        <label for="dropzone-file"
                            class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                    </path>
                                </svg>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                        class="font-semibold">Click
                                        to upload</span> or drag and drop</p>
                                </p>
                            </div>
                            <input wire:model="fillable.image" id="dropzone-file" type="file" class="hidden" />
                        </label>
                    </div>
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-button wire:click="saveFood">
                    {{ __('Create new food') }}
                </x-jet-button>
            </x-slot>
        </x-jet-dialog-modal>
    </div>

</div>
