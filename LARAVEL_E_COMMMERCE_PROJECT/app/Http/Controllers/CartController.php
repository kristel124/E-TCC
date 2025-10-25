<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    // Display cart
    public function index()
    {
        $cart = session()->get('cart', []); // Get cart or empty array

        // Calculate total
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return view('user.cart.index', compact('cart', 'total'));
    }

    // Add item to cart
    public function add(Request $request)
    {
        $cart = session()->get('cart', []);

        $id = $request->id;
        $quantity = $request->quantity ?? 1;

        // Example product data (you might fetch from DB)
        $product = [
            'name' => $request->name,
            'price' => $request->price,
            'image' => $request->image
        ];

        // If item already exists, increase quantity
        if(isset($cart[$id])) {
            $cart[$id]['quantity'] += $quantity;
        } else {
            $cart[$id] = array_merge($product, ['quantity' => $quantity]);
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    // Update quantity
    public function update(Request $request)
    {
        $cart = session()->get('cart', []);
        $id = $request->id;

        if(isset($cart[$id])) {
            $cart[$id]['quantity'] = max(1, (int)$request->quantity); // ensure quantity >= 1
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Cart updated!');
    }

    // Remove item
    public function remove(Request $request)
    {
        $cart = session()->get('cart', []);
        $id = $request->id;

        if(isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Item removed from cart!');
    }

    // Clear cart
    public function clear()
    {
        session()->forget('cart');

        return redirect()->back()->with('success', 'Cart cleared!');
    }
}
