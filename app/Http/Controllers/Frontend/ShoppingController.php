<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShoppingController extends Controller
{
    public function add_to_cart(Request $request)
    {
        $cart = session()->get('cart', []);

        $item = [
            'product_id' => $request->product_id,
            'color_id' => $request->color_id,
            'size_id' => $request->size_id,
            'quantity' => $request->quantity,
        ];

        // Optional: You can also check for duplicate entries
        $cart[] = $item;

        session(['cart' => $cart]);
        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function cart_view()
    {
        $cart = session()->get('cart', []);
        return view('Frontend.pages.cart', compact('cart'));
    }

    public function cart_remove($key)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$key])) {
            unset($cart[$key]);

            // Reindex the array to maintain proper indexes
            $cart = array_values($cart);

            session(['cart' => $cart]);
        }

        return redirect()->back();
        // session()->forget('cart'); // cart all delete
    }
}
