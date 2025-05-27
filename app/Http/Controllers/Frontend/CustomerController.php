<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function register()
    {
        return view('Frontend.customer.register');
    }

    public function register_store(Request $request)
    {
        $request->validate([
            'name'    => 'required',
            'phone'    => 'required|unique:customers',
            'password' => 'required|min:6'
        ]);

        $customer           = new Customer();
        $customer->name     = $request->name;
        $customer->phone    = $request->phone;
        $customer->email    = $request->email;
        $customer->password = Hash::make($request->password);
        $customer->save();

        return redirect()->route('customer.login')->with('success', 'Customer Registered Successfully!');
    }

    public function login()
    {
        return view('Frontend.customer.login');
    }

    public function login_store(Request $request)
    {
        $request->validate([
            'phone_email' => 'required',
            'password' => 'required',
        ]);

        if(Customer::where('phone', $request->phone_email)->exists()){
            if (Auth::guard('customer')->attempt(['phone' => $request->phone_email, 'password' => $request->password])) {
                return redirect()->route('customer.profile');
            } else {
                return back()->with('wrong', 'Wrong Credential!');
            }
        }elseif (Customer::where('email', $request->phone_email)->exists()) {
            if (Auth::guard('customer')->attempt(['email' => $request->phone_email, 'password' => $request->password])) {
                return redirect()->route('customer.profile');
            } else {
                return back()->with('wrong', 'Wrong Credential!');
            }
        } else {
            return back()->with('exists', 'Email Does not exists!');
        }
    }

    public function profile()
    {
        return view('Frontend.customer.profile');
    }

    public function profile_update(Request $request)
    {
        $customer = Customer::find(Auth::guard('customer')->id());
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->district = $request->district;
        $customer->address = $request->address;
        $customer->area = $request->area;
        $customer->update();

        return redirect()->back()->with('success','Customer Profile Updated Success!');
    }

    public function checkout()
    {
        $cart = session()->get('cart', []);
        return view('Frontend.customer.checkout', compact('cart'));
    }
}
