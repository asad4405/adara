<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\OrderStatus;
use App\Models\Product;
use App\Models\Shipping;
use App\Models\ShippingCharge;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class OrderController extends Controller
{
    public function index(Request $request, $slug)
    {
        $slug = OrderStatus::where('slug', $slug)->first()->slug;

        return view('Backend.pages.order.index', compact('slug'));
    }

    public function getData($slug)
    {
        $order_status = OrderStatus::where('slug', $slug)->first();
        $orders = Order::where('order_status', $order_status->id)->get();
        return DataTables::of($orders)
            ->addColumn('invoice', function ($order) {
                return $order->invoice_id;
            })
            ->addColumn('date', function ($order) {
                return $order->created_at;
            })
            ->addColumn('name', function ($order) {
                if ($order->customer_id) {
                    $customer = Customer::find($order->customer_id);
                } else {
                    $customer = 'N\A';
                }
                return $customer->name;
            })
            ->addColumn('phone', function ($order) {
                return $order->phone;
            })
            ->addColumn('amount', function ($order) {
                return $order->total;
            })
            ->addColumn('status', function ($order) {
                $orderstatus = OrderStatus::find($order->order_status);
                return $orderstatus->name;
            })
            ->addColumn('action', function ($order) {
                return
                    '<a href="' . route('admin.order.invoice', $order->id) . '" class="btn btn-info btn-sm"><i class="fa-solid fa-eye"></i></a>
                    <a href="' . route('admin.order.process', $order->id) . '" class="btn btn-success btn-sm"><i class="fa-solid fa-gear"></i></a>
                    <a class="text-white btn btn-sm btn-primary" id="editButton" data-id="' . $order->id . '" data-bs-toggle="modal" data-bs-target="#Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="#" type="button" id="deleteButton" data-id="' . $order->id . '" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>';
            })
            ->rawColumns(['invoice', 'date', 'name', 'phone', 'amount', 'status', 'action'])
            ->make(true);
    }

    public function invoice($id)
    {
        $order          = Order::findOrFail($id);
        $invoice_id     = $order->invoice_id;
        $customer       = Customer::find($order->customer_id);
        $order_details  = OrderDetails::where('order_id', $order->id)->get();
        // return $product = Product::find($order->product_id);
        return view('Backend.pages.order.invoice', compact('order', 'invoice_id', 'customer', 'order_details'));
    }

    public function process($id)
    {
        $order           = Order::findOrFail($id);
        $shipping_charge = ShippingCharge::where('status', 1)->get();
        $order_status    = OrderStatus::where('status', 1)->get();
        return view('Backend.pages.order.process', compact('order', 'shipping_charge', 'order_status'));
    }

    public function order_update(Request $request, $id)
    {
        $order               = Order::findOrFail($id);
        $order->order_status = $request->order_status;
        $order->admin_note   = $request->admin_note;
        $order->save();

        $shipping_update     = Shipping::where('order_id', $order->id)->first();
        $shippingfee         = ShippingCharge::find($request->shipping_charge);

        if ($shippingfee->name != $request->shipping_charge) {

            if ($order->shipping_charge > $shippingfee->amount) {
                $total = $order->total + ($shippingfee->amount - $order->shipping_charge);
                $order->shipping_charge = $shippingfee->amount;
                $order->total = $total;
                $order->save();
            } else {
                $total = $order->total + ($shippingfee->amount - $order->shipping_charge);
                $order->shipping_charge = $shippingfee->amount;
                $order->total = $total;
                $order->save();
            }
        }

        $shipping_update->name = $request->name;
        $shipping_update->phone = $request->phone;
        $shipping_update->address = $request->address;
        $shipping_update->area = $shippingfee->name;
        $shipping_update->save();

        return redirect()->back()->with('success', 'Order Information Updated!');
    }
}
