@extends('Frontend.layouts.master')
@section('title')
    Product Details
@endsection
@section('body-content')
    <!-- start wpo-page-title -->
    <section class="wpo-page-title">
        <h2 class="d-none">Hide</h2>
        <div class="container">
            <div class="row">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <div class="col col-xs-12">
                    <div class="wpo-breadcumb-wrap">
                        <ol class="wpo-breadcumb-wrap">
                            <li><a href="{{ route('index') }}">Home</a></li>
                            <li><a href="">Product</a></li>
                            <li>{{ $product->product_name }}</li>
                        </ol>
                    </div>
                </div>
            </div> <!-- end row -->
        </div> <!-- end container -->
    </section>
    <!-- end page-title -->

    <!-- product-single-section  start-->
    <div class="product-single-section section-padding">
        <div class="container">
            <div class="product-details">
                <form action="{{ route('add-to-cart') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="row align-items-center">
                        <div class="col-lg-5">
                            <div class="product-single-img">
                                <div class="product-active owl-carousel pdetails-bg-padding">
                                    @foreach ($product_sliders as $value)
                                        <div class="item">
                                            <img src="{{ asset($value->slider_image) }}" alt=""
                                                class="pdetails-main-img">
                                        </div>
                                    @endforeach

                                </div>
                                <div class="product-thumbnil-active owl-carousel">
                                    @foreach ($product_sliders as $value)
                                        <div class="item pdetails-bg-padding">
                                            <img src="{{ asset($value->slider_image) }}" alt=""
                                                class="pdetails-slider-img">
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="product-single-content">
                                <h2>{{ $product->product_name }}</h2>
                                <div class="price">
                                    <span class="present-price">৳{{ $product->new_price }}</span>
                                    @if ($product->old_price > $product->new_price)
                                        <del class="old-price">৳{{ $product->old_price }}</del>
                                    @endif
                                </div>
                                <div class="rating-product">
                                    <i class="fi flaticon-star"></i>
                                    <i class="fi flaticon-star"></i>
                                    <i class="fi flaticon-star"></i>
                                    <i class="fi flaticon-star"></i>
                                    <i class="fi flaticon-star"></i>
                                    <span>120</span>
                                </div>
                                <p>{{ $product->short_description }}</p>

                                @if ($product->product_type == 1)
                                    <div class="product-filter-item color">
                                        <div class="color-name">
                                            <span>Color :</span>
                                            <ul>
                                                @foreach ($product_colors as $value)
                                                    <li class="color1"><input id="color{{ $value->color_id }}"
                                                            type="radio" name="color_id" value="{{ $value->color_id }}">
                                                        <label for="color{{ $value->color_id }}"
                                                            style="background: {{ $value->color->color_code }}"></label>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-filter-item color filter-size">
                                        <div class="color-name">
                                            <span>Sizes:</span>
                                            <ul>
                                                @foreach ($product_sizes as $value)
                                                    <li class="color"><input id="size{{ $value->size_id }}" type="radio"
                                                            name="size_id" value="{{ $value->size_id }}">
                                                        <label
                                                            for="size{{ $value->size_id }}">{{ $value->size->size_name }}</label>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @endif
                                <div class="pro-single-btn">
                                    <div class="quantity cart-plus-minus">
                                        <input class="text-value" type="text" value="1" name="quantity">
                                    </div>
                                    <button href="#" class="border-0 theme-btn-s2">Add to cart</button>
                                    <a href="#" class="wl-btn"><i class="fi flaticon-heart"></i></a>
                                </div>
                                <ul class="important-text">
                                    <li><span>SKU:</span>{{ $product->product_code }}</li>
                                    <li><span>Categories:</span>{{ $product->category->category_name }}</li>
                                    <li><span>Tags:</span>Fashion, Coat, Pink</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="product-tab-area">
                <ul class="nav nav-mb-3 main-tab" id="tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="descripton-tab" data-bs-toggle="pill"
                            data-bs-target="#descripton" type="button" role="tab" aria-controls="descripton"
                            aria-selected="true">Description</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="Ratings-tab" data-bs-toggle="pill" data-bs-target="#Ratings"
                            type="button" role="tab" aria-controls="Ratings" aria-selected="false">Reviews
                            (3)</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="Information-tab" data-bs-toggle="pill" data-bs-target="#Information"
                            type="button" role="tab" aria-controls="Information" aria-selected="false">Additional
                            info</button>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="descripton" role="tabpanel"
                        aria-labelledby="descripton-tab">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="Descriptions-item">
                                        {!! $product->description !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Ratings" role="tabpanel" aria-labelledby="Ratings-tab">
                        <div class="container">
                            <div class="rating-section">
                                <div class="row">
                                    <div class="col-lg-12 col-12">
                                        <div class="comments-area">
                                            <div class="comments-section">
                                                <h3 class="comments-title">3 reviews for Stylish Pink Coat</h3>
                                                <ol class="comments">
                                                    <li class="comment even thread-even depth-1" id="comment-1">
                                                        <div id="div-comment-1">
                                                            <div class="comment-theme">
                                                                <div class="comment-image"><img
                                                                        src="{{ asset('public/Frontend') }}/images/blog-details/comments-author/img-1.jpg"
                                                                        alt></div>
                                                            </div>
                                                            <div class="comment-main-area">
                                                                <div class="comment-wrapper">
                                                                    <div class="comments-meta">
                                                                        <h4>Lily Zener</h4>
                                                                        <span class="comments-date">December 25, 2022 at
                                                                            5:30 am</span>
                                                                        <div class="rating-product">
                                                                            <i class="fi flaticon-star"></i>
                                                                            <i class="fi flaticon-star"></i>
                                                                            <i class="fi flaticon-star"></i>
                                                                            <i class="fi flaticon-star"></i>
                                                                            <i class="fi flaticon-star"></i>
                                                                        </div>
                                                                    </div>
                                                                    <div class="comment-area">
                                                                        <p>Turpis nulla proin donec a ridiculus. Mi
                                                                            suspendisse faucibus sed lacus. Vitae risus eu
                                                                            nullam sed quam.
                                                                            Eget aenean id augue pellentesque turpis magna
                                                                            egestas arcu sed.
                                                                            Aliquam non faucibus massa adipiscing nibh sit.
                                                                            Turpis integer aliquam aliquam aliquam.
                                                                            <a class="comment-reply-link"
                                                                                href="#"><span>Reply...</span></a>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <ul class="children">
                                                            <li class="comment">
                                                                <div>
                                                                    <div class="comment-theme">
                                                                        <div class="comment-image"><img
                                                                                src="{{ asset('public/Frontend') }}/images/blog-details/comments-author/img-2.jpg"
                                                                                alt></div>
                                                                    </div>
                                                                    <div class="comment-main-area">
                                                                        <div class="comment-wrapper">
                                                                            <div class="comments-meta">
                                                                                <h4>Leslie Alexander</h4>
                                                                                <div class="rating-product">
                                                                                    <i class="fi flaticon-star"></i>
                                                                                    <i class="fi flaticon-star"></i>
                                                                                    <i class="fi flaticon-star"></i>
                                                                                    <i class="fi flaticon-star"></i>
                                                                                    <i class="fi flaticon-star"></i>
                                                                                </div>
                                                                                <span class="comments-date">December 26,
                                                                                    2022 at 5:30 am</span>
                                                                            </div>
                                                                            <div class="comment-area">
                                                                                <p>Turpis nulla proin donec a ridiculus. Mi
                                                                                    suspendisse faucibus sed lacus. Vitae
                                                                                    risus eu nullam sed quam.
                                                                                    Eget aenean id augue pellentesque turpis
                                                                                    magna egestas arcu sed.
                                                                                    Aliquam non faucibus massa adipiscing
                                                                                    nibh sit. Turpis integer aliquam aliquam
                                                                                    aliquam.
                                                                                    <a class="comment-reply-link"
                                                                                        href="#"><span>Reply...</span></a>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="comment">
                                                        <div>
                                                            <div class="comment-theme">
                                                                <div class="comment-image"><img
                                                                        src="{{ asset('public/Frontend') }}/images/blog-details/comments-author/img-1.jpg"
                                                                        alt></div>
                                                            </div>
                                                            <div class="comment-main-area">
                                                                <div class="comment-wrapper">
                                                                    <div class="comments-meta">
                                                                        <h4>Jenny Wilson</h4>
                                                                        <div class="rating-product">
                                                                            <i class="fi flaticon-star"></i>
                                                                            <i class="fi flaticon-star"></i>
                                                                            <i class="fi flaticon-star"></i>
                                                                            <i class="fi flaticon-star"></i>
                                                                            <i class="fi flaticon-star"></i>
                                                                        </div>
                                                                        <span class="comments-date">December 30, 2022 at
                                                                            3:12 pm</span>
                                                                    </div>
                                                                    <div class="comment-area">
                                                                        <p>Turpis nulla proin donec a ridiculus. Mi
                                                                            suspendisse faucibus sed lacus. Vitae risus eu
                                                                            nullam sed quam.
                                                                            Eget aenean id augue pellentesque turpis magna
                                                                            egestas arcu sed.
                                                                            Aliquam non faucibus massa adipiscing nibh sit.
                                                                            Turpis integer aliquam aliquam aliquam.
                                                                            <a class="comment-reply-link"
                                                                                href="#"><span>Reply...</span></a>
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ol>
                                            </div> <!-- end comments-section -->
                                            <div class="col col-lg-10 col-12 review-form-wrapper">
                                                <div class="review-form">
                                                    <h4>Add a review</h4>
                                                    <form>
                                                        <div class="give-rat-sec">
                                                            <div class="give-rating">
                                                                <label>
                                                                    <input type="radio" name="stars" value="1">
                                                                    <span class="icon">★</span>
                                                                </label>
                                                                <label>
                                                                    <input type="radio" name="stars" value="2">
                                                                    <span class="icon">★</span>
                                                                    <span class="icon">★</span>
                                                                </label>
                                                                <label>
                                                                    <input type="radio" name="stars" value="3">
                                                                    <span class="icon">★</span>
                                                                    <span class="icon">★</span>
                                                                    <span class="icon">★</span>
                                                                </label>
                                                                <label>
                                                                    <input type="radio" name="stars" value="4">
                                                                    <span class="icon">★</span>
                                                                    <span class="icon">★</span>
                                                                    <span class="icon">★</span>
                                                                    <span class="icon">★</span>
                                                                </label>
                                                                <label>
                                                                    <input type="radio" name="stars" value="5">
                                                                    <span class="icon">★</span>
                                                                    <span class="icon">★</span>
                                                                    <span class="icon">★</span>
                                                                    <span class="icon">★</span>
                                                                    <span class="icon">★</span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <textarea class="form-control" placeholder="Write Comment..."></textarea>
                                                        </div>
                                                        <div class="name-input">
                                                            <input type="text" class="form-control" placeholder="Name"
                                                                required>
                                                        </div>
                                                        <div class="name-email">
                                                            <input type="email" class="form-control"
                                                                placeholder="Email" required>
                                                        </div>
                                                        <div class="rating-wrapper">
                                                            <div class="submit">
                                                                <button type="submit" class="theme-btn-s2">Post
                                                                    review</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div> <!-- end comments-area -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Information" role="tabpanel" aria-labelledby="Information-tab">
                        <div class="container">
                            <div class="Additional-wrap">
                                <div class="row">
                                    <div class="col-12">
                                        <table class="table-responsive">
                                            <tbody>
                                                <tr>
                                                    <td>Weight (w/o wheels)</td>
                                                    <td>2 LBS</td>
                                                </tr>
                                                <tr>
                                                    <td>Weight Capacity</td>
                                                    <td>60 LBS</td>
                                                </tr>
                                                <tr>
                                                    <td>Width</td>
                                                    <td>50″</td>
                                                </tr>
                                                <tr>
                                                    <td>Seat back height</td>
                                                    <td>30.4″</td>
                                                </tr>
                                                <tr>
                                                    <td>Color</td>
                                                    <td>Black, Blue, Red, White</td>
                                                </tr>
                                                <tr>
                                                    <td>Size</td>
                                                    <td>S, M, L, X, XL</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="related-product">
        </div>
    </div>
    <!-- product-single-section  end-->
@endsection
