<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        $cart = session()->get('cart', []);
        $selectedIds = $request->selected_items ?? [];

        // Filter only selected items
        $selectedItems = array_filter($cart, function ($key) use ($selectedIds) {
            return in_array($key, $selectedIds);
        }, ARRAY_FILTER_USE_KEY);

        // Calculate total price
        $total = collect($selectedItems)->sum(fn($item) => $item['price'] * $item['quantity']);

        return view('user.checkout.index', [
            'cart' => $selectedItems,
            'total' => $total
        ]);
    }
}
