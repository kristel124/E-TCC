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
        $selectedItems = json_decode($request->input('selected_items'), true);

        // Ensure it's always an array
        if (!is_array($selectedItems)) {
            $selectedItems = [$selectedItems];
        }

        if (empty($selectedItems)) {
            return redirect()->back()->with('error', 'Please select at least one item.');
        }

        $shipping = $request->only(['name', 'phone', 'address']);

        return view('user.checkout.summary', [
            'selected_items' => $selectedItems,
            'shipping' => $shipping,
        ]);
    }


    public function confirm(Request $request)
    {
        // Decode the hidden JSON inputs
        $shipping = json_decode($request->input('shipping'), true);
        $selectedItems = json_decode($request->input('selected_items'), true);

        // Safety check
        if (empty($selectedItems)) {
            return redirect()->route('user.cart.index')->with('error', 'No items found for checkout.');
        }

        // Simulate saving order (you can replace this with real DB save later)
        // Example: Order::create([...]);
        
        // Clear the cart after confirmation (optional)
        session()->forget('cart');

        return view('checkout.confirm', [
            'shipping' => $shipping,
            'selected_items' => $selectedItems,
        ]);
    }

}
