<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'user_type' => ['required', 'in:user,seller'],
            'name' => ['required', 'string', 'max:255'],

            // Common fields
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',

            // User-specific
            'phone' => [
                'required_if:user_type,user,seller',
                'nullable',
                'string',
                'max:20'
            ],
            'gender' => ['required_if:user_type,user', 'nullable', 'string', 'in:male,female'],
            'birth_date' => ['required_if:user_type,user', 'nullable', 'date'],

            // Seller-specific
            'shop_name' => ['required_if:user_type,seller', 'nullable', 'string', 'max:255'],
        ])->validate();
        
        $isFirstUser  = User::count() === 0;
        
        return User::create([
            'user_type' => $isFirstUser  ? 'admin' : $input['user_type'],  // Auto-admin for first user
            'name' => $input['name'],
            'email' => $input['email'],
            'phone' => $input['phone'] ?? null,
            'gender' => $input['gender'] ?? null,
            'birth_date' => $input['birth_date'] ?? null,
            'shop_name' => $input['shop_name'] ?? null,
            'password' => Hash::make($input['password']),
        ]);
    }
}