@extends('Backend.layouts.master')
@section('title')
    Payment Gateway
@endsection
@section('body-content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="card">
        <div class="card-title option_sidebar"
            style="display: flex;justify-content: space-between;align-items: center;color: #566a7f;padding: 1.5rem;opacity: 0.8;margin-bottom: -40px;">
            <h5>Manage Bkash Payment Gateway </h5>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.payment-gateway.update', $bkash_payment_gateway->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="" class="form-label">Username *</label>
                            <input type="text" class="form-control" name="username"
                                value="{{ $bkash_payment_gateway->username }}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="" class="form-label">Api Key *</label>
                            <input type="text" class="form-control" name="app_key"
                                value="{{ $bkash_payment_gateway->app_key }}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="" class="form-label">App Secret *</label>
                            <input type="text" class="form-control" name="app_secret"
                                value="{{ $bkash_payment_gateway->app_secret }}">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="" class="form-label">Base Url *</label>
                            <input type="text" class="form-control" name="base_url"
                                value="{{ $bkash_payment_gateway->base_url }}">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="" class="form-label">Password *</label>
                            <input type="text" class="form-control" name="password"
                                value="{{ $bkash_payment_gateway->password }}">
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="mb-3">
                            <label for="status" class="d-block">Status</label>
                            <label class="custom-toggle">
                                <input type="checkbox" value="1" @if ($bkash_payment_gateway->status == 1) checked @endif
                                    name="status">
                                <span class="toggle-slider"></span>
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="mt-4 card">
        <div class="card-title option_sidebar"
            style="display: flex;justify-content: space-between;align-items: center;color: #566a7f;padding: 1.5rem;opacity: 0.8;margin-bottom: -40px;">
            <h5>Manage Shurjopay Payment Gateway </h5>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.payment-gateway.update', $shurjopay_payment_gateway->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="" class="form-label">User Name *</label>
                            <input type="text" class="form-control" name="username"
                                value="{{ $shurjopay_payment_gateway->username }}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="" class="form-label">Prefix *</label>
                            <input type="text" class="form-control" name="prefix"
                                value="{{ $shurjopay_payment_gateway->prefix }}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="" class="form-label">Success Url *</label>
                            <input type="text" class="form-control" name="success_url"
                                value="{{ $shurjopay_payment_gateway->success_url }}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="" class="form-label">Return Url *</label>
                            <input type="text" class="form-control" name="return_url"
                                value="{{ $shurjopay_payment_gateway->return_url }}">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="" class="form-label">Base Url *</label>
                            <input type="text" class="form-control" name="base_url"
                                value="{{ $shurjopay_payment_gateway->base_url }}">
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="" class="form-label">Password *</label>
                            <input type="text" class="form-control" name="password"
                                value="{{ $shurjopay_payment_gateway->password }}">
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="mb-3">
                            <label for="status" class="d-block">Status</label>
                            <label class="custom-toggle">
                                <input type="checkbox" value="1" @if ($shurjopay_payment_gateway->status == 1) checked @endif
                                    name="status">
                                <span class="toggle-slider"></span>
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
