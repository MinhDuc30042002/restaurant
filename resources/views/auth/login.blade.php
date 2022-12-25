<x-layout.client>
    <div class="pt-16 sm:pt-24 pb-24 sm:pb-32">
        <div class="w-full sm:max-w-md px-6 py-4 mx-auto overflow-hidden sm:rounded-lg">
            <div class="text-center mb-5 md:mb-7">
                <x-jet-application-logo class="mx-auto" />
                <p class="mt-2 text-slate-500">
                    Đăng nhập để quản lý tài khoản của bạn.
                </p>
            </div>

            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div>
                    <x-jet-label class="block font-medium text-sm text-gray-700" for="email"
                        value="{{ __('Email') }}" />
                    <x-jet-input id="email"
                        class="shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md block mt-1 w-full sm:text-sm"
                        type="email" name="email" :value="old('email')" autofocus />
                    @error('email')
                        <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                class="font-medium">Đã xảy ra lỗi!</span> {{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-4">
                    <div class="flex items-center justify-between">
                        <x-jet-label class="block font-medium text-sm text-gray-700" for="password"
                            value="{{ __('Password') }}" />
                    </div>

                    <x-jet-input id="password"
                        class="shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md block mt-1 w-full sm:text-sm"
                        type="password" name="password" autocomplete="current-password" />
                    @error('password')
                        <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span
                                class="font-medium">Đã xảy ra lỗi!</span> {{ $message }}</p>
                    @enderror
                    @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                </div>

                <div class="block mt-4">
                    <label class="block font-medium text-sm text-gray-700 inline-flex items-center" for="remember_me">
                        <x-jet-checkbox
                            class="shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded"
                            id="remember_me" name="remember" />
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="flex flex-col items-center space-y-2 mt-4">
                    <button style="background: #4285F4" type="submit"
                        class=" inline-flex items-center justify-center px-4 py-2 text-sm border border-transparent rounded-md font-medium focus:outline-none focus:ring disabled:opacity-25 disabled:cursor-not-allowed transition bg-blue-600 text-white hover:bg-blue-500 focus:border-blue-700 focus:ring-blue-200 active:bg-blue-600 block w-full sm:text-sm">
                        {{ __('Login') }}
                    </button>

                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="/register">
                        Bạn chưa có tài khoản ?
                    </a>

                    <a class="block w-full sm:text-sm" href="{{ route('login.google') }}">
                        <button type="button"
                            class="inline-flex items-center justify-center px-4 py-2 text-sm border border-gray-200 text-black bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-[#4285F4]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#4285F4]/55 mr-2 mb-2 block w-full sm:text-sm">
                            <svg class="mr-2 -ml-1 w-4 h-4" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 48 48">
                                <defs>
                                    <path id="a"
                                        d="M44.5 20H24v8.5h11.8C34.7 33.9 30.1 37 24 37c-7.2 0-13-5.8-13-13s5.8-13 13-13c3.1 0 5.9 1.1 8.1 2.9l6.4-6.4C34.6 4.1 29.6 2 24 2 11.8 2 2 11.8 2 24s9.8 22 22 22c11 0 21-8 21-22 0-1.3-.2-2.7-.5-4z" />
                                </defs>
                                <clipPath id="b">
                                    <use xlink:href="#a" overflow="visible" />
                                </clipPath>
                                <path clip-path="url(#b)" fill="#FBBC05" d="M0 37V11l17 13z" />
                                <path clip-path="url(#b)" fill="#EA4335" d="M0 11l17 13 7-6.1L48 14V0H0z" />
                                <path clip-path="url(#b)" fill="#34A853" d="M0 37l30-23 7.9 1L48 0v48H0z" />
                                <path clip-path="url(#b)" fill="#4285F4" d="M48 48L17 24l-4-3 35-10z" />
                            </svg>
                            Đăng nhập bằng Google
                        </button>
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-layout.client>
