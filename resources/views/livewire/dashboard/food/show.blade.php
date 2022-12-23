<div class="p-4">
    <form wire:submit.prevent="saveFood">
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
                <x-jet-input wire:model="fillable.available_quantity" class="w-full p-2 border border-gray-600" />
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
            @if (isset($fillable['image']))
                <div class="flex items-center justify-center w-full">
                    <label for="dropzone-file"
                        class="flex flex-col items-center justify-center w-full h-12 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <p>Other images</p>
                        </div>
                        <input wire:model="fillable.image" id="dropzone-file" type="file" class="hidden" />
                    </label>
                </div>
                <img class="object-contain h-60 w-full mt-2" src="{{ asset('storage/upload') . '/' . $fillable['image']  }}">
            @else
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
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click
                                    to upload</span> or drag and drop</p>
                            </p>
                        </div>
                        <input wire:model="fillable.image" id="dropzone-file" type="file" class="hidden" />
                    </label>
                </div>
                @error('fillable.image')
                    <span class="text-red-500">{{ __($message) }}</span>
                @enderror
            @endif


        </div>
        <div class="form-group mb-5">
            <x-jet-button>{{ __('Create') }}</x-jet-button>
        </div>
    </form>
</div>
