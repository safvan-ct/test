@extends('admin.layouts.app')

@section('title', 'Admin Home')

@section('content')
    <div class="main-container">
        <div class="row gutters mt-3">

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="{{ route('dashboard', 'web') }}">
                    <div class="info-stats2">
                        <div class="info-icon danger"><i class="icon-layers2"></i></div>
                        <div class="sale-num">
                            <h3>Website</h3>
                            <p>Management</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="{{ route('dashboard', 'product') }}">
                    <div class="info-stats2">
                        <div class="info-icon info"><i class="icon-box"></i></div>
                        <div class="sale-num">
                            <h3>Product</h3>
                            <p>Management</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="{{ route('user.list') }}">
                    <div class="info-stats2">
                        <div class="info-icon danger"><i class="icon-layers2"></i></div>
                        <div class="sale-num">
                            <h3>Users ({{ $count['user'] }})</h3>
                            <p>Users List</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="{{ route('neworder.list') }}">
                    <div class="info-stats2">
                        <div class="info-icon danger"><i class="icon-layers2"></i></div>
                        <div class="sale-num">
                            <h3> New Orders</br> ({{ $count['neworder'] }})</h3>
                            <p>Order List</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="{{ route('shippedorder.list') }}">
                    <div class="info-stats2">
                        <div class="info-icon danger"><i class="icon-layers2"></i></div>
                        <div class="sale-num">
                            <h3>Shipped Orders ({{ $count['shippedorder'] }})</h3>
                            <p>Order List</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="{{ route('order.list') }}">
                    <div class="info-stats2">
                        <div class="info-icon danger"><i class="icon-layers2"></i></div>
                        <div class="sale-num">
                            <h3>Delivered Orders ({{ $count['deliveredorder'] }})</h3>
                            <p>Order List</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                <a>
                    <div class="info-stats2">
                        <div class="info-icon danger"><i class="icon-layers2"></i></div>
                        <div class="sale-num">
                            <h3>Total Sales </br> (&nbsp₹ {{ $count['totalsales'] }}&nbsp)</h3>
                            <p>Total Sales</p>
                        </div>
                    </div>
                </a>
            </div>


            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                <a>
                    <div class="info-stats2">
                        <div class="info-icon danger"><i class="icon-layers2"></i></div>
                        <div class="sale-num">
                            <h3>Today Sales </br> (&nbsp₹ {{ $count['todaytotalsales'] }}&nbsp)</h3>
                            <p>Today Sales</p>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>
@endsection
