@extends('Backend.layouts.master')
@section('title')
    Orders - Invoice
@endsection
@section('body-content')
    <style>
        * {
            margin: 0px;
            padding: 0px;
        }

        table {
            width: 100%;
        }

        table,
        th,
        td {
            border: 1px solid gray;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 5px;
            text-align: left;
        }

        table.table-with-info tr:nth-child(even) {
            background-color: #eee;
        }

        table.table-with-info tr:nth-child(odd) {
            background-color: #fff;
        }

        table.table-with-info th {
            background-color: black;
            color: white;
        }

        hr {
            border-top: 1px dashed red;
        }

        table.table-with-info,
        table.table-with-info td,
        table.table-with-info th {
            border: 0px solid black;
        }

        @media print {
            .section {
                display: flex;
                flex-direction: column;
                width: 100%;
                height: 100vh;
                justify-content: space-between;
            }
        }
    </style>
    <!-- Invoice Start -->
    <div class="mb-3 row">
        <div class="col-6"></div>
        <div class="col-6">
            <button class="no-print btn btn-xs btn-success waves-effect waves-light"><i class="fa fa-print"></i></button>
        </div>
    </div>
    <div class="section" style="font-size: 17px;">
        <div class="justify-content-center row">
            <div class="col-lg-10">
                <div class="div-section">
                    <table class="table-with-info">
                        <tr>
                            <td style="width: 25%; text-align:left">
                                <h4>CUSTOMER INFO</h4>
                                Name: {{ $customer->name }}<br>
                                Phone: {{ $customer->phone }}<br>
                                Address: {{ $customer->address }}
                            </td>
                            <td style="width: 50%; text-align:center">
                                <h4>Invoice #{{ $invoice_id }}</h4>
                                <?php
                                echo '<img src="data:image/png;base64,' . DNS1D::getBarcodePNG($invoice_id, 'C39+') . '" alt="barcode"   />';
                                ?>
                                <br>Visit: {{ env('APP_URL') }}
                            </td>
                            <td style="width: 25%;">
                                <strong>
                                    <img src="{{ asset($generalsetting->dark_logo) }}"
                                        style="width:70%; margin-bottom:10px">
                                </strong>
                                <p>
                                    Address: {{ $contact->address }}<br>
                                    Hotline: {{ $contact->hotline }}
                                </p>
                            </td>
                        </tr>
                    </table>

                    <table class="table-borde">
                        <tr>
                            <th style="width: 10%; text-align:center">Image</th>
                            <th style="width: 40%; text-align:center">Product Name</th>
                            <th style="width: 10%; text-align:center">Size</th>
                            <th style="width: 10%; text-align:center">Variant</th>
                            <th style="width: 10%; text-align:center">Quantity</th>
                            <th style="width: 20%; text-align:center">Price</th>
                        </tr>

                        <!-- Example Product Row -->
                        @foreach ($order_details as $value)
                            @php
                                $product = App\Models\Product::find($value->product_id);
                                $product_color = App\Models\Color::find($value->product_color);
                                $product_size = App\Models\Size::find($value->product_size);
                                $inventory_price = App\Models\Inventory::where([
                                    'product_id' => $product->id,
                                    'color_id' => $product_color->id,
                                    'size_id' => $product_size->id,
                                ])->first();
                                $payment = App\Models\Payment::where('order_id', $value->order_id)->first();
                            @endphp
                            <tr>
                                <td><img src="{{ asset($product->product_image) }}" style="width:60px"></td>
                                <td>{{ $product->product_name }}</td>
                                <td style="text-align:center">
                                    @if ($product_color)
                                        {{ $product_color->color_name }}
                                    @else
                                        N\A
                                    @endif
                                </td>
                                <td style="text-align:center">
                                    @if ($product_size)
                                        {{ $product_size->size_name }}
                                    @else
                                        N\A
                                    @endif
                                </td>
                                <td style="text-align:center">{{ $value->quantity }}</td>
                                @if ($product->product_type == 1)
                                    <td style="text-align:center;">{{ $value->variant_sale_price }} Tk</td>
                                @else
                                    <td style="text-align:center;">{{ $value->sale_price }} Tk</td>
                                @endif
                            </tr>
                        @endforeach

                        <tfoot>
                            <tr>
                                <td colspan="3" style="border: none;"></td>
                                <th colspan="2">Subtotal :</th>
                                <td style="text-align:center">{{ $order->subtotal }} Tk</td>
                            </tr>

                            <tr>
                                <td colspan="3" style="border: none;"></td>
                                <th colspan="2">Shipping Charge :</th>
                                <td style="text-align:center">{{ $order->shipping_charge }} Tk</td>
                            </tr>

                            <tr>
                                <td colspan="3" style="border: none; font-size:26px;">
                                    {{-- Courier ID: <span style="font-weight:bold">COURIER123</span> --}}
                                </td>
                                <th colspan="2">Discount :</th>
                                <td style="text-align:center">{{ $order->discount }} Tk</td>
                            </tr>

                            <tr>
                                <td colspan="3" style="border: none; font-size:26px;"></td>
                                <th colspan="2">Total Amount :</th>
                                <td style="text-align:center">{{ $order->total }} Tk</td>
                            </tr>
                            <tr>
                                <td colspan="3" style="border: none;"></td>
                                <th colspan="2">Paid :</th>
                                <td style="text-align:center">{{ $order->total - $order->discount }} Tk</td>
                            </tr>
                            <tr>
                                <td colspan="3" style="border: none;">
                                    <p class="mb-0 text-center" style="font-size:20px;">[ Note: Call before delivery ]</p>
                                </td>
                                <th colspan="2">{{ $payment->payment_method }} :</th>
                                <td style="text-align:center">{{ $order->total - $order->discount }} Tk</td>
                            </tr>
                        </tfoot>
                    </table>

                    <br>

                    <div style="display: flex; flex-direction: row; justify-content: space-between;">
                        <p>Order Date: {{ $order->created_at->format('d-m-Y') }} , Payment Method:
                            {{ $payment->payment_method }}
                        </p>
                        <p>Source: Web</p>
                        <p>Order Received By: Admin </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
