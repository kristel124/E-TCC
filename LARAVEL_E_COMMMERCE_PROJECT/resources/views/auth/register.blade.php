<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Tcc Shop</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#f5f1eb] text-[#2e2b26] font-sans flex items-center justify-center min-h-screen">

    <div class="w-full max-w-lg bg-[#fffaf5] p-8 rounded-xl shadow-lg">
        
        {{-- Logo and Title --}}
        <div class="text-center mb-6">
            <h2 class="text-xl font-semibold mt-2 text-[#975519]">Register Account</h2>
        </div>

        {{-- Validation Errors --}}
        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            {{-- User Type --}}
            <div class="mb-4">
                <x-label for="user_type" value="{{ __('User Type') }}" class="text-[#5a534a]" />
                <select id="user_type" name="user_type" class="block mt-1 w-full border border-[#e3e3e0] rounded-md shadow-sm p-2" required>
                    <option value="">Select User Type</option>
                    <option value="user" {{ old('user_type') === 'user' ? 'selected' : '' }}>User</option>
                    <option value="seller" {{ old('user_type') === 'seller' ? 'selected' : '' }}>Seller</option>
                </select>
                @error('user_type')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                @enderror
            </div>

            {{-- Name --}}
            <div class="mb-4">
                <x-label for="name" value="{{ __('Name') }}" class="text-[#5a534a]" />
                <x-input id="name" class="block mt-1 w-full border border-[#e3e3e0] rounded-md p-2" type="text" name="name"
                    :value="old('name')" required autofocus autocomplete="name" />
            </div>

            {{-- Phone (User & Seller) --}}
            <div id="phone_field" class="mb-4 hidden">
                <x-label for="phone" value="{{ __('Phone Number') }}" class="text-[#5a534a]" />
                <x-input id="phone" class="block mt-1 w-full border border-[#e3e3e0] rounded-md p-2" type="text" name="phone"
                    :value="old('phone')" />
            </div>

            {{-- User Only Fields --}}
            <div id="gender_field" class="mb-4 hidden">
                <x-label for="gender" value="{{ __('Gender') }}" class="text-[#5a534a]" />
                <select id="gender" name="gender" class="block mt-1 w-full border border-[#e3e3e0] rounded-md p-2">
                    <option value="">Select Gender</option>
                    <option value="male" {{ old('gender') === 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender') === 'female' ? 'selected' : '' }}>Female</option>
                </select>
            </div>

            <div id="birthdate_field" class="mb-4 hidden">
                <x-label for="birth_date" value="{{ __('Birth Date') }}" class="text-[#5a534a]" />
                <x-input id="birth_date" class="block mt-1 w-full border border-[#e3e3e0] rounded-md p-2" type="date" name="birth_date"
                    :value="old('birth_date')" />
            </div>

            {{-- Email --}}
            <div class="mb-4">
                <x-label for="email" value="{{ __('Email') }}" class="text-[#5a534a]" />
                <x-input id="email" class="block mt-1 w-full border border-[#e3e3e0] rounded-md p-2" type="email" name="email"
                    :value="old('email')" required autocomplete="username" />
            </div>

            {{-- Password --}}
            <div class="mb-4">
                <x-label for="password" value="{{ __('Password') }}" class="text-[#5a534a]" />
                <x-input id="password" class="block mt-1 w-full border border-[#e3e3e0] rounded-md p-2" type="password" name="password"
                    required autocomplete="new-password" />
            </div>

            {{-- Confirm Password --}}
            <div class="mb-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" class="text-[#5a534a]" />
                <x-input id="password_confirmation" class="block mt-1 w-full border border-[#e3e3e0] rounded-md p-2" type="password"
                    name="password_confirmation" required autocomplete="new-password" />
            </div>

            {{-- Terms --}}
            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mb-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />
                            <div class="ml-2 text-[#5a534a] text-sm">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' => '<a target="_blank" href="' . route('terms.show') . '" class="underline hover:text-[#975519]">' . __('Terms of Service') . '</a>',
                                    'privacy_policy' => '<a target="_blank" href="' . route('policy.show') . '" class="underline hover:text-[#975519]">' . __('Privacy Policy') . '</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            {{-- Submit --}}
            <div class="flex items-center justify-end mt-6">
                <a class="underline text-sm text-[#7a6c5a] hover:text-[#975519]" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4 bg-[#975519] hover:bg-[#c87a2e] text-white font-semibold rounded-lg px-6 py-2 transition duration-200">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </div>

    {{-- JavaScript for dynamic fields --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const userTypeSelect = document.getElementById('user_type');
            const phoneField = document.getElementById('phone_field');
            const genderField = document.getElementById('gender_field');
            const birthdateField = document.getElementById('birthdate_field');

            function toggleFields() {
                const type = userTypeSelect.value;
                const isUser = type === 'user';
                const isSeller = type === 'seller';

                phoneField.classList.toggle('hidden', !isUser && !isSeller);
                genderField.classList.toggle('hidden', !isUser);
                birthdateField.classList.toggle('hidden', !isUser);
            }

            userTypeSelect.addEventListener('change', toggleFields);
            toggleFields(); // Run once on page load
        });
    </script>
</body>
</html>
