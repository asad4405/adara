@extends('Frontend.layouts.master')
@section('title')
    Checkout
@endsection
@section('body-content')
    <!-- start wpo-page-title -->
    <section class="wpo-page-title">
        <h2 class="d-none">Hide</h2>
        <div class="container">
            <div class="row">
                <div class="col col-xs-12">
                    <div class="wpo-breadcumb-wrap">
                        <ol class="wpo-breadcumb-wrap">
                            <li><a href="{{ route('index') }}">Home</a></li>
                            <li><a href="{{ route('cart') }}">Cart</a></li>
                            <li>Checkout</li>
                        </ol>
                    </div>
                </div>
            </div> <!-- end row -->
        </div> <!-- end container -->
    </section>
    <!-- end page-title -->

    <!-- wpo-checkout-area start-->
    <div class="wpo-checkout-area section-padding">
        <div class="container">
            <div class="checkout-wrap">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <form action="{{ route('customer.ordersave') }}" method="POST">
                            @csrf
                            <div class="caupon-wrap s3">
                                <div class="biling-item">
                                    <div class="coupon coupon-3">
                                        <h2>Customer Address</h2>
                                    </div>
                                    <div class="billing-adress">
                                        <div class="contact-form form-style">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-12">
                                                    <label for="" class="form-label">Name <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" placeholder="Enter your Name" id="name"
                                                        name="name">
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-12">
                                                    <label for="" class="form-label">Phone Number <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" placeholder="Enter your Phone Number"
                                                        id="phone" name="phone">
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-12">
                                                    <label for="" class="form-label">Address <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" placeholder="Enter your Address" id="Adress"
                                                        name="address">
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-12">
                                                    <label for="" class="form-label">Shipping Area <span
                                                            class="text-danger">*</span></label>
                                                    <select name="" class="form-select" id="shipping-select">
                                                        @foreach ($shipping_charge as $key => $value)
                                                            <option value="{{ $value->amount }}"
                                                                data-id="{{ $value->id }}"
                                                                {{ $key == 0 ? 'selected' : '' }}>
                                                                {{ $value->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-12">
                                                    <label for="" class="form-label">Email (optional)</label>
                                                    <input type="email" placeholder="Enter your Email" id="email"
                                                        name="email">
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-12">
                                                    <label for="" class="form-label">Note (optional)</label>
                                                    <input type="text" placeholder="Note Here ..." id="Note"
                                                        name="customer_note">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="cout-order-area">
                            <h3>Your Order</h3>
                            <div class="oreder-item" style="margin-top: -35px;">
                                <div class="title">
                                    <h2>Products <span>Subtotal</span></h2>
                                </div>
                                @php
                                    $subtotal = 0;
                                @endphp
                                @forelse ($cart as $key => $value)
                                    @php
                                        $product = App\Models\Product::find($value['product_id']);

                                        $inventory = App\Models\Inventory::where('product_id', $product->id)
                                            ->where('color_id', $value['color_id'])
                                            ->where('size_id', $value['size_id'])
                                            ->first();
                                    @endphp

                                    <div class="oreder-product">
                                        <div class="images">
                                            <span>
                                                <img src="{{ asset($product->product_image) }}" alt="">
                                            </span>
                                        </div>
                                        <div class="product">
                                            <ul>
                                                <li class="first-cart">{{ $product->product_name }}
                                                    (x{{ $value['quantity'] }})
                                                </li>
                                            </ul>
                                        </div>
                                        @if ($product->product_type == 1)
                                            <span>৳ {{ $price = $inventory->price * $value['quantity'] }}</span>
                                        @else
                                            <span>৳ {{ $price = $product->new_price * $value['quantity'] }}</span>
                                        @endif

                                    </div>
                                    @php
                                        $subtotal += $price * $value['quantity'];
                                    @endphp
                                @empty
                                @endforelse
                                <!-- Shipping -->
                                <div class="title s2">
                                    <h2>Subtotal<span> ৳ <span id="subtotal-amount">{{ $subtotal }}</span></span></h2>
                                    <input type="hidden" value="{{ $subtotal }}" name="subtotal" id="subtotal">
                                </div>

                                <div class="title s2">
                                    <h2>Shipping Charge <span>(+) ৳ <span id="shipping-amount"></span></span></h2>
                                    <input type="hidden" name="shipping_info" id="shipping-info" value="">
                                </div>

                                <div class="title s2">
                                    <h2>Discount<span>(-) <span
                                                id="discount-amount">{{ $discount = session('S_discount') }}</span></span>
                                    </h2>
                                    <input type="hidden" name="discount" value="{{ $discount }}" id="discount">
                                </div>

                                <!-- Total -->
                                <div class="title s2">
                                    <h2>Total<span>৳ <span id="total-amount"></span></span></h2>
                                    <input type="hidden" name="total_amount" id="total-amount-input" value="">
                                </div>
                            </div>
                        </div>

                        <div class="caupon-wrap s5">
                            <div class="payment-area">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="payment-option" id="open5">
                                            <h3>Payment</h3>
                                            <div class="payment-select">
                                                <ul>
                                                    <li class="">
                                                        <input id="remove" type="radio" name="payment"
                                                            value="1" checked>
                                                        <label for="remove">Cash on Delivery</label>
                                                    </li>
                                                    <li class="">
                                                        <input id="add" type="radio" name="payment"
                                                            value="2">
                                                        <label for="add">Pay With Bkash</label>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div id="open6" class="payment-name active">
                                                <div class="contact-form form-style">
                                                    <div class="row">
                                                        <div class="col-lg-12 col-md-12 col-12">
                                                            <div class="text-center submit-btn-area">
                                                                <button class="theme-btn" type="submit">Place
                                                                    Order</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>

                        <div class="caupon-wrap s5">
                            <div class="payment-area">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="payment-option" id="open5">
                                            <h3>Coupon </h3>
                                            <div class="row">
                                                <div class="col-8">
                                                    <input class="form-control" placeholder="Coupon Here ..."
                                                        type="text" name="coupon_name">
                                                </div>
                                                <div class="col-4">
                                                    <button type="submit" class="btn w-100 btn-dark">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  end-->

    <!-- js code start -->
    @section('script')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const select = document.getElementById('shipping-select');
                const amountDisplay = document.getElementById('shipping-amount');
                const hiddenShippingInput = document.getElementById('shipping-info');

                const subtotal = parseFloat(document.getElementById('subtotal').value) || 0;
                const discount = parseFloat(document.getElementById('discount').value) || 0;
                const totalDisplay = document.getElementById('total-amount');
                const totalInput = document.getElementById('total-amount-input');

                function updateAmounts() {
                    const selectedOption = select.options[select.selectedIndex];
                    const amount = parseFloat(selectedOption.value) || 0; // shipping amount
                    const id = selectedOption.getAttribute('data-id');

                    // Update shipping charge
                    amountDisplay.textContent = amount;
                    hiddenShippingInput.value = id;

                    // Calculate total
                    const total = subtotal + amount - discount;

                    // Update UI & hidden input
                    totalDisplay.textContent = total;
                    totalInput.value = total;
                }

                // Initial load
                updateAmounts();

                // On change
                select.addEventListener('change', updateAmounts);
            });
        </script>
    @endsection

@endsection
