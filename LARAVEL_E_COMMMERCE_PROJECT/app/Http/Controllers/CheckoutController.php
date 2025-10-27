<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function shipping(Request $request)
    {
        $selectedItems = $request->input('selected_items', []);

        if (empty($selectedItems)) {
            return redirect()->back()->with('error', 'Please select at least one item.');
        }

        return view('user.checkout.shipping', ['selected_items' => $selectedItems]);
    }

    public function summary(Request $request)
    {
        $selectedItemsIds = json_decode($request->input('selected_items'), true);

        if (!is_array($selectedItemsIds)) {
            $selectedItemsIds = [$selectedItemsIds];
        }

        $cart = session('cart', []);
        $selectedItems = [];

        foreach ($selectedItemsIds as $id) {
            if (isset($cart[$id])) {
                $selectedItems[] = [
                    'id' => $id,
                    'name' => $cart[$id]['name'],
                    'price' => $cart[$id]['price'],
                    'quantity' => $cart[$id]['quantity'],
                ];
            }
        }

        if (empty($selectedItems)) {
            return redirect()->route('user.cart.index')->with('error', 'No valid items found in cart.');
        }

        $shipping = $request->only(['name', 'phone', 'address']);

        // Calculate total
        $total = collect($selectedItems)->sum(function($item){
            return $item['price'] * $item['quantity'];
        });

        return view('user.checkout.summary', [
            'selected_items' => $selectedItems,
            'shipping' => $shipping,
            'total' => $total,
        ]);
    }

    public function confirm(Request $request)
    {
        $shipping = json_decode($request->input('shipping'), true);
        $selectedItems = json_decode($request->input('selected_items'), true);

        if (empty($selectedItems)) {
            return redirect()->route('user.cart.index')->with('error', 'No items found for checkout.');
        }

        // Here you can save the order to DB if needed
        session()->forget('cart'); // clear cart

        return view('user.checkout.confirm', [
            'shipping' => $shipping,
            'selected_items' => $selectedItems,
        ]);
    }
}