@extends('Backend.layouts.master')
@section('body-content')
    <div class="card">
        <div class="card-title option_sidebar"
            style="display: flex;justify-content: space-between;align-items: center;color: #566a7f;padding: 1.5rem;opacity: 0.8;margin-bottom: -40px;">
            <h5>Manage Sms Gateway Section</h5>
        </div>

        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <form action="{{ route('admin.sms-gateway.update',$sms_gateway->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="" class="form-label">Url *</label>
                            <input type="text" class="form-control" name="url" value="{{ $sms_gateway->url }}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="" class="form-label">Api Key *</label>
                            <input type="text" class="form-control" name="api_key" value="{{ $sms_gateway->api_key }}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                            <label for="" class="form-label">Sender Id</label>
                            <input type="text" class="form-control" name="senderid" value="{{ $sms_gateway->senderid }}">
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="mb-3">
                            <label for="status" class="d-block">Status</label>
                            <label class="custom-toggle">
                                <input type="checkbox" value="1" @if ($sms_gateway->status == 1) checked @endif
                                    name="status">
                                <span class="toggle-slider"></span>
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="mb-3">
                            <label for="order" class="d-block">Order Confirm</label>
                            <label class="custom-toggle">
                                <input type="checkbox" value="1" @if ($sms_gateway->order == 1) checked @endif
                                    name="order">
                                <span class="toggle-slider"></span>
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="mb-3">
                            <label for="forgot_pass" class="d-block">Forgot Password</label>
                            <label class="custom-toggle">
                                <input type="checkbox" value="1" @if ($sms_gateway->forgot_pass == 1) checked @endif
                                    name="forgot_pass">
                                <span class="toggle-slider"></span>
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="mb-3">
                            <label for="password_g" class="d-block">Password Generator</label>
                            <label class="custom-toggle">
                                <input type="checkbox" value="1" @if ($sms_gateway->password_g == 1) checked @endif
                                    name="password_g">
                                <span class="toggle-slider"></span>
                            </label>
                            {{-- <div class="form-group">
                            <label for="status" class="d-block">Status</label>
                            <label class="switch">
                                <input type="checkbox" value="1" @if ($sms->status == 1) checked @endif
                                    name="status" />
                                <span class="slider round"></span>
                            </label>
                        </div> --}}
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
