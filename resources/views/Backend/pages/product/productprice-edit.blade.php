@extends('Backend.layouts.master')
@section('body-content')
    <div class="card">
        <div class="card-title option_sidebar"
            style="display: flex;justify-content: space-between;align-items: center;color: #566a7f;padding: 1.5rem;opacity: 0.8;margin-bottom: -40px;">
            <h5>Manage Product Price Edit Section</h5>
        </div>

        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table" id="productTable" width="100%" style="text-align: center;">
                    <thead>
                        <tr>
                            <th class="text-center">SL</th>
                            <th class="text-center">Product</th>
                            <th class="text-center">Old Price</th>
                            <th class="text-center">New Price</th>
                            <th class="text-center">Stock</th>
                        </tr>
                    </thead>

                    <form action="{{ route('admin.product.price-update') }}" method="POST">
                        @csrf
                        <tbody>
                            @foreach ($products as $key=> $product)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <input type="hidden" value="{{$product->id}}" name="ids[]">
                                    <td>{{ $product->product_name }}</td>
                                    <td class="text-center"><input type="text" value="{{ $product->old_price }}" name="old_price[]"></td>
                                    <td class="text-center"><input type="text" value="{{ $product->new_price }}" name="new_price[]"></td>
                                    <td class="text-center"><input type="text" value="{{ $product->stock }}" name="stock[]"></td>
                                </tr>
                            @endforeach
                        </tbody>

                        <tfoot>
                            <tr>
                                <td colspan="4"></td>
                                <td><button type="submit" class="btn btn-primary">Update Price</button></td>
                            </tr>
                        </tfoot>
                    </form>
                </table>
            </div>
        </div>
    </div>
@section('footer_script')
@endsection
@endsection
