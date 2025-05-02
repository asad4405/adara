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
                <div class="col col-xs-12">
                    <div class="wpo-breadcumb-wrap">
                        <ol class="wpo-breadcumb-wrap">
                            <li><a href="{{ route('index') }}">Home</a></li>
                            <li>Shop</li>
                        </ol>
                    </div>
                </div>
            </div> <!-- end row -->
        </div> <!-- end container -->
    </section>
    <!-- end page-title -->

    <!-- product-area-start -->
    <div class="shop-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="shop-filter-wrap">
                        <div class="filter-item">
                            <div class="shop-filter-item">
                                <div class="shop-filter-search">
                                    <form>
                                        <div>
                                            <input type="text" class="form-control" placeholder="Search..">
                                            <button type="submit"><i class="ti-search"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="filter-item">
                            <div class="shop-filter-item category-widget">
                                <h2>Categories</h2>
                                <ul>
                                    @forelse ($categories as $value)
                                        <li><a
                                                href="#">{{ $value->category_name }}<span>({{ $value->count() }})</span></a>
                                        </li>
                                    @empty
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                        <div class="filter-item">
                            <div class="shop-filter-item">
                                <h2>Filter by price</h2>
                                <div class="shopWidgetWraper">
                                    <div class="priceFilterSlider">
                                        <form action="#" method="get" class="clearfix">
                                            <!-- <div id="sliderRange"></div>
                                                                                            <div class="pfsWrap">
                                                                                                <label>Price:</label>
                                                                                                <span id="amount"></span>
                                                                                            </div> -->
                                            <div class="d-flex">
                                                <div class="col-lg-6 pe-2">
                                                    <label for="" class="form-label">Min</label>
                                                    <input type="text" class="form-control" placeholder="Min"
                                                        value="0">
                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="" class="form-label">Max</label>
                                                    <input type="text" class="form-control" placeholder="Max"
                                                        value="100000">
                                                </div>
                                            </div>
                                            <div class="mt-4 col-lg-12">
                                                <button class="form-control bg-light">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="filter-item">
                            <div class="shop-filter-item">
                                <h2>Color</h2>
                                <ul>
                                    @foreach ($product_colors as $value)
                                        <li>
                                            <label class="topcoat-radio-button__label">
                                                {{ $value->color->color_name }} <span>({{ $value->total }})</span>
                                                <input type="radio" name="topcoat2" value="{{ $value->color_id }}">
                                                <span class="topcoat-radio-button"></span>
                                            </label>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                        <div class="filter-item">
                            <div class="shop-filter-item">
                                <h2>Size</h2>
                                <ul>
                                    @foreach ($product_sizes as $value)
                                        <li>
                                            <label class="topcoat-radio-button__label">
                                                {{ $value->size->size_name }} <span>({{ $value->count() }})</span>
                                                <input type="radio" name="topcoat2">
                                                <span class="topcoat-radio-button"></span>
                                            </label>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="filter-item">
                            <div class="shop-filter-item new-product">
                                <h2>New Products</h2>
                                <ul>
                                    @forelse ($new_products as $value)
                                        <li>
                                            <div class="product-card">
                                                <div class="card-image">
                                                    <div class="image">
                                                        <img src="{{ asset($value->product_image) }}" alt="">
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <h3><a
                                                            href="{{ route('product.details', $value->slug) }}">{{ $value->product_name }}</a>
                                                    </h3>
                                                    <div class="rating-product">
                                                        <i class="fi flaticon-star"></i>
                                                        <i class="fi flaticon-star"></i>
                                                        <i class="fi flaticon-star"></i>
                                                        <i class="fi flaticon-star"></i>
                                                        <i class="fi flaticon-star"></i>
                                                        <span>30</span>
                                                    </div>
                                                    <div class="price">
                                                        <span class="present-price">৳{{ $value->new_price }}</span>
                                                        @if ($value->new_price < $value->old_price)
                                                            <del class="old-price">৳{{ $value->old_price }}</del>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @empty
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                        <div class="filter-item">
                            <div class="shop-filter-item tag-widget">
                                <h2>Popular Tags</h2>
                                <ul>
                                    <li><a href="#">Fashion</a></li>
                                    <li><a href="#">Shoes</a></li>
                                    <li><a href="#">Kids</a></li>
                                    <li><a href="#">Theme</a></li>
                                    <li><a href="#">Stylish</a></li>
                                    <li><a href="#">Women</a></li>
                                    <li><a href="#">Shop</a></li>
                                    <li><a href="#">Men</a></li>
                                    <li><a href="#">Blog</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="shop-section-top-inner">
                        <div class="shoping-product">
                            <p>We found <span>{{ $products->count() }} items</span> for you!</p>
                        </div>
                        <div class="short-by">
                            <ul>
                                <li>
                                    Sort by:
                                </li>
                                <li>
                                    <select name="show">
                                        <option value="">Default Sorting</option>
                                        <option value="">Low To High</option>
                                        <option value="">High To Low</option>
                                    </select>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-wrap">
                        <div class="row align-items-center">
                            @forelse ($products as $value)
                                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-6">
                                    <div class="product-item">
                                        <div class="image">
                                            <img src="{{ asset($value->product_image) }}" alt="">
                                            <div class="tag new">New</div>
                                        </div>
                                        <div class="text">
                                            <h2><a
                                                    href="{{ route('product.details', $value->slug) }}">{{ $value->product_name }}</a>
                                            </h2>
                                            <div class="rating-product">
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <i class="fi flaticon-star"></i>
                                                <span>130</span>
                                            </div>
                                            <div class="price">
                                                <span class="present-price">৳{{ $value->new_price }}</span>
                                                @if ($value->new_price < $value->old_price)
                                                    <del class="old-price">৳{{ $value->old_price }}</del>
                                                @endif
                                            </div>
                                            <div class="shop-btn">
                                                <a class="theme-btn-s2" href="{{ route('product.details', $value->slug) }}">Shop Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product-area-end -->
@endsection
