<div>
    <div class="md:flex md:items-center md:justify-between py-8 p-4">
        <div class="flex-1 min-w-0">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:text-3xl sm:truncate">Nhân sự</h2>
        </div>
        <!-- Create Modal -->
        <div class="mt-4 flex md:mt-0 md:ml-4">
            <button
                class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-medium text-white hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 transition sm:text-sm">
                <a href="{{ route('food.index') }}">{{ __('Danh sách') }}</a>
            </button>
        </div>
        <!-- End Create -->
    </div>
    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
        <form wire:submit.prevent="updateFood">
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
                <x-jet-label class="mb-2">Mô tả
                </x-jet-label>
                <textarea wire:model="fillable.description" rows="10" id="description"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Nhập mô tả món ăn">{{ $fillable['description'] }}</textarea>
            </div>
            <div class="form-group mb-5">
                <x-jet-label class="mb-2">Chọn ảnh mới</x-jet-label>
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
                    <img class="object-contain h-60 w-full mt-2"
                        src="{{ asset('storage/upload') . '/' . $fillable['image'] }}">
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
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                        class="font-semibold">Chọn ảnh
                                        </span>hoặc kéo thả</p>
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
                <x-jet-button wire:click="updateFood">{{ __('Update') }}</x-jet-button>
            </div>
        </form>

    </div>
    <div class="flex flex-col">
        @foreach ($foodDetail->getMessages() as $log)
        <div>
            <div>
                <button class="group -m-2 p-2 flex items-center"
                    type="button">
                    <img class="w-8 h-8 rounded-full object-cover"
                        src="{{ asset($log->user->profile_photo_path) }}"
                        alt="user photo">
                </button>
            </div>
            <time>{{ $log->created_at }}</time>
        </div>
        <div class="flex items-center">
            @if($log->body)
            <span class="font-bold">{{ $log->body }}<span>
            @else
            <span class="font-bold mr-2">{{ $log->field }}:</span>
            <span class="italic">{{ $log->origin }}<span>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="inline mx-2 bi bi-arrow-right" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
            </svg>
            <span>{{ $log->new }}<span>
            @endif
        </div>
        @endforeach
    </div>
    @push('css')
        <!-- CK Editor -->
        <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>
    @endpush

    @push('scripts')
        <!-- CK Editor -->
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
