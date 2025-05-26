<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function checkout()
    {
        $cart = session()->get('cart', []);
        return view('Frontend.customer.checkout',compact('cart'));
    }
}
