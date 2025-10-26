<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Tcc Shop</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#f5f1eb] text-[#2e2b26] font-sans flex items-center justify-center min-h-screen">

    <div class="w-full max-w-md bg-[#fffaf5] p-8 rounded-xl shadow-lg">
        
        {{-- Logo Slot --}}
        <div class="mb-6 text-center">
            <h1 class="text-2xl font-bold text-[#975519]">Log in</h1>
        </div>

        {{-- Validation Errors --}}
        <x-validation-errors class="mb-4" />

        {{-- Session Status --}}
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{-- Email --}}
            <div class="mb-4">
                <x-label for="email" value="{{ __('Email') }}" class="text-[#5a534a]" />
                <x-input 
                    id="email"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                    autofocus
                    autocomplete="username"
                    class="block mt-1 w-full border border-[#e3e3e0] focus:border-[#c6a77b] focus:ring-1 focus:ring-[#e3c292] rounded-lg bg-[#fdf7ef] text-[#2e2b26] p-2"
                />
            </div>

            {{-- Password --}}
            <div class="mb-4">
                <x-label for="password" value="{{ __('Password') }}" class="text-[#5a534a]" />
                <x-input
                    id="password"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                    class="block mt-1 w-full border border-[#e3e3e0] focus:border-[#c6a77b] focus:ring-1 focus:ring-[#e3c292] rounded-lg bg-[#fdf7ef] text-[#2e2b26] p-2"
                />
            </div>

            {{-- Remember Me --}}
            <div class="mb-4">
                <label for="remember_me" class="flex items-center text-[#5a534a]">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm">{{ __('Remember me') }}</span>
                </label>
            </div>

            {{-- Actions --}}
            <div class="flex items-center justify-between mt-6">
                @if (Route::has('password.request'))
                    <a class="text-sm text-[#7a6c5a] hover:text-[#975519] transition duration-200" 
                       href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="bg-[#975519] hover:bg-[#c87a2e] text-white font-semibold rounded-lg px-6 py-2 transition duration-200">
                    {{ __('Log in') }}
                </x-button>
            </div>

            {{-- Register Link --}}
            <div class="mt-8 text-center">
                <p class="text-[#5a534a]">
                    Don't have an account?
                    <a href="{{ route('register') }}" class="text-[#975519] font-semibold hover:text-[#c87a2e] transition duration-200">
                        Sign up
                    </a>
                </p>
            </div>
        </form>
    </div>

</body>
</html>
