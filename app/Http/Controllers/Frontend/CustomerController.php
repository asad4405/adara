<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Shipping;
use App\Models\ShippingCharge;
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

        if (Customer::where('phone', $request->phone_email)->exists()) {
            if (Auth::guard('customer')->attempt(['phone' => $request->phone_email, 'password' => $request->password])) {
                return redirect()->route('customer.profile');
            } else {
                return back()->with('wrong', 'Wrong Credential!');
            }
        } elseif (Customer::where('email', $request->phone_email)->exists()) {
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

        return redirect()->back()->with('success', 'Customer Profile Updated Success!');
    }

    public function checkout()
    {
        $cart = session()->get('cart', []);
        $shipping_charge = ShippingCharge::where('status', 1)->get();
        return view('Frontend.customer.checkout', compact('cart', 'shipping_charge'));
    }

    public function order_save(Request $request)
    {
        $request->validate([
            'phone' =>'required',
        ]);

        $subtotal = $request->subtotal;
        $discount = $request->discount;
        $total = $request->total_amount;
        $shipping_info = ShippingCharge::find($request->shipping_info);
        $shipping_charge = $shipping_info->amount;

        if (Auth::guard('customer')->user()) {
            $customer_id = Auth::guard('customer')->user()->id;
        } else {
            $exists_customer = Customer::where('phone', $request->phone)->first();

            if ($exists_customer) {
                $customer_id = $exists_customer->id;
            } else {
                $random_password    = rand(111111111, 9999999999);
                $customer           = new Customer();
                $customer->name     = $request->name;
                $customer->phone    = $request->phone;
                $customer->email    = $request->email;
                $customer->password = Hash::make($random_password);
                $customer->save();
                $customer_id = $customer->id;
            }
        }

        // save order info
        $invoice_id = rand(1111, 99999);
        $order                  = new Order();
        $order->invoice_id      = $invoice_id;
        $order->subtotal        = $subtotal;
        $order->discount        = $discount;
        $order->shipping_charge = $shipping_charge;
        $order->total           = $total;
        $order->customer_id     = $customer_id;
        $order->order_status    = 1;
        $order->customer_note   = $request->customer_note;
        $order->save();

        // save order details info
        $cart = session()->get('cart', []);
        foreach ($cart as $value) {
            $product = Product::find($value['product_id']);
            $order_details                   = new OrderDetails();
            $order_details->order_id         = $order->id;
            $order_details->product_id       = $product->id;
            $order_details->product_name     = $product->product_name;
            $order_details->purchase_price   = $product->purchase_price;
            $order_details->sale_price       = $product->new_price;
            $order_details->product_size     = $value['size_id'];
            $order_details->product_color    = $value['color_id'];
            $order_details->quantity         = $value['quantity'];
            $order_details->save();
        }

        // save shipping info
        $shipping              = new Shipping();
        $shipping->order_id    = $order->id;
        $shipping->customer_id = $customer_id;
        $shipping->name        = $request->name;
        $shipping->phone       = $request->phone;
        $shipping->email       = $request->email;
        $shipping->address     = $request->address;
        $shipping->area        = $shipping_info->name;
        $shipping->save();

        // save payment info
        $payment                 = new Payment();
        $payment->order_id       = $order->id;
        $payment->customer_id    = $customer_id;
        $payment->amount         = $total;
        $payment->payment_method = 'Cash On Delivery';
        $payment->payment_status = 'pending';
        $payment->save();
        return redirect()->route('order.success',$order->id)->with('success','Order Success');
    }

    public function order_success($id)
    {
        $order = Order::findOrFail($id);
        return view('Frontend.customer.order_success',compact('order'));
    }
}
