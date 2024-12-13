@extends('Backend.layouts.master')
@section('body-content')
    <div class="row">
        <div class="mb-4 col-lg-8 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Congratulations John! 🎉</h5>
                            <p class="mb-4">
                                You have done <span class="fw-bold">72%</span> more sales today.
                                Check your new badge in your profile.
                            </p>

                            <a href="javascript:;" class="btn btn-sm btn-outline-primary">View
                                Badges</a>
                        </div>
                    </div>
                    <div class="text-center col-sm-5 text-sm-left">
                        <div class="px-0 pb-0 card-body px-md-4">
                            <img src="{{ asset('public/Backend') }}/img/illustrations/man-with-laptop-light.png"
                                height="140" alt="View Badge User"
                                data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                data-app-light-img="illustrations/man-with-laptop-light.png" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="order-1 col-lg-4 col-md-4">
            <div class="row">
                <div class="mb-4 col-lg-6 col-md-12 col-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="flex-shrink-0 avatar">
                                    <img src="{{ asset('public/Backend') }}/img/icons/unicons/chart-success.png"
                                        alt="chart success" class="rounded" />
                                </div>
                                <div class="dropdown">
                                    <button class="p-0 btn" type="button" id="cardOpt3" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                        <a class="dropdown-item" href="javascript:void(0);">View
                                            More</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <span class="mb-1 fw-semibold d-block">Profit</span>
                            <h3 class="mb-2 card-title">$12,628</h3>
                            <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +72.80%</small>
                        </div>
                    </div>
                </div>
                <div class="mb-4 col-lg-6 col-md-12 col-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="flex-shrink-0 avatar">
                                    <img src="{{ asset('public/Backend') }}/img/icons/unicons/wallet-info.png"
                                        alt="Credit Card" class="rounded" />
                                </div>
                                <div class="dropdown">
                                    <button class="p-0 btn" type="button" id="cardOpt6" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                        <a class="dropdown-item" href="javascript:void(0);">View
                                            More</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <span>Sales</span>
                            <h3 class="mb-1 card-title text-nowrap">$4,679</h3>
                            <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.42%</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Total Revenue -->
        <div class="order-2 mb-4 col-12 col-lg-8 order-md-3 order-lg-2">
            <div class="card">
                <div class="row row-bordered g-0">
                    <div class="col-md-8">
                        <h5 class="pb-3 m-0 card-header me-2">Total Revenue</h5>
                        <div id="totalRevenueChart" class="px-2"></div>
                    </div>
                    <div class="col-md-4">
                        <div class="card-body">
                            <div class="text-center">
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button"
                                        id="growthReportId" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        2022
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId">
                                        <a class="dropdown-item" href="javascript:void(0);">2021</a>
                                        <a class="dropdown-item" href="javascript:void(0);">2020</a>
                                        <a class="dropdown-item" href="javascript:void(0);">2019</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="growthChart"></div>
                        <div class="pt-3 mb-2 text-center fw-semibold">62% Company Growth</div>

                        <div class="gap-3 p-4 d-flex px-xxl-4 px-lg-2 gap-xxl-3 gap-lg-1 justify-content-between">
                            <div class="d-flex">
                                <div class="me-2">
                                    <span class="p-2 badge bg-label-primary"><i
                                            class="bx bx-dollar text-primary"></i></span>
                                </div>
                                <div class="d-flex flex-column">
                                    <small>2022</small>
                                    <h6 class="mb-0">$32.5k</h6>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="me-2">
                                    <span class="p-2 badge bg-label-info"><i class="bx bx-wallet text-info"></i></span>
                                </div>
                                <div class="d-flex flex-column">
                                    <small>2021</small>
                                    <h6 class="mb-0">$41.2k</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Total Revenue -->
        <div class="order-3 col-12 col-md-8 col-lg-4 order-md-2">
            <div class="row">
                <div class="mb-4 col-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="flex-shrink-0 avatar">
                                    <img src="{{ asset('public/Backend') }}/img/icons/unicons/paypal.png"
                                        alt="Credit Card" class="rounded" />
                                </div>
                                <div class="dropdown">
                                    <button class="p-0 btn" type="button" id="cardOpt4" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                                        <a class="dropdown-item" href="javascript:void(0);">View
                                            More</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <span class="mb-1 d-block">Payments</span>
                            <h3 class="mb-2 card-title text-nowrap">$2,456</h3>
                            <small class="text-danger fw-semibold"><i class="bx bx-down-arrow-alt"></i> -14.82%</small>
                        </div>
                    </div>
                </div>
                <div class="mb-4 col-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="flex-shrink-0 avatar">
                                    <img src="{{ asset('public/Backend') }}/img/icons/unicons/cc-primary.png"
                                        alt="Credit Card" class="rounded" />
                                </div>
                                <div class="dropdown">
                                    <button class="p-0 btn" type="button" id="cardOpt1" data-bs-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                        <a class="dropdown-item" href="javascript:void(0);">View
                                            More</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                    </div>
                                </div>
                            </div>
                            <span class="mb-1 fw-semibold d-block">Transactions</span>
                            <h3 class="mb-2 card-title">$14,857</h3>
                            <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.14%</small>
                        </div>
                    </div>
                </div>
                <div class="mb-4 col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="gap-3 d-flex justify-content-between flex-sm-row flex-column">
                                <div class="flex-row d-flex flex-sm-column align-items-start justify-content-between">
                                    <div class="card-title">
                                        <h5 class="mb-2 text-nowrap">Profile Report</h5>
                                        <span class="badge bg-label-warning rounded-pill">Year
                                            2021</span>
                                    </div>
                                    <div class="mt-sm-auto">
                                        <small class="text-success text-nowrap fw-semibold"><i
                                                class="bx bx-chevron-up"></i> 68.2%</small>
                                        <h3 class="mb-0">$84,686k</h3>
                                    </div>
                                </div>
                                <div id="profileReportChart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Order Statistics -->
        <div class="mb-4 col-md-6 col-lg-4 col-xl-4 order-0">
            <div class="card h-100">
                <div class="pb-0 card-header d-flex align-items-center justify-content-between">
                    <div class="mb-0 card-title">
                        <h5 class="m-0 me-2">Order Statistics</h5>
                        <small class="text-muted">42.82k Total Sales</small>
                    </div>
                    <div class="dropdown">
                        <button class="p-0 btn" type="button" id="orederStatistics" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
                            <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                            <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                            <a class="dropdown-item" href="javascript:void(0);">Share</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mb-3 d-flex justify-content-between align-items-center">
                        <div class="gap-1 d-flex flex-column align-items-center">
                            <h2 class="mb-2">8,258</h2>
                            <span>Total Orders</span>
                        </div>
                        <div id="orderStatisticsChart"></div>
                    </div>
                    <ul class="p-0 m-0">
                        <li class="pb-1 mb-4 d-flex">
                            <div class="flex-shrink-0 avatar me-3">
                                <span class="rounded avatar-initial bg-label-primary"><i
                                        class="bx bx-mobile-alt"></i></span>
                            </div>
                            <div class="flex-wrap gap-2 d-flex w-100 align-items-center justify-content-between">
                                <div class="me-2">
                                    <h6 class="mb-0">Electronic</h6>
                                    <small class="text-muted">Mobile, Earbuds, TV</small>
                                </div>
                                <div class="user-progress">
                                    <small class="fw-semibold">82.5k</small>
                                </div>
                            </div>
                        </li>
                        <li class="pb-1 mb-4 d-flex">
                            <div class="flex-shrink-0 avatar me-3">
                                <span class="rounded avatar-initial bg-label-success"><i class="bx bx-closet"></i></span>
                            </div>
                            <div class="flex-wrap gap-2 d-flex w-100 align-items-center justify-content-between">
                                <div class="me-2">
                                    <h6 class="mb-0">Fashion</h6>
                                    <small class="text-muted">T-shirt, Jeans, Shoes</small>
                                </div>
                                <div class="user-progress">
                                    <small class="fw-semibold">23.8k</small>
                                </div>
                            </div>
                        </li>
                        <li class="pb-1 mb-4 d-flex">
                            <div class="flex-shrink-0 avatar me-3">
                                <span class="rounded avatar-initial bg-label-info"><i class="bx bx-home-alt"></i></span>
                            </div>
                            <div class="flex-wrap gap-2 d-flex w-100 align-items-center justify-content-between">
                                <div class="me-2">
                                    <h6 class="mb-0">Decor</h6>
                                    <small class="text-muted">Fine Art, Dining</small>
                                </div>
                                <div class="user-progress">
                                    <small class="fw-semibold">849k</small>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex">
                            <div class="flex-shrink-0 avatar me-3">
                                <span class="rounded avatar-initial bg-label-secondary"><i
                                        class="bx bx-football"></i></span>
                            </div>
                            <div class="flex-wrap gap-2 d-flex w-100 align-items-center justify-content-between">
                                <div class="me-2">
                                    <h6 class="mb-0">Sports</h6>
                                    <small class="text-muted">Football, Cricket Kit</small>
                                </div>
                                <div class="user-progress">
                                    <small class="fw-semibold">99</small>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--/ Order Statistics -->

        <!-- Expense Overview -->
        <div class="order-1 mb-4 col-md-6 col-lg-4">
            <div class="card h-100">
                <div class="card-header">
                    <ul class="nav nav-pills" role="tablist">
                        <li class="nav-item">
                            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-tabs-line-card-income" aria-controls="navs-tabs-line-card-income"
                                aria-selected="true">
                                Income
                            </button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab">Expenses</button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab">Profit</button>
                        </li>
                    </ul>
                </div>
                <div class="px-0 card-body">
                    <div class="p-0 tab-content">
                        <div class="tab-pane fade show active" id="navs-tabs-line-card-income" role="tabpanel">
                            <div class="p-4 pt-3 d-flex">
                                <div class="flex-shrink-0 avatar me-3">
                                    <img src="{{ asset('public/Backend') }}/img/icons/unicons/wallet.png"
                                        alt="User" />
                                </div>
                                <div>
                                    <small class="text-muted d-block">Total Balance</small>
                                    <div class="d-flex align-items-center">
                                        <h6 class="mb-0 me-1">$459.10</h6>
                                        <small class="text-success fw-semibold">
                                            <i class="bx bx-chevron-up"></i>
                                            42.9%
                                        </small>
                                    </div>
                                </div>
                            </div>
                            <div id="incomeChart"></div>
                            <div class="gap-2 pt-4 d-flex justify-content-center">
                                <div class="flex-shrink-0">
                                    <div id="expensesOfWeek"></div>
                                </div>
                                <div>
                                    <p class="mt-1 mb-n1">Expenses This Week</p>
                                    <small class="text-muted">$39 less than last week</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Expense Overview -->

        <!-- Transactions -->
        <div class="order-2 mb-4 col-md-6 col-lg-4">
            <div class="card h-100">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="m-0 card-title me-2">Transactions</h5>
                    <div class="dropdown">
                        <button class="p-0 btn" type="button" id="transactionID" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
                            <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                            <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                            <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="p-0 m-0">
                        <li class="pb-1 mb-4 d-flex">
                            <div class="flex-shrink-0 avatar me-3">
                                <img src="{{ asset('public/Backend') }}/img/icons/unicons/paypal.png" alt="User"
                                    class="rounded" />
                            </div>
                            <div class="flex-wrap gap-2 d-flex w-100 align-items-center justify-content-between">
                                <div class="me-2">
                                    <small class="mb-1 text-muted d-block">Paypal</small>
                                    <h6 class="mb-0">Send money</h6>
                                </div>
                                <div class="gap-1 user-progress d-flex align-items-center">
                                    <h6 class="mb-0">+82.6</h6>
                                    <span class="text-muted">USD</span>
                                </div>
                            </div>
                        </li>
                        <li class="pb-1 mb-4 d-flex">
                            <div class="flex-shrink-0 avatar me-3">
                                <img src="{{ asset('public/Backend') }}/img/icons/unicons/wallet.png" alt="User"
                                    class="rounded" />
                            </div>
                            <div class="flex-wrap gap-2 d-flex w-100 align-items-center justify-content-between">
                                <div class="me-2">
                                    <small class="mb-1 text-muted d-block">Wallet</small>
                                    <h6 class="mb-0">Mac'D</h6>
                                </div>
                                <div class="gap-1 user-progress d-flex align-items-center">
                                    <h6 class="mb-0">+270.69</h6>
                                    <span class="text-muted">USD</span>
                                </div>
                            </div>
                        </li>
                        <li class="pb-1 mb-4 d-flex">
                            <div class="flex-shrink-0 avatar me-3">
                                <img src="{{ asset('public/Backend') }}/img/icons/unicons/chart.png" alt="User"
                                    class="rounded" />
                            </div>
                            <div class="flex-wrap gap-2 d-flex w-100 align-items-center justify-content-between">
                                <div class="me-2">
                                    <small class="mb-1 text-muted d-block">Transfer</small>
                                    <h6 class="mb-0">Refund</h6>
                                </div>
                                <div class="gap-1 user-progress d-flex align-items-center">
                                    <h6 class="mb-0">+637.91</h6>
                                    <span class="text-muted">USD</span>
                                </div>
                            </div>
                        </li>
                        <li class="pb-1 mb-4 d-flex">
                            <div class="flex-shrink-0 avatar me-3">
                                <img src="{{ asset('public/Backend') }}/img/icons/unicons/cc-success.png" alt="User"
                                    class="rounded" />
                            </div>
                            <div class="flex-wrap gap-2 d-flex w-100 align-items-center justify-content-between">
                                <div class="me-2">
                                    <small class="mb-1 text-muted d-block">Credit Card</small>
                                    <h6 class="mb-0">Ordered Food</h6>
                                </div>
                                <div class="gap-1 user-progress d-flex align-items-center">
                                    <h6 class="mb-0">-838.71</h6>
                                    <span class="text-muted">USD</span>
                                </div>
                            </div>
                        </li>
                        <li class="pb-1 mb-4 d-flex">
                            <div class="flex-shrink-0 avatar me-3">
                                <img src="{{ asset('public/Backend') }}/img/icons/unicons/wallet.png" alt="User"
                                    class="rounded" />
                            </div>
                            <div class="flex-wrap gap-2 d-flex w-100 align-items-center justify-content-between">
                                <div class="me-2">
                                    <small class="mb-1 text-muted d-block">Wallet</small>
                                    <h6 class="mb-0">Starbucks</h6>
                                </div>
                                <div class="gap-1 user-progress d-flex align-items-center">
                                    <h6 class="mb-0">+203.33</h6>
                                    <span class="text-muted">USD</span>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex">
                            <div class="flex-shrink-0 avatar me-3">
                                <img src="{{ asset('public/Backend') }}/img/icons/unicons/cc-warning.png" alt="User"
                                    class="rounded" />
                            </div>
                            <div class="flex-wrap gap-2 d-flex w-100 align-items-center justify-content-between">
                                <div class="me-2">
                                    <small class="mb-1 text-muted d-block">Mastercard</small>
                                    <h6 class="mb-0">Ordered Food</h6>
                                </div>
                                <div class="gap-1 user-progress d-flex align-items-center">
                                    <h6 class="mb-0">-92.45</h6>
                                    <span class="text-muted">USD</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--/ Transactions -->
    </div>
@endsection
