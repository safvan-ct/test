@extends('layouts.app')
@section('title', 'checkout')

@section('content')

    <style>
        form.ps-form--checkout {
            width: 100%;
        }
    </style>

    <main class="ps-page--my-account">

        <section class="ps-section--account ps-checkout">
            <div class="container">
                <div class="ps-section__header">
                    <h3>Checkout Information</h3>
                </div>

                <div class="ps-section__content">
                    <form class="ps-form--checkout" action="{{ route('paymentindex') }}" method="post">
                        @csrf
                        <div class="ps-form__content">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                                    <div class="ps-form__billing-info">

                                        <h3 class="ps-form__heading">Shipping Address</h3>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label> Name</label>
                                                    <input class="form-control" type="text" name="name"
                                                        value="{{ old('name') }}" placeholder="" required>
                                                    @error('name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Phone</label>
                                                    <input class="form-control" type="text" name="phone"
                                                        value="{{ old('phone') }}" placeholder="" required>
                                                    @error('phone')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label> Email</label>
                                                <input class="form-control" type="email" name="email"
                                                    value="{{ old('email') }}" placeholder="" required>
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input class="form-control" type="text" name="address"
                                                value="{{ old('address') }}" placeholder="" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Apartment</label>
                                            <input class="form-control" name="apartment" value="{{ old('apartment') }}"
                                                type="text" placeholder="" required>
                                            @error('apartment')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>City</label>
                                                    <input class="form-control" name="city" value="{{ old('city') }}"
                                                        type="text" placeholder="" required>
                                                    @error('city')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Postal Code</label>
                                                    <input class="form-control" name="postcode"
                                                        value="{{ old('postcode') }}" type="text" placeholder=""
                                                        required>
                                                    @error('postcode')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                                    <div class="ps-block--checkout-order">
                                        <div class="ps-block__content">
                                            <figure>
                                                <figcaption><strong>Product</strong><strong>Total</strong></figcaption>
                                            </figure>
                                            <figure class="ps-block__items">
                                                @php $total = 0 @endphp
                                                @foreach ($cart_items as $item)
                                                    @php
                                                        $product = getProduct($item['product_id']);
                                                        $total += $item['product_price'] * $item['product_qty'];
                                                    @endphp

                                                    <a href="#">
                                                        <strong>{{ $product['name'] }}</strong>
                                                        <span>x&nbsp{{ $item['product_qty'] }}</span>
                                                        <small>₹&nbsp{{ $item['product_price'] * $item['product_qty'] }}</small>
                                                    </a>
                                                @endforeach
                                            </figure>
                                            <figure>
                                                <figcaption>
                                                    <strong>Subtotal</strong><strong>₹&nbsp{{ $total }}</strong>
                                                </figcaption>
                                            </figure>
                                            @if (count((array) $cart_items) != 0)
                                                <button class="ps-btn ps-btn--fullwidth" type="submit">Place Order</button>
                                            @else
                                                <a class="ps-btn ps-btn--fullwidth" href="{{ route('shop', 6) }}">
                                                    Cart is Empty
                                                </a>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>

    </main>




@endsection
