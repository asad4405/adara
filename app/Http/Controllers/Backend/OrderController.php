<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\OrderStatus;
use App\Models\Product;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class OrderController extends Controller
{
    public function index(Request $request, $slug)
    {
        return view('Backend.pages.order.index');
    }

    public function getData()
    {
        $orders = Order::latest()->get();
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
                    <a href="#" class="btn btn-success btn-sm"><i class="fa-solid fa-gear"></i></a>
                    <a class="text-white btn btn-sm btn-primary" id="editButton" data-id="' . $order->id . '" data-bs-toggle="modal" data-bs-target="#Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="#" type="button" id="deleteButton" data-id="' . $order->id . '" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>';
            })
            ->rawColumns(['invoice', 'date', 'name', 'phone', 'amount', 'status', 'action'])
            ->make(true);
    }

    public function invoice($id)
    {
        $order = Order::findOrFail($id);
        $invoice_id = $order->invoice_id;
        $customer = Customer::find($order->customer_id);
        $order_details = OrderDetails::where('order_id', $order->id)->get();
        // return $product = Product::find($order->product_id);
        return view('Backend.pages.order.invoice', compact('order', 'invoice_id', 'customer', 'order_details'));
    }
}
