<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        $user = $request->user();

        switch ($user->user_type) {
            case 'admin':
                return redirect()->intended(route('admin.admin_dashboard'));
            case 'seller':
                return redirect()->intended(route('seller.seller_dashboard'));
            default:
                return redirect()->intended(route('user.user_page'));
        }
    }
}
