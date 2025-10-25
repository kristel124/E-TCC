<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class UserController extends Controller
{
    public function userPage()
    {
        $products = Product::latest()->get(); // Fetch all products
        return view('user.user_page', compact('products'));
    }

    public function orders()
    {
        // Your code here
        return view('user.orders');
    }

}
