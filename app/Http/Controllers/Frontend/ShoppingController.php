<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Carbon\Carbon;
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

    public function cart_view(Request $request)
    {
        $messg = '';
        $type = '';
        $amount = 0;

        if ($request->coupon_name) {
            $coupon = $request->coupon_name;
            if (Coupon::where('coupon_name', $coupon)->exists()) {
                if (Coupon::where('coupon_name', $coupon)->where('limit', '!=', 0)->exists()) {
                    if (Carbon::now()->format('Y-m-d') < Coupon::where('coupon_name', $coupon)->first()->validity) {
                        $type = Coupon::where('coupon_name', $coupon)->first()->type;
                        $amount = Coupon::where('coupon_name', $coupon)->first()->amount;
                    } else {

                        $messg = 'Coupon Expired!';
                        $amount = 0;
                    }
                } else {
                    $messg = 'Coupon Does not Limit!';
                    $amount = 0;
                }
            } else {
                $messg = 'Coupon Does not exists!';
                $amount = 0;
            }
        } else {
            $amount = 0;
            $coupon = '';
        }

        $cart = session()->get('cart', []);
        return view('Frontend.pages.cart', compact('cart','coupon','type','amount','messg'));
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

    public function cart_apply()
    {
        //
    }
}
