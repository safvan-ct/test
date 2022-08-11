@extends('layouts.app')

@section('title', 'Profile')

@section('content')
    <div class="page-banner about-banner"
        style="background-image: url({{ asset('/storage/images/bg.gif') }});padding-top: 100px">
        <div class="banner-content">
            <center style="padding-bottom: 50px;">
                <span class="subtitle" style="color:white">Welcome - Let’s shop with us !</span>
                <h2 class="title" style="color:white">Profile</h2>
            </center>
        </div>
    </div>
    <!-- End Page Title Area -->
    <style>
        @media (max-width: 768px) {
            .table {}

            .table thead {
                display: none;
            }

            .table td {

                position: relative;
                display: block;
                width: 95%;
                border-top: 0;
                text-align: right;
                padding: 10px;
                /* border-bottom: 0;*/
            }

            .table hr {

                position: relative;
                display: block;
                color: white;
                border-bottom: 1;
            }

            .table tr.total td::before {
                display: none;
            }

            .table tr.total td {
                width: auto;
                text-align: left;
            }

            .table tr.total {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-pack: justify;
                -ms-flex-pack: justify;
                justify-content: space-between;
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center;
            }

            .table td::before {
                content: attr(data-title) " ";
                font-weight: 700;
                float: left;
            }

            .table td.remove::before {
                display: none;
            }

            .ct-single-img-wrapper .ct-tot {
                display: none;
            }
        }
    </style>
    <!-- Start Contact Area -->
    <section class="contact-area ptb-100">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-12 col-md-12">
                    <div class="contact-form">
                        <!--<center><h2><u>Profile</u></h2></center></br>-->

                        <div class="row" style="padding-top: 48px;">
                            </br>
                            <div class="col-lg-12 col-md-12">
                                <center>
                                    <h3> {{ auth()->user()->name }} </h3>
                                </center>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <center>
                                    <h3> {{ auth()->user()->email }} </h3>
                                </center>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <a href="{{ route('profileedit') }}">
                                    <button style="width: -webkit-fill-available;" type="button"
                                        class="ps-btn ps-btn--fullwidth">Change Password
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <style>
                    form {
                        width: 100%;
                    }
                </style>

                <div class="col-lg-12 col-md-12">
                    <div class="" id="myform">
                        </br>
                        <center>
                            <h2><u>Order History</u></h2>
                        </center>
                        </br>
                        <form id="" method="post" action="">
                            <div class="row">
                            </div>
                            <div class="cart-table table-responsive" style="padding-bottom: 60px;">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col">&nbsp&nbsp#&nbsp&nbsp</th>
                                            <th scope="col">Product</th>
                                            <th scope="col"></th>
                                            <th scope="col">&nbsp&nbsp Price &nbsp&nbsp</th>
                                            <th scope="col"></th>
                                            <th scope="col">&nbsp&nbsp Quantity &nbsp&nbsp</th>
                                            <th scope="col"></th>
                                            <th scope="col">&nbsp&nbsp Total &nbsp&nbsp </th>
                                            <th scope="col"></th>
                                            <th scope="col">&nbsp&nbsp&nbsp&nbsp Date &nbsp&nbsp</th>
                                            <th scope="col"></th>
                                            <th scope="col">&nbsp&nbsp&nbsp&nbsp PaymentId &nbsp&nbsp</th>
                                            <th scope="col"></th>
                                            <th scope="col">&nbsp&nbsp&nbsp&nbsp Order Id &nbsp&nbsp</th>
                                            <!--<th scope="col">Total</th>-->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            @php
                                                $pname = trim(str_replace([','], '<br><br> ', $order->product_name));

                                                $product_id1 = explode(',', $order->pid);
                                                $rate = trim(str_replace([','], '<br><br> ', $order->product_price));
                                                $quantity = trim(str_replace([','], '<br><br> ', $order->product_qty));
                                            @endphp
                                            <tr>
                                                <td class="product-name">
                                                    <u>i</u>
                                                </td>
                                                <td class="product-name" data-title="Product">
                                                    {!! $pname !!}
                                                </td>
                                                <td></td>
                                                <td class="product-price" data-title="Price">
                                                    {!! $rate !!}
                                                </td>
                                                <td></td>
                                                <td class="product-name" data-title="Quantity">
                                                    <a href="#"> {!! $quantity !!}</a>
                                                </td>
                                                <td></td>
                                                <td class="product-name" data-title="Amount">
                                                    <a href="#"></br></br> {{ $order->pay_amount }}</a>
                                                </td>
                                                <td></td>
                                                <td class="product-name" data-title="Date">
                                                    <a href="#"></br></br>
                                                        {{ date('d-m-Y', strtotime($order->date)) }} </a>
                                                </td>
                                                <td></td>
                                                <td class="product-name" data-title="Payment ID">
                                                    <a href="#"></br></br>{{ $order->payment_id }}</a>
                                                </td>
                                                <td>&nbsp&nbsp &nbsp&nbsp &nbsp&nbsp </td>
                                                <td class="product-name" data-title="Order ID">
                                                    <a href="#"></br></br>AMG00{{ $order->id }}</a>
                                                </td>
                                            </tr>
                                            <tr style="outline: thin solid; color:green">
                                                <hr>
                                                </hr>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                    </br>
                </div>
            </div>
        </div>
    </section>
@endsection
