<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LogoutResponse as LogoutResponseContract;

class LogoutResponse implements LogoutResponseContract
{
    public function toResponse($request)
    {
        // Redirect based on user type if needed
        // return redirect()->route('seller.login');

        return redirect('/login'); // or another page you prefer
    }
}
