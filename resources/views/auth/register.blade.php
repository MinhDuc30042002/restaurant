<x-layout.client>
    <div class="pt-12 sm:pt-12 pb-24 sm:pb-32">
        <div class="w-full sm:max-w-xl px-6 py-4 mx-auto overflow-hidden sm:rounded-lg">
            <div class="text-center mb-5 md:mb-7">
                <x-jet-application-logo class="mx-auto" />
                <p class="mt-2 text-slate-500">
                    Đăng kí tài khoản để sử dụng nhiều dịch vụ.
                </p>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <x-jet-label for="firstname" value="{{ __('Firstname') }}" />
                        <x-jet-input id="firstname" class="block mt-1 w-full" type="text" name="firstname"
                            :value="old('firstname')" autofocus autocomplete="firstname" />
                        @error('firstname')
                        <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">{{$message}}.</p>
                        @enderror
                    </div>
                    <div>
                        <x-jet-label for="lastname" value="{{ __('Name') }}" />
                        <x-jet-input id="lastname" class="block mt-1 w-full" type="text" name="lastname"
                            :value="old('lastname')" autocomplete="lastname" />
                        @error('lastname')
                        <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">{{$message}}.</p>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <x-jet-label for="email" value="{{ __('Email Address') }}" />
                        <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email"
                            :value="old('email')" />
                        @error('email')
                        <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">{{$message}}.</p>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <x-jet-label for="phone_number" value="{{ __('Phone Number') }}" />
                        <x-jet-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number"
                            :value="old('phone_number')" />
                        @error('phone_number')
                        <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">{{$message}}.</p>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <x-jet-label for="password" value="{{ __('Password') }}" />
                        <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password"
                            autocomplete="new-password" />
                        @error('password')
                        <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">{{$message}}.</p>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                        <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password"
                            name="password_confirmation" autocomplete="new-password" />
                        @error('password_confirmation')
                        <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">{{$message}}.</p>
                        @enderror
                    </div>
                </div>

                <div class="mt-4 flex">
                    <x-jet-label value="{{ __('Gender') }}" />
                    <div class="flex flex-row ml-2">
                        <x-jet-input id="male" class="" type="radio" name="gender" value="male" />
                        <x-jet-label for="male" class="ml-1">{{ __('Male') }}</x-jet-label>
                    </div>
                    <div class="flex flex-row ml-2">
                        <x-jet-input id="female" type="radio" name="gender" value="female" />
                        <x-jet-label for="female" class="ml-1">{{ __('Female') }}</x-jet-label>
                    </div>

                </div>
                @error('gender')
                <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">{{$message}}.</p>
                @enderror
                <div class="mt-4">
                    <x-jet-label for="address" value="{{ __('Address') }}" />
                    <x-jet-input id="address" class="block mt-1 w-full" type="text" name="address"
                        :value="old('address')" />
                    @error('address')
                    <p id="outlined_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">{{$message}}.</p>
                    @enderror
                </div>
                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-4">
                        <x-jet-label for="terms">
                            <div class="flex items-center">
                                <x-jet-checkbox name="terms" id="terms" required />

                                <div class="ml-2">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' =>
                                            '<a target="_blank" href="' .
                                            route('terms.show') .
                                            '" class="underline text-sm text-gray-600 hover:text-gray-900">' .
                                            __('Terms of Service') .
                                            '</a>',
                                        'privacy_policy' =>
                                            '<a target="_blank" href="' .
                                            route('policy.show') .
                                            '" class="underline text-sm text-gray-600 hover:text-gray-900">' .
                                            __('Privacy Policy') .
                                            '</a>',
                                    ]) !!}
                                </div>
                            </div>
                        </x-jet-label>
                    </div>
                @endif

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-jet-button class="ml-4">
                        {{ __('Register') }}
                    </x-jet-button>
                </div>
            </form>
        </div>
    </div>
</x-layout.client>
