<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function shippingForm()
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->route('user.cart.index')->with('error', 'Your cart is empty.');
        }
        return view('user.checkout.shipping', compact('cart'));
    }

    public function orderSummary(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'city' => 'required|string|max:255',
            'postal_code' => 'required|string|max:20',
            'phone' => 'required|string|max:20',
        ]);

        session(['shipping' => $validated]);

        $cart = session()->get('cart', []);
        $total = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);

        return view('user.checkout.summary', compact('cart', 'validated', 'total'));
    }

    public function confirmOrder()
    {
        $cart = session()->get('cart', []);
        $shipping = session()->get('shipping');

        if (empty($cart) || empty($shipping)) {
            return redirect()->route('user.cart.index')->with('error', 'Missing checkout information.');
        }

        // Here you can store the order in the database later
        session()->forget(['cart', 'shipping']); // clear

        return redirect()->route('user.user_page')->with('success', 'Order placed successfully!');
    }
}
