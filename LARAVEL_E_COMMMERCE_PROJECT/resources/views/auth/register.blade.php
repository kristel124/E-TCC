<x-guest-layout>
    <div class="auth-card">
        <x-authentication-card>
            <x-slot name="logo">
                <x-authentication-card-logo />
                <h2 class="text-center text-xl font-semibold mt-2">Register Account</h2>
            </x-slot>

            <x-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('register') }}">
                @csrf

                {{-- User Type --}}
                <div class="mt-4">
                    <x-label for="user_type" value="{{ __('User Type') }}" />
                    <select id="user_type" name="user_type" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" required>
                        <option value="">Select User Type</option>
                        <option value="user" {{ old('user_type') === 'user' ? 'selected' : '' }}>User</option>
                        <option value="seller" {{ old('user_type') === 'seller' ? 'selected' : '' }}>Seller</option>
                    </select>
                    @error('user_type')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Common Fields --}}
                <div class="mt-4">
                    <x-label for="name" value="{{ __('Name') }}" />
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                        :value="old('name')" required autofocus autocomplete="name" />
                </div>

                {{-- User and Seller --}}
                <div id="phone_field" class="mt-4 hidden">
                    <x-label for="phone" value="{{ __('Phone Number') }}" />
                    <x-input id="phone" class="block mt-1 w-full" type="text" name="phone"
                        :value="old('phone')" />
                </div>

                {{-- User Only --}}
                <div id="gender_field" class="mt-4 hidden">
                    <x-label for="gender" value="{{ __('Gender') }}" />
                    <select id="gender" name="gender" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
                        <option value="">Select Gender</option>
                        <option value="male" {{ old('gender') === 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ old('gender') === 'female' ? 'selected' : '' }}>Female</option>
                    </select>
                </div>

                <div id="birthdate_field" class="mt-4 hidden">
                    <x-label for="birth_date" value="{{ __('Birth Date') }}" />
                    <x-input id="birth_date" class="block mt-1 w-full" type="date" name="birth_date"
                        :value="old('birth_date')" />
                </div>

                {{-- Common Email & Password --}}
                <div class="mt-4">
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                        :value="old('email')" required autocomplete="username" />
                </div>

                <div class="mt-4">
                    <x-label for="password" value="{{ __('Password') }}" />
                    <x-input id="password" class="block mt-1 w-full" type="password" name="password"
                        required autocomplete="new-password" />
                </div>

                <div class="mt-4">
                    <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                    <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                        name="password_confirmation" required autocomplete="new-password" />
                </div>

                {{-- Terms --}}
                @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="mt-4">
                        <x-label for="terms">
                            <div class="flex items-center">
                                <x-checkbox name="terms" id="terms" required />
                                <div class="ms-2">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="' .
                                            route('terms.show') .
                                            '" class="underline text-sm text-gray-600 hover:text-gray-900">' .
                                            __('Terms of Service') .
                                            '</a>',
                                        'privacy_policy' => '<a target="_blank" href="' .
                                            route('policy.show') .
                                            '" class="underline text-sm text-gray-600 hover:text-gray-900">' .
                                            __('Privacy Policy') .
                                            '</a>',
                                    ]) !!}
                                </div>
                            </div>
                        </x-label>
                    </div>
                @endif

                {{-- Submit --}}
                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900"
                        href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <x-button class="ms-4">
                        {{ __('Register') }}
                    </x-button>
                </div>
            </form>

            {{-- JavaScript --}}
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
        </x-authentication-card>
    </div>
</x-guest-layout>
