<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" class="text-gray-700" />
                <x-input 
                    id="email" 
                    class="block mt-1 w-full border border-[#e3e3e0]  focus:border-[#c6a77b] focus:ring-1 focus:ring-[#e3c292] rounded-lg"
                    type="email" 
                    name="email" 
                    :value="old('email')" 
                    required 
                    autofocus 
                    autocomplete="username" 
                />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" class="text-gray-700" />
                <x-input 
                    id="password" 
                    class="block mt-1 w-full border border-[#e3e3e0] bg-[#fffaf5] focus:border-[#c6a77b] focus:ring-1 focus:ring-[#e3c292] rounded-lg"
                    type="password" 
                    name="password" 
                    required 
                    autocomplete="current-password" 
                />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center text-gray-700">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm">{{ __('Remember me') }}</span>
                </label>
            </div>

            {{-- Bottom Signup Prompt --}}
            <div class="mt-8 text-center">
                <p class="text-gray-700">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="text-[#975519] font-semibold hover:text-[#c87a2e] transition duration-200">
                        Sign up
                    </a>
                </p>
            </div>

            <div class="flex items-center justify-end mt-4 space-x-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#975519]" 
                       href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="bg-[#975519] hover:bg-[#c87a2e] text-white font-semibold rounded-lg px-6 py-2 transition duration-200">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
