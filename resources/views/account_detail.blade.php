@extends('layouts.app1')
@section('title', 'About')
@section('content')

    @foreach ($accounts as $account)
    @endforeach
    <style>
        form {
            width: 80%;
            margin: 0 auto;
            text-align: center;
            padding-top: 50px;
        }
    </style>
    <div class="ps-page--product">
        <div class="ps-container">
            <div class="ps-page__container">
                <div class="ps-page__left">
                    <div class="ps-product--detail ps-product--fullwidth">
                        <div class="ps-product__header">
                            <form method="post" action="{{ route('addTo.cart', $account->id) }}">
                                @csrf

                                <div class="ps-product__thumbnail" data-vertical="true">
                                    <figure>
                                        <div class="ps-wrapper">
                                            <div class="ps-product__gallery" data-arrow="true">
                                                <div class="item">
                                                    <a href="{{ asset('/storage/' . $account->image1) }}">
                                                        <div class="zoom">
                                                            <img src="{{ asset('/storage/' . $account->image1) }}"
                                                                alt="" style="width: 300px;">
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="item">
                                                    <a href="{{ asset('/storage/' . $account->image2) }}">
                                                        <div class="zoom">
                                                            <img src="{{ asset('/storage/' . $account->image2) }}"
                                                                alt="" style="width: 300px;">
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="item">
                                                    <a href="{{ asset('/storage/' . $account->image3) }}">
                                                        <div class="zoom">
                                                            <img src="{{ asset('/storage/' . $account->image3) }}"
                                                                alt="" style="width: 300px;">
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="item">
                                                    <a href="{{ asset('/storage/' . $account->image4) }}">
                                                        <div class="zoom">
                                                            <img src="{{ asset('/storage/' . $account->image4) }}"
                                                                alt="" style="width: 300px;">
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </figure>
                                    <div class="ps-product__variants" data-item="4" data-md="4" data-sm="4"
                                        data-arrow="false">
                                        <div class="item">
                                            <img src="{{ asset('/storage/' . $account->image1) }}" alt=""
                                                style="width: 350px;">
                                        </div>
                                        <div class="item">
                                            <img src="{{ asset('/storage/' . $account->image2) }}" alt=""
                                                style="width: 350px;">
                                        </div>
                                        <div class="item">
                                            <img src="{{ asset('/storage/' . $account->image3) }}" alt=""
                                                style="width: 350px;">
                                        </div>
                                        <div class="item">
                                            <img src="{{ asset('/storage/' . $account->image4) }}" alt=""
                                                style="width: 350px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="ps-product__info">
                                    <h3 style="font-size: 35px;font-weight: 500;">{{ $account->name }} </h3>
                                    <div class="ps-product__meta">


                                    </div>
                                    <h4 class="ps-product__price" style="color: #6c757d">MRP : <b
                                            style="color:black ;font-size: 25;">
                                            <!--<del>account₹{{ $account->price }}</del>-->
                                            @if ($account->offer !== 0)
                                                <del>₹&nbsp&nbsp{{ $account->price }}</del>
                                            @endif
                                            ₹ {{ $account->offer_price }}
                                        </b></h4>


                                    <div class="ps-product__shopping">
                                        <figure>
                                            <figcaption>Quantity</figcaption>

                                            <div class="value-button" id="decrease" onclick="decreaseValue()"
                                                value="Decrease Value">-</div>
                                            <input type="number" id="number" name="quantity" value="1" />
                                            <div class="value-button" id="increase" onclick="increaseValue()"
                                                value="Increase Value">+</div>
                                            <!--<form>-->
                                            <!--     <div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value">-</div>-->
                                            <!--     <input type="number" id="number" value="0" />-->
                                            <!--     <div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">+</div>-->
                                            <!--</form>-->
                                            <div class="form-group--number">
                                                <!--    <button class="up"><i class="fa fa-plus"></i></button>-->
                                                <!--    <button class="down"><i class="fa fa-minus"></i></button>-->
                                                <!--    <input class="form-control" type="text" placeholder="1">-->
                                                <!--</div>-->
                                        </figure>


                                        <div class="ps-product__actions">
                                            <button type="submit" class="ps-product__actions ps-btn ps-btn--black"
                                                style="height: 42px; font-size: 25px; padding-top: 12px;">Add to
                                                Cart</button>
                                        </div>
                                    </div>

                            </form>
                        </div>
                    </div>

                    @if (!is_null($account->youtube_link))
                        <iframe style="width: 100%; height: 250px;" src="{{ $account->youtube_link }}"></iframe>
                    @endif

                    <div class="ps-product__content ps-tab-root">
                        <ul class="ps-tab-list">
                            <li class="active"><a href="#tab-1">Description</a></li>
                            <li><a href="#tab-2">Ingredients</a></li>
                            <li><a href="#tab-3">Benefits</a></li>
                            <li><a href="#tab-4">How To Use</a></li>
                            <li><a href="#tab-5">For Best Result</a></li>


                            <!-- <li><a href="#tab-4">Reviews (4)</a></li> -->

                        </ul>

                        <div class="ps-tabs">
                            <div class="ps-tab active" id="tab-1">
                                <div class="ps-document">
                                    <p style="font-size: 19px">
                                        {!! $account->description !!}</p>

                                </div>
                            </div>
                            <div class="ps-tab" id="tab-2">
                                <div class="ps-document">
                                    <p style="font-size: 19px"> {!! $account->ingredient !!}</p>
                                </div>

                            </div>
                            <div class="ps-tab" id="tab-3">


                                <div class="ps-document">
                                    <p style="font-size: 19px"> {!! $account->benefits !!}</p>
                                </div>

                            </div>
                            <div class="ps-tab" id="tab-4">
                                <div class="ps-document">
                                    <p style="font-size: 19px"> {!! $account->howtouse !!}</p>
                                </div>

                            </div>
                            <div class="ps-tab" id="tab-5">
                                {!! $account->forbestresult !!}

                            </div>
                            <!-- <div class="ps-tab active" id="tab-6">
                                                                    <p>Sorry no more offers available</p>
                                                                </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="ps-page__right">
                <aside class="widget widget_product widget_features">
                    <p><i class="icon-network"></i> Vegan product</p>
                    <p><i class="icon-3d-rotate"></i> 7-day return, if eligible</p>
                    <p><i class="icon-receipt"></i> Supplier will provide the bill for this product.</p>
                    <p><i class="icon-credit-card"></i> Pay online or when receiving the product</p>
                </aside>
                <aside class="widget widget_same-brand">
                    <h3 style="font-family: "Work Sans", sans-serif">RELATED PRODUCTS</h3>

                    <div class="widget__content">
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($related as $product)
                            @if ($product->cat_id == $account->cat_id)
                                @if ($i == 0)
                                    @php
                                        $i++;
                                    @endphp
                                    <div class="ps-product">
                                        <div class="ps-product__thumbnail"><a
                                                href="{{ route('account_details', $product->id) }}"><img
                                                    src="{{ asset('/storage/' . $product->image1) }}"
                                                    alt="" /></a>
                                            <ul class="ps-product__actions"
                                                style="background: black; color: white; width:150px;">
                                                <li><a href="{{ route('add.to.cart', $product->id) }}"
                                                        data-toggle="tooltip" data-placement="top"
                                                        style="margin-right: 34px;margin-left: 25px;width: 90px;">Add to
                                                        Cart</a></li>

                                                <!-- <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li> -->

                                            </ul>
                                        </div>
                                        <div class="ps-product__container"><a class="ps-product__vendor"
                                                href="{{ route('account_details', $product->id) }}"></a>
                                            <div class="ps-product__content"><a class="ps-product__title"
                                                    href="{{ route('account_details', $product->id) }}">{{ $product->name }}</a>
                                                <p class="ps-product__price sale">
                                                    @if ($product->offer != 0)
                                                        <del>₹&nbsp&nbsp{{ $product->price }}</del>
                                                    @endif
                                                    ₹&nbsp&nbsp{{ $product->offer_price }}
                                                </p>
                                            </div>
                                            <div class="ps-product__content hover"><a class="ps-product__title"
                                                    href="{{ route('account_details', $product->id) }}">{{ $product->name }}</a>
                                                <p class="ps-product__price sale">
                                                    @if ($product->offer != 0)
                                                        <del>₹&nbsp&nbsp{{ $product->price }}</del>
                                                    @endif
                                                    ₹&nbsp&nbsp{{ $product->offer_price }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    </div>
                </aside>
            </div>
        </div>

        <!--</div>-->

        <div class="ps-section--default">
            <div class="ps-section__header">
                <h3>KEY INGREDIENTS</h3>
            </div>
            <div class="ps-section__content">
                <div class="ps-product-list ps-product-list--2">

                    <div class="ps-section__content" style="padding-top: 0px;">
                        <div class="ps-carousel--nav owl-slider" data-owl-auto="false" data-owl-loop="false"
                            data-owl-speed="10000" data-owl-gap="30" data-owl-nav="false" data-owl-dots="true"
                            data-owl-item="5" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3"
                            data-owl-item-lg="4" data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">
                            @foreach ($ingredients as $ingredient)
                                @if ($ingredient->product == $account->id)
                                    <div class="ps-product">
                                        <div class="ps-product__thumbnail"><a><img
                                                    src="{{ asset('/storage/' . $ingredient->image) }}"
                                                    alt="{{ $ingredient->alt }}"
                                                    style="width: 200px;
                                                                height: 135px;" /></a>


                                        </div>
                                        <div class="ps-product__container">
                                            <a class="ps-product__vendor" href="#">
                                                <b>
                                                    <center>{{ $ingredient->title }}</center>
                                                </b>
                                            </a>
                                        </div>
                                    </div>
                                @endif
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ps-section--default">
            <div class="ps-section__header">
                <h3>REVIEWS</h3>

            </div>
            <div class="ps-section__content">
                <div class="row">

                    <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12 ">
                        <div class="ps-block--average-rating">
                            <div class="ps-block__header">
                                <h3> {{ $rating }}</h3>
                                <select class="ps-rating" data-read-only="true">
                                    @if ($rating == 1)
                                        <option value="1" class="br-selected br-current">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>

                                        <option value="2">2</option>


                                        <option value="5"class="" style="color: #EDB867;">5</option>
                                    @elseif($rating == 2)
                                        <option value="2"class="br-selected br-current">2</option>

                                        <option value="2"class="br-selected br-current" style="color: #EDB867;">2
                                        </option>
                                        <option value="3">3</option>

                                        <option value="4">4</option>


                                        <option value="5">5</option>
                                    @elseif($rating == 3)
                                        <option value="3"class="br-selected br-current">3</option>
                                        <option value="4"class="br-selected br-current" style="color: #EDB867;">4
                                        </option>
                                        <option value="3"class="br-selected " style="color: #EDB867;">3</option>

                                        <option value="2">2</option>


                                        <option value="5"class="" style="color: #EDB867;">5</option>


                                        <option value="2" style="color: #EDB867;">2</option>
                                    @elseif($rating == 4)
                                        <option value="4"class="br-selected br-current" style="color: #EDB867;">4
                                        </option>
                                        <option value="1"class="br-selected " style="color: #EDB867;">1</option>

                                        <option value="2"class="br-selected " style="color: #EDB867;">2</option>


                                        <option value="4"class="" style="color: #EDB867;">4</option>


                                        <option value="2" style="color: #EDB867;">2</option>
                                    @elseif($rating == 5)
                                        <option value="4"class="br-selected br-current" style="color: #EDB867;">4
                                        </option>
                                        <option value="1"class="br-selected " style="color: #EDB867;">1</option>

                                        <option value="2"class="br-selected " style="color: #EDB867;">2</option>

                                        <option value="3"class=" " style="color: #EDB867;">3</option>

                                        <option value="4"class="" style="color: #EDB867;">4</option>
                                    @endif

                                </select>


                                <span>{{ $reviewcount }} Review</span>
                            </div>
                            @if ($rating == 5)
                                <div class="ps-block__star"><span>5 Star</span>
                                    <div class="ps-progress" data-value="100"><span></span></div><span>100%</span>
                                </div>
                                <div class="ps-block__star"><span>4 Star</span>
                                    <div class="ps-progress" data-value="0"><span></span></div><span>0%</span>
                                </div>
                                <div class="ps-block__star"><span>3 Star</span>
                                    <div class="ps-progress" data-value="0"><span></span></div><span>0%</span>
                                </div>
                                <div class="ps-block__star"><span>2 Star</span>
                                    <div class="ps-progress" data-value="0"><span></span></div><span>0%</span>
                                </div>
                                <div class="ps-block__star"><span>1 Star</span>
                                    <div class="ps-progress" data-value="0"><span></span></div><span>0%</span>
                                </div>
                            @elseif($rating == 4)
                                <div class="ps-block__star"><span>5 Star</span>
                                    <div class="ps-progress" data-value="0"><span></span></div><span>0%</span>
                                </div>
                                <div class="ps-block__star"><span>4 Star</span>
                                    <div class="ps-progress" data-value="80"><span></span></div><span>80%</span>
                                </div>
                                <div class="ps-block__star"><span>3 Star</span>
                                    <div class="ps-progress" data-value="0"><span></span></div><span>0%</span>
                                </div>
                                <div class="ps-block__star"><span>2 Star</span>
                                    <div class="ps-progress" data-value="0"><span></span></div><span>0%</span>
                                </div>
                                <div class="ps-block__star"><span>1 Star</span>
                                    <div class="ps-progress" data-value="0"><span></span></div><span>0%</span>
                                </div>
                            @elseif($rating == 3)
                                <div class="ps-block__star"><span>5 Star</span>
                                    <div class="ps-progress" data-value="0"><span></span></div><span>0%</span>
                                </div>
                                <div class="ps-block__star"><span>4 Star</span>
                                    <div class="ps-progress" data-value="0"><span></span></div><span>0%</span>
                                </div>
                                <div class="ps-block__star"><span>3 Star</span>
                                    <div class="ps-progress" data-value="60"><span></span></div><span>60%</span>
                                </div>
                                <div class="ps-block__star"><span>2 Star</span>
                                    <div class="ps-progress" data-value="0"><span></span></div><span>0%</span>
                                </div>
                                <div class="ps-block__star"><span>1 Star</span>
                                    <div class="ps-progress" data-value="0"><span></span></div><span>0%</span>
                                </div>
                            @elseif($rating == 2)
                                <div class="ps-block__star"><span>5 Star</span>
                                    <div class="ps-progress" data-value="0"><span></span></div><span>0%</span>
                                </div>
                                <div class="ps-block__star"><span>4 Star</span>
                                    <div class="ps-progress" data-value="0"><span></span></div><span>0%</span>
                                </div>
                                <div class="ps-block__star"><span>3 Star</span>
                                    <div class="ps-progress" data-value="0"><span></span></div><span>0%</span>
                                </div>
                                <div class="ps-block__star"><span>2 Star</span>
                                    <div class="ps-progress" data-value="40"><span></span></div><span>40%</span>
                                </div>
                                <div class="ps-block__star"><span>1 Star</span>
                                    <div class="ps-progress" data-value="0"><span></span></div><span>0%</span>
                                </div>
                            @elseif($rating == 1)
                                <div class="ps-block__star"><span>5 Star</span>
                                    <div class="ps-progress" data-value="0"><span></span></div><span>0%</span>
                                </div>
                                <div class="ps-block__star"><span>4 Star</span>
                                    <div class="ps-progress" data-value="0"><span></span></div><span>0%</span>
                                </div>
                                <div class="ps-block__star"><span>3 Star</span>
                                    <div class="ps-progress" data-value="0"><span></span></div><span>0%</span>
                                </div>
                                <div class="ps-block__star"><span>2 Star</span>
                                    <div class="ps-progress" data-value="0"><span></span></div><span>0%</span>
                                </div>
                                <div class="ps-block__star"><span>1 Star</span>
                                    <div class="ps-progress" data-value="20"><span></span></div><span>20%</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12 ">
                        <form class="ps-form--review" action="{{ route('review.post') }}" method="post">
                            @csrf
                            <h4>Submit Your Review</h4>
                            <p>Your email address will not be published. Required fields are marked<sup>*</sup></p>
                            <div class="form-group form-group__rating">
                                <label>Your rating of this product</label>
                                <select class="ps-rating" data-read-only="false" name="rating">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" rows="6" placeholder="Write your review here" name="review"></textarea>
                            </div>
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12  ">
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="Your Name"
                                            name="name">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12  ">
                                    <div class="form-group">
                                        <input class="form-control" type="email" placeholder="Your Email"
                                            name="email">
                                        <input class="form-control" type="hidden" placeholder="Your Email"
                                            name="pid" value={{ $account->id }}>
                                    </div>
                                </div>
                                {{-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12  ">
                                    <center>
                                        <script src='https://www.google.com/recaptcha/api.js'></script>
                                        <div class="g-recaptcha"
                                            data-sitekey="{{ config('services.recaptcha.sitekey') }}"></div>
                                        @error('g-recaptcha-response')
                                            <div class="col-12 text-danger text-center">Captcha verification required
                                            </div>
                                        @enderror
                                    </center>
                                </div> --}}
                            </div>
                            <div class="form-group submit">
                                <button class="ps-btn">Submit Review</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="ps-section--default">
        <div class="ps-section__header">
            <h3>RECOMMENDED PRODUCTS</h3>
            <!--(account->cat_id == product_cat_id)-->
        </div>

        <div class="ps-section__content">
            <div class="ps-carousel--nav owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="10000"
                data-owl-gap="30" data-owl-nav="true" data-owl-dots="true" data-owl-item="6" data-owl-item-xs="2"
                data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-item-xl="3"
                data-owl-duration="1000" data-owl-mousedrag="on">
                @foreach ($related as $product)
                    @if ($product->cat_id == $account->cat_id)
                        <div class="ps-product">
                            <div class="ps-product__thumbnail"><a
                                    href="{{ route('account_details', $product->id) }}"><img
                                        src="{{ asset('/storage/' . $product->image1) }}" alt="" /></a>
                                <ul class="ps-product__actions" style="background: black; color: white; width:150px;">
                                    <li><a href="{{ route('add.to.cart', $product->id) }}" data-toggle="tooltip"
                                            data-placement="top"
                                            style="margin-right: 34px;margin-left: 25px;width: 90px;">Add to Cart</a></li>

                                    <!-- <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li> -->

                                </ul>
                            </div>
                            <div class="ps-product__container"><a class="ps-product__vendor"
                                    href="{{ route('account_details', $product->id) }}"></a>
                                <div class="ps-product__content"><a class="ps-product__title"
                                        href="{{ route('account_details', $product->id) }}">{{ $product->name }}</a>
                                    <p class="ps-product__price sale">
                                        @if ($product->offer != 0)
                                            <del>₹&nbsp&nbsp{{ $product->price }}</del>
                                        @endif
                                        ₹&nbsp&nbsp{{ $product->offer_price }}
                                    </p>
                                </div>
                                <div class="ps-product__content hover"><a class="ps-product__title"
                                        href="{{ route('account_details', $product->id) }}">{{ $product->name }}</a>
                                    <p class="ps-product__price sale">
                                        @if ($product->offer != 0)
                                            <del>₹&nbsp&nbsp{{ $product->price }}</del>
                                        @endif
                                        ₹&nbsp&nbsp{{ $product->offer_price }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach


            </div>
        </div>
    </div>
    </div>
@endsection
