@extends('Frontend.layouts.master')
@section('body-content')
    <!-- slider-area -->
    @include('Frontend.includes.banner')
    <!-- slider-area-end -->

    <!-- promo-services -->
    <section class="promo-services gray-bg pt-70 pb-25">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6 col-sm-8">
                    <div class="mb-40 promo-services-item">
                        <div class="icon"><img src="{{ asset('public/Frontend') }}/img/icon/promo_icon01.png" alt=""></div>
                        <div class="content">
                            <h6>payment & delivery</h6>
                            <p>Delivered, when you receive arrives</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-8">
                    <div class="mb-40 promo-services-item">
                        <div class="icon"><img src="{{ asset('public/Frontend') }}/img/icon/promo_icon02.png" alt=""></div>
                        <div class="content">
                            <h6>Return Product</h6>
                            <p>Retail, a Product Return Process</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-8">
                    <div class="mb-40 promo-services-item">
                        <div class="icon"><img src="{{ asset('public/Frontend') }}/img/icon/promo_icon03.png" alt=""></div>
                        <div class="content">
                            <h6>money back guarantee</h6>
                            <p>Options Including 24/7</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-8">
                    <div class="mb-40 promo-services-item">
                        <div class="icon"><img src="{{ asset('public/Frontend') }}/img/icon/promo_icon04.png" alt=""></div>
                        <div class="content">
                            <h6>Quality support</h6>
                            <p>Support Options Including 24/7</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- promo-services-end -->

    <!-- cat-area -->
    <section class="category-area pt-100 pb-45">
        <div class="container">
            <div class="cat-title-line">
                <div class="row justify-content-center">
                    <div class="col-xl-7 col-lg-9">
                        <div class="text-center cat-section-title">
                            <div class="icon"><img src="{{ asset('public/Frontend') }}/img/icon/logo_icon.png" alt=""></div>
                            <span class="sub-title">CHOOSE A TYPE</span>
                            <h2 class="title">Online shopping defined by fashion <br> popular aesthetic expression at
                                a particular place
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col">
                    <div class="shop-cat-item">
                        <a href="shop-sidebar.html">
                            <div class="icon">
                                <img src="{{ asset('public/Frontend') }}/img/icon/cat_icon01.png" alt="">
                            </div>
                            <p>Women Shoe <span>( 9 Items )</span></p>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="shop-cat-item">
                        <a href="shop-sidebar.html">
                            <div class="icon">
                                <img src="{{ asset('public/Frontend') }}/img/icon/cat_icon02.png" alt="">
                            </div>
                            <p>Winter Suit <span>( 8 Items )</span></p>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="shop-cat-item">
                        <a href="shop-sidebar.html">
                            <div class="icon">
                                <img src="{{ asset('public/Frontend') }}/img/icon/cat_icon03.png" alt="">
                            </div>
                            <p>Hot Pants <span>( 12 Items )</span></p>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="shop-cat-item">
                        <a href="shop-sidebar.html">
                            <div class="icon">
                                <img src="{{ asset('public/Frontend') }}/img/icon/cat_icon04.png" alt="">
                            </div>
                            <p>Travel Bags <span>( 10 Items )</span></p>
                        </a>
                    </div>
                </div>
                <div class="col">
                    <div class="shop-cat-item">
                        <a href="shop-sidebar.html">
                            <div class="icon">
                                <img src="{{ asset('public/Frontend') }}/img/icon/cat_icon05.png" alt="">
                            </div>
                            <p>Bikini Suit <span>( 19 Items )</span></p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- cat-area-end -->

    <!-- trending-product-area -->
    <section class="trending-product-area trending-product-two gray-bg pt-95 pb-100">
        <div class="container custom-container">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-6">
                    <div class="text-center section-title title-style-two mb-50">
                        <h3 class="title">Trending Products</h3>
                    </div>
                </div>
            </div>
            <div class="row no-gutters trending-product-grid">
                <div class="col-2">
                    <div class="trending-products-list">
                        <h5>Clothing</h5>
                        <ul class="nav nav-tabs" id="trendingTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="accessories-tab" data-toggle="tab" href="#accessories"
                                    role="tab" aria-controls="accessories" aria-selected="true">Accessories</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="bags-tab" data-toggle="tab" href="#bags" role="tab"
                                    aria-controls="bags" aria-selected="false">Bags</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="bSellers-tab" data-toggle="tab" href="#bSellers" role="tab"
                                    aria-controls="bSellers" aria-selected="false">Best Sellers</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="shirts-tab" data-toggle="tab" href="#shirts" role="tab"
                                    aria-controls="shirts" aria-selected="false">Shirts</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="shoesTwo-tab" data-toggle="tab" href="#shoesTwo" role="tab"
                                    aria-controls="shoesTwo" aria-selected="false">Shoes</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="travelOut-tab" data-toggle="tab" href="#travelOut"
                                    role="tab" aria-controls="travelOut" aria-selected="false">Travel &
                                    Outdoor</a>
                            </li>
                        </ul>
                        <p class="offer"><a href="#">Limited-Time Offer!</a></p>
                    </div>
                </div>
                <div class="col-10">
                    <div class="tab-content tp-tab-content" id="trendingTabContent">
                        <div class="tab-pane show active" id="accessories" role="tabpanel"
                            aria-labelledby="accessories-tab">
                            <div class="trending-products-banner banner-animation">
                                <a href="shop-sidebar.html"><img src="{{ asset('public/Frontend') }}/img/images/trending_banner.jpg" alt=""></a>
                            </div>
                            <div class="row trending-product-active">
                                <div class="col">
                                    <div class="features-product-item">
                                        <div class="features-product-thumb">
                                            <div class="discount-tag">-20%</div>
                                            <a href="shop-details.html">
                                                <img src="{{ asset('public/Frontend') }}/img/product/trending_product08.jpg" alt="">
                                            </a>
                                            <div class="product-overlay-action">
                                                <ul>
                                                    <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                                    <li><a href="shop-sidebar.html"><i class="far fa-eye"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-content">
                                            <div class="rating">
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <h5><a href="shop-details.html">Women Shoes</a></h5>
                                            <p class="price">$67.00</p>
                                            <div class="features-product-bottom">
                                                <ul>
                                                    <li class="color-option">
                                                        <span class="gray"></span>
                                                        <span class="cyan"></span>
                                                        <span class="orange"></span>
                                                    </li>
                                                    <li class="limited-time"><a href="#">Limited-Time Offer!</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-cart"><a href="cart.html">add to cart</a></div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="features-product-item">
                                        <div class="features-product-thumb">
                                            <a href="shop-details.html">
                                                <img src="{{ asset('public/Frontend') }}/img/product/trending_product09.jpg" alt="">
                                            </a>
                                            <div class="product-overlay-action">
                                                <ul>
                                                    <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                                    <li><a href="shop-sidebar.html"><i class="far fa-eye"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-content">
                                            <div class="rating">
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <h5><a href="shop-details.html">Exclusive Handbags</a></h5>
                                            <p class="price">$45.00</p>
                                            <div class="features-product-bottom">
                                                <ul>
                                                    <li class="color-option">
                                                        <span class="gray"></span>
                                                        <span class="cyan"></span>
                                                        <span class="orange"></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-cart"><a href="cart.html">add to cart</a></div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="features-product-item">
                                        <div class="features-product-thumb">
                                            <a href="shop-details.html">
                                                <img src="{{ asset('public/Frontend') }}/img/product/trending_product10.jpg" alt="">
                                            </a>
                                            <div class="product-overlay-action">
                                                <ul>
                                                    <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                                    <li><a href="shop-sidebar.html"><i class="far fa-eye"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-content">
                                            <div class="rating">
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <h5><a href="shop-details.html">Travelling Bags</a></h5>
                                            <p class="price">$29.00</p>
                                            <div class="features-product-bottom">
                                                <ul>
                                                    <li class="color-option">
                                                        <span class="gray"></span>
                                                        <span class="cyan"></span>
                                                        <span class="orange"></span>
                                                    </li>
                                                    <li class="limited-time"><a href="#">Limited-Time Offer!</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-cart"><a href="cart.html">add to cart</a></div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="features-product-item">
                                        <div class="features-product-thumb">
                                            <a href="shop-details.html">
                                                <img src="{{ asset('public/Frontend') }}/img/product/trending_product11.jpg" alt="">
                                            </a>
                                            <div class="product-overlay-action">
                                                <ul>
                                                    <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                                    <li><a href="shop-sidebar.html"><i class="far fa-eye"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-content">
                                            <div class="rating">
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <h5><a href="shop-details.html">Winter Jackets</a></h5>
                                            <p class="price">$59.00</p>
                                            <div class="features-product-bottom">
                                                <ul>
                                                    <li class="color-option">
                                                        <span class="gray"></span>
                                                        <span class="cyan"></span>
                                                        <span class="orange"></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-cart"><a href="cart.html">add to cart</a></div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="features-product-item">
                                        <div class="features-product-thumb">
                                            <div class="discount-tag">-20%</div>
                                            <a href="shop-details.html">
                                                <img src="{{ asset('public/Frontend') }}/img/product/trending_product12.jpg" alt="">
                                            </a>
                                            <div class="product-overlay-action">
                                                <ul>
                                                    <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                                    <li><a href="shop-sidebar.html"><i class="far fa-eye"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-content">
                                            <div class="rating">
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <h5><a href="shop-details.html">Drawstring Sweatshirt</a></h5>
                                            <p class="price">$18.00</p>
                                            <div class="features-product-bottom">
                                                <ul>
                                                    <li class="color-option">
                                                        <span class="gray"></span>
                                                        <span class="cyan"></span>
                                                        <span class="orange"></span>
                                                    </li>
                                                    <li class="limited-time"><a href="#">Limited-Time Offer!</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-cart"><a href="cart.html">add to cart</a></div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="features-product-item">
                                        <div class="features-product-thumb">
                                            <div class="discount-tag">-20%</div>
                                            <a href="shop-details.html">
                                                <img src="{{ asset('public/Frontend') }}/img/product/trending_product09.jpg" alt="">
                                            </a>
                                            <div class="product-overlay-action">
                                                <ul>
                                                    <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                                    <li><a href="shop-sidebar.html"><i class="far fa-eye"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-content">
                                            <div class="rating">
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <h5><a href="shop-details.html">Women sleeping dress</a></h5>
                                            <p class="price">$12.00</p>
                                            <div class="features-product-bottom">
                                                <ul>
                                                    <li class="color-option">
                                                        <span class="gray"></span>
                                                        <span class="cyan"></span>
                                                        <span class="orange"></span>
                                                    </li>
                                                    <li class="limited-time"><a href="#">Limited-Time Offer!</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-cart"><a href="cart.html">add to cart</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="bags" role="tabpanel" aria-labelledby="bags-tab">
                            <div class="trending-products-banner banner-animation">
                                <a href="shop-sidebar.html"><img src="{{ asset('public/Frontend') }}/img/images/trending_banner02.jpg"
                                        alt=""></a>
                            </div>
                            <div class="row trending-product-active">
                                <div class="col">
                                    <div class="features-product-item">
                                        <div class="features-product-thumb">
                                            <div class="discount-tag">-20%</div>
                                            <a href="shop-details.html">
                                                <img src="{{ asset('public/Frontend') }}/img/product/trending_product10.jpg" alt="">
                                            </a>
                                            <div class="product-overlay-action">
                                                <ul>
                                                    <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                                    <li><a href="shop-sidebar.html"><i class="far fa-eye"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-content">
                                            <div class="rating">
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <h5><a href="shop-details.html">Women Shoes</a></h5>
                                            <p class="price">$67.00</p>
                                            <div class="features-product-bottom">
                                                <ul>
                                                    <li class="color-option">
                                                        <span class="gray"></span>
                                                        <span class="cyan"></span>
                                                        <span class="orange"></span>
                                                    </li>
                                                    <li class="limited-time"><a href="#">Limited-Time Offer!</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-cart"><a href="cart.html">add to cart</a></div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="features-product-item">
                                        <div class="features-product-thumb">
                                            <a href="shop-details.html">
                                                <img src="{{ asset('public/Frontend') }}/img/product/trending_product08.jpg" alt="">
                                            </a>
                                            <div class="product-overlay-action">
                                                <ul>
                                                    <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                                    <li><a href="shop-sidebar.html"><i class="far fa-eye"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-content">
                                            <div class="rating">
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <h5><a href="shop-details.html">Exclusive Handbags</a></h5>
                                            <p class="price">$45.00</p>
                                            <div class="features-product-bottom">
                                                <ul>
                                                    <li class="color-option">
                                                        <span class="gray"></span>
                                                        <span class="cyan"></span>
                                                        <span class="orange"></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-cart"><a href="cart.html">add to cart</a></div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="features-product-item">
                                        <div class="features-product-thumb">
                                            <a href="shop-details.html">
                                                <img src="{{ asset('public/Frontend') }}/img/product/trending_product09.jpg" alt="">
                                            </a>
                                            <div class="product-overlay-action">
                                                <ul>
                                                    <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                                    <li><a href="shop-sidebar.html"><i class="far fa-eye"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-content">
                                            <div class="rating">
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <h5><a href="shop-details.html">Travelling Bags</a></h5>
                                            <p class="price">$29.00</p>
                                            <div class="features-product-bottom">
                                                <ul>
                                                    <li class="color-option">
                                                        <span class="gray"></span>
                                                        <span class="cyan"></span>
                                                        <span class="orange"></span>
                                                    </li>
                                                    <li class="limited-time"><a href="#">Limited-Time Offer!</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-cart"><a href="cart.html">add to cart</a></div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="features-product-item">
                                        <div class="features-product-thumb">
                                            <a href="shop-details.html">
                                                <img src="{{ asset('public/Frontend') }}/img/product/trending_product11.jpg" alt="">
                                            </a>
                                            <div class="product-overlay-action">
                                                <ul>
                                                    <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                                    <li><a href="shop-sidebar.html"><i class="far fa-eye"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-content">
                                            <div class="rating">
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <h5><a href="shop-details.html">Winter Jackets</a></h5>
                                            <p class="price">$59.00</p>
                                            <div class="features-product-bottom">
                                                <ul>
                                                    <li class="color-option">
                                                        <span class="gray"></span>
                                                        <span class="cyan"></span>
                                                        <span class="orange"></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-cart"><a href="cart.html">add to cart</a></div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="features-product-item">
                                        <div class="features-product-thumb">
                                            <div class="discount-tag">-20%</div>
                                            <a href="shop-details.html">
                                                <img src="{{ asset('public/Frontend') }}/img/product/trending_product12.jpg" alt="">
                                            </a>
                                            <div class="product-overlay-action">
                                                <ul>
                                                    <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                                    <li><a href="shop-sidebar.html"><i class="far fa-eye"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-content">
                                            <div class="rating">
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <h5><a href="shop-details.html">Drawstring Sweatshirt</a></h5>
                                            <p class="price">$18.00</p>
                                            <div class="features-product-bottom">
                                                <ul>
                                                    <li class="color-option">
                                                        <span class="gray"></span>
                                                        <span class="cyan"></span>
                                                        <span class="orange"></span>
                                                    </li>
                                                    <li class="limited-time"><a href="#">Limited-Time Offer!</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-cart"><a href="cart.html">add to cart</a></div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="features-product-item">
                                        <div class="features-product-thumb">
                                            <div class="discount-tag">-20%</div>
                                            <a href="shop-details.html">
                                                <img src="{{ asset('public/Frontend') }}/img/product/trending_product10.jpg" alt="">
                                            </a>
                                            <div class="product-overlay-action">
                                                <ul>
                                                    <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                                    <li><a href="shop-sidebar.html"><i class="far fa-eye"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-content">
                                            <div class="rating">
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <h5><a href="shop-details.html">Women sleeping dress</a></h5>
                                            <p class="price">$12.00</p>
                                            <div class="features-product-bottom">
                                                <ul>
                                                    <li class="color-option">
                                                        <span class="gray"></span>
                                                        <span class="cyan"></span>
                                                        <span class="orange"></span>
                                                    </li>
                                                    <li class="limited-time"><a href="#">Limited-Time Offer!</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-cart"><a href="cart.html">add to cart</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="bSellers" role="tabpanel" aria-labelledby="bSellers-tab">
                            <div class="trending-products-banner banner-animation">
                                <a href="shop-sidebar.html"><img src="{{ asset('public/Frontend') }}/img/images/trending_banner.jpg" alt=""></a>
                            </div>
                            <div class="row trending-product-active">
                                <div class="col">
                                    <div class="features-product-item">
                                        <div class="features-product-thumb">
                                            <div class="discount-tag">-20%</div>
                                            <a href="shop-details.html">
                                                <img src="{{ asset('public/Frontend') }}/img/product/trending_product12.jpg" alt="">
                                            </a>
                                            <div class="product-overlay-action">
                                                <ul>
                                                    <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                                    <li><a href="shop-sidebar.html"><i class="far fa-eye"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-content">
                                            <div class="rating">
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <h5><a href="shop-details.html">Women Shoes</a></h5>
                                            <p class="price">$67.00</p>
                                            <div class="features-product-bottom">
                                                <ul>
                                                    <li class="color-option">
                                                        <span class="gray"></span>
                                                        <span class="cyan"></span>
                                                        <span class="orange"></span>
                                                    </li>
                                                    <li class="limited-time"><a href="#">Limited-Time Offer!</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-cart"><a href="cart.html">add to cart</a></div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="features-product-item">
                                        <div class="features-product-thumb">
                                            <a href="shop-details.html">
                                                <img src="{{ asset('public/Frontend') }}/img/product/trending_product11.jpg" alt="">
                                            </a>
                                            <div class="product-overlay-action">
                                                <ul>
                                                    <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                                    <li><a href="shop-sidebar.html"><i class="far fa-eye"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-content">
                                            <div class="rating">
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <h5><a href="shop-details.html">Exclusive Handbags</a></h5>
                                            <p class="price">$45.00</p>
                                            <div class="features-product-bottom">
                                                <ul>
                                                    <li class="color-option">
                                                        <span class="gray"></span>
                                                        <span class="cyan"></span>
                                                        <span class="orange"></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-cart"><a href="cart.html">add to cart</a></div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="features-product-item">
                                        <div class="features-product-thumb">
                                            <a href="shop-details.html">
                                                <img src="{{ asset('public/Frontend') }}/img/product/trending_product10.jpg" alt="">
                                            </a>
                                            <div class="product-overlay-action">
                                                <ul>
                                                    <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                                    <li><a href="shop-sidebar.html"><i class="far fa-eye"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-content">
                                            <div class="rating">
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <h5><a href="shop-details.html">Travelling Bags</a></h5>
                                            <p class="price">$29.00</p>
                                            <div class="features-product-bottom">
                                                <ul>
                                                    <li class="color-option">
                                                        <span class="gray"></span>
                                                        <span class="cyan"></span>
                                                        <span class="orange"></span>
                                                    </li>
                                                    <li class="limited-time"><a href="#">Limited-Time Offer!</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-cart"><a href="cart.html">add to cart</a></div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="features-product-item">
                                        <div class="features-product-thumb">
                                            <a href="shop-details.html">
                                                <img src="{{ asset('public/Frontend') }}/img/product/trending_product09.jpg" alt="">
                                            </a>
                                            <div class="product-overlay-action">
                                                <ul>
                                                    <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                                    <li><a href="shop-sidebar.html"><i class="far fa-eye"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-content">
                                            <div class="rating">
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <h5><a href="shop-details.html">Winter Jackets</a></h5>
                                            <p class="price">$59.00</p>
                                            <div class="features-product-bottom">
                                                <ul>
                                                    <li class="color-option">
                                                        <span class="gray"></span>
                                                        <span class="cyan"></span>
                                                        <span class="orange"></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-cart"><a href="cart.html">add to cart</a></div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="features-product-item">
                                        <div class="features-product-thumb">
                                            <div class="discount-tag">-20%</div>
                                            <a href="shop-details.html">
                                                <img src="{{ asset('public/Frontend') }}/img/product/trending_product08.jpg" alt="">
                                            </a>
                                            <div class="product-overlay-action">
                                                <ul>
                                                    <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                                    <li><a href="shop-sidebar.html"><i class="far fa-eye"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-content">
                                            <div class="rating">
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <h5><a href="shop-details.html">Drawstring Sweatshirt</a></h5>
                                            <p class="price">$18.00</p>
                                            <div class="features-product-bottom">
                                                <ul>
                                                    <li class="color-option">
                                                        <span class="gray"></span>
                                                        <span class="cyan"></span>
                                                        <span class="orange"></span>
                                                    </li>
                                                    <li class="limited-time"><a href="#">Limited-Time Offer!</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-cart"><a href="cart.html">add to cart</a></div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="features-product-item">
                                        <div class="features-product-thumb">
                                            <div class="discount-tag">-20%</div>
                                            <a href="shop-details.html">
                                                <img src="{{ asset('public/Frontend') }}/img/product/trending_product11.jpg" alt="">
                                            </a>
                                            <div class="product-overlay-action">
                                                <ul>
                                                    <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                                    <li><a href="shop-sidebar.html"><i class="far fa-eye"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-content">
                                            <div class="rating">
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <h5><a href="shop-details.html">Women sleeping dress</a></h5>
                                            <p class="price">$12.00</p>
                                            <div class="features-product-bottom">
                                                <ul>
                                                    <li class="color-option">
                                                        <span class="gray"></span>
                                                        <span class="cyan"></span>
                                                        <span class="orange"></span>
                                                    </li>
                                                    <li class="limited-time"><a href="#">Limited-Time
                                                            Offer!</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-cart"><a href="cart.html">add to cart</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="shirts" role="tabpanel" aria-labelledby="shirts-tab">
                            <div class="trending-products-banner banner-animation">
                                <a href="shop-sidebar.html"><img src="{{ asset('public/Frontend') }}/img/images/trending_banner02.jpg"
                                        alt=""></a>
                            </div>
                            <div class="row trending-product-active">
                                <div class="col">
                                    <div class="features-product-item">
                                        <div class="features-product-thumb">
                                            <div class="discount-tag">-20%</div>
                                            <a href="shop-details.html">
                                                <img src="{{ asset('public/Frontend') }}/img/product/trending_product08.jpg" alt="">
                                            </a>
                                            <div class="product-overlay-action">
                                                <ul>
                                                    <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                                    <li><a href="shop-sidebar.html"><i class="far fa-eye"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-content">
                                            <div class="rating">
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <h5><a href="shop-details.html">Women Shoes</a></h5>
                                            <p class="price">$67.00</p>
                                            <div class="features-product-bottom">
                                                <ul>
                                                    <li class="color-option">
                                                        <span class="gray"></span>
                                                        <span class="cyan"></span>
                                                        <span class="orange"></span>
                                                    </li>
                                                    <li class="limited-time"><a href="#">Limited-Time
                                                            Offer!</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-cart"><a href="cart.html">add to cart</a></div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="features-product-item">
                                        <div class="features-product-thumb">
                                            <a href="shop-details.html">
                                                <img src="{{ asset('public/Frontend') }}/img/product/trending_product09.jpg" alt="">
                                            </a>
                                            <div class="product-overlay-action">
                                                <ul>
                                                    <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                                    <li><a href="shop-sidebar.html"><i class="far fa-eye"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-content">
                                            <div class="rating">
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <h5><a href="shop-details.html">Exclusive Handbags</a></h5>
                                            <p class="price">$45.00</p>
                                            <div class="features-product-bottom">
                                                <ul>
                                                    <li class="color-option">
                                                        <span class="gray"></span>
                                                        <span class="cyan"></span>
                                                        <span class="orange"></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-cart"><a href="cart.html">add to cart</a></div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="features-product-item">
                                        <div class="features-product-thumb">
                                            <a href="shop-details.html">
                                                <img src="{{ asset('public/Frontend') }}/img/product/trending_product10.jpg" alt="">
                                            </a>
                                            <div class="product-overlay-action">
                                                <ul>
                                                    <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                                    <li><a href="shop-sidebar.html"><i class="far fa-eye"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-content">
                                            <div class="rating">
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <h5><a href="shop-details.html">Travelling Bags</a></h5>
                                            <p class="price">$29.00</p>
                                            <div class="features-product-bottom">
                                                <ul>
                                                    <li class="color-option">
                                                        <span class="gray"></span>
                                                        <span class="cyan"></span>
                                                        <span class="orange"></span>
                                                    </li>
                                                    <li class="limited-time"><a href="#">Limited-Time
                                                            Offer!</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-cart"><a href="cart.html">add to cart</a></div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="features-product-item">
                                        <div class="features-product-thumb">
                                            <a href="shop-details.html">
                                                <img src="{{ asset('public/Frontend') }}/img/product/trending_product11.jpg" alt="">
                                            </a>
                                            <div class="product-overlay-action">
                                                <ul>
                                                    <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                                    <li><a href="shop-sidebar.html"><i class="far fa-eye"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-content">
                                            <div class="rating">
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <h5><a href="shop-details.html">Winter Jackets</a></h5>
                                            <p class="price">$59.00</p>
                                            <div class="features-product-bottom">
                                                <ul>
                                                    <li class="color-option">
                                                        <span class="gray"></span>
                                                        <span class="cyan"></span>
                                                        <span class="orange"></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-cart"><a href="cart.html">add to cart</a></div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="features-product-item">
                                        <div class="features-product-thumb">
                                            <div class="discount-tag">-20%</div>
                                            <a href="shop-details.html">
                                                <img src="{{ asset('public/Frontend') }}/img/product/trending_product12.jpg" alt="">
                                            </a>
                                            <div class="product-overlay-action">
                                                <ul>
                                                    <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                                    <li><a href="shop-sidebar.html"><i class="far fa-eye"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-content">
                                            <div class="rating">
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <h5><a href="shop-details.html">Drawstring Sweatshirt</a></h5>
                                            <p class="price">$18.00</p>
                                            <div class="features-product-bottom">
                                                <ul>
                                                    <li class="color-option">
                                                        <span class="gray"></span>
                                                        <span class="cyan"></span>
                                                        <span class="orange"></span>
                                                    </li>
                                                    <li class="limited-time"><a href="#">Limited-Time
                                                            Offer!</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-cart"><a href="cart.html">add to cart</a></div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="features-product-item">
                                        <div class="features-product-thumb">
                                            <div class="discount-tag">-20%</div>
                                            <a href="shop-details.html">
                                                <img src="{{ asset('public/Frontend') }}/img/product/trending_product10.jpg" alt="">
                                            </a>
                                            <div class="product-overlay-action">
                                                <ul>
                                                    <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                                    <li><a href="shop-sidebar.html"><i class="far fa-eye"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-content">
                                            <div class="rating">
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <h5><a href="shop-details.html">Women sleeping dress</a></h5>
                                            <p class="price">$12.00</p>
                                            <div class="features-product-bottom">
                                                <ul>
                                                    <li class="color-option">
                                                        <span class="gray"></span>
                                                        <span class="cyan"></span>
                                                        <span class="orange"></span>
                                                    </li>
                                                    <li class="limited-time"><a href="#">Limited-Time
                                                            Offer!</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-cart"><a href="cart.html">add to cart</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="shoesTwo" role="tabpanel" aria-labelledby="shoesTwo-tab">
                            <div class="trending-products-banner banner-animation">
                                <a href="shop-sidebar.html"><img src="{{ asset('public/Frontend') }}/img/images/trending_banner.jpg" alt=""></a>
                            </div>
                            <div class="row trending-product-active">
                                <div class="col">
                                    <div class="features-product-item">
                                        <div class="features-product-thumb">
                                            <div class="discount-tag">-20%</div>
                                            <a href="shop-details.html">
                                                <img src="{{ asset('public/Frontend') }}/img/product/trending_product12.jpg" alt="">
                                            </a>
                                            <div class="product-overlay-action">
                                                <ul>
                                                    <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                                    <li><a href="shop-sidebar.html"><i class="far fa-eye"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-content">
                                            <div class="rating">
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <h5><a href="shop-details.html">Women Shoes</a></h5>
                                            <p class="price">$67.00</p>
                                            <div class="features-product-bottom">
                                                <ul>
                                                    <li class="color-option">
                                                        <span class="gray"></span>
                                                        <span class="cyan"></span>
                                                        <span class="orange"></span>
                                                    </li>
                                                    <li class="limited-time"><a href="#">Limited-Time
                                                            Offer!</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-cart"><a href="cart.html">add to cart</a></div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="features-product-item">
                                        <div class="features-product-thumb">
                                            <a href="shop-details.html">
                                                <img src="{{ asset('public/Frontend') }}/img/product/trending_product11.jpg" alt="">
                                            </a>
                                            <div class="product-overlay-action">
                                                <ul>
                                                    <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                                    <li><a href="shop-sidebar.html"><i class="far fa-eye"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-content">
                                            <div class="rating">
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <h5><a href="shop-details.html">Exclusive Handbags</a></h5>
                                            <p class="price">$45.00</p>
                                            <div class="features-product-bottom">
                                                <ul>
                                                    <li class="color-option">
                                                        <span class="gray"></span>
                                                        <span class="cyan"></span>
                                                        <span class="orange"></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-cart"><a href="cart.html">add to cart</a></div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="features-product-item">
                                        <div class="features-product-thumb">
                                            <a href="shop-details.html">
                                                <img src="{{ asset('public/Frontend') }}/img/product/trending_product10.jpg" alt="">
                                            </a>
                                            <div class="product-overlay-action">
                                                <ul>
                                                    <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                                    <li><a href="shop-sidebar.html"><i class="far fa-eye"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-content">
                                            <div class="rating">
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <h5><a href="shop-details.html">Travelling Bags</a></h5>
                                            <p class="price">$29.00</p>
                                            <div class="features-product-bottom">
                                                <ul>
                                                    <li class="color-option">
                                                        <span class="gray"></span>
                                                        <span class="cyan"></span>
                                                        <span class="orange"></span>
                                                    </li>
                                                    <li class="limited-time"><a href="#">Limited-Time
                                                            Offer!</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-cart"><a href="cart.html">add to cart</a></div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="features-product-item">
                                        <div class="features-product-thumb">
                                            <a href="shop-details.html">
                                                <img src="{{ asset('public/Frontend') }}/img/product/trending_product09.jpg" alt="">
                                            </a>
                                            <div class="product-overlay-action">
                                                <ul>
                                                    <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                                    <li><a href="shop-sidebar.html"><i class="far fa-eye"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-content">
                                            <div class="rating">
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <h5><a href="shop-details.html">Winter Jackets</a></h5>
                                            <p class="price">$59.00</p>
                                            <div class="features-product-bottom">
                                                <ul>
                                                    <li class="color-option">
                                                        <span class="gray"></span>
                                                        <span class="cyan"></span>
                                                        <span class="orange"></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-cart"><a href="cart.html">add to cart</a></div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="features-product-item">
                                        <div class="features-product-thumb">
                                            <div class="discount-tag">-20%</div>
                                            <a href="shop-details.html">
                                                <img src="{{ asset('public/Frontend') }}/img/product/trending_product08.jpg" alt="">
                                            </a>
                                            <div class="product-overlay-action">
                                                <ul>
                                                    <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                                    <li><a href="shop-sidebar.html"><i class="far fa-eye"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-content">
                                            <div class="rating">
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <h5><a href="shop-details.html">Drawstring Sweatshirt</a></h5>
                                            <p class="price">$18.00</p>
                                            <div class="features-product-bottom">
                                                <ul>
                                                    <li class="color-option">
                                                        <span class="gray"></span>
                                                        <span class="cyan"></span>
                                                        <span class="orange"></span>
                                                    </li>
                                                    <li class="limited-time"><a href="#">Limited-Time
                                                            Offer!</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-cart"><a href="cart.html">add to cart</a></div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="features-product-item">
                                        <div class="features-product-thumb">
                                            <div class="discount-tag">-20%</div>
                                            <a href="shop-details.html">
                                                <img src="{{ asset('public/Frontend') }}/img/product/trending_product11.jpg" alt="">
                                            </a>
                                            <div class="product-overlay-action">
                                                <ul>
                                                    <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                                    <li><a href="shop-sidebar.html"><i class="far fa-eye"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-content">
                                            <div class="rating">
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <h5><a href="shop-details.html">Women sleeping dress</a></h5>
                                            <p class="price">$12.00</p>
                                            <div class="features-product-bottom">
                                                <ul>
                                                    <li class="color-option">
                                                        <span class="gray"></span>
                                                        <span class="cyan"></span>
                                                        <span class="orange"></span>
                                                    </li>
                                                    <li class="limited-time"><a href="#">Limited-Time
                                                            Offer!</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-cart"><a href="cart.html">add to cart</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="travelOut" role="tabpanel" aria-labelledby="travelOut-tab">
                            <div class="trending-products-banner banner-animation">
                                <a href="shop-sidebar.html"><img src="{{ asset('public/Frontend') }}/img/images/trending_banner02.jpg"
                                        alt=""></a>
                            </div>
                            <div class="row trending-product-active">
                                <div class="col">
                                    <div class="features-product-item">
                                        <div class="features-product-thumb">
                                            <div class="discount-tag">-20%</div>
                                            <a href="shop-details.html">
                                                <img src="{{ asset('public/Frontend') }}/img/product/trending_product08.jpg" alt="">
                                            </a>
                                            <div class="product-overlay-action">
                                                <ul>
                                                    <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                                    <li><a href="shop-sidebar.html"><i class="far fa-eye"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-content">
                                            <div class="rating">
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <h5><a href="shop-details.html">Women Shoes</a></h5>
                                            <p class="price">$67.00</p>
                                            <div class="features-product-bottom">
                                                <ul>
                                                    <li class="color-option">
                                                        <span class="gray"></span>
                                                        <span class="cyan"></span>
                                                        <span class="orange"></span>
                                                    </li>
                                                    <li class="limited-time"><a href="#">Limited-Time
                                                            Offer!</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-cart"><a href="cart.html">add to cart</a></div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="features-product-item">
                                        <div class="features-product-thumb">
                                            <a href="shop-details.html">
                                                <img src="{{ asset('public/Frontend') }}/img/product/trending_product09.jpg" alt="">
                                            </a>
                                            <div class="product-overlay-action">
                                                <ul>
                                                    <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                                    <li><a href="shop-sidebar.html"><i class="far fa-eye"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-content">
                                            <div class="rating">
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <h5><a href="shop-details.html">Exclusive Handbags</a></h5>
                                            <p class="price">$45.00</p>
                                            <div class="features-product-bottom">
                                                <ul>
                                                    <li class="color-option">
                                                        <span class="gray"></span>
                                                        <span class="cyan"></span>
                                                        <span class="orange"></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-cart"><a href="cart.html">add to cart</a></div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="features-product-item">
                                        <div class="features-product-thumb">
                                            <a href="shop-details.html">
                                                <img src="{{ asset('public/Frontend') }}/img/product/trending_product10.jpg" alt="">
                                            </a>
                                            <div class="product-overlay-action">
                                                <ul>
                                                    <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                                    <li><a href="shop-sidebar.html"><i class="far fa-eye"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-content">
                                            <div class="rating">
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <h5><a href="shop-details.html">Travelling Bags</a></h5>
                                            <p class="price">$29.00</p>
                                            <div class="features-product-bottom">
                                                <ul>
                                                    <li class="color-option">
                                                        <span class="gray"></span>
                                                        <span class="cyan"></span>
                                                        <span class="orange"></span>
                                                    </li>
                                                    <li class="limited-time"><a href="#">Limited-Time
                                                            Offer!</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-cart"><a href="cart.html">add to cart</a></div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="features-product-item">
                                        <div class="features-product-thumb">
                                            <a href="shop-details.html">
                                                <img src="{{ asset('public/Frontend') }}/img/product/trending_product11.jpg" alt="">
                                            </a>
                                            <div class="product-overlay-action">
                                                <ul>
                                                    <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                                    <li><a href="shop-sidebar.html"><i class="far fa-eye"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-content">
                                            <div class="rating">
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <h5><a href="shop-details.html">Winter Jackets</a></h5>
                                            <p class="price">$59.00</p>
                                            <div class="features-product-bottom">
                                                <ul>
                                                    <li class="color-option">
                                                        <span class="gray"></span>
                                                        <span class="cyan"></span>
                                                        <span class="orange"></span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-cart"><a href="cart.html">add to cart</a></div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="features-product-item">
                                        <div class="features-product-thumb">
                                            <div class="discount-tag">-20%</div>
                                            <a href="shop-details.html">
                                                <img src="{{ asset('public/Frontend') }}/img/product/trending_product12.jpg" alt="">
                                            </a>
                                            <div class="product-overlay-action">
                                                <ul>
                                                    <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                                    <li><a href="shop-sidebar.html"><i class="far fa-eye"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-content">
                                            <div class="rating">
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <h5><a href="shop-details.html">Drawstring Sweatshirt</a></h5>
                                            <p class="price">$18.00</p>
                                            <div class="features-product-bottom">
                                                <ul>
                                                    <li class="color-option">
                                                        <span class="gray"></span>
                                                        <span class="cyan"></span>
                                                        <span class="orange"></span>
                                                    </li>
                                                    <li class="limited-time"><a href="#">Limited-Time
                                                            Offer!</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-cart"><a href="cart.html">add to cart</a></div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="features-product-item">
                                        <div class="features-product-thumb">
                                            <div class="discount-tag">-20%</div>
                                            <a href="shop-details.html">
                                                <img src="{{ asset('public/Frontend') }}/img/product/trending_product10.jpg" alt="">
                                            </a>
                                            <div class="product-overlay-action">
                                                <ul>
                                                    <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                                    <li><a href="shop-sidebar.html"><i class="far fa-eye"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-content">
                                            <div class="rating">
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                            <h5><a href="shop-details.html">Women sleeping dress</a></h5>
                                            <p class="price">$12.00</p>
                                            <div class="features-product-bottom">
                                                <ul>
                                                    <li class="color-option">
                                                        <span class="gray"></span>
                                                        <span class="cyan"></span>
                                                        <span class="orange"></span>
                                                    </li>
                                                    <li class="limited-time"><a href="#">Limited-Time
                                                            Offer!</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="features-product-cart"><a href="cart.html">add to cart</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- trending-product-area-end -->

    <!-- new-arrival-area -->
    <section class="new-arrival-area pt-95 pb-45">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-6">
                    <div class="text-center section-title title-style-two mb-45">
                        <h3 class="title">New Arrival Collection</h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="new-arrival-nav mb-35">
                        <button class="active" data-filter="*">Best Sellers</button>
                        <button class="" data-filter=".cat-one">New Products</button>
                        <button class="" data-filter=".cat-two">Sales Products</button>
                    </div>
                </div>
            </div>
            <div class="row new-arrival-active">
                <div class="col-xl-3 col-lg-4 col-sm-6 grid-item grid-sizer cat-two">
                    <div class="text-center new-arrival-item mb-50">
                        <div class="thumb mb-25">
                            <a href="shop-details.html"><img src="{{ asset('public/Frontend') }}/img/product/n_arrival_product01.jpg"
                                    alt=""></a>
                            <div class="product-overlay-action">
                                <ul>
                                    <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                    <li><a href="shop-sidebar.html"><i class="far fa-eye"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="content">
                            <h5><a href="shop-details.html">Bomber in Cotton</a></h5>
                            <span class="price">$37.00</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 grid-item grid-sizer cat-one">
                    <div class="text-center new-arrival-item mb-50">
                        <div class="thumb mb-25">
                            <div class="discount-tag">- 20%</div>
                            <a href="shop-details.html"><img src="{{ asset('public/Frontend') }}/img/product/n_arrival_product02.jpg"
                                    alt=""></a>
                            <div class="product-overlay-action">
                                <ul>
                                    <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                    <li><a href="shop-sidebar.html"><i class="far fa-eye"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="content">
                            <h5><a href="shop-details.html">Travelling Bags</a></h5>
                            <span class="price">$25.00</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 grid-item grid-sizer cat-two cat-one">
                    <div class="text-center new-arrival-item mb-50">
                        <div class="thumb mb-25">
                            <a href="shop-details.html"><img src="{{ asset('public/Frontend') }}/img/product/n_arrival_product03.jpg"
                                    alt=""></a>
                            <div class="product-overlay-action">
                                <ul>
                                    <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                    <li><a href="shop-sidebar.html"><i class="far fa-eye"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="content">
                            <h5><a href="shop-details.html">Exclusive Handbags</a></h5>
                            <span class="price">$19.50</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 grid-item grid-sizer cat-two">
                    <div class="text-center new-arrival-item mb-50">
                        <div class="thumb mb-25">
                            <div class="discount-tag new">New</div>
                            <a href="shop-details.html"><img src="{{ asset('public/Frontend') }}/img/product/n_arrival_product04.jpg"
                                    alt=""></a>
                            <div class="product-overlay-action">
                                <ul>
                                    <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                    <li><a href="shop-sidebar.html"><i class="far fa-eye"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="content">
                            <h5><a href="shop-details.html">Women Shoes</a></h5>
                            <span class="price">$12.90</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 grid-item grid-sizer cat-one">
                    <div class="text-center new-arrival-item mb-50">
                        <div class="thumb mb-25">
                            <div class="discount-tag">- 20%</div>
                            <a href="shop-details.html"><img src="{{ asset('public/Frontend') }}/img/product/n_arrival_product05.jpg"
                                    alt=""></a>
                            <div class="product-overlay-action">
                                <ul>
                                    <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                    <li><a href="shop-sidebar.html"><i class="far fa-eye"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="content">
                            <h5><a href="shop-details.html">Winter Jackets</a></h5>
                            <span class="price">$49.90</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 grid-item grid-sizer cat-two cat-one">
                    <div class="text-center new-arrival-item mb-50">
                        <div class="thumb mb-25">
                            <div class="discount-tag new">New</div>
                            <a href="shop-details.html"><img src="{{ asset('public/Frontend') }}/img/product/n_arrival_product06.jpg"
                                    alt=""></a>
                            <div class="product-overlay-action">
                                <ul>
                                    <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                    <li><a href="shop-sidebar.html"><i class="far fa-eye"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="content">
                            <h5><a href="shop-details.html">Fashion Shoes</a></h5>
                            <span class="price">$31.99</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 grid-item grid-sizer cat-one">
                    <div class="text-center new-arrival-item mb-50">
                        <div class="thumb mb-25">
                            <a href="shop-details.html"><img src="{{ asset('public/Frontend') }}/img/product/n_arrival_product07.jpg"
                                    alt=""></a>
                            <div class="product-overlay-action">
                                <ul>
                                    <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                    <li><a href="shop-sidebar.html"><i class="far fa-eye"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="content">
                            <h5><a href="shop-details.html">Winter Jackets</a></h5>
                            <span class="price">$19.99</span>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6 grid-item grid-sizer cat-two">
                    <div class="text-center new-arrival-item mb-50">
                        <div class="thumb mb-25">
                            <div class="discount-tag">- 45%</div>
                            <a href="shop-details.html"><img src="{{ asset('public/Frontend') }}/img/product/n_arrival_product08.jpg"
                                    alt=""></a>
                            <div class="product-overlay-action">
                                <ul>
                                    <li><a href="cart.html"><i class="far fa-heart"></i></a></li>
                                    <li><a href="shop-sidebar.html"><i class="far fa-eye"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="content">
                            <h5><a href="shop-details.html">Travelling Bags</a></h5>
                            <span class="price">$9.99</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- new-arrival-area-end -->

    <!-- discount-area -->
    <section class="discount-area discount-bg-two" data-background="{{ asset('public/Frontend') }}/img/bg/discount_bg02.jpg">
        <div class="container">
            <div class="row align-items-center justify-content-center justify-content-lg-start">
                <div class="col-lg-6 col-md-8">
                    <div class="text-left discount-content">
                        <div class="icon mb-15"><img src="{{ asset('public/Frontend') }}/img/icon/discount_icon.png" alt=""></div>
                        <span>STOCK IS LIMITED</span>
                        <h2>Winter Collection Season Sale upto 30%</h2>
                        <a href="shop-sidebar.html" class="btn">shop now</a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-8 col-sm-10">
                    <div class="discount-end-time-wrap">
                        <div class="icon">
                            <img src="{{ asset('public/Frontend') }}/img/icon/discount_icon.png" alt="">
                        </div>
                        <div class="content">
                            <span>STOCK IS LIMITED</span>
                            <h2>Winter Collection</h2>
                            <div class="coming-time" data-countdown="2021/9/21"></div>
                            <a href="shop-sidebar.html" class="btn">shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- discount-area-end -->

    <!-- blog-area -->
    <section class="blog-area pt-95 pb-50">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-4 col-lg-6">
                    <div class="text-center section-title title-style-two mb-45">
                        <h3 class="title">latest blog posts</h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 col-sm-9">
                    <div class="blog-post-item mb-50">
                        <div class="mb-20 blog-post-thumb">
                            <a href="blog-details.html"><img src="{{ asset('public/Frontend') }}/img/blog/blog_thumb01.jpg" alt=""></a>
                        </div>
                        <div class="blog-post-content">
                            <div class="tag"><a href="#">Shopping</a></div>
                            <h3><a href="blog-details.html">Erby-style shoes currently afoot presents an</a></h3>
                            <div class="blog-post-meta">
                                <ul>
                                    <li><i class="far fa-user"></i><a href="#">Jon Deo</a></li>
                                    <li><i class="far fa-calendar-alt"></i> Mar 10, 2021</li>
                                    <li class="read-more"><a href="blog-details.html"><i
                                                class="fas fa-angle-double-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-9">
                    <div class="blog-post-item mb-50">
                        <div class="mb-20 blog-post-thumb">
                            <a href="blog-details.html"><img src="{{ asset('public/Frontend') }}/img/blog/blog_thumb02.jpg" alt=""></a>
                        </div>
                        <div class="blog-post-content">
                            <div class="tag"><a href="#">Creative Design</a></div>
                            <h3><a href="blog-details.html">Make A Boring Wardrobe More Stylish Than</a></h3>
                            <div class="blog-post-meta">
                                <ul>
                                    <li><i class="far fa-user"></i><a href="#">Jon Deo</a></li>
                                    <li><i class="far fa-calendar-alt"></i> Mar 10, 2021</li>
                                    <li class="read-more"><a href="blog-details.html"><i
                                                class="fas fa-angle-double-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-9">
                    <div class="blog-post-item mb-50">
                        <div class="mb-20 blog-post-thumb">
                            <a href="blog-details.html"><img src="{{ asset('public/Frontend') }}/img/blog/blog_thumb03.jpg" alt=""></a>
                        </div>
                        <div class="blog-post-content">
                            <div class="tag"><a href="#">Creative Design</a></div>
                            <h3><a href="blog-details.html">Clothes that never get worn, but it doesn't have</a></h3>
                            <div class="blog-post-meta">
                                <ul>
                                    <li><i class="far fa-user"></i><a href="#">Jon Deo</a></li>
                                    <li><i class="far fa-calendar-alt"></i> Mar 10, 2021</li>
                                    <li class="read-more"><a href="blog-details.html"><i
                                                class="fas fa-angle-double-right"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog-area-end -->

    <!-- newsletter-area -->
    <section class="newsletter-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="newsletter-bg" data-background="{{ asset('public/Frontend') }}/img/bg/newsletter_bg.jpg">
                        <div class="newsletter-title mb-65">
                            <h2 class="title">NEWSLETTER!</h2>
                            <h6 class="sub-title">NEWSLETTER AND GET DISCOUNT 25% OFF</h6>
                        </div>
                        <form action="#" class="newsletter-form">
                            <input type="email" placeholder="Your email address...">
                            <button><span>Subscribe</span> <i class="far fa-arrow-alt-circle-right"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- newsletter-area-end -->

    <!-- brand-area -->
    <div class="brand-area pt-100 pb-100">
        <div class="container">
            <div class="row brand-active">
                <div class="col">
                    <div class="brand-item">
                        <a href="#"><img src="{{ asset('public/Frontend') }}/img/brand/brand_item01.png" alt=""></a>
                    </div>
                </div>
                <div class="col">
                    <div class="brand-item">
                        <a href="#"><img src="{{ asset('public/Frontend') }}/img/brand/brand_item02.png" alt=""></a>
                    </div>
                </div>
                <div class="col">
                    <div class="brand-item">
                        <a href="#"><img src="{{ asset('public/Frontend') }}/img/brand/brand_item03.png" alt=""></a>
                    </div>
                </div>
                <div class="col">
                    <div class="brand-item">
                        <a href="#"><img src="{{ asset('public/Frontend') }}/img/brand/brand_item04.png" alt=""></a>
                    </div>
                </div>
                <div class="col">
                    <div class="brand-item">
                        <a href="#"><img src="{{ asset('public/Frontend') }}/img/brand/brand_item05.png" alt=""></a>
                    </div>
                </div>
                <div class="col">
                    <div class="brand-item">
                        <a href="#"><img src="{{ asset('public/Frontend') }}/img/brand/brand_item06.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- brand-area-end -->
@endsection
