<x-layout.client>
    <div class="pt-16 sm:pt-24 pb-24 sm:pb-32">
        <div class="w-full sm:max-w-md px-6 py-4 mx-auto overflow-hidden sm:rounded-lg">
            <div class="text-center mb-5 md:mb-7">
                <x-jet-application-logo class="mx-auto" />
                <p class="mt-2 text-slate-500">
                    Đăng nhập để quản lý tài khoản của bạn.
                </p>
            </div>

            <x-jet-validation-errors class="mb-4" />

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
                        type="email" name="email" :value="old('email')" required autofocus />
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
                        type="password" name="password" required autocomplete="current-password" />
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
                </div>
            </form>
        </div>
    </div>
</x-layout.client>
