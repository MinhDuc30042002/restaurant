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
                        <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span class="font-medium">Đã xảy ra lỗi!</span> {{$message}}</p>
                        @enderror
                    </div>

                <div class="mt-4">
                    <div class="flex items-center justify-between">
                        <x-jet-label class="block font-medium text-sm text-gray-700" for="password"
                            value="{{ __('Password') }}" />

                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                    </div>

                    <x-jet-input id="password"
                        class="shadow-sm border-gray-300 focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md block mt-1 w-full sm:text-sm"
                        type="password" name="password" autocomplete="current-password" />
                        @error('password')
                        <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400"><span class="font-medium">Đã xảy ra lỗi!</span> {{$message}}</p>
                        @enderror
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
                        <button style="background: #4285F4" type="button"
                            class="inline-flex items-center justify-center px-4 py-2 text-sm text-white bg-[#4285F4] hover:bg-[#4285F4]/90 focus:ring-4 focus:outline-none focus:ring-[#4285F4]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#4285F4]/55 mr-2 mb-2 block w-full sm:text-sm">
                            <svg class="mr-2 -ml-1 w-4 h-4" aria-hidden="true" focusable="false" data-prefix="fab"
                                data-icon="google" role="img" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 488 512">
                                <path fill="currentColor"
                                    d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z">
                                </path>
                            </svg>
                            Đăng nhập bằng Google
                        </button>
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-layout.client>
