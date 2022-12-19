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

<body class="h-full antialiased font-sans bg-slate-100">
    <div class="min-h-full">

        <!-- Navbar left -->
        <div class="hidden lg:flex lg:w-64 lg:flex-col lg:fixed lg:inset-y-0">
            <div class="flex-1 flex flex-col min-h-0 border-r border-gray-200 bg-white">
                <div class="flex-1 flex flex-col pt-5 pb-4 overflow-y-auto">
                    <div class="flex items-center flex-shrink-0 px-4">
                        <a href="https://demo.cartify.dev/admin">
                            <img src="https://demo.cartify.dev/img/logo.png" alt="Cartify" class="h-10 w-auto">
                        </a>
                    </div>
                    <nav class="mt-5 flex-1 bg-white">
                        <div class="px-2 space-y-1">
                            <a href="{{route('dashboard')}}"
                                class="group flex items-center px-2 py-2 text-sm font-medium rounded-md bg-blue-100 text-blue-700">
                                <svg class="mr-3 flex-shrink-0 h-6 w-6 text-blue-500" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                    aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                    </path>
                                </svg> Dashboard
                            </a>

                            <a href="{{route('categories.index')}}"
                                class="group flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-600 hover:bg-gray-50 hover:text-gray-900">
                                <svg class="mr-3 flex-shrink-0 h-6 w-6 text-gray-400 group-hover:text-gray-500"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z">
                                    </path>
                                </svg> Categories
                            </a>

                            <a href="{{route('food.index')}}"
                                class="group flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-600 hover:bg-gray-50 hover:text-gray-900">
                                <svg class="mr-3 flex-shrink-0 h-6 w-6 text-gray-400 group-hover:text-gray-500"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                    </path>
                                </svg> Products
                            </a>

                            <a href="{{route('employees')}}"
                                class="group flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-600 hover:bg-gray-50 hover:text-gray-900">
                                <svg class="mr-3 flex-shrink-0 h-6 w-6 text-gray-400 group-hover:text-gray-500"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                    </path>
                                </svg> Employee
                            </a>

                            <a href="{{route('groups.index')}}"
                                class="group flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-600 hover:bg-gray-50 hover:text-gray-900">
                                <svg class="mr-3 flex-shrink-0 h-6 w-6 text-gray-400 group-hover:text-gray-500"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                                    </path>
                                </svg> Groups
                            </a>

                            <a href="https://demo.cartify.dev/admin/orders"
                                class="group flex items-center px-2 py-2 text-sm font-medium rounded-md text-gray-600 hover:bg-gray-50 hover:text-gray-900">
                                <svg class="mr-3 flex-shrink-0 h-6 w-6 text-gray-400 group-hover:text-gray-500"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="2" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                                    </path>
                                </svg> Orders
                            </a>
                        </div>

                        {{-- <hr class="border-t border-gray-200 my-5" aria-hidden="true"> --}}
                    </nav>
                </div>
                <div class="flex-shrink-0 flex border-t border-gray-200 p-4">
                    <a href="{{route('profile.show')}}" class="flex-shrink-0 w-full group block">
                        <div class="flex items-center">
                            <div>
                                <svg class="inline-block h-9 w-9 rounded-full text-gray-400"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-700 group-hover:text-gray-900">
                                    {{ Auth::user()->name }}
                                </p>
                                <p
                                    class="inline-flex items-center text-xs font-medium text-gray-500 group-hover:text-gray-700">
                                    View profile
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- End navbar left -->

        <!-- Start Content -->
        <div class="md:pl-20 lg:pl-64 flex flex-col flex-1">
            <main class="flex-1">
                {{ $slot }}
            </main>
        </div>
        <!-- End Content -->

    </div>

    </div>

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
