<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Product;

class UserController extends Controller
{
    public function userPage()
    {
        $products = Product::latest()->get();
        return view('user.user_page', compact('products'));
    }

    public function orders()
    {
        return view('user.orders');
    }
}
