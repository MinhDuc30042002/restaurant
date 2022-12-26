<div class="pt-10">
    <!-- Contact section -->
    <section class="relative bg-white pb-24 sm:pb-32" aria-labelledby="contact-heading">
        <div class="absolute w-full h-1/2 bg-slate-50" aria-hidden="true"></div>
        <!-- Decorative dot pattern -->
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <svg class="absolute z-0 top-0 right-0 transform -translate-y-16 translate-x-1/2 sm:translate-x-1/4 md:-translate-y-24 lg:-translate-y-72 text-slate-200"
                width="404" height="384" fill="none" viewBox="0 0 404 384" aria-hidden="true">
                <defs>
                    <pattern id="64e643ad-2176-4f86-b3d7-f2c5da3b6a6d" x="0" y="0" width="20"
                        height="20" patternUnits="userSpaceOnUse">
                        <rect x="0" y="0" width="4" height="4" class="text-warm-gray-200"
                            fill="currentColor"></rect>
                    </pattern>
                </defs>
                <rect width="404" height="384" fill="url(#64e643ad-2176-4f86-b3d7-f2c5da3b6a6d)"></rect>
            </svg>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="relative bg-white shadow-xl">
                <h2 id="contact-heading" class="sr-only">
                    Contact us
                </h2>

                <div class="grid grid-cols-1 lg:grid-cols-3">
                    <!-- Contact information -->
                    <div
                        class="relative overflow-hidden py-10 px-6 sm:px-10 xl:p-12">
                        <img class="ml-7" src="https://th.bing.com/th/id/R.9fc8d5b1ec8ab04547b403d478055e1f?rik=9MtJdRV98cl64w&pid=ImgRaw&r=0" alt="">
                    </div>

                    <!-- Contact form -->
                    <div class="py-10 px-6 sm:px-10 lg:col-span-2 xl:p-12">
                        <h3 class="text-lg font-medium text-warm-gray-900">
                           Điền thông tin của bạn vào mẫu dưới đây để liên hệ với chúng tôi
                        </h3>
                        <form wire:submit.prevent="submit"
                            class="mt-6 grid grid-cols-1 gap-y-6 sm:grid-cols-2 sm:gap-x-8">
                            <div>
                                <label class="block font-medium text-sm text-gray-700" for="fullname">
                                   Họ và tên
                                </label>
                                <input
                                    placeholder="Điền họ và tên"
                                    class="shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md mt-1 block w-full"
                                    type="text" wire:model="fullname" id="fullname">
                            </div>
                            <div>
                                <label class="block font-medium text-sm text-gray-700" for="email">
                                   Email
                                </label>
                                <input
                                    placeholder="Điền email"
                                    class="shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md mt-1 block w-full"
                                    type="email" wire:model="email" id="email">
                            </div>
                            <div class="sm:col-span-2">
                                <label class="block font-medium text-sm text-gray-700" for="phone">
                                   Sô điện thoại
                                </label>
                                <input
                                    placeholder="Điền số điện thoại"
                                    class="shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md mt-1 block w-full"
                                    type="text" wire:model="phone" id="phone">
                            </div>
                            <div class="sm:col-span-2">
                                <label class="block font-medium text-sm text-gray-700" for="subject">
                                    Tiêu đề
                                </label>
                                <input
                                    placeholder="Điền tiêu đề"
                                    class="shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md mt-1 block w-full"
                                    type="text" wire:model="subject" id="subject">
                            </div>
                            <div class="sm:col-span-2">
                                <div class="flex justify-between">
                                    <label class="block font-medium text-sm text-gray-700" for="message">
                                       Nội dung
                                    </label>

                                </div>
                                <textarea wire:model="message" id="message" rows="4"
                                    placeholder="Điền nội dung"
                                    class="mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"></textarea>
                            </div>
                            <div class="sm:col-span-2 sm:flex">
                            </div>
                            <div class="sm:col-span-2 sm:flex sm:justify-end">
                                <button wire:click="submit"
                                    class="inline-flex items-center justify-center px-4 py-2 text-sm border border-transparent rounded-md font-medium focus:outline-none focus:ring disabled:opacity-25 disabled:cursor-not-allowed transition bg-blue-600 text-white hover:bg-blue-500 focus:border-blue-700 focus:ring-blue-200 active:bg-blue-600 mt-2"
                                    type="submit">
                                    Gửi thông tin
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
