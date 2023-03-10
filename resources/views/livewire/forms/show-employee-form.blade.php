<x-jet-dialog-modal wire:model="open" :maxWidth="$maxWidth">
    <x-slot name="title">
        {{ __('Show') }}
    </x-slot>
    <x-slot name="content">
        <div class="bg-gray-100">
            <div class="container mx-auto my-5 p-5">
                <div class="md:flex no-wrap md:-mx-2 ">
                    <!-- Left Side -->
                    <div class="w-full md:w-3/12 md:mx-2">
                        <!-- Profile Card -->
                        <div class="flex flex-row bg-white p-3 border-t-4 border-green-400">
                            <div class="image overflow-hidden w-4/12">
                                <img class="h-44 w-44 rounded object-center object-cover"
                                    src="{{asset($profile_photo_path)}}"
                                    alt="">
                            </div>
                            <div class="w-8/12">
                                <h1 class="text-gray-900 font-bold text-xl leading-8 my-1">{{$name}}</h1>
                                <h3 class="text-gray-600 font-lg text-semibold leading-6">Chức vụ: {{$group}}</h3>
                                <ul
                                    class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                                    <li class="flex items-center py-3">
                                        <span>Vai trò</span>
                                        <span class="ml-auto">
                                            <span class="bg-red-500 py-1 px-2 rounded text-white text-sm">{{$staff ? 'Nhân viên':''}}{{$manager ? 'Quản lý':''}}</span></span>
                                    </li>
                                    <li class="flex items-center py-3">
                                        <span>Ngày tham gia</span>
                                        <span class="ml-auto">{{date('d-m-Y', strtotime($created_at))}}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- End of profile card -->
                        <div class="my-4"></div>
                        <!-- Friends card -->
                        <div class="bg-white p-3 hover:shadow">
                            <!-- About Section -->
                        <div class="bg-white p-3 shadow-sm rounded-sm">
                            <div class="text-gray-700">
                                <div class="grid md:grid-cols-2 text-sm">
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">Họ</div>
                                        <div class="px-4 py-2">{{$firstname}}</div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">Tên</div>
                                        <div class="px-4 py-2">{{$lastname}}</div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">Giới tính</div>
                                        <div class="px-4 py-2">@if($gender == 'male') {{__('Male')}} @endif @if($gender == 'female') {{__('Female')}} @endif</div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold">Số điện thoại</div>
                                        <div class="px-4 py-2">{{$phone_number}}</div>
                                    </div>
                                    <div class="flex flex-row">
                                        <div class="px-4 py-2 font-semibold">Email</div>
                                        <div class="px-4 py-2">{{$email}}</div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold"></div>
                                        <div class="px-4 py-2"></div>
                                    </div>
                                    <div class="flex flex-row">
                                        <div class="px-4 py-2 font-semibold">Địa chỉ</div>
                                        <div class="px-4 py-2">{{$address}}</div>
                                    </div>
                                    <div class="grid grid-cols-2">
                                        <div class="px-4 py-2 font-semibold"></div>
                                        <div class="px-4 py-2"></div>
                                    </div>
                                </div>
                            </div>
                            {{-- <button
                                class="block w-full text-blue-800 text-sm font-semibold rounded-lg hover:bg-gray-100 focus:outline-none focus:shadow-outline focus:bg-gray-100 hover:shadow-xs p-3 my-4">Show
                                Full Information
                            </button> --}}
                        </div>
                        <!-- End of about section -->
                        </div>
                        <!-- End of friends card -->
                    </div>
                    <!-- Right Side -->
                    <div class="w-full md:w-9/12 mx-2 h-auto">
                        <!-- Experience and education -->
                        <div class="bg-white p-3 shadow-sm rounded-sm">

                            <div class="grid grid-cols-2">
                                <div>
                                    <div
                                        class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                        <span clas="text-green-500">
                                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                        </span>
                                        <span class="tracking-wide">Experience</span>
                                    </div>
                                    <ul class="list-inside space-y-2">
                                        <li>
                                            <div class="text-teal-600">Owner at Her Company Inc.</div>
                                            <div class="text-gray-500 text-xs">March 2020 - Now</div>
                                        </li>
                                        <li>
                                            <div class="text-teal-600">Owner at Her Company Inc.</div>
                                            <div class="text-gray-500 text-xs">March 2020 - Now</div>
                                        </li>
                                        <li>
                                            <div class="text-teal-600">Owner at Her Company Inc.</div>
                                            <div class="text-gray-500 text-xs">March 2020 - Now</div>
                                        </li>
                                        <li>
                                            <div class="text-teal-600">Owner at Her Company Inc.</div>
                                            <div class="text-gray-500 text-xs">March 2020 - Now</div>
                                        </li>
                                        <li>
                                            <div class="text-teal-600">Owner at Her Company Inc.</div>
                                            <div class="text-gray-500 text-xs">March 2020 - Now</div>
                                        </li>
                                    </ul>
                                </div>
                                <div>
                                    <div
                                        class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                        <span clas="text-green-500">
                                            <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path fill="#fff" d="M12 14l9-5-9-5-9 5 9 5z" />
                                                <path fill="#fff"
                                                    d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                            </svg>
                                        </span>
                                        <span class="tracking-wide">Education</span>
                                    </div>
                                    <ul class="list-inside space-y-2">
                                        <li>
                                            <div class="text-teal-600">Masters Degree in Oxford</div>
                                            <div class="text-gray-500 text-xs">March 2020 - Now</div>
                                        </li>
                                        <li>
                                            <div class="text-teal-600">Bachelors Degreen in LPU</div>
                                            <div class="text-gray-500 text-xs">March 2020 - Now</div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End of Experience and education grid -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
    <x-slot name="footer">

    </x-slot>
</x-jet-dialog-modal>
