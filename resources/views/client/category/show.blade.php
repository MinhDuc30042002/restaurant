<x-layout.client>
    <div>
        <div class="text-center py-16 px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-extrabold tracking-tight text-gray-900">
                {{ $category->name }}
            </h1>
            <div class="mt-4 max-w-xl mx-auto text-base text-gray-500">

            </div>
        </div>

        <div class="pb-24 sm:pb-32">
            <div>

                <section aria-labelledby="products-heading" class="max-w-7xl mx-auto overflow-hidden sm:px-6 lg:px-8">
                    <h2 id="products-heading" class="sr-only">
                        {{ $category->name }}
                    </h2>

                    <div class="-mx-px border-l border-gray-200 grid grid-cols-2 sm:mx-0 md:grid-cols-3 lg:grid-cols-4">
                        @foreach ($data as $item)
                            <div class="group relative p-4 border-r border-b border-gray-200 sm:p-6">
                                <div
                                    class="rounded-lg overflow-hidden bg-gray-200 aspect-w-8 aspect-h-9 group-hover:opacity-75">
                                    <img class="w-full h-full object-cover object-center"
                                        onerror="this.src='https://dashboard-api.flyfood.vn/system/product_images/3822/image.jpg'"
                                        src="{{ asset('images/products/' . $item->image) }}">
                                </div>
                                <div class="pt-10
                                            pb-4 text-center">
                                    <h3 class="text-sm font-medium text-gray-900">
                                        <a href="/mon-an/{{ $item->slug }}">
                                            <span aria-hidden="true" class="absolute inset-0"></span>
                                            {{ $item->name }}
                                        </a>
                                    </h3>
                                    <div class="mt-3 flex-1 flex flex-col items-center">
                                        <p class="sr-only">4.3333 out of 5 stars</p>
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
                                        <p class="mt-1 text-sm text-gray-500">
                                            3 nhận xét
                                        </p>
                                    </div>
                                    <p class="mt-4 text-base font-medium text-gray-900">
                                        {{ number_format($item->price, 0, '', '.') }} đ
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-6">
                        <div>
                        </div>

                    </div>
                </section>

            </div>

        </div>
    </div>
</x-layout.client>
