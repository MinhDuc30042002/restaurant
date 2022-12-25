<div class="p-4">
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
                <x-jet-label class="mb-2">Giá</x-jet-label>
                <x-jet-input wire:model="fillable.price" class="w-full p-2 border border-gray-600" />
                @error('fillable.price')
                    <span class="text-red-500">{{ __($message) }}</span>
                @enderror
            </div>
            <div class="form-group">
                <x-jet-label class="mb-2">Số lượng có sẵn</x-jet-label>
                <x-jet-input wire:model="fillable.available_quantity" class="w-full p-2 border border-gray-600" />
                @error('fillable.available_quantity')
                    <span class="text-red-500">{{ __($message) }}</span>
                @enderror
            </div>
        </div>
        <div class="form-group mb-5">
            <x-jet-label class="mb-2">Thể loại</x-jet-label>
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
        <div class="form-group mb-5" wire:ignore>
            <x-jet-label class="mb-2">Mô tả</x-jet-label>
            <textarea wire:model="fillable.description" rows="4" id="description"
                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="Nhập mô tả..."></textarea>
        </div>
        <div class="form-group mb-5">
            <x-jet-label class="mb-2">{{ __('Select A New Photo') }}</x-jet-label>
            @if (isset($fillable['image']))
                <div class="flex items-center justify-center w-full">
                    <label for="dropzone-file"
                        class="flex flex-col items-center justify-center w-full h-12 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <p>Chọn ảnh khác</p>
                        </div>
                        <input wire:model="fillable.image" id="dropzone-file" type="file" class="hidden" />
                    </label>
                </div>
                <img class="object-contain h-60 w-full mt-2" src="{{ $fillable['image']->temporaryUrl() }}">
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
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Chọn hình ảnh</span> hoặc kéo thả</p>
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
    @push('css')
        <!-- CK Editor -->
        <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>
    @endpush

    @push('scripts')
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .then(editor => {
                editor.model.document.on('change:data', () => {
                @this.set('fillable.description', editor.getData());
                })
            })
            .catch(error => {
                console.error(error);
            });
    </script>
    @endpush
</div>
