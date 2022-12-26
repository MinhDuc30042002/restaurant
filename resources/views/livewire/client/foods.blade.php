<div>
    <div class="bg-white">
        <!-- Product details -->
        <div class="max-w-2xl mx-auto mt-8 px-4 sm:px-6 lg:max-w-7xl lg:px-8">
            <div class="lg:grid lg:grid-cols-12 lg:auto-rows-min lg:gap-x-8">
                <!-- Information -->
                <div class="lg:col-start-8 lg:col-span-5">
                    <!-- Title -->
                    <h1 class="text-3xl font-bold text-gray-900">{{ $data->name }}</h1>
                    <!-- Price -->
                    <div class="mt-3">
                        <h2 class="sr-only">{{ $data->name }}</h2>
                        <p class="text-3xl text-gray-900">
                            {{ number_format($data->price, 0, '', '.') }} đ
                        </p>
                    </div>
                    <!-- Rating -->
                    <div class="mt-3">
                        <h3 class="sr-only">Reviews</h3>
                        <div class="flex items-center">
                            <div class="flex items-center">
                                <svg class="h-5 w-5 flex-shrink-0 text-yellow-400" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg> <svg class="h-5 w-5 flex-shrink-0 text-yellow-400"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg> <svg class="h-5 w-5 flex-shrink-0 text-yellow-400"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg> <svg class="h-5 w-5 flex-shrink-0 text-yellow-400"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg> <svg class="h-5 w-5 flex-shrink-0 text-yellow-400"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            </div>
                            <div class="ml-4 flex">
                                <a href="#reviews" class="text-sm font-medium text-blue-600 hover:text-blue-500">
                                    Xem tất cả {{ $count }} đánh giá
                                </a>
                            </div>
                            <p class="sr-only">5 out of 5 stars</p>
                        </div>
                    </div>
                </div>
                <!-- Media -->
                <div class="mt-8 lg:mt-0 lg:col-start-1 lg:col-span-7 lg:row-start-1 lg:row-span-3">
                    <div x-data class="flex gap-x-2.5">
                        <div x-ref="slider"
                            class="flex flex-1 overflow-x-scroll scroll-no-bar scroll-smooth snap-mandatory snap-x w-auto">
                            <div class="snap-center flex-shrink-0 w-full h-full">
                                <img src="{{ asset('images/products/' . $data->image) }}" alt="Product image">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Options and details -->
                <div class="mt-8 lg:col-span-5">
                    <!-- Options and Quantity form -->
                    {{-- <form wire:submit.prevent="addToCart"> --}}
                    <div>
                        <div class="flex items-center space-x-3 mt-8">
                            <div>
                                <label class="block font-medium text-sm text-gray-700 sr-only" for="productQuantity">
                                    Quantity
                                </label>
                                <input
                                    class="shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md py-3 w-28 text-sm text-center sm:text-base show-spinners"
                                    type="number" min="1" max="100" wire:model.lazy="addToCart.quantity">
                            </div>
                            <div class="flex w-full">
                                <button wire:click='addToCart'
                                    class="inline-flex items-center justify-center px-4 py-2 text-sm border border-transparent rounded-md font-medium focus:outline-none focus:ring disabled:opacity-25 disabled:cursor-not-allowed transition bg-blue-600 text-white hover:bg-blue-500 focus:border-blue-700 focus:ring-blue-200 active:bg-blue-600 flex-1 px-8 py-3 font-medium sm:w-full sm:text-base disabled:cursor-not-allowed">
                                    Thêm vào giỏ hàng
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Description -->
                    <div class="mt-10">
                        <h2 class="text-sm font-medium text-gray-900">
                            Chi tiết
                        </h2>
                        <div class="mt-4 prose prose-sm max-w-none text-gray-500">
                            <p>{!! $data->description !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Product reviews -->
        <div id="reviews" class="max-w-2xl mx-auto pt-6 px-4 sm:pt-14 sm:px-6 lg:max-w-7xl lg:px-8">
            <h2 class="text-lg font-medium text-gray-900">Những đánh giá gần đây</h2>
            <div class="mt-6 pb-10 border-t border-b border-gray-200 divide-y divide-gray-200 space-y-10">
                @foreach ($comments as $comment)
                    <div class="pt-10 lg:grid lg:grid-cols-12 lg:gap-x-8">
                        <div
                            class="lg:col-start-5 lg:col-span-8 xl:col-start-4 xl:col-span-9 xl:grid xl:grid-cols-3 xl:gap-x-8 xl:items-start">
                            <div class="flex items-center xl:col-span-1">
                                <div class="flex items-center">
                                    <svg class="h-5 w-5 flex-shrink-0 text-yellow-400"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg> <svg class="h-5 w-5 flex-shrink-0 text-yellow-400"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg> <svg class="h-5 w-5 flex-shrink-0 text-yellow-400"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg> <svg class="h-5 w-5 flex-shrink-0 text-yellow-400"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg> <svg class="h-5 w-5 flex-shrink-0 text-yellow-400"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                </div>
                                <p class="ml-3 text-sm text-gray-700">
                                    5
                                    <span class="sr-only"> out of 5 stars</span>
                                </p>
                            </div>
                            <div class="mt-4 lg:mt-6 xl:mt-0 xl:col-span-2">
                                <div class="space-y-6 text-sm text-gray-500">
                                    <p>
                                        {{ $comment->text }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div
                            class="mt-6 flex items-center text-sm lg:mt-0 lg:col-start-1 lg:col-span-4 lg:row-start-1 lg:flex-col lg:items-start xl:col-span-3">
                            <p class="font-medium text-gray-900">
                                {{ $comment->user->name }}
                            </p>
                            <time datetime="2022-12-09T08:00:19Z"
                                class="ml-4 border-l border-gray-200 pl-4 text-gray-500 lg:ml-0 lg:mt-2 lg:border-0 lg:pl-0">
                                {{ $comment->created_at }}
                            </time>
                        </div>
                    </div>
                @endforeach
            </div>

            @if (Auth::check())
                {{-- Form comment --}}
                <form wire:submit.prevent="saveComment({{ Auth::user()->id }}, {{ $data->id }})" class="mt-3">
                    <label for="default-search"
                        class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z" />
                            </svg>
                        </div>
                        <input type="search" wire:model='comment'
                            class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Nhập bình luận cho món ăn">
                        <x-jet-button
                            class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">
                            Bình luận</x-jet-button>
                    </div>
                    @error('comment')
                        <div
                            class="mt-3 p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg
                                role="alert">
                            <span class="font-medium">Chú ý!</span> {{ $message }}
                        </div>
                    @enderror
                </form>
            @endif
            <div class="w-full grid content-center">
                <button wire:click='onScrollLoadMore'
                    class="mt-4 inline-flex items-center justify-center px-4 py-2 bg-blue-100 border border-transparent rounded-md font-medium sm:text-sm text-blue-700 hover:bg-blue-200 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:bg-blue-300 transition w-1/2 mx-auto md:w-auto text-sm">
                    Xem thêm
                </button>
            </div>

        </div>
        <!-- Recently viewed products -->
        <div class="max-w-2xl mx-auto pt-6 px-4 sm:pt-14 pb-24 sm:pb-32 sm:px-6 lg:max-w-7xl lg:px-8">
            <div class="flex items-center justify-between space-x-4">
                <h2 class="text-lg font-medium text-gray-900">Những món ăn liên quan</h2>
            </div>
            <div class="mt-6 grid grid-cols-1 gap-x-8 gap-y-8 sm:grid-cols-3 xl:grid-cols-5 sm:gap-y-10 lg:grid-cols-5">
                @foreach ($related_item as $item)
                    <div class="relative group flex flex-col">
                        <div class="aspect-w-8 aspect-h-9 rounded-lg overflow-hidden bg-slate-100">
                            <img class="w-full h-full object-cover object-center" loading="lazy"
                                src="{{ asset('images/products/' . $item->image) }}">

                            <div class="flex items-end opacity-0 p-4 group-hover:opacity-100" aria-hidden="true">
                                <div
                                    class="w-full bg-white bg-opacity-75 backdrop-filter backdrop-blur py-2 px-4 rounded-md text-sm font-medium text-gray-900 text-center">
                                    Xem món ăn</div>
                            </div>
                        </div>
                        <div class="flex flex-1 flex-col">
                            <div class="mt-4 text-base font-medium text-gray-900">
                                <h3>
                                    <a href="/mon-an/{{ $item->slug }}" class="line-clamp-2">
                                        <span aria-hidden="true" class="absolute inset-0"></span>
                                        {{ $item->name }}
                                    </a>
                                </h3>
                            </div>
                            <div class="flex-1 flex flex-col justify-end">
                                <div class="mt-1 flex items-center justify-between">
                                    <div class="flex items-center">
                                        <svg class="h-5 w-5 flex-shrink-0 text-yellow-400"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg> <svg class="h-5 w-5 flex-shrink-0 text-yellow-400"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg> <svg class="h-5 w-5 flex-shrink-0 text-yellow-400"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg> <svg class="h-5 w-5 flex-shrink-0 text-yellow-400"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg> <svg class="h-5 w-5 flex-shrink-0 text-yellow-400"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                            fill="currentColor" aria-hidden="true">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                    </div>
                                    <p class="text-sm text-gray-500">
                                        {{ number_format($item->price, 0, '', '.') }} đ
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
