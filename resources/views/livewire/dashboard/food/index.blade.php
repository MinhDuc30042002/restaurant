<div>
    <div>
        <div class="md:flex md:items-center md:justify-between py-8 p-4">
            <div class="flex-1 min-w-0">
                <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">Thể loại món ăn</h2>
            </div>
            <!-- Create Modal -->
            <div class="mt-4 flex md:mt-0 md:ml-4">
                @can('create', \App\Models\User::class)
                    <button wire:click="showCreateModal"
                        class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-medium text-white hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 transition sm:text-sm">
                        {{ __('Create') }}
                    </button>
                @endcan
            </div>
            <!-- End Create -->
        </div>
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-4 grid gap-6 mb-6 md:grid-cols-2">
                <ul class="items-center w-full text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200 sm:flex dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    @foreach ($list_categories as $category)
                    <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
                        <div class="flex items-center pl-3">
                            <input wire:model='selectedCategories' value="{{$category->id}}" id="cate-{{$category->name}}" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                            <label for="cate-{{$category->name}}" class="py-3 ml-2 w-full text-sm font-medium text-gray-900 dark:text-gray-300">{{ $category->name }}</label>
                        </div>
                    </li>
                    @endforeach
                </ul>
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

            <hr class="border-t border-gray-200 my-5">

            <div class="grid grid-cols-4 gap-4 p-4">
                @foreach ($data as $food)
                    <div wire:loading.class="opacity-50"
                        class="max-w-sm bg-white rounded-lg shadow-md hover:border-red-600">
                        <a href="{{ route('food.show', $food->id) }}">
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

