<div class="w-full mx-auto px-4 lg:px-0 flex">
    <div class="mt-6 w-1/5 mx-auto">
        @if ($account['profile_photo_path'] != Auth::user()->profile_photo_path)
            <img wire:loading.class='opacity-75' class="rounded-full mx-auto" width="100" height="100"
                src="{{ $account['profile_photo_path']->temporaryUrl() }}" alt="Avatar">
        @else
            <img wire:loading.class='opacity-75' class="rounded-full mx-auto" width="100" height="100" src="{{ Auth::user()->profile_photo_path }}"
                alt="Avatar">
        @endif

        <div class="flex items-center justify-center w-2/3 mx-auto">
            <label for="dropzone-file"
                class="flex flex-col items-center justify-center w-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 mt-4">
                <div class="flex flex-col items-center justify-center">
                    <p class="block text-sm text-gray-500 p-2 font-semibold">Thay đổi</p>
                </div>
                <input wire:model='account.profile_photo_path' id="dropzone-file" type="file" class="hidden" />
            </label>
        </div>

    </div>
    <div x-data="{ currentTab: 'profile' }" class="mt-6 w-4/5 mx-2">
        <div class="sm:hidden">
            <label class="block font-medium text-sm text-gray-700 sr-only" for="tabs">
                Select a tab
            </label>
            <select
                class="border border-gray-300 rounded-md focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 block w-full"
                @change="currentTab = $event.target.value" id="tabs">
                <option :selected="currentTab == 'profile'" value="profile" selected="selected">
                    Tài khoản của tôi
                </option>
                <option :selected="currentTab == 'password'" value="password">
                    Cập nhật mật khẩu
                </option>
            </select>
        </div>
        <div class="hidden sm:block">
            <div class="border-b border-gray-200">
                <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                    <a @click="currentTab = 'profile'" href="javascript:void(0)"
                        class="whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm border-blue-500 text-blue-500"
                        :class="{
                            'border-blue-500 text-blue-500': currentTab ==
                                'profile',
                            'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': currentTab !=
                                'profile'
                        }">
                        Tài khoản của tôi
                    </a>
                    @if (!isset(Auth::user()->google_id))
                        <a @click="currentTab = 'password'" href="javascript:void(0)"
                            class="border-transparent whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm text-gray-500 hover:text-gray-700 hover:border-gray-300"
                            :class="{
                                'border-blue-500 text-blue-500': currentTab ==
                                    'password',
                                'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': currentTab !=
                                    'password'
                            }">
                            Cập nhật mật khẩu
                        </a>
                    @endif

                </nav>
            </div>
        </div>
        <!-- Profile form -->
        <form x-show="currentTab === 'profile'" wire:submit.prevent="updateProfile"
            class="space-y-8 divide-y divide-gray-200">
            <div class="space-y-6 sm:space-y-5">
                <div class="sm:grid sm:grid-cols-5 sm:gap-5 sm:items-start pt-5">
                    <label class="block font-medium text-sm text-gray-700 sm:mt-px sm:pt-2 sm:col-span-2"
                        for="full-name">
                        Tên người dùng
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-3">
                        <input
                            class="shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md max-w-lg block w-full sm:text-sm"
                            type="text" wire:model.defer="account.name" autocomplete="full-name">
                    </div>
                </div>
                <div class="sm:grid sm:grid-cols-5 sm:gap-5 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label class="block font-medium text-sm text-gray-700 sm:mt-px sm:pt-2 sm:col-span-2"
                        for="email">
                        {{ __('Email') }}
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-3">
                        <input
                            class="shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md max-w-lg block w-full sm:text-sm"
                            type="email" wire:model.defer="account.email" autocomplete="email">
                    </div>
                </div>
                <div class="sm:grid sm:grid-cols-5 sm:gap-5 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label class="block font-medium text-sm text-gray-700 sm:mt-px sm:pt-2 sm:col-span-2"
                        for="phone">
                        {{ __('Phone number') }}
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-3">
                        <input x-data="" type="text"
                            class="shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md max-w-lg block w-full sm:text-sm"
                            wire:model.defer="account.phone_number" autocomplete="phone">
                    </div>
                </div>
                <div class="sm:grid sm:grid-cols-5 sm:gap-5 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label class="block font-medium text-sm text-gray-700 sm:mt-px sm:pt-2 sm:col-span-2"
                        for="phone">
                        {{ __('Address') }}
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-3">
                        <input x-data="" type="text"
                            class="shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md max-w-lg block w-full sm:text-sm"
                            wire:model.defer="account.address" autocomplete="phone">
                    </div>
                </div>
            </div>
            <div class="pt-5">
                <div class="flex justify-end">
                    <button
                        class="inline-flex items-center justify-center px-4 py-2 text-sm border border-transparent rounded-md font-medium focus:outline-none focus:ring disabled:opacity-25 disabled:cursor-not-allowed transition bg-blue-600 text-white hover:bg-blue-500 focus:border-blue-700 focus:ring-blue-200 active:bg-blue-600 ml-3 text-sm"
                        type="submit">
                        Lưu thay đổi
                    </button>
                </div>
            </div>
        </form>

        <!-- Password form -->
        <form x-show="currentTab === 'password'" wire:submit.prevent="updatePassword"
            class="space-y-8 divide-y divide-gray-200" style="display: none;">
            <div class="space-y-6 sm:space-y-5">
                <div class="sm:grid sm:grid-cols-5 sm:gap-5 sm:items-start pt-5">
                    <label class="block font-medium text-sm text-gray-700 sm:mt-px sm:pt-2 sm:col-span-2"
                        for="current-password">
                        Current password
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-3">
                        <input
                            class="shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md max-w-lg block w-full sm:text-sm"
                            type="password" wire:model.defer="state.current_password" id="current-password"
                            autocomplete="current-password">
                    </div>
                </div>
                <div class="sm:grid sm:grid-cols-5 sm:gap-5 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label class="block font-medium text-sm text-gray-700 sm:mt-px sm:pt-2 sm:col-span-2"
                        for="new-password">
                        New password
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-3">
                        <input
                            class="shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md max-w-lg block w-full sm:text-sm"
                            type="password" wire:model.defer="state.password" id="new-password"
                            autocomplete="new-password">
                    </div>
                </div>
                <div class="sm:grid sm:grid-cols-5 sm:gap-5 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                    <label class="block font-medium text-sm text-gray-700 sm:mt-px sm:pt-2 sm:col-span-2"
                        for="new-password-confirmation">
                        Confirm new password
                    </label>
                    <div class="mt-1 sm:mt-0 sm:col-span-3">
                        <input
                            class="shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md max-w-lg block w-full sm:text-sm"
                            type="password" wire:model.defer="state.password_confirmation"
                            id="new-password-confirmation" autocomplete="new_password_confirmation">
                    </div>
                </div>
            </div>
            <div class="pt-5">
                <div class="flex justify-end">
                    <button
                        class="inline-flex items-center justify-center px-4 py-2 text-sm border border-transparent rounded-md font-medium focus:outline-none focus:ring disabled:opacity-25 disabled:cursor-not-allowed transition bg-blue-600 text-white hover:bg-blue-500 focus:border-blue-700 focus:ring-blue-200 active:bg-blue-600 ml-3 text-sm"
                        type="submit">
                        Save changes
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
