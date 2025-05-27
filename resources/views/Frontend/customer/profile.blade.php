@extends('Frontend.layouts.master')
@section('title')
    Customer Profile
@endsection
@section('body-content')
    <style>
        .nav-pills .nav-link {
            border-radius: 0;
            text-align: left;
            text-transform: uppercase;
            font-weight: 500;
            color: #333;
        }

        .nav-pills .nav-link.active {
            background-color: #0d6efd;
            color: white;
        }

        .section-title {
            text-transform: capitalize;
            font-size: 1.5rem;
            font-weight: 600;
            color: #212529;
            margin-bottom: 1rem;
        }

        .form-label {
            text-transform: uppercase;
            font-size: 0.85rem;
            color: #555;
        }

        .card {
            border: none;
            border-radius: 0.5rem;
        }

        .tab-pane {
            animation: fadeIn 0.3s;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
    </style>
    <div class="container py-5">
        <div class="row">
            <!-- Sidebar -->
            <div class="mb-4 col-md-4">
                <div class="shadow-sm card">
                    <div class="p-0 card-body">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <button class="nav-link active" id="dashboard-tab" data-bs-toggle="pill"
                                data-bs-target="#dashboard" type="button" role="tab">Dashboard</button>
                            <button class="nav-link" id="orders-tab" data-bs-toggle="pill" data-bs-target="#orders"
                                type="button" role="tab">Orders</button>
                            <button class="nav-link" id="wishlist-tab" data-bs-toggle="pill" data-bs-target="#wishlist"
                                type="button" role="tab">Wishlist</button>
                            <button class="nav-link" id="address-tab" data-bs-toggle="pill" data-bs-target="#address"
                                type="button" role="tab">Address</button>
                            <button class="nav-link" id="profile-tab" data-bs-toggle="pill" data-bs-target="#profile"
                                type="button" role="tab">Profile</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-8">
                <div class="p-4 bg-white rounded shadow-sm tab-content" id="v-pills-tabContent">

                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <!-- Dashboard -->
                    <div class="tab-pane fade show active" id="dashboard" role="tabpanel">
                        <div class="section-title">Welcome to {{ Auth::guard('customer')->user()->name }} ! your dashboard
                        </div>
                        <p class="text-black">Here you can manage your profile, orders, wishlist, and more. Use the menu
                            to navigate.</p>
                    </div>

                    <!-- Orders -->
                    <div class="tab-pane fade" id="orders" role="tabpanel">
                        <div class="section-title">Your orders</div>
                        <ul class="list-group">
                            <li class="text-black list-group-item d-flex justify-content-between">
                                Order #1001 <span class="badge bg-success">Delivered</span>
                            </li>
                            <li class="text-black list-group-item d-flex justify-content-between">
                                Order #1002 <span class="badge bg-warning text-dark">Pending</span>
                            </li>
                            <li class="text-black list-group-item d-flex justify-content-between">
                                Order #1003 <span class="badge bg-danger">Cancelled</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Wishlist -->
                    <div class="tab-pane fade" id="wishlist" role="tabpanel">
                        <div class="section-title">Your wishlist</div>
                        <ul class="list-group">
                            <li class="text-black list-group-item">Samsung Galaxy S23 Ultra</li>
                            <li class="text-black list-group-item">Nike Air Max 90</li>
                            <li class="text-black list-group-item">Classic Leather Wallet</li>
                        </ul>
                    </div>

                    <!-- Address -->
                    <div class="tab-pane fade" id="address" role="tabpanel">
                        <div class="section-title">Saved addresses</div>
                        <p class="text-black"><strong>Name:</strong> {{ Auth::guard('customer')->user()->name }}</p>
                        @if (Auth::guard('customer')->user()->email)
                            <p class="text-black"><strong>Email:</strong> {{ Auth::guard('customer')->user()->email }}</p>
                        @endif
                        <p class="text-black"><strong>Phone Number:</strong> {{ Auth::guard('customer')->user()->phone }}
                        </p>

                        @if (Auth::guard('customer')->user()->district)
                            <p class="text-black"><strong>District:</strong> {{ Auth::guard('customer')->user()->district }}
                            </p>
                        @endif
                        @if (Auth::guard('customer')->user()->area)
                            <p class="text-black"><strong>Area:</strong> {{ Auth::guard('customer')->user()->area }}
                            </p>
                        @endif
                        @if (Auth::guard('customer')->user()->address)
                            <p class="text-black"><strong>Address:</strong> {{ Auth::guard('customer')->user()->address }}
                            </p>
                        @endif
                    </div>

                    <!-- Profile -->
                    <div class="tab-pane fade" id="profile" role="tabpanel">
                        <div class="section-title">Edit profile</div>
                        <form action="{{ route('customer.profile.update') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Full name</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{ Auth::guard('customer')->user()->name }}">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone number</label>
                                <input type="text" name="phone" class="form-control"
                                    value="{{ Auth::guard('customer')->user()->phone }}">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control"
                                    value="{{ Auth::guard('customer')->user()->email }}">
                            </div>
                            <div class="mb-3">
                                <label for="district" class="form-label">District</label>
                                <input type="text" class="form-control" name="district"
                                    value="{{ Auth::guard('customer')->user()->district }}">
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" name="address"
                                    value="{{ Auth::guard('customer')->user()->address }}">
                            </div>
                            <div class="mb-3">
                                <label for="area" class="form-label">Area</label>
                                <input type="text" class="form-control" name="area"
                                    value="{{ Auth::guard('customer')->user()->area }}">
                            </div>
                            <button type="submit" class="btn btn-primary text-uppercase">Save changes</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
