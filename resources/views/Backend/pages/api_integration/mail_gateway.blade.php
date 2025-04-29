@extends('Backend.layouts.master')
@section('title')
    Mail Gateway
@endsection
@section('body-content')
    <div class="card">
        <div class="card-title option_sidebar"
            style="display: flex;justify-content: space-between;align-items: center;color: #566a7f;padding: 1.5rem;opacity: 0.8;margin-bottom: -40px;">
            <h5>Manage Mail Gateway Section</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.mail-gateway.update', $mail_getway->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Mail Mailer</label>
                            <input type="text" class="form-control" name="mail_mailer"
                                value="{{ $mail_getway->mail_mailer }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="" class="form-label">mail_host</label>
                            <input type="text" class="form-control" name="mail_host"
                                value="{{ $mail_getway->mail_host }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="" class="form-label">mail_port</label>
                            <input type="text" class="form-control" name="mail_port"
                                value="{{ $mail_getway->mail_port }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="" class="form-label">mail_username</label>
                            <input type="text" class="form-control" name="mail_username"
                                value="{{ $mail_getway->mail_username }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="" class="form-label">mail_password</label>
                            <input type="text" class="form-control" name="mail_password"
                                value="{{ $mail_getway->mail_password }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="" class="form-label">mail_encryption</label>
                            <input type="text" class="form-control" name="mail_encryption"
                                value="{{ $mail_getway->mail_encryption }}">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="mb-3">
                            <label for="status" class="d-block">Status</label>
                            <label class="custom-toggle">
                                <input type="checkbox" value="1" @if ($mail_getway->status == 1) checked @endif
                                    name="status">
                                <span class="toggle-slider"></span>
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="mb-3">
                            <label for="order" class="d-block">Order Confirm</label>
                            <label class="custom-toggle">
                                <input type="checkbox" value="1" @if ($mail_getway->order == 1) checked @endif
                                    name="order">
                                <span class="toggle-slider"></span>
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="mb-3">
                            <label for="forgot_pass" class="d-block">Forgot Password</label>
                            <label class="custom-toggle">
                                <input type="checkbox" value="1" @if ($mail_getway->forgot_pass == 1) checked @endif
                                    name="forgot_pass">
                                <span class="toggle-slider"></span>
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="mb-3">
                            <label for="password_g" class="d-block">Password Generator</label>
                            <label class="custom-toggle">
                                <input type="checkbox" value="1" @if ($mail_getway->password_g == 1) checked @endif
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
