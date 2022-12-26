<div class="bg-white">
    <div x-data="{ open: false }" @keydown.window.escape="open = false">
        <div x-cloak x-show="open" class="relative z-40 lg:hidden" role="dialog" aria-modal="true">
            <div x-show="open" x-transition:enter="transition-opacity ease-linear duration-300"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0" class="fixed inset-0 bg-black bg-opacity-25"></div>

            <div class="fixed inset-0 flex z-40">
                <div x-show="open" x-transition:enter="transition ease-in-out duration-300 transform"
                    x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
                    x-transition:leave="transition ease-in-out duration-300 transform"
                    x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full"
                    @click.away="open = false;"
                    class="relative max-w-xs w-full bg-white shadow-xl pb-12 flex flex-col overflow-y-auto">
                    <div class="px-4 pt-5 pb-2 flex">
                        <button @click="open = false" type="button"
                            class="-m-2 p-2 rounded-md inline-flex items-center justify-center text-gray-400">
                            <span class="sr-only">Close menu</span>
                            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg> </button>
                    </div>
                    <div class="mt-2">
                        <ul class="max-w-md divide-y divide-gray-200 dark:divide-gray-700">
                            <li class="pb-3 sm:pb-4">
                                <a href="/"
                                    class="w-full inline-flex justify-center items-center p-5 text-base font-medium text-gray-500 bg-gray-50 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white">
                                    <span class="w-full">Trang chủ</span>
                                    <svg aria-hidden="true" class="ml-3 w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </a>
                            </li>
                            @foreach ($categories as $category)
                                <li class="pb-3 sm:pb-4">
                                    <a href="/the-loai/{{ $category->slug }}"
                                        class="w-full inline-flex justify-center items-center p-5 text-base font-medium text-gray-500 bg-gray-50 rounded-lg hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700 dark:hover:text-white">
                                        <span class="w-full">{{ $category->name }}</span>
                                        <svg aria-hidden="true" class="ml-3 w-6 h-6" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>


                    <!-- Links -->
                    {{-- <div x-data="{ selectedId: null, init() { this.$nextTick(() => this.select(this.$id('tabs-1-tab', 1))) }, select(id) { this.selectedId = id }, isSelected(id) { return this.selectedId === id }, whichChild(el, parent) { return Array.from(parent.children).indexOf(el) + 1 } }" x-id="['tabs-1-tab']" class="mt-2">

                        <ul x-ref="tablist" class="border-b border-gray-200 -mb-px flex px-4 space-x-8">
                            <li>
                                <button :id="$id('tabs-1-tab', whichChild($el.parentElement, $refs.tablist))"
                                    @click="select($el.id)"
                                    class="text-gray-900 border-transparent flex-1 whitespace-nowrap py-4 px-1 border-b-2 text-base font-medium"
                                    :class="isSelected($el.id) ? 'text-blue-600 border-blue-600' :
                                        'text-gray-900 border-transparent'"
                                    aria-controls="tabs-1-panel-1" role="tab" type="button">
                                    Home
                                </button>
                            </li>
                            <li>
                                <button :id="$id('tabs-1-tab', whichChild($el.parentElement, $refs.tablist))"
                                    @click="select($el.id)"
                                    class="text-gray-900 border-transparent flex-1 whitespace-nowrap py-4 px-1 border-b-2 text-base font-medium"
                                    :class="isSelected($el.id) ? 'text-blue-600 border-blue-600' :
                                        'text-gray-900 border-transparent'"
                                    aria-controls="tabs-1-panel-1" role="tab" type="button">
                                    Men
                                </button>
                            </li>
                            <li>
                                <button :id="$id('tabs-1-tab', whichChild($el.parentElement, $refs.tablist))"
                                    @click="select($el.id)"
                                    class="text-gray-900 border-transparent flex-1 whitespace-nowrap py-4 px-1 border-b-2 text-base font-medium"
                                    :class="isSelected($el.id) ? 'text-blue-600 border-blue-600' :
                                        'text-gray-900 border-transparent'"
                                    aria-controls="tabs-1-panel-1" role="tab" type="button">
                                    Accessories
                                </button>
                            </li>
                        </ul>

                        <div>
                            <div x-show="isSelected($id('tabs-1-tab', whichChild($el, $el.parentElement)))"
                                :id="$id('tabs-1-panel', whichChild($el, $el.parentElement))"
                                class="px-4 py-6 space-y-12"
                                :aria-labelledby="$id('tabs-1-tab', whichChild($el, $el.parentElement))" role="tabpanel"
                                tabindex="0">
                                <div class="grid grid-cols-2 gap-x-4 gap-y-10">
                                    <div class="group relative">
                                        <div
                                            class="aspect-w-3 aspect-h-4 rounded-md bg-gray-100 overflow-hidden group-hover:opacity-75">
                                            <img loading="lazy"
                                                src="https://demo.cartify.dev/storage/media/1034/womens-tops.jpeg"
                                                alt="Tops" class="object-center object-cover">
                                        </div>
                                        <a href="/category/cac-mon-com-va-soup"
                                            class="mt-6 block text-sm font-medium text-gray-900">
                                            <span class="absolute z-10 inset-0" aria-hidden="true"></span>
                                            Tops
                                        </a>
                                        <p class="mt-1 text-sm text-gray-500">Shop now</p>
                                    </div>
                                    <div class="group relative">
                                        <div
                                            class="aspect-w-3 aspect-h-4 rounded-md bg-gray-100 overflow-hidden group-hover:opacity-75">
                                            <img loading="lazy"
                                                src="https://demo.cartify.dev/storage/media/1035/womens-bottoms.jpeg"
                                                alt="Bottoms" class="object-center object-cover">
                                        </div>
                                        <a href="/collections/womens-bottoms"
                                            class="mt-6 block text-sm font-medium text-gray-900">
                                            <span class="absolute z-10 inset-0" aria-hidden="true"></span>
                                            Bottoms
                                        </a>
                                        <p class="mt-1 text-sm text-gray-500">Shop now</p>
                                    </div>
                                    <div class="group relative">
                                        <div
                                            class="aspect-w-3 aspect-h-4 rounded-md bg-gray-100 overflow-hidden group-hover:opacity-75">
                                            <img loading="lazy"
                                                src="https://demo.cartify.dev/storage/media/1036/womens-dresses-jumpsuits.jpeg"
                                                alt="Dresses &amp; Jumpsuits" class="object-center object-cover">
                                        </div>
                                        <a href="/collections/womens-dresses-jumpsuits"
                                            class="mt-6 block text-sm font-medium text-gray-900">
                                            <span class="absolute z-10 inset-0" aria-hidden="true"></span>
                                            Dresses &amp; Jumpsuits
                                        </a>
                                        <p class="mt-1 text-sm text-gray-500">Shop now</p>
                                    </div>
                                    <div class="group relative">
                                        <div
                                            class="aspect-w-3 aspect-h-4 rounded-md bg-gray-100 overflow-hidden group-hover:opacity-75">
                                            <img loading="lazy"
                                                src="https://demo.cartify.dev/storage/media/1037/womens-shoes.jpeg"
                                                alt="Shoes" class="object-center object-cover">
                                        </div>
                                        <a href="/collections/womens-shoes"
                                            class="mt-6 block text-sm font-medium text-gray-900">
                                            <span class="absolute z-10 inset-0" aria-hidden="true"></span>
                                            Shoes
                                        </a>
                                        <p class="mt-1 text-sm text-gray-500">Shop now</p>
                                    </div>
                                </div>
                            </div>
                            <div x-show="isSelected($id('tabs-1-tab', whichChild($el, $el.parentElement)))"
                                :id="$id('tabs-1-panel', whichChild($el, $el.parentElement))"
                                class="px-4 py-6 space-y-12"
                                :aria-labelledby="$id('tabs-1-tab', whichChild($el, $el.parentElement))"
                                role="tabpanel" tabindex="0">
                                <div class="grid grid-cols-2 gap-x-4 gap-y-10">
                                    <div class="group relative">
                                        <div
                                            class="aspect-w-3 aspect-h-4 rounded-md bg-gray-100 overflow-hidden group-hover:opacity-75">
                                            <img loading="lazy"
                                                src="https://demo.cartify.dev/storage/media/1027/mens-tops.jpeg"
                                                alt="Tops" class="object-center object-cover">
                                        </div>
                                        <a href="/collections/mens-tops"
                                            class="mt-6 block text-sm font-medium text-gray-900">
                                            <span class="absolute z-10 inset-0" aria-hidden="true"></span>
                                            Tops
                                        </a>
                                        <p class="mt-1 text-sm text-gray-500">Shop now</p>
                                    </div>
                                    <div class="group relative">
                                        <div
                                            class="aspect-w-3 aspect-h-4 rounded-md bg-gray-100 overflow-hidden group-hover:opacity-75">
                                            <img loading="lazy"
                                                src="https://demo.cartify.dev/storage/media/1026/mens-bottoms.jpeg"
                                                alt="Bottoms" class="object-center object-cover">
                                        </div>
                                        <a href="/collections/mens-bottoms"
                                            class="mt-6 block text-sm font-medium text-gray-900">
                                            <span class="absolute z-10 inset-0" aria-hidden="true"></span>
                                            Bottoms
                                        </a>
                                        <p class="mt-1 text-sm text-gray-500">Shop now</p>
                                    </div>
                                    <div class="group relative">
                                        <div
                                            class="aspect-w-3 aspect-h-4 rounded-md bg-gray-100 overflow-hidden group-hover:opacity-75">
                                            <img loading="lazy"
                                                src="https://demo.cartify.dev/storage/media/1028/mens-tees.jpeg"
                                                alt="Tees" class="object-center object-cover">
                                        </div>
                                        <a href="/collections/mens-tees"
                                            class="mt-6 block text-sm font-medium text-gray-900">
                                            <span class="absolute z-10 inset-0" aria-hidden="true"></span>
                                            Tees
                                        </a>
                                        <p class="mt-1 text-sm text-gray-500">Shop now</p>
                                    </div>
                                    <div class="group relative">
                                        <div
                                            class="aspect-w-3 aspect-h-4 rounded-md bg-gray-100 overflow-hidden group-hover:opacity-75">
                                            <img loading="lazy"
                                                src="https://demo.cartify.dev/storage/media/1029/mens-shoes.jpeg"
                                                alt="Shoes" class="object-center object-cover">
                                        </div>
                                        <a href="/collections/mens-shoes"
                                            class="mt-6 block text-sm font-medium text-gray-900">
                                            <span class="absolute z-10 inset-0" aria-hidden="true"></span>
                                            Shoes
                                        </a>
                                        <p class="mt-1 text-sm text-gray-500">Shop now</p>
                                    </div>
                                </div>
                            </div>
                            <div x-show="isSelected($id('tabs-1-tab', whichChild($el, $el.parentElement)))"
                                :id="$id('tabs-1-panel', whichChild($el, $el.parentElement))"
                                class="px-4 py-6 space-y-12"
                                :aria-labelledby="$id('tabs-1-tab', whichChild($el, $el.parentElement))"
                                role="tabpanel" tabindex="0">
                                <div class="grid grid-cols-2 gap-x-4 gap-y-10">
                                    <div class="group relative">
                                        <div
                                            class="aspect-w-3 aspect-h-4 rounded-md bg-gray-100 overflow-hidden group-hover:opacity-75">
                                            <img loading="lazy"
                                                src="https://demo.cartify.dev/storage/media/1030/hats.jpeg"
                                                alt="Hats" class="object-center object-cover">
                                        </div>
                                        <a href="/collections/hats"
                                            class="mt-6 block text-sm font-medium text-gray-900">
                                            <span class="absolute z-10 inset-0" aria-hidden="true"></span>
                                            Hats
                                        </a>
                                        <p class="mt-1 text-sm text-gray-500">Shop now</p>
                                    </div>
                                    <div class="group relative">
                                        <div
                                            class="aspect-w-3 aspect-h-4 rounded-md bg-gray-100 overflow-hidden group-hover:opacity-75">
                                            <img loading="lazy"
                                                src="https://demo.cartify.dev/storage/media/1031/bags.jpeg"
                                                alt="Bags" class="object-center object-cover">
                                        </div>
                                        <a href="/collections/bags"
                                            class="mt-6 block text-sm font-medium text-gray-900">
                                            <span class="absolute z-10 inset-0" aria-hidden="true"></span>
                                            Bags
                                        </a>
                                        <p class="mt-1 text-sm text-gray-500">Shop now</p>
                                    </div>
                                    <div class="group relative">
                                        <div
                                            class="aspect-w-3 aspect-h-4 rounded-md bg-gray-100 overflow-hidden group-hover:opacity-75">
                                            <img loading="lazy"
                                                src="https://demo.cartify.dev/storage/media/1032/socks.jpeg"
                                                alt="Socks" class="object-center object-cover">
                                        </div>
                                        <a href="/collections/socks"
                                            class="mt-6 block text-sm font-medium text-gray-900">
                                            <span class="absolute z-10 inset-0" aria-hidden="true"></span>
                                            Socks
                                        </a>
                                        <p class="mt-1 text-sm text-gray-500">Shop now</p>
                                    </div>
                                    <div class="group relative">
                                        <div
                                            class="aspect-w-3 aspect-h-4 rounded-md bg-gray-100 overflow-hidden group-hover:opacity-75">
                                            <img loading="lazy"
                                                src="https://demo.cartify.dev/storage/media/1033/water-bottles.jpeg"
                                                alt="Water bottles" class="object-center object-cover">
                                        </div>
                                        <a href="/collections/water-bottles"
                                            class="mt-6 block text-sm font-medium text-gray-900">
                                            <span class="absolute z-10 inset-0" aria-hidden="true"></span>
                                            Water bottles
                                        </a>
                                        <p class="mt-1 text-sm text-gray-500">Shop now</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    <div class="border-t border-gray-200 py-6 px-4 space-y-6">
                    </div>
                </div>
            </div>
        </div>

        <header class="relative z-30">
            <nav aria-label="Top">
                <!-- Top navigation -->
                <div style="background: orange">
                    <div class="max-w-7xl mx-auto h-10 px-4 flex items-center justify-between sm:px-6 lg:px-8">
                        <p class="flex-1 text-sm text-center font-medium text-white sm:text-left lg:flex-none">
                            Chào mừng bạn đến với nhà hàng của chúng tôi
                        </p>
                        @if (!isset(Auth::user()->name))
                            <div class="hidden sm:flex items-center space-x-6">
                                <a href="/login" class="text-sm font-medium text-white hover:text-gray-100">
                                    {{ __('Login') }}
                                </a>
                                <span class="h-6 w-px bg-white" aria-hidden="true"></span>
                                <a href="/register" class="text-sm font-medium text-white hover:text-gray-100">
                                    {{ __('Create Account') }}
                                </a>
                            </div>
                        @endif

                    </div>
                </div>

                <!-- Secondary navigation -->
                <div class="bg-white">
                    <div class="border-b border-gray-200">
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                            <div class="h-16 flex items-center justify-between">
                                <!-- Logo (lg+) -->
                                <div class="hidden lg:flex-1 lg:flex lg:items-center">
                                    <a href="/">
                                        <span class="sr-only">Fpoly Restaurant</span>
                                        <img src="https://ap.poly.edu.vn/images/logo.png" alt="Fpoly"
                                            class="h-10 w-auto">
                                    </a>
                                </div>

                                <!-- Flyout menus (lg+) -->
                                <div class="hidden h-full lg:flex">
                                    <div class="px-4 bottom-0 inset-x-0">
                                        <div class="h-full flex justify-center space-x-8">
                                            <div class="flex">
                                                <div class="relative flex">
                                                    <a href="/"
                                                        class="border-transparent text-gray-700 hover:text-gray-800 relative z-10 flex items-center transition-colors ease-out duration-200 text-sm font-medium border-b-2 -mb-px pt-px">
                                                        Trang chủ
                                                    </a>
                                                </div>
                                            </div>
                                            <div x-data="{ open: false }" class="flex">
                                                <div class="relative flex">
                                                    <button @click="open =! open" type="button"
                                                        class="border-transparent text-gray-700 hover:text-gray-800 relative z-10 flex items-center transition-colors ease-out duration-200 text-sm font-medium border-b-2 -mb-px pt-px"
                                                        :class="{
                                                            'border-blue-600 text-blue-600': open,
                                                            'border-transparent text-gray-700 hover:text-gray-800':
                                                                !(open)
                                                        }"
                                                        :aria-expanded="open.toString()">
                                                        Món ngon Fpoly
                                                    </button>
                                                </div>
                                                <div x-cloak x-show="open"
                                                    x-transition:enter="transition ease-out duration-200"
                                                    x-transition:enter-start="opacity-0"
                                                    x-transition:enter-end="opacity-100"
                                                    x-transition:leave="transition ease-in duration-150"
                                                    x-transition:leave-start="opacity-1000"
                                                    x-transition:leave-end="opacity-0" @click.away="open = false"
                                                    class="absolute top-full inset-x-0 text-sm text-gray-500">
                                                    <!-- Presentational element used to render the bottom shadow, if we put the shadow on the actual panel it pokes out the top, so we use this shorter element to hide the top of the shadow -->
                                                    <div class="absolute inset-0 top-1/2 bg-white shadow"
                                                        aria-hidden="true"></div>
                                                    <div class="relative bg-white">
                                                        <div class="max-w-7xl mx-auto px-8">
                                                            <div style="padding: 1.25rem" class="grid grid-cols-5">
                                                                @foreach ($categories as $category)
                                                                    <div class="group relative">
                                                                        <a href="/the-loai/{{ $category->slug }}"
                                                                            class="mt-4 block font-medium text-gray-900">
                                                                            <span class="absolute z-10 inset-0"
                                                                                aria-hidden="true"></span>
                                                                            {{ $category->name }}
                                                                        </a>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="relative flex">
                                                <a href="/tin-tuc"
                                                    class="border-transparent text-gray-700 hover:text-gray-800 relative z-10 flex items-center transition-colors ease-out duration-200 text-sm font-medium border-b-2 -mb-px pt-px">
                                                    Tin tức
                                                </a>
                                            </div>
                                            <div class="relative flex">
                                                <a href="{{ route('contact') }}"
                                                    class="border-transparent text-gray-700 hover:text-gray-800 relative z-10 flex items-center transition-colors ease-out duration-200 text-sm font-medium border-b-2 -mb-px pt-px">
                                                    Liên hệ
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Mobile menu and search (lg-) -->
                                <div class="flex-1 flex items-center lg:hidden">
                                    <!-- Mobile menu toggle -->
                                    <button @click="open =! open" type="button"
                                        class="-ml-2 bg-white p-2 rounded-md text-gray-400">
                                        <span class="sr-only">Open menu</span>
                                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M4 6h16M4 12h16M4 18h16" />
                                        </svg> </button>
                                </div>

                                <!-- Logo (lg-) -->
                                <a href="/" class="lg:hidden">
                                    <span class="sr-only">Cartify</span>
                                    <img src="https://ap.poly.edu.vn/images/logo.png" alt="Fpoly"
                                        class="h-10 w-auto">
                                </a>

                                <!-- User navigation -->
                                <div class="flex-1 flex items-center justify-end">
                                    <div class="flex items-center lg:ml-8">
                                        @if (isset(Auth::user()->name))
                                            <div class="flow-root text-sm mr-8">
                                                <div class="relative" x-data="{ open: false }">
                                                    <div @click="open = ! open">
                                                        <button class="group -m-2 p-2 flex items-center"
                                                            type="button">
                                                            <span class="sr-only">Open user menu</span>
                                                            <img class="w-8 h-8 rounded-full object-cover"
                                                                src="{{ asset('profile_photos/' . Auth::user()->profile_photo_path) }}"
                                                                alt="user photo">
                                                        </button>
                                                    </div>
                                                    <div x-show="open"
                                                        x-transition:enter="transition ease-out duration-200"
                                                        x-transition:enter-start="transform opacity-0 scale-95"
                                                        x-transition:enter-end="transform opacity-100 scale-100"
                                                        x-transition:leave="transition ease-in duration-75"
                                                        x-transition:leave-start="transform opacity-100 scale-100"
                                                        x-transition:leave-end="transform opacity-0 scale-95"
                                                        class="absolute z-50 mt-2 w-80 rounded-md shadow-lg origin-top-right right-0"
                                                        style="display: none;">
                                                        <div
                                                            class="m-auto rounded-md ring-1 ring-black ring-opacity-5 py-1 bg-white">
                                                            <div class="px-4 py-2 ">
                                                                <div
                                                                    class="py-3 px-4 text-sm text-gray-900 dark:text-white">
                                                                    <div>{{ Auth::user()->name }}</div>
                                                                    <div class="font-medium truncate">
                                                                        {{ Auth::user()->email }}
                                                                    </div>
                                                                </div>
                                                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                                                    aria-labelledby="dropdownUserAvatarButton">
                                                                    <li>
                                                                        <a href="{{ route('setting.profile') }}"
                                                                            class="block py-2 px-4 hover:bg-gray-100">Hồ
                                                                            sơ cá nhân</a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="/setting/orders"
                                                                            class="block py-2 px-4 hover:bg-gray-100">Lịch
                                                                            sử đơn hàng</a>
                                                                    </li>
                                                                    <li>
                                                                        <form method="POST"
                                                                            action="{{ route('logout') }}" x-data>
                                                                            @csrf
                                                                            <a href="{{ route('logout') }}"
                                                                                @click.prevent="$root.submit();"
                                                                                class="block py-2 px-4 hover:bg-gray-100">{{ __('Log Out') }}</a>
                                                                        </form>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <!-- Account menu for mobile -->
                                            <a href="/login"
                                                class="sm:hidden -m-2 p-2 text-gray-400 hover:text-gray-500">
                                                <span class="sr-only">Account</span>
                                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 24 24" stroke-width="2"
                                                    stroke="currentColor" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                                </svg> </a>
                                            <span class="sm:hidden mx-4 h-6 w-px bg-gray-200 lg:mx-6"
                                                aria-hidden="true"></span>
                                        @endif

                                        <!-- Cart -->
                                        <div class="flow-root text-sm">
                                            <div class="relative" x-data="{ open: false }">
                                                <div @click="open = ! open">
                                                    <button class="group -m-2 p-2 flex items-center">
                                                        <svg class="flex-shrink-0 h-6 w-6 text-gray-400 group-hover:text-gray-500"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" aria-hidden="true">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                                        </svg> <span
                                                            class="ml-2 text-sm font-medium text-gray-700 group-hover:text-gray-800">{{ $count }}</span>
                                                        <span class="sr-only">items in cart, view bag</span>
                                                    </button>
                                                </div>
                                                @if ($count == 0)
                                                    <div x-show="open"
                                                        x-transition:enter="transition ease-out duration-200"
                                                        x-transition:enter-start="transform opacity-0 scale-95"
                                                        x-transition:enter-end="transform opacity-100 scale-100"
                                                        x-transition:leave="transition ease-in duration-75"
                                                        x-transition:leave-start="transform opacity-100 scale-100"
                                                        x-transition:leave-end="transform opacity-0 scale-95"
                                                        class="absolute z-50 mt-2 w-80 rounded-md shadow-lg origin-top-right right-0"
                                                        style="display: none;">
                                                        <div
                                                            class="rounded-md ring-1 ring-black ring-opacity-5 py-1 bg-white">
                                                            <div class="px-4 py-2">
                                                                <p class="text-center">
                                                                    Your shopping cart is empty.
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <div x-show="open"
                                                        x-transition:enter="transition ease-out duration-200"
                                                        x-transition:enter-start="transform opacity-0 scale-95"
                                                        x-transition:enter-end="transform opacity-100 scale-100"
                                                        x-transition:leave="transition ease-in duration-75"
                                                        x-transition:leave-start="transform opacity-100 scale-100"
                                                        x-transition:leave-end="transform opacity-0 scale-95"
                                                        class="absolute z-50 mt-2 w-80 rounded-md shadow-lg origin-top-right right-0">
                                                        <div
                                                            class="rounded-md ring-1 ring-black ring-opacity-5 py-1 bg-white">
                                                            <div class="px-4 mt-px pb-6">
                                                                <h2 class="sr-only">Shopping Cart</h2>
                                                                <ul role="list"
                                                                    class="divide-y divide-gray-200 overflow-auto">
                                                                    @foreach ($cart as $item)
                                                                        <li class="py-6 flex">
                                                                            <img src="{{ asset('images/products/' . $item->options['image']) }}"
                                                                                alt="{{ $item->image }}"
                                                                                class="flex-none h-16 w-16 rounded-md border border-gray-200 object-cover object-center">
                                                                            <div
                                                                                class="ml-4 flex flex-auto flex-col justify-between">
                                                                                <h3 class="font-medium text-gray-900">
                                                                                    <p class="line-clamp-2">
                                                                                        {{ $item->name }}
                                                                                    </p>
                                                                                </h3>
                                                                                <p class="text-gray-500">
                                                                                    x{{ $item->qty }}
                                                                                </p>
                                                                            </div>
                                                                        </li>
                                                                    @endforeach

                                                                </ul>
                                                                <a class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-medium text-white hover:bg-blue-500 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-600 transition block w-full text-sm"
                                                                    href="/checkout">
                                                                    Tiến hành thanh toán
                                                                </a>
                                                                <p class="mt-6 text-center">
                                                                    <a href="/cart"
                                                                        class="text-sm font-medium text-blue-600 hover:text-blue-500">
                                                                        Xem giỏ hàng
                                                                    </a>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
    </div>
</div>
