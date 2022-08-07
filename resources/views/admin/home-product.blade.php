@extends('admin.layouts.app')

@section('title', 'Product Management')

@section('content')

    <div class="main-container">

        <div class="row mb-3">
            <div class="col-md-1">
                <a href="{{ route('dashboard') }}" class="btn btn-primary">Back</a>
            </div>
        </div>

        <div class="row gutters mt-3">
            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="{{ route('cats.index') }}">
                    <div class="info-stats2">
                        <div class="info-icon info"><i class="icon-box"></i></div>
                        <div class="sale-num">
                            <h3>Category({{ $count['game'] }})</h3>
                            <p>Category</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="{{ route('category.index') }}">
                    <div class="info-stats2">
                        <div class="info-icon info"><i class="icon-box"></i></div>
                        <div class="sale-num">
                            <h3>Sub Category ({{ $count['category'] }})</h3>
                            <p>Account Category</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="{{ route('reviews.index') }}">
                    <div class="info-stats2">
                        <div class="info-icon info"><i class="icon-box"></i></div>
                        <div class="sale-num">
                            <h3>Reviews({{ $count['reviews'] }})</h3>
                            <p>Product Reviews</p>
                        </div>
                    </div>
                </a>
            </div>




            {{-- <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="{{ route('subcat.index') }}">
                    <div class="info-stats2">
                        <div class="info-icon info"><i class="icon-box"></i></div>
                        <div class="sale-num"><h3>Account SubCategory ()</h3><p>Account SubCategory</p></div>
                    </div>
                </a>
            </div> --}}

            {{-- <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="{{ route('brand.index') }}">
                    <div class="info-stats2">
                        <div class="info-icon info"><i class="icon-box"></i></div>
                        <div class="sale-num"><h3>Brand ({{ $count['brand'] }})</h3><p>Brand</p></div>
                    </div>
                </a>
            </div> --}}

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="{{ route('accounts.index') }}">
                    <div class="info-stats2">
                        <div class="info-icon info"><i class="icon-box"></i></div>
                        <div class="sale-num">
                            <h3>Product({{ $count['accounts'] }})</h3>
                            <p>Products</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="{{ route('ingredient.index') }}">
                    <div class="info-stats2">
                        <div class="info-icon info"><i class="icon-box"></i></div>
                        <div class="sale-num">
                            <h3>Ingredient</h3>
                            <p>Products Ingredient</p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="{{ route('faq.index') }}">
                    <div class="info-stats2">
                        <div class="info-icon info"><i class="icon-box"></i></div>
                        <div class="sale-num">
                            <h3>Common FAQ</h3>
                            <p>Faq</p>
                        </div>
                    </div>
                </a>
            </div>


        </div>
    </div>

@endsection
