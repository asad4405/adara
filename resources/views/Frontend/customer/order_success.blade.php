@extends('Frontend.layouts.master')
@section('title')
    Customer Profile
@endsection
@section('body-content')
    <style>
        body {
            background: #f8f9fa;
        }

        .success-box {
            background: #fff;
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.07);
        }

        .success-icon {
            font-size: 60px;
            color: #28a745;
        }

        .order-id {
            background: #f1f1f1;
            padding: 10px 15px;
            border-radius: 10px;
            display: inline-block;
            font-weight: 500;
        }
    </style>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-9">
                <div class="text-center success-box">
                    <div class="mb-4">
                        <div class="mb-3 success-icon">
                            ✅
                        </div>
                        <h2 class="fw-bold">Thank You! Your Order is Confirmed 🎉</h2>
                        <p class="mb-2 text-muted">We appreciate your purchase. Your items will be shipped soon.</p>
                        <div class="mt-3 order-id">Order ID: <strong>{{ $order->invoice_id }}</strong></div>
                    </div>

                    <hr class="my-4">

                    <div class="text-start">
                        <h5 class="mb-3 fw-semibold">Order Summary</h5>
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Subtotal</span>
                                <span>৳ {{ $order->subtotal }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Shipping</span>
                                <span>৳ {{ $order->shipping_charge }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Discount</span>
                                <span>-৳ {{ $order->discount }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between fw-bold">
                                <span>Total Amount</span>
                                <span>৳ {{ $order->total }}</span>
                            </li>
                        </ul>
                    </div>

                    <div class="mt-5">
                        <a href="{{ route('index') }}" class="px-4 btn btn-success btn-lg">Continue Shopping</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
