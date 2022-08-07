@extends('admin.layouts.app')

@section('title', 'New Orders')

@section('content')

    <div class="main-container">

        <div class="row gutters mb-3">
            <div class="col-md-12 mb-2">
                @include('admin.layouts.alert')
            </div>

            <div class="col-xs-2 mb-2">
                <a href="{{ route('dashboard') }}" class="btn btn-primary">Back</a>
            </div>
        </div>

        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="table-container">
                    <div class="table-responsive">
                        <table id="copy-print-csv" class="table custom-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>User name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Product Name</th>
                                    <th>Size</th>
                                    <th>Color</th>
                                    <th>Rate</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                    <th>Grand Total</th>
                                    <th>Delivery To</th>
                                    <th>Payment Id</th>
                                    <th>Order Date</th>
                                    <th>Shipped Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $order->user->name }}</td>
                                        <td>{{ $order->user->email }}</td>
                                        <td>{{ $order->user->phone }}</td>
                                        <td>
                                            @foreach ($order->product_name as $k =>  $product_name)
                                                {{ ++$k .' - '. $product_name }}<br><br>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($order->product_size as  $product_size)
                                                {{ $product_size }}<br><br>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($order->product_color as  $product_color)
                                                {{ $product_color }}<br><br>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($order->product_price as  $product_price)
                                                {{ $product_price }}<br><br>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($order->product_qty as  $product_qty)
                                                {{ $product_qty }}<br><br>
                                            @endforeach
                                        </td>
                                        <td>
                                            @for ($i = 0; $i < count($order->product_name); $i++)
                                                {{ $order->product_qty[$i]*$order->product_price[$i] }}<br><br>
                                            @endfor
                                        </td>
                                            
                                        <td>
                                            @if ($order->coupon_code != null)
                                               Coupon Code :  {{ $order->coupon_code }}<br>
                                               Coupon Offer :  {{ $order->coupon_offer }}<br>
                                            @endif
                                            {{ $order->offer_price }}
                                        </td>
                                        <td>
                                            {{ $order->name }}<br>
                                            {{ $order->phone }}<br>
                                            {{ $order->address }}<br>
                                            {{ $order->place }}, {{ $order->city }}<br>
                                            {{ $order->state }}, {{ $order->country }}<br>
                                            {{ $order->zip }}
                                        </td>
                                        <td>{{ $order->payment_id }}</td>
                                        <td>{{ date('m-d-Y, h:s:i a', strtotime($order->created_at)) }}</td>
                                        <td>{{ date('m-d-Y, h:s:i a', strtotime($order->shipped_at)) }}</td>
                                        <td>
                                            <a href="{{ route('order.status', [$order->id, 'delivered']) }}" class="btn btn-primary">Order Delivered</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
