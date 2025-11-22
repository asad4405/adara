@extends('Backend.layouts.master')
@section('title')
    Orders - Edit
@endsection
@section('body-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Order Edit [Invoice : #{{ $order->invoice_id }}]</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <form action="{{ route('admin.order.update', $order->id) }}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Color</th>
                                            <th>Size</th>
                                            <th>Quantity</th>
                                            <th>Sell Price</th>
                                            <th>Discount</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->orderdetails as $key => $value)
                                            <tr>
                                                <td>{{ $key + 1 }} </td>
                                                <td><img src="{{ asset($value->product->product_image) }}" height="50"
                                                        width="50" alt=""></td>
                                                <td>{{ $value->product_name }}</td>
                                                @if ($value->product->product_type == 1)
                                                    <td>
                                                        <select name="product_color" class="form-select">
                                                            @foreach ($colors as $color)
                                                                <option @if ($value->product_color == $color->id) selected @endif
                                                                    value="{{ $color->id }}">{{ $color->color_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                @else
                                                    <td>N\A</td>
                                                @endif
                                                @if ($value->product->product_type == 1)
                                                    <td>
                                                        <select name="product_size" class="form-select">
                                                            @foreach ($sizes as $size)
                                                                <option @if ($value->product_size == $size->id) selected @endif
                                                                    value="{{ $size->id }}">{{ $size->size_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                @else
                                                    <td>N\A</td>
                                                @endif
                                                <td>
                                                    <div class="stepper">
                                                        <button type="button" class="stepper-btn">−</button>
                                                        <input type="text" name="quantity[]" class="stepper-input"
                                                            value="{{ $value->quantity }}" readonly>
                                                        <button type="button" class="stepper-btn">+</button>
                                                    </div>

                                                </td>
                                                @if ($value->product->product_type == 1)
                                                    <td>{{ $price = $value->variant_sale_price }}</td>
                                                @else
                                                    <td>{{ $price = $value->sale_price }}</td>
                                                @endif
                                                <td>{{ $discount = $value->product_discount }}</td>
                                                <td>{{ $price * $value->quantity - $discount }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="my-4 card">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                        <div class="card-body">


                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="mb-3 form-group">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" id="name"
                                            value="{{ $order->shipping ? $order->shipping->name : '' }}" placeholder="Name">
                                    </div>
                                    <div class="mb-3 form-group">
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                            name="phone" id="phone"
                                            value="{{ $order->shipping ? $order->shipping->phone : '' }}"
                                            placeholder="Phone">
                                    </div>
                                    <div class="mb-3 form-group">
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                            name="address" id="address"
                                            value="{{ $order->shipping ? $order->shipping->address : '' }}"
                                            placeholder="Address">
                                    </div>
                                    <div class="mb-3 form-group">
                                        <select name="shipping_charge" class="form-select">
                                            @foreach ($shipping_charge as $value)
                                                <option @if ($order->shipping->area == $value->name) selected @endif
                                                    value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>Subtotal</td>
                                            <td>{{ $order->subtotal }}</td>
                                        </tr>
                                        <tr>
                                            <td>Shipping Charge</td>
                                            <td>{{ $order->shipping_charge }}</td>
                                        </tr>
                                        <tr>
                                            <td>Discount</td>
                                            <td>{{ $order->discount }}</td>
                                        </tr>
                                        <tr>
                                            <td>Total</td>
                                            <td>{{ $order->total }}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-lg-12 col-12">
                                    <div class="mb-3 form-group">
                                        <button type="submit" class="text-white bg-primary btn w-100">Update</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <style>
        .stepper {
            display: inline-flex;
            border: 1px solid #ccc;
            border-radius: 3px;
            overflow: hidden;
            font-family: sans-serif;
        }

        .stepper-btn {
            background-color: #f5f5f5;
            border: none;
            padding: 8px 12px;
            font-size: 18px;
            cursor: pointer;
            user-select: none;
        }

        .stepper-input {
            width: 40px;
            text-align: center;
            border: none;
            font-size: 16px;
            pointer-events: none;
            background-color: white;
        }
    </style>
    <script>
        document.querySelectorAll('.stepper').forEach(function (stepper) {
            let minusBtn = stepper.querySelectorAll('.stepper-btn')[0];
            let plusBtn = stepper.querySelectorAll('.stepper-btn')[1];
            let input = stepper.querySelector('.stepper-input');

            plusBtn.addEventListener('click', function () {
                input.value = parseInt(input.value) + 1;
            });

            minusBtn.addEventListener('click', function () {
                if (parseInt(input.value) > 1) {
                    input.value = parseInt(input.value) - 1;
                }
            });
        });
    </script>

@endsection
