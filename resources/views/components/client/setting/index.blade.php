<x-layout.client>
    <div class="flex px-8 mx-auto my-6 max-w-7xl xl:px-5">
        {{-- Left menu --}}
        <div class="w-64 hidden lg:block md:block" aria-label="Sidebar">
            <div class="overflow-y-auto py-4 px-3 bg-gray-50 rounded dark:bg-gray-800">
                <ul x-data="{ currentNavLink: 'profile' }" class="space-y-5">
                    <div class="sm:hidden">
                        <label class="block font-medium text-sm text-gray-700 sr-only" for="tabs">
                            Select a navlink
                        </label>
                        <select
                            class="border border-gray-300 rounded-md focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 block w-full"
                            @change="currentNavLink = $event.target.value">
                            <a href="/setting/profile">
                                <option :selected="currentNavLink === 'profile'" value="profile" selected="selected">
                                    Tài khoản của tôi
                                </option>
                            </a>
                            <a href="/setting/orders">
                                <option :selected="currentNavLink === 'orders'" value="orders">
                                    Lịch sử đơn hàng
                                </option>
                            </a>
                            <option :selected="currentNavLink === 'notifications'" value="notifications">
                                Thông báo
                            </option>
                            <option :selected="currentNavLink === 'notifications'" value="notifications">
                                Thông báo
                            </option>
                            <option :selected="currentNavLink === 'favorites_list'" value="favorites_list">
                                Danh sách yêu thích
                            </option>
                        </select>
                    </div>
                    <li>
                        <a @click="currentNavLink='profile'" href="/setting/profile"
                            class="flex items-center p-2 text-base font-normal text-gray-900"
                            :class="{
                                'border-l-4 border-indigo-500': currentNavLink ==
                                    'profile',
                                'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': currentNavLink !=
                                    'profile'
                            }">
                            <svg class="w-6 h-6 text-gray-500 transition duration-75  group-hover:text-gray-900"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                            </svg>

                            <span class="ml-3">Tài khoản của tôi</span>
                        </a>
                    </li>
                    <li>
                        <a @click="currentNavLink='orders'" href="/setting/orders"
                            class="flex items-center p-2 text-base font-normal text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700"
                            :class="{
                                'border-l-4 border-indigo-500': currentNavLink ==
                                    'orders',
                                'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': currentNavLink !=
                                    'orders'
                            }">
                            <svg class="w-6 h-6 text-gray-500 transition duration-75  group-hover:text-gray-900"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.666 3.888A2.25 2.25 0 0013.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 01-.75.75H9a.75.75 0 01-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 01-2.25 2.25H6.75A2.25 2.25 0 014.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 011.927-.184" />
                            </svg>
                            <span class="flex-1 ml-3 whitespace-nowrap">Lịch sử đơn hàng</span>
                        </a>
                    </li>
                    <li>
                        <a @click="currentNavLink='notifications'" href=""
                            class="flex items-center p-2 text-base font-normal text-gray-900"
                            :class="{
                                'border-l-4 border-indigo-500': currentNavLink ==
                                    'notifications',
                                'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': currentNavLink !=
                                    'notifications'
                            }">
                            <svg class="w-6 h-6 text-gray-500 transition duration-75  group-hover:text-gray-900"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                            </svg>
                            <span class="flex-1 ml-3 whitespace-nowrap">Thông báo</span>
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center p-2 text-base font-normal text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                            <svg class="w-6 h-6 text-gray-500 transition duration-75  group-hover:text-gray-900"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                            </svg>

                            <span class="flex-1 ml-3 whitespace-nowrap">Danh sách yêu thích</span>
                        </a>
                    </li>
                    <li>
                        <a href="/"
                            class="flex items-center p-2 text-base font-normal text-gray-900 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                            <svg class="w-6 h-6 text-gray-500 transition duration-75  group-hover:text-gray-900"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                            </svg>

                            <span class="flex-1 ml-3 whitespace-nowrap">Quay lại trang chủ</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        {{ $right }}
    </div>
</x-layout.client>
