@extends('Backend.layouts.master')
@section('title')
    Orders - Process
@endsection
@section('body-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Order Process [Invoice : #{{ $order->invoice_id }}]</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Image</th>
                                    <th>Product</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->orderdetails as $key => $value)
                                    <tr>
                                        <td>{{ $key + 1 }} </td>
                                        <td><img src="{{ asset($value->product->product_image) }}" height="50"
                                                width="50" alt=""></td>
                                        <td>{{ $value->product_name }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="my-4 card">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <div class="card-body">
                        <form action="{{ route('admin.order.change', $order->id) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 col-12">
                                    <div class="mb-3 form-group">
                                        <label for="name" class="form-label">Customer name </label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" id="name"
                                            value="{{ $order->shipping ? $order->shipping->name : '' }}" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="mb-3 form-group">
                                        <label for="phone" class="form-label">Customer Phone </label>
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                            name="phone" id="phone"
                                            value="{{ $order->shipping ? $order->shipping->phone : '' }}"
                                            placeholder="Phone">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-12">
                                    <div class="mb-3 form-group">
                                        <label for="address" class="form-label">Customer Address </label>
                                        <textarea class="form-control" name="address" rows="2">{{ $order->shipping ? $order->shipping->address : '' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="mb-3 form-group">
                                        <label for="area" class="form-label">Delivery Area</label>
                                        <select name="shipping_charge" class="form-select">
                                            @foreach ($shipping_charge as $value)
                                                <option @if ($order->shipping->area == $value->name) selected @endif
                                                    value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="mb-3 form-group">
                                        <label for="order_status" class="form-label">Order Status</label>
                                        <select name="order_status" class="form-select">
                                            @foreach ($order_status as $value)
                                                <option @if ($order->order_status == $value->id) selected @endif
                                                    value="{{ $value->id }}">{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-12">
                                    <div class="mb-3 form-group">
                                        <label for="admin_note" class="form-label">Order Status</label>
                                        <input type="text" class="form-control" name="admin_note" id="admin_note"
                                            value="{{ $order->admin_note ? $order->admin_note : '' }}"
                                            placeholder="Admin Note">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-12">
                                    <div class="mb-3 form-group">
                                        <button type="submit" class="text-white bg-primary btn">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
