<head lang="en">
    <meta charset="utf-8">
    <title>Delivery Details</title>
    <meta name="description"
        content="We're dedicated to giving you the very best of our products and Services, with a focus on dependability, customer service and uniqueness">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="{{ asset('storage/images/logo_goldnew.png') }}" />
</head>

<body style="background-color:#fffbfb;">

    <style type="text/css">
        .invoice-title h2,
        .invoice-title h3 {
            display: inline-block;
        }

        .table>tbody>tr>.no-line {
            border-top: none;
        }

        .table>thead>tr>.no-line {
            border-bottom: none;
        }

        .table>tbody>tr>.thick-line {
            border-top: 2px solid;
        }
    </style>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://kit.fontawesome.com/189fb45a3a.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <div class="container">
        <div class="row">
            <div class="card-header">
                <center><img src="{{ asset('storage/images/logo_goldnew.png') }}" style="width:20%"></center>
            </div>
            <div class="col-xs-12">
                <div class="invoice-title">
                    <h2>Order Details</h2>
                    <h3 class="pull-right"></h3>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xs-6">
                        <address>
                            <strong>Deliver To :</strong></br>{{ $data['phone'] }}</br>
                            {{ $data['name'] }},</br>
                            {{ $data['address'] }},{{ $data['apartment'] }}</br>
                            {{ $data['city'] }}</br>
                            {{ $data['postcode'] }}

                        </address>

                    </div>
                    <div class="col-xs-6 text-right">
                        <address>
                            <strong>Payment Method:</strong>
                            Online Payment</br>
                            <strong>Order Date: {{ date('d-m-Y') }}</strong><br>
                        </address>
                    </div>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Order summary</strong></h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-condensed">
                                <thead>
                                    <tr>
                                        <td class="text-right"><strong>Sl.No</strong></td>
                                        <td class="text-right"><strong>Item</strong></td>

                                        <td class="text-right"><strong>Price</strong></td>
                                        <td class="text-right"><strong>Quantity</strong></td>
                                        <td class="text-right"><strong>Totals</strong></td>
                                    </tr>

                                </thead>

                                <tbody>
                                    @php $total = 0 @endphp
                                    @foreach ($cart_items as $item)
                                        @php
                                            $product = getProduct($item['product_id']);
                                            $total += $item['product_price'] * $item['product_qty'];
                                        @endphp
                                        <tr>
                                            <td class="thick-line text-right">{{ $loop->iteration }}</td>
                                            <td class="thick-line text-right">{{ $product['name'] }}</td>
                                            <td class="thick-line text-right">{{ $item['product_price'] }}</td>
                                            <td class="thick-line text-right">{{ $item['product_qty'] }}</td>
                                            <td class="thick-line text-right">{{ $item['product_price'] * $item['product_qty'] }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr></tr>
                                    <tr>
                                        <td class="no-line"></td>
                                        <td class="no-line"></td>
                                        <td class="no-line"></td>
                                        <td class="no-line"></td>
                                        <td class="no-line"></td>
                                        <td class="no-line text-center"><strong>Subtotal</strong></td>
                                        <td class="no-line  text-right">
                                            <i class="fas fa-rupee-sign"></i> {{ $total }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    {{-- <center><button id="rzp-button1"  style="border: medium none;font-weight: 500;padding: 8px 25px;text-transform: uppercase; background-color: green; border-radius:15px; height:40px; color: white">Order Now</button></center> --}}

    <style>
        .razorpay-payment-button {
            display: inline-block;
            padding: 15px 45px;
            margin-top: 26px;
            font-size: 16px;
            font-weight: 600;
            line-height: 20px;
            color: white;
            border: none;
            font-weight: 600;
            border-radius: 4px;
            background-color: #f4aa12;
            transition: all .4s ease;
        }
    </style>


    <div class="card-body text-center" style="padding-bottom:100px">
        <form action="{{ route('razorpay.payment.store') }}" method="POST">
            @csrf
            <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="{{ env('RAZORPAY_KEY') }}"
                data-amount=" {{ $total * 100 }}" data-buttontext="Order Now" data-name="Amigo" data-description="Rozerpay"
                data-image="{{ asset('storage/images/logo_goldnew.png') }}" data-prefill.name="{{ $data['name'] }}"
                data-prefill.email="" data-theme.color="#000"></script>
            <input type="hidden" name="name" value="{{ $data['name'] }}">
            <input type="hidden" name="address" value="{{ $data['address'] }}">
            <input type="hidden" name="city" value="{{ $data['city'] }}">
            <input type="hidden" name="email" value="{{ $data['email'] }}">
            <input type="hidden" name="apartment" value="{{ $data['apartment'] }}">
            <input type="hidden" name="postcode" value="{{ $data['postcode'] }}">
            <input type="hidden" name="phone" value="{{ $data['phone'] }}">
        </form>
    </div>
    </div>

    </div>
    </div>
    </div>
    </main>
    </div>
</body>

</html>
