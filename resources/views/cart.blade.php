@extends('layouts.app')

@section('title', 'Cart')

@section('content')

    <div class="ps-page--simple">

        <div class="ps-section--shopping ps-shopping-cart">
            <div class="container">
                <div class="ps-section__header">
                    <h1>Shopping Cart</h1>
                </div>
                <div class="ps-section__content">
                    <div class="table-responsive">
                        <table class="table ps-table--shopping-cart ps-table--responsive">
                            <thead>
                                <tr>
                                    <th>Product name</th>
                                    <th>PRICE</th>
                                    <th>QUANTITY</th>
                                    <th>TOTAL</th>
                                    <th></th>
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
                                        <td data-label="Product">
                                            <div class="ps-product--cart">
                                                <div class="ps-product__thumbnail">
                                                    <a>
                                                        <img src="{{ asset('/storage/' . $product['image1']) }}" />
                                                    </a>
                                                </div>
                                                <div class="ps-product__content">
                                                    <a>{{ $product['name'] }} </a>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="price" data-label="Price">
                                            {{ $item['product_price'] }}
                                        </td>

                                        <td data-id={{ $product['id'] }} data-label="Quantity">
                                            <div class="form-group--number">
                                                <style>
                                                    form#in {
                                                        width: 120px;
                                                        padding: 0px;
                                                    }
                                                </style>

                                                <input type="number" id="number" value="{{ $item['product_qty'] }}"
                                                    onchange="data(this.value,{{ $product['id'] }})"
                                                    onkeyup="data(this.value,{{ $product['id'] }})" class="update-cart quantity" />

                                                <input type="hidden" value="{{ $product['id'] }}" id="id"
                                                    class="form-control " class="id" />
                                            </div>
                                        </td>

                                        <td data-label="Total">
                                            {{ $item['product_price'] * $item['product_qty'] }}
                                        </td>
                                        <td class="actions" data-th="">
                                            <form method="post" action="{{ route('remove.from.cart') }}">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $product['id'] }}">
                                                <a href="">
                                                    <button class="btn btn-danger btn-sm remove-from-cart">
                                                        <i class="icon-cross"></i>
                                                    </button>
                                                </a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="ps-section__footer">
                    <div class="row">

                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <div class="ps-block--shopping-total">

                                <div class="ps-block__content">
                                    <h3>Total <span>{{ $total }}</span></h3>
                                </div>
                            </div>

                            @if (count($cart_items) != 0)
                                <a class="ps-btn ps-btn--fullwidth" href="{{ route('checkout') }}">Proceed to checkout</a>
                            @else
                                <a class="ps-btn ps-btn--fullwidth" href="{{ route('shop', 6) }}">Shop Now</a>
                            @endif


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
