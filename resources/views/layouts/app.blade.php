<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Styles -->
    @livewireStyles
    @stack('css')
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.4/dist/flowbite.min.css" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


</head>

<body>
    <style>
        /* This example part of kwd-dashboard see https://kamona-wd.github.io/kwd-dashboard/ */
        /* So here we will write some classes to simulate dark mode and some of tailwind css config in our project */
        :root {
            --light: #edf2f9;
            --dark: #152e4d;
            --darker: #12263f;

            --color-red: #dc2626;
            --color-green: #16a34a;
            --color-blue: #2563eb;
            --color-cyan: #0891b2;
            --color-teal: #0d9488;
            --color-fuchsia: #c026d3;
            --color-orange: #ea580c;
            --color-yellow: #ca8a04;
            --color-violet: #7c3aed;
        }

        [x-cloak] {
            display: none;
        }

        .dark .dark\:text-light {
            color: var(--light);
        }

        .dark .dark\:bg-dark {
            background-color: var(--dark);
        }

        .dark .dark\:bg-darker {
            background-color: var(--darker);
        }

        .dark .dark\:text-gray-300 {
            color: #D1D5DB;
        }

        .dark .dark\:text-blue-500 {
            color: #3B82F6;
        }

        .dark .dark\:text-blue-100 {
            color: #DBEAFE;
        }

        .dark .dark\:hover\:text-light:hover {
            color: var(--light);
        }

        .dark .dark\:border-blue-800 {
            border-color: #1e40af;
        }

        .dark .dark\:border-blue-700 {
            border-color: #1D4ED8;
        }

        .dark .dark\:bg-blue-600 {
            background-color: #2563eb;
        }

        .dark .dark\:hover\:bg-blue-600:hover {
            background-color: #2563eb;
        }

        .hover\:overflow-y-auto:hover {
            overflow-y: auto;
        }
    </style>

    <div x-data="setup()"">
        <!--  -->
        <div class="flex h-screen antialiased text-gray-900 bg-gray-100 dark:bg-dark dark:text-light">
            <!-- Sidebar -->
            <aside class="flex-shrink-0 hidden w-64 bg-white border-r dark:border-blue-800 dark:bg-darker md:block">
                <div class="flex flex-col h-full">
                    <!-- Sidebar links -->
                    <nav aria-label="Main" class="flex-1 px-2 py-4 space-y-2 overflow-y-hidden hover:overflow-y-auto">
                        <!-- Dashboards links -->
                        <a href="{{ route('dashboard') }}"
                            class="group flex items-center px-2 py-2 text-sm font-medium rounded-md bg-blue-100 text-blue-700">
                            <svg class="mr-3 flex-shrink-0 h-6 w-6 text-blue-500" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg> Dashboard
                        </a>

                        <a href="{{ route('categories.index') }}"
                            class="group flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-600 hover:bg-gray-50 hover:text-gray-900">
                            <svg class="mr-3 flex-shrink-0 h-6 w-6 text-gray-400 group-hover:text-gray-500"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z">
                                </path>
                            </svg> Thể loại
                        </a>

                        <a href="{{ route('food.index') }}"
                            class="group flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-600 hover:bg-gray-50 hover:text-gray-900">
                            <svg class="mr-3 flex-shrink-0 h-6 w-6 text-gray-400 group-hover:text-gray-500"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                </path>
                            </svg> Sản phẩm
                        </a>

                        <a href="{{ route('employees') }}"
                            class="group flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-600 hover:bg-gray-50 hover:text-gray-900">
                            <svg class="mr-3 flex-shrink-0 h-6 w-6 text-gray-400 group-hover:text-gray-500"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                </path>
                            </svg> Nhân viên
                        </a>

                        <a href="{{ route('groups.index') }}"
                            class="group flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-600 hover:bg-gray-50 hover:text-gray-900">
                            <svg class="mr-3 flex-shrink-0 h-6 w-6 text-gray-400 group-hover:text-gray-500"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                </path>
                            </svg> Nhóm
                        </a>


                        <div class="relative" x-data="{ open: false }">
                            <div @click="open = ! open">
                                <button class="group -m-2 p-2 flex items-center" type="button">
                                    <span class="sr-only">Open user menu</span>
                                    <a
                                        class="group flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-600 hover:bg-gray-50 hover:text-gray-900">
                                        <svg class="mr-3 flex-shrink-0 h-6 w-6 text-gray-400 group-hover:text-gray-500"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="2" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                                            </path>
                                        </svg> Đơn hàng
                                    </a>
                                </button>
                            </div>
                            <div x-show="open" x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="transform opacity-0 scale-95"
                                x-transition:enter-end="transform opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="transform opacity-100 scale-100"
                                x-transition:leave-end="transform opacity-0 scale-95"
                                class="absolute z-50 mt-2 w-60 rounded-md shadow-lg origin-top-right right-0"
                                style="display: none;">
                                <div class="m-auto rounded-md ring-1 ring-opacity-5 py-1 bg-white">
                                    <div class="px-4 py-2 ">
                                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                            aria-labelledby="dropdownUserAvatarButton">
                                            <li>
                                                <a href="/dashboard/orders/online"
                                                    class="block py-2 px-4 hover:bg-gray-100">Đơn hàng online</a>
                                            </li>
                                            <li>
                                                <a href="/dashboard/orders/offline"
                                                    class="block py-2 px-4 hover:bg-gray-100">Tại quán</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </nav>
                </div>
            </aside>

            <div class="flex flex-col flex-1 min-h-screen overflow-x-hidden overflow-y-auto">
                <!-- Navbar -->
                <header class="relative bg-white dark:bg-darker">
                    <div class="flex items-center justify-between p-2 border-b dark:border-blue-800">

                        <!-- Brand -->
                        <a
                            class="inline-block text-2xl font-bold tracking-wider text-blue-700 uppercase dark:text-light">

                        </a>

                        <!-- Desktop Right buttons -->
                        <nav aria-label="Secondary" class="hidden space-x-2 md:flex md:items-center">

                            <!-- Notification button -->
                            <button @click="openNotificationsPanel"
                                class="p-2 text-blue-400 transition-colors duration-200 rounded-full bg-blue-50 hover:text-blue-600 hover:bg-blue-100 dark:hover:text-light dark:hover:bg-blue-700 dark:bg-dark focus:outline-none focus:bg-blue-100 dark:focus:bg-blue-700 focus:ring-blue-800">
                                <span class="sr-only">Open Notification panel</span>
                                <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                </svg>
                            </button>

                            <!-- Search button -->
                            <button @click="openSearchPanel"
                                class="p-2 text-blue-400 transition-colors duration-200 rounded-full bg-blue-50 hover:text-blue-600 hover:bg-blue-100 dark:hover:text-light dark:hover:bg-blue-700 dark:bg-dark focus:outline-none focus:bg-blue-100 dark:focus:bg-blue-700 focus:ring-blue-800">
                                <span class="sr-only">Open search panel</span>
                                <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </button>
                            <div class="mx-3.5">
                                <p class=" uppercase text-slate-500 hover:text-blue-600">{{ Auth::user()->name }}</p>
                            </div>
                            <!-- User avatar button -->
                            <div class="relative" x-data="{ open: false }">
                                <button @click="open = !open; $nextTick(() => { if(open){ $refs.userMenu.focus() } })"
                                    type="button" aria-haspopup="true" :aria-expanded="open ? 'true' : 'false'"
                                    class="transition-opacity duration-200 rounded-full dark:opacity-75 dark:hover:opacity-100 focus:outline-none focus:ring dark:focus:opacity-100">
                                    <span class="sr-only">User menu</span>
                                    @if (Auth::user()->profile_photo_path)
                                        <img class="w-10 h-10 rounded-full"
                                            src="{{ asset(Auth::user()->profile_photo_path) }}" />
                                    @else
                                        <svg class="w-10 h-10" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                                            </path>
                                        </svg>
                                    @endif
                                </button>

                                <!-- User dropdown menu -->
                                <div x-show="open" x-ref="userMenu"
                                    x-transition:enter="transition-all transform ease-out"
                                    x-transition:enter-start="translate-y-1/2 opacity-0"
                                    x-transition:enter-end="translate-y-0 opacity-100"
                                    x-transition:leave="transition-all transform ease-in"
                                    x-transition:leave-start="translate-y-0 opacity-100"
                                    x-transition:leave-end="translate-y-1/2 opacity-0" @click.away="open = false"
                                    @keydown.escape="open = false"
                                    class="absolute right-0 w-48 py-1 bg-white rounded-md shadow-lg top-12 ring-1 ring-black ring-opacity-5 dark:bg-dark focus:outline-none"
                                    tabindex="-1" role="menu" aria-orientation="vertical"
                                    aria-label="User menu">
                                    <a href="{{ route('profile.show') }}" role="menuitem"
                                        class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-blue-600">
                                        {{ __('Your Profile') }}
                                    </a>
                                    <form method="POST" action="{{ route('logout') }}" x-data>
                                        @csrf
                                        <a href="{{ route('logout') }}" @click.prevent="$root.submit();""
                                            role="menuitem"
                                            class="block px-4 py-2 text-sm text-gray-700 transition-colors hover:bg-gray-100 dark:text-light dark:hover:bg-blue-600">
                                            {{ __('Log Out') }}
                                        </a>
                                    </form>
                                </div>
                            </div>
                        </nav>
                    </div>
                </header>

                <!-- Main content -->
                <div class="w-full flex flex-col flex-1">
                    <main class="flex-1">
                        {{ $slot }}
                    </main>
                </div>

            </div>

            <!-- Panels -->
            <!-- Notification panel -->
            <!-- Backdrop -->
            <div x-transition:enter="transition duration-300 ease-in-out" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="transition duration-300 ease-in-out"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                x-show="isNotificationsPanelOpen" @click="isNotificationsPanelOpen = false"
                class="fixed inset-0 z-10  bg-opacity-25" style="opacity: .5;" aria-hidden="true">
            </div>
            <!-- Panel -->
            <section x-cloak x-transition:enter="transition duration-300 ease-in-out transform sm:duration-500"
                x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
                x-transition:leave="transition duration-300 ease-in-out transform sm:duration-500"
                x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full"
                x-ref="notificationsPanel" x-show="isNotificationsPanelOpen"
                @keydown.escape="isNotificationsPanelOpen = false" tabindex="-1"
                aria-labelledby="notificationPanelLabel"
                class="fixed inset-y-0 z-20 w-full max-w-xs bg-white dark:bg-darker dark:text-light sm:max-w-md focus:outline-none">
                <div class="absolute right-0 p-2 transform translate-x-full">
                    <!-- Close button -->
                    <button @click="isNotificationsPanelOpen = false"
                        class="p-2 text-white rounded-md focus:outline-none focus:ring">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="flex flex-col h-screen" x-data="{ activeTabe: 'action' }">
                    <!-- Panel header -->
                    <div class="flex-shrink-0">
                        <div class="flex items-center justify-between px-4 pt-4 border-b dark:border-blue-800">
                            <h2 id="notificationPanelLabel" class="pb-4 font-semibold">Notifications</h2>
                            <div class="space-x-2">
                                <button @click.prevent="activeTabe = 'action'"
                                    class="px-px pb-4 transition-all duration-200 transform translate-y-px border-b focus:outline-none"
                                    :class="{
                                        'border-blue-700 dark:border-blue-600': activeTabe ==
                                            'action',
                                        'border-transparent': activeTabe != 'action'
                                    }">
                                    Action
                                </button>
                                <button @click.prevent="activeTabe = 'user'"
                                    class="px-px pb-4 transition-all duration-200 transform translate-y-px border-b focus:outline-none"
                                    :class="{
                                        'border-blue-700 dark:border-blue-600': activeTabe ==
                                            'user',
                                        'border-transparent': activeTabe != 'user'
                                    }">
                                    User
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Panel content (tabs) -->
                    <div class="flex-1 pt-4 overflow-y-hidden hover:overflow-y-auto">
                        <!-- Action tab -->
                        <div class="space-y-4" x-show.transition.in="activeTabe == 'action'">
                            <a href="#" class="block">
                                <div class="flex px-4 space-x-4">
                                    <div class="relative flex-shrink-0">
                                        <span
                                            class="z-10 inline-block p-2 overflow-visible text-blue-500 rounded-full bg-blue-50 dark:bg-blue-800">
                                            <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                            </svg>
                                        </span>
                                        <div
                                            class="absolute h-24 p-px -mt-3 -ml-px bg-blue-50 left-1/2 dark:bg-blue-800">
                                        </div>
                                    </div>
                                    <div class="flex-1 overflow-hidden">
                                        <h5 class="text-sm font-semibold text-gray-600 dark:text-light">
                                            New project "KWD Dashboard" created
                                        </h5>
                                        <p class="text-sm font-normal text-gray-400 truncate dark:text-blue-400">
                                            Looks like there might be a new theme soon
                                        </p>
                                        <span class="text-sm font-normal text-gray-400 dark:text-blue-500"> 9h ago
                                        </span>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="block">
                                <div class="flex px-4 space-x-4">
                                    <div class="relative flex-shrink-0">
                                        <span
                                            class="inline-block p-2 overflow-visible text-blue-500 rounded-full bg-blue-50 dark:bg-blue-800">
                                            <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                            </svg>
                                        </span>
                                        <div
                                            class="absolute h-24 p-px -mt-3 -ml-px bg-blue-50 left-1/2 dark:bg-blue-800">
                                        </div>
                                    </div>
                                    <div class="flex-1 overflow-hidden">
                                        <h5 class="text-sm font-semibold text-gray-600 dark:text-light">
                                            KWD Dashboard v0.0.2 was released
                                        </h5>
                                        <p class="text-sm font-normal text-gray-400 truncate dark:text-blue-400">
                                            Successful new version was released
                                        </p>
                                        <span class="text-sm font-normal text-gray-400 dark:text-blue-500"> 2d ago
                                        </span>
                                    </div>
                                </div>
                            </a>
                            <template x-for="i in 20" x-key="i">
                                <a href="#" class="block">
                                    <div class="flex px-4 space-x-4">
                                        <div class="relative flex-shrink-0">
                                            <span
                                                class="inline-block p-2 overflow-visible text-blue-500 rounded-full bg-blue-50 dark:bg-blue-800">
                                                <svg class="w-7 h-7" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                                                </svg>
                                            </span>
                                            <div
                                                class="absolute h-24 p-px -mt-3 -ml-px bg-blue-50 left-1/2 dark:bg-blue-800">
                                            </div>
                                        </div>
                                        <div class="flex-1 overflow-hidden">
                                            <h5 class="text-sm font-semibold text-gray-600 dark:text-light">
                                                New project "KWD Dashboard" created
                                            </h5>
                                            <p class="text-sm font-normal text-gray-400 truncate dark:text-blue-400">
                                                Looks like there might be a new theme soon
                                            </p>
                                            <span class="text-sm font-normal text-gray-400 dark:text-blue-500"> 9h ago
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </template>
                        </div>

                        <!-- User tab -->
                        <div class="space-y-4" x-show.transition.in="activeTabe == 'user'">
                            <a href="#" class="block">
                                <div class="flex px-4 space-x-4">
                                    <div class="relative flex-shrink-0">
                                        <span class="relative z-10 inline-block overflow-visible rounded-ful">
                                            <img class="object-cover rounded-full w-9 h-9"
                                                src="https://avatars.githubusercontent.com/u/57622665?s=460&u=8f581f4c4acd4c18c33a87b3e6476112325e8b38&v=4"
                                                alt="Ahmed kamel" />
                                        </span>
                                        <div
                                            class="absolute h-24 p-px -mt-3 -ml-px bg-blue-50 left-1/2 dark:bg-blue-800">
                                        </div>
                                    </div>
                                    <div class="flex-1 overflow-hidden">
                                        <h5 class="text-sm font-semibold text-gray-600 dark:text-light">Ahmed Kamel
                                        </h5>
                                        <p class="text-sm font-normal text-gray-400 truncate dark:text-blue-400">
                                            Shared new project "K-WD Dashboard"
                                        </p>
                                        <span class="text-sm font-normal text-gray-400 dark:text-blue-500"> 1d ago
                                        </span>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="block">
                                <div class="flex px-4 space-x-4">
                                    <div class="relative flex-shrink-0">
                                        <span class="relative z-10 inline-block overflow-visible rounded-ful">
                                            <img class="object-cover rounded-full w-9 h-9"
                                                src="https://avatars.githubusercontent.com/u/57622665?s=460&u=8f581f4c4acd4c18c33a87b3e6476112325e8b38&v=4"
                                                alt="Ahmed kamel" />
                                        </span>
                                        <div
                                            class="absolute h-24 p-px -mt-3 -ml-px bg-blue-50 left-1/2 dark:bg-blue-800">
                                        </div>
                                    </div>
                                    <div class="flex-1 overflow-hidden">
                                        <h5 class="text-sm font-semibold text-gray-600 dark:text-light">Ahmed Kamel
                                        </h5>
                                        <p class="text-sm font-normal text-gray-400 truncate dark:text-blue-400">
                                            Commit new changes to K-WD Dashboard project.
                                        </p>
                                        <span class="text-sm font-normal text-gray-400 dark:text-blue-500"> 10h ago
                                        </span>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="block">
                                <div class="flex px-4 space-x-4">
                                    <div class="relative flex-shrink-0">
                                        <span class="relative z-10 inline-block overflow-visible rounded-ful">
                                            <img class="object-cover rounded-full w-9 h-9"
                                                src="https://avatars.githubusercontent.com/u/57622665?s=460&u=8f581f4c4acd4c18c33a87b3e6476112325e8b38&v=4"
                                                alt="Ahmed kamel" />
                                        </span>
                                        <div
                                            class="absolute h-24 p-px -mt-3 -ml-px bg-blue-50 left-1/2 dark:bg-blue-800">
                                        </div>
                                    </div>
                                    <div class="flex-1 overflow-hidden">
                                        <h5 class="text-sm font-semibold text-gray-600 dark:text-light">Ahmed Kamel
                                        </h5>
                                        <p class="text-sm font-normal text-gray-400 truncate dark:text-blue-400">
                                            Release new version "K-WD Dashboard"
                                        </p>
                                        <span class="text-sm font-normal text-gray-400 dark:text-blue-500"> 20d ago
                                        </span>
                                    </div>
                                </div>
                            </a>
                            <template x-for="i in 10" x-key="i">
                                <a href="#" class="block">
                                    <div class="flex px-4 space-x-4">
                                        <div class="relative flex-shrink-0">
                                            <span class="relative z-10 inline-block overflow-visible rounded-ful">
                                                <img class="object-cover rounded-full w-9 h-9"
                                                    src="https://avatars.githubusercontent.com/u/57622665?s=460&u=8f581f4c4acd4c18c33a87b3e6476112325e8b38&v=4"
                                                    alt="Ahmed kamel" />
                                            </span>
                                            <div
                                                class="absolute h-24 p-px -mt-3 -ml-px bg-blue-50 left-1/2 dark:bg-blue-800">
                                            </div>
                                        </div>
                                        <div class="flex-1 overflow-hidden">
                                            <h5 class="text-sm font-semibold text-gray-600 dark:text-light">Ahmed Kamel
                                            </h5>
                                            <p class="text-sm font-normal text-gray-400 truncate dark:text-blue-400">
                                                Release new version "K-WD Dashboard"
                                            </p>
                                            <span class="text-sm font-normal text-gray-400 dark:text-blue-500"> 20d ago
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </template>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Search panel -->
            <!-- Backdrop -->
            <div x-transition:enter="transition duration-300 ease-in-out" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="transition duration-300 ease-in-out"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-show="isSearchPanelOpen"
                @click="isSearchPanelOpen = false" class="fixed inset-0 z-10  bg-opacity-25" style="opacity: .5;"
                aria-hidden="ture">
            </div>
            <!-- Panel -->
            <section x-cloak x-transition:enter="transition duration-300 ease-in-out transform sm:duration-500"
                x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
                x-transition:leave="transition duration-300 ease-in-out transform sm:duration-500"
                x-transition:leave-start="translate-x-0" x-transition:leave-end="-translate-x-full"
                x-show="isSearchPanelOpen" @keydown.escape="isSearchPanelOpen = false"
                class="fixed inset-y-0 z-20 w-full max-w-xs bg-white shadow-xl dark:bg-darker dark:text-light sm:max-w-md focus:outline-none">
                <div class="absolute right-0 p-2 transform translate-x-full">
                    <!-- Close button -->
                    <button @click="isSearchPanelOpen = false"
                        class="p-2 text-white rounded-md focus:outline-none focus:ring">
                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <h2 class="sr-only">Search panel</h2>
                <!-- Panel content -->
                <div class="flex flex-col h-screen">
                    <!-- Panel header (Search input) -->
                    <div
                        class="relative flex-shrink-0 px-4 py-8 text-gray-400 border-b dark:border-blue-800 dark:focus-within:text-light focus-within:text-gray-700">
                        <span class="absolute inset-y-0 inline-flex items-center px-4">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </span>
                        <input x-ref="searchInput" type="text"
                            class="w-full py-2 pl-10 pr-4 border rounded-full dark:bg-dark dark:border-transparent dark:text-light focus:outline-none focus:ring"
                            placeholder="Search..." />
                    </div>

                    <!-- Panel content (Search result) -->
                    <div class="flex-1 px-4 pb-4 space-y-4 overflow-y-hidden font-sans h hover:overflow-y-auto">
                        <h3 class="py-2 text-sm font-semibold text-gray-600 dark:text-light">History</h3>
                        <a href="#" class="flex space-x-4">
                            <div class="flex-shrink-0">
                                <img class="w-10 h-10 rounded-lg"
                                    src="https://avatars.githubusercontent.com/u/57622665?s=460&u=8f581f4c4acd4c18c33a87b3e6476112325e8b38&v=4"
                                    alt="Post cover" />
                            </div>
                            <div class="flex-1 max-w-xs overflow-hidden">
                                <h4 class="text-sm font-semibold text-gray-600 dark:text-light">Header</h4>
                                <p class="text-sm font-normal text-gray-400 truncate dark:text-blue-400">
                                    Lorem ipsum dolor, sit amet consectetur.
                                </p>
                                <span class="text-sm font-normal text-gray-400 dark:text-blue-500"> Post </span>
                            </div>
                        </a>
                        <a href="#" class="flex space-x-4">
                            <div class="flex-shrink-0">
                                <img class="w-10 h-10 rounded-lg"
                                    src="https://avatars.githubusercontent.com/u/57622665?s=460&u=8f581f4c4acd4c18c33a87b3e6476112325e8b38&v=4"
                                    alt="Ahmed Kamel" />
                            </div>
                            <div class="flex-1 max-w-xs overflow-hidden">
                                <h4 class="text-sm font-semibold text-gray-600 dark:text-light">Ahmed Kamel</h4>
                                <p class="text-sm font-normal text-gray-400 truncate dark:text-blue-400">
                                    Last activity 3h ago.
                                </p>
                                <span class="text-sm font-normal text-gray-400 dark:text-blue-500"> Offline </span>
                            </div>
                        </a>
                        <a href="#" class="flex space-x-4">
                            <div class="flex-shrink-0">
                                <img class="w-10 h-10 rounded-lg"
                                    src="https://avatars.githubusercontent.com/u/57622665?s=460&u=8f581f4c4acd4c18c33a87b3e6476112325e8b38&v=4"
                                    alt="K-WD Dashboard" />
                            </div>
                            <div class="flex-1 max-w-xs overflow-hidden">
                                <h4 class="text-sm font-semibold text-gray-600 dark:text-light">K-WD Dashboard</h4>
                                <p class="text-sm font-normal text-gray-400 truncate dark:text-blue-400">
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                </p>
                                <span class="text-sm font-normal text-gray-400 dark:text-blue-500"> Updated 3h ago.
                                </span>
                            </div>
                        </a>
                        <template x-for="i in 10" x-key="i">
                            <a href="#" class="flex space-x-4">
                                <div class="flex-shrink-0">
                                    <img class="w-10 h-10 rounded-lg"
                                        src="https://avatars.githubusercontent.com/u/57622665?s=460&u=8f581f4c4acd4c18c33a87b3e6476112325e8b38&v=4"
                                        alt="K-WD Dashboard" />
                                </div>
                                <div class="flex-1 max-w-xs overflow-hidden">
                                    <h4 class="text-sm font-semibold text-gray-600 dark:text-light">K-WD Dashboard</h4>
                                    <p class="text-sm font-normal text-gray-400 truncate dark:text-blue-400">
                                        Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                                    </p>
                                    <span class="text-sm font-normal text-gray-400 dark:text-blue-500"> Updated 3h ago.
                                    </span>
                                </div>
                            </a>
                        </template>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <script>
        const setup = () => {
            return {
                isNotificationsPanelOpen: false,
                openNotificationsPanel() {
                    this.isNotificationsPanelOpen = true
                    this.$nextTick(() => {
                        this.$refs.notificationsPanel.focus()
                    })
                },
                isSearchPanelOpen: false,
                openSearchPanel() {
                    this.isSearchPanelOpen = true
                    this.$nextTick(() => {
                        this.$refs.searchInput.focus()
                    })
                },
            }
        }
    </script>
    @stack('modals')
    @livewireScripts
    @stack('scripts')
    <script src="https://unpkg.com/flowbite@1.5.4/dist/flowbite.js"></script>
    <script>
        window.addEventListener('alert', event => {
            toastr[event.detail.type](event.detail.message,
                event.detail.title ?? ''), toastr.options = {
                "closeButton": true,
                "progressBar": true,
            }
        });
    </script>

</body>

</html>
