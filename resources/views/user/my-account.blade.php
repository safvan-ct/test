@extends('layouts.app')

@section('title', 'My account')

@section('content')

    <div class="page-banner contact-banner" style="background-image: url({{ asset('/storage/images/contactbg.jpg') }});">
        <div class="banner-content">
            <!--<span class="subtitle">We’re here to make you feel happy!</span>-->
            <!--<h2 class="title">Boutique</h2>-->
        </div>
    </div>

    <!-- Page Title/Header Start -->
    <div class="page-title-section section" data-bg-image="{{ asset('storage/images/banner.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="page-title">
                        <h1 class="title">My Account</h1>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                            <li class="breadcrumb-item active">My Account</li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- Page Title/Header End -->

    <!-- My Account Section Start -->
    <div class="section section-padding">
        <div class="container">
            <div class="row learts-mb-n30">

                <!-- My Account Tab List Start -->
                <div class="col-lg-4 col-12 learts-mb-30">
                    <div class="myaccount-tab-list nav">
                        <a href="#dashboad" class="active" data-toggle="tab">
                            Dashboard <i class="far fa-home"></i>
                        </a>
                        <a href="#orders" data-toggle="tab">
                            Orders <i class="far fa-file-alt"></i>
                        </a>
                        {{-- <a href="#address" data-toggle="tab">
                            Address <i class="far fa-map-marker-alt"></i>
                        </a> --}}
                        <a href="#account-info" data-toggle="tab">
                            Account Details <i class="far fa-user"></i>
                        </a>

                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            Logout <i class="far fa-sign-out-alt"></i>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
                <!-- My Account Tab List End -->

                <!-- My Account Tab Content Start -->
                <div class="col-lg-8 col-12 learts-mb-30">
                    <div class="tab-content">

                        <!-- Single Tab Content Start -->
                        <div class="tab-pane fade show active" id="dashboad">
                            <div class="myaccount-content dashboad">

                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <p>Hello <strong>{{ auth()->user()->name }}</strong></p>
                                <p>From your account dashboard you can view your <span>recent orders</span>, manage your
                                    <span>shipping and billing addresses</span>, and <span>edit your password and account
                                        details</span>.
                                </p>
                            </div>
                        </div>
                        <!-- Single Tab Content End -->

                        <!-- Single Tab Content Start -->
                        @if ($orders->count())
                            <div class="tab-pane fade" id="orders">
                                <div class="myaccount-content order">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Order</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>Total</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($orders as $order)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ date('m-d-Y', strtotime($order->created_at)) }}</td>
                                                        <td>{{ $order->status }}</td>
                                                        <td>${{ $order->offer_price }}</td>
                                                        <td>
                                                            <a data-toggle="modal" data-target="#view{{ $order->id }}">
                                                                View
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <!-- Single Tab Content End -->

                        <!-- Single Tab Content Start -->

                        {{-- <div class="tab-pane fade " id="address">
                            <div class="myaccount-content address">
                                <p>The following addresses will be used on the checkout page by default.</p>
                                <div class="row learts-mb-n30">
                                    <div class="col-md-12 col-12 learts-mb-10">
                                        <h4 class="title">Billing Address
                                            <a href="#" class="edit-link" data-toggle="modal"
                                                data-target="#add">Add</a>
                                        </h4>
                                    </div>
                                    @foreach ($address as $data)
                                        <div class="col-md-6 col-12 learts-mb-30">
                                            <address>
                                                <p><strong>{{ $data->name }}</strong></p>
                                                <p>{{ $data->address }}</p>
                                                <p>Mobile: {{ $data->phone }}</p>
                                            </address>

                                            <button class="mt-2 btn btn-outline btn-outline-hover-dark" style="line-height: 4px; border-color: #333333;" data-toggle="modal" data-target="#edit{{ $data->id }}">Edit</button>

                                            <a href=""
                                                onclick="event.preventDefault();document.getElementById('address-form').submit();" class="mt-2 btn btn-outline btn-outline-hover-dark" style="line-height: 4px; border-color: #333333;">
                                                Delete
                                            </a>

                                            <form id="address-form" action="{{ route('address.destroy', $data->id ) }}" method="POST" class="d-none">
                                                @csrf @method('delete')
                                            </form>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div> --}}

                        @foreach ($address as $data)
                            <div class="modal fade" id="edit{{ $data->id }}" tabindex="-1" role="dialog"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Address</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('address.update', $data->id) }}" method="post">
                                                @csrf @method('put')

                                                <div class="row learts-mb-n30">
                                                    <div class="col-md-6 col-12 learts-mb-30">
                                                        <input type="text" placeholder="Your Name *" name="name"
                                                            required value="{{ $data->name }}">
                                                        @error('name')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6 col-12 learts-mb-30">
                                                        <input type="number" min="10" placeholder="Mobile *"
                                                            name="phone" required value="{{ $data->phone }}">
                                                        @error('phone')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-12 learts-mb-30">
                                                        <textarea name="address" placeholder="Address *" required>{{ $data->address }}</textarea>
                                                        @error('address')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-12 text-center learts-mb-30">
                                                        <button class="btn btn-dark btn-outline-hover-dark"
                                                            style="line-height: 6px" type="submit">Update</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">New Address</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('address.store') }}" method="post">
                                            @csrf

                                            <div class="row learts-mb-n30">
                                                <div class="col-md-6 col-12 learts-mb-30">
                                                    <input type="text" placeholder="Your Name *" name="name"
                                                        required>
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 col-12 learts-mb-30">
                                                    <input type="number" min="10" placeholder="Mobile *"
                                                        name="phone" required>
                                                    @error('phone')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-12 learts-mb-30">
                                                    <textarea name="address" placeholder="Address *" required></textarea>
                                                    @error('address')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-12 text-center learts-mb-30">
                                                    <button class="btn btn-dark btn-outline-hover-dark"
                                                        style="line-height: 6px" type="submit">Add</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Single Tab Content End -->

                        <!-- Single Tab Content Start -->
                        <div class="tab-pane fade" id="account-info">
                            <div class="myaccount-content account-details">
                                <div class="account-details-form">
                                    <form method="post" action="{{ route('user.update') }}">
                                        @csrf

                                        <div class="row learts-mb-n30">
                                            <div class="col-md-12 col-12 learts-mb-30">
                                                <div class="single-input-item">
                                                    <label>Name <abbr class="required">*</abbr></label>
                                                    <input type="text" name="name" required
                                                        value="{{ auth()->user()->name }}">
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-12 col-12 learts-mb-30">
                                                <div class="single-input-item">
                                                    <label>Mobile <abbr class="required">*</abbr></label>
                                                    <input type="text" name="phone" required
                                                        value="{{ auth()->user()->phone }}">
                                                    @error('phone')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-12 learts-mb-30">
                                                <label>Email Addres</label>
                                                <input type="email" value="{{ auth()->user()->email }}" readonly>
                                            </div>

                                            <div class="col-12 learts-mb-30 learts-mt-30">
                                                <fieldset>
                                                    <legend>Password change</legend>
                                                    <div class="row learts-mb-n30">
                                                        <div class="col-12 learts-mb-30">
                                                            <label>Current password</label>
                                                            <input type="password" name="current_password"
                                                                autocomplete="new-password">
                                                            @error('current_password')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                        <div class="col-12 learts-mb-30">
                                                            <label>New password</label>
                                                            <input type="password" autocomplete="new-password"
                                                                name="password">
                                                            @error('password')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>

                                                        <div class="col-12 learts-mb-30">
                                                            <label>Confirm new password</label>
                                                            <input type="password" autocomplete="new-password"
                                                                name="password_confirmation">
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>
                                            <div class="col-12 learts-mb-30">
                                                <button class="btn btn-dark btn-outline-hover-dark" type="submit">Save
                                                    Changes</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Single Tab Content End -->

                    </div>
                </div> <!-- My Account Tab Content End -->
            </div>
        </div>
    </div>
    <!-- My Account Section End -->

    @foreach ($orders as $order)
        <div class="modal fade" id="view{{ $order->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Order Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body row">
                        @php $k=1; @endphp
                        @for ($i = 0; $i < count($order->product_name); $i++)
                            <div class="col-md-6">
                                <b>{{ $k++ }} - {{ $order->product_name[$i] }}</b><br>
                                &nbsp;&nbsp;&nbsp;
                                {{ 'Price : $' . $order->product_price[$i] }}<br>
                                &nbsp;&nbsp;&nbsp;
                                {{ 'Qty : ' . $order->product_qty[$i] }}<br>
                                &nbsp;&nbsp;&nbsp;
                                {{ 'Color : ' . $order->product_color[$i] }}<br>
                                &nbsp;&nbsp;&nbsp;
                                {{ 'Size: ' . $order->product_size[$i] }}<br>
                                &nbsp;&nbsp;&nbsp;
                                {{ 'Total : $' . $order->product_qty[$i] * $order->product_price[$i] }}<br><br>
                            </div>
                        @endfor
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        Total : ${{ $order->product_total }}
                        @if ($order->coupon_code != null)
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            Coupon Code : {{ $order->coupon_code }}<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            Coupon Offer : {{ $order->coupon_offer }}
                        @endif
                        <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Grand Total : ${{ $order->offer_price }}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
