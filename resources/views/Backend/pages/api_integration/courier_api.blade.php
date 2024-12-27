@extends('Backend.layouts.master')
@section('body-content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="card">
        <div class="card-title option_sidebar"
            style="display: flex;justify-content: space-between;align-items: center;color: #566a7f;padding: 1.5rem;opacity: 0.8;margin-bottom: -40px;">
            <h5>Steadfast Courier </h5>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.courier-api.update', $steadfast_courier->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Api Key *</label>
                            <input type="text" class="form-control" name="api_key"
                                value="{{ $steadfast_courier->api_key }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Secret Key *</label>
                            <input type="text" class="form-control" name="secret_key"
                                value="{{ $steadfast_courier->secret_key }}">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Url *</label>
                            <input type="text" class="form-control" name="url"
                                value="{{ $steadfast_courier->url }}">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="status" class="d-block">Status</label>
                            <label class="custom-toggle">
                                <input type="checkbox" value="1" @if ($steadfast_courier->status == 1) checked @endif
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
            <h5>Pathao Courier </h5>
        </div>

        <div class="card-body">
            <form action="{{ route('admin.courier-api.update', $pathao_courier->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Url *</label>
                            <input type="text" class="form-control" name="url"
                                value="{{ $pathao_courier->url }}">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="" class="form-label">Token *</label>
                            <input type="text" class="form-control" name="token"
                                value="{{ $pathao_courier->token }}">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="mb-3">
                            <label for="status" class="d-block">Status</label>
                            <label class="custom-toggle">
                                <input type="checkbox" value="1" @if ($pathao_courier->status == 1) checked @endif
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
