<div>
    <x-jet-dialog-modal wire:model="open" :maxWidth="$maxWidth">
        <x-slot name="title">
            Cập nhật nhóm <strong>{{$name}}</strong>
        </x-slot>

        <x-slot name="content" class="p-2">
            <div class="relative z-0 mb-6 w-full group">
                <input type="texy" wire:model="name" name="name" id="name"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required />
                <label for="name"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                    {{ __('Group Name') }}
                </label>
                @error('name') <label id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span class="font-medium"> {{ $message }}</span></label> @enderror
            </div>
            <div class="">
                <label
                    class="block font-medium text-sm text-gray-700 sm:mt-px sm:pt-2"@error('permission') text-red-500 dark:text-red-400 @enderror"
                    for="permissionUpdate">
                    Quyền hạn
                </label>
                @error('permission')
                    <label id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                            class="font-medium"> {{ $message }}</span></label>
                @enderror

            </div>
            <div class="relative z-0 mb-6 w-full group">
                <div wire:ignore>
                    <select wire:model="permission" class="select2" multiple="multiple" class="selectpicker"
                        style="width: 75%">
                        @foreach ($list_permission as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="submit">
                {{ __('Save') }}
            </x-jet-secondary-button>
        </x-slot>
    </x-jet-dialog-modal>
    @push('css')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @endpush

    @push('scripts')
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script>
        <script>
            $(document).ready(function() {
                $('.select2').select2({
                    dropdownCssClass: 'h-text-gray-900 dark:text-gray-600 font-family-is', // you can add name font
                    selectionCssClass: 'text-gray-900 dark:text-gray-600 font-family-is',
                    placeholder: "{{ __('Select Permissions') }}",
                }).on('change', function() {
                    @this.set('permission', $(this).val());

                });
            });
        </script>
    @endpush
</div>
