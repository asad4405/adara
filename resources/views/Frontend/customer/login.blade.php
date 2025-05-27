<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="wpOceans">
    <link rel="shortcut icon" type="image/png" href="{{ asset('public/Frontend') }}/images/favicon.png">
    <title>Customer Login</title>
    <link href="{{ asset('public/Frontend') }}/css/themify-icons.css" rel="stylesheet">
    <link href="{{ asset('public/Frontend') }}/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ asset('public/Frontend') }}/css/flaticon_ecommerce.css" rel="stylesheet">
    <link href="{{ asset('public/Frontend') }}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('public/Frontend') }}/css/animate.css" rel="stylesheet">
    <link href="{{ asset('public/Frontend') }}/css/owl.carousel.css" rel="stylesheet">
    <link href="{{ asset('public/Frontend') }}/css/owl.theme.css" rel="stylesheet">
    <link href="{{ asset('public/Frontend') }}/css/slick.css" rel="stylesheet">
    <link href="{{ asset('public/Frontend') }}/css/slick-theme.css" rel="stylesheet">
    <link href="{{ asset('public/Frontend') }}/css/swiper.min.css" rel="stylesheet">
    <link href="{{ asset('public/Frontend') }}/css/owl.transitions.css" rel="stylesheet">
    <link href="{{ asset('public/Frontend') }}/css/jquery.fancybox.css" rel="stylesheet">
    <link href="{{ asset('public/Frontend') }}/css/odometer-theme-default.css" rel="stylesheet">
    <link href="{{ asset('public/Frontend') }}/sass/style.css" rel="stylesheet">
</head>

<body>

    <!-- start page-wrapper -->
    <div class="page-wrapper">
        <!-- start preloader -->
        <div class="preloader">
            <div class="vertical-centered-box">
                <div class="content">
                    <div class="loader-circle"></div>
                    <div class="loader-line-mask">
                        <div class="loader-line"></div>
                    </div>
                    <img src="{{ asset('public/Frontend') }}/images/preloader.png" alt="">
                </div>
            </div>
        </div>
        <!-- end preloader -->

        <div class="wpo-login-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="wpo-accountWrapper">
                            <div class="wpo-accountInfo">
                                <div class="wpo-accountInfoHeader">
                                    <a href="{{ route('index') }}"><img src="{{ asset($generalsetting->white_logo) }}"
                                            alt="" width="100"></a>
                                    <a class="wpo-accountBtn" href="{{ route('customer.register') }}">
                                        <span class="">Register</span>
                                    </a>
                                </div>
                                <div class="image">
                                    <img src="{{ asset('public/Frontend') }}/images/login.svg" alt="">
                                </div>
                                <div class="back-home">
                                    <a class="wpo-accountBtn" href="{{ route('index') }}">
                                        <span class="">Back To Home</span>
                                    </a>
                                </div>
                            </div>
                            <div class="wpo-accountForm form-style">
                                <div class="fromTitle">
                                    <h2>Login</h2>
                                    <p>Sign into your pages account</p>
                                </div>
                                <div class="row">
                                    <form action="{{ route('customer.login.store') }}" method="POST">
                                        @csrf
                                        <div class="col-lg-12 col-md-12 col-12">
                                            <label>Phone / Email</label>
                                            <input type="text" name="phone_email" placeholder="Your phone number or email here..">
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-12">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input class="pwd2" type="password" placeholder="Your password here.."
                                                    name="password">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-default reveal3" type="button"><i
                                                            class="ti-eye"></i></button>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-12">
                                            <button type="submit" class="wpo-accountBtn">Login</button>
                                        </div>
                                    </form>
                                </div>
                                <p class="subText">Register into your pages account <a
                                        href="{{ route('customer.register') }}">Register</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- end of page-wrapper -->

    <!-- All JavaScript files
    ================================================== -->
    <script src="{{ asset('public/Frontend') }}/js/jquery.min.js"></script>
    <script src="{{ asset('public/Frontend') }}/js/bootstrap.bundle.min.js"></script>
    <!-- Plugins for this template -->
    <script src="{{ asset('public/Frontend') }}/js/modernizr.custom.js"></script>
    <script src="{{ asset('public/Frontend') }}/js/jquery.dlmenu.js"></script>
    <script src="{{ asset('public/Frontend') }}/js/jquery-plugin-collection.js"></script>
    <!-- Custom script for this template -->
    <script src="{{ asset('public/Frontend') }}/js/script.js"></script>
</body>

</html>
