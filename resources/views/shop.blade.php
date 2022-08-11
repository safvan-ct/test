@extends('layouts.app')
<!--{{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >-->
<!--<link href="{{ URL::asset('css/autopart.css') }}" rel="stylesheet" type="text/css" >-->
<!--<link href="{{ URL::asset('css/style.css') }}" rel="stylesheet" type="text/css" >-->
<!--<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css" >-->
<!--<link href="{{ asset('css/autopart.css') }}" rel="stylesheet" type="text/css" >-->
<!--<link href="{{asset('css/style.css') }}" rel="stylesheet" type="text/css" >-->
<!-- --}}-->


@section('content')
    <div class="ps-layout--shop">
        <div class="ps-layout__left">
            <aside class="widget widget_shop">
                <h4 class="widget-title" style="color:black">Categories</h4>
                <ul class="ps-list--categories">
                    @foreach ($categories as $item)
                        <li class="menu-item-has-children"><a
                                href="{{ route('shop', $item->id) }}">{{ $item->title }}</a><span class="sub-toggle"><i
                                    class="fa fa-angle-down"></i></span>
                            <ul class="sub-menu">

                                @foreach ($subcategories as $subcategory)
                                    @if ($subcategory->category_id == $item->id)
                                        <li><a href="{{ route('shopcat', $subcategory->id) }}"
                                                style="color:black">{{ $subcategory->title }}</a>
                                        </li>
                                    @endif
                                @endforeach

                            </ul>
                        </li>
                    @endforeach
                </ul>
                </li>
            </aside>

        </div>


        <div class="ps-layout__right" style="padding-top:0px;margin-left:-16px">
            <div id="slider-view" class="ps-carousel--nav-inside owl-slider" data-owl-auto="true" data-owl-loop="true"
                data-owl-speed="5000" data-owl-gap="0" data-owl-nav="false" data-owl-dots="true" data-owl-item="1"
                data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000"
                data-owl-mousedrag="on" data-owl-animate-in="fadeIn" data-owl-animate-out="fadeOut">
                @foreach ($sliders as $slider)
                    <div class="ps-banner--autopart"
                        data-background="{{ asset('/storage/uploads/slider/' . $slider->image) }}">
                        <img src="{{ asset('/storage/uploads/slider/' . $slider->image) }}" alt=""
                            style="height:392px;width:1291px">
                        <div class="ps-banner__content"></div>
                    </div>
                @endforeach

            </div>

            <div class="ps-shopping ps-tab-root">

                <div class="ps-tabs">
                    <div class="ps-tab active" id="tab-1">
                        <div class="ps-shopping-product">
                            <div class="row">
                                @foreach ($products as $product)
                                    <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6 col-6 ">
                                        <div class="ps-product">
                                            <div class="ps-product__thumbnail">
                                                <a href="{{ route('account_details', $product->id) }}">
                                                    <img src="{{ asset('/storage/' . $product->image1) }}" alt="" />
                                                </a>
                                                <ul class="ps-product__actions"
                                                    style="background: black; color: white; width:150px;">
                                                    <li>
                                                        <a href="{{ route('add.to.cart', $product->id) }}"
                                                            data-toggle="tooltip" data-placement="top"
                                                            style="margin-right: 34px;margin-left: 25px;width: 90px;">
                                                            Add to Cart
                                                        </a>
                                                    </li>

                                                    <!-- <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li> -->

                                                </ul>
                                            </div>
                                            <div class="ps-product__container">
                                                <a class="ps-product__vendor"
                                                    href="{{ route('account_details', $product->id) }}">
                                                </a>
                                                <div class="ps-product__content">
                                                    <a class="ps-product__title"
                                                        href="{{ route('account_details', $product->id) }}">{{ $product->name }}</a>
                                                    <p class="ps-product__price sale">
                                                        @if ($product->offer !== 0)
                                                            <del>₹&nbsp&nbsp{{ $product->price }}</del>
                                                        @endif ₹&nbsp&nbsp{{ $product->offer_price }}
                                                    </p>
                                                </div>
                                                <div class="ps-product__content hover"><a class="ps-product__title"
                                                        href="{{ route('account_details', $product->id) }}">{{ $product->name }}</a>
                                                    <p class="ps-product__price sale">
                                                        @if ($product->offer !== 0)
                                                            <del>₹&nbsp&nbsp{{ $product->price }}</del>
                                                        @endif ₹&nbsp&nbsp{{ $product->offer_price }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <!-- <div class="ps-pagination">
                                                <ul class="pagination">
                                                    <li class="active"><a href="#">1</a></li>
                                                    <li><a href="#">2</a></li>
                                                    <li><a href="#">3</a></li>
                                                    <li><a href="#">Next Page<i class="icon-chevron-right"></i></a></li>
                                                </ul>
                                            </div> -->
                    </div>
                    <div class="ps-tab" id="tab-2">
                        <div class="ps-shopping-product">
                            <div class="ps-product ps-product--wide">
                                <div class="ps-product__thumbnail"><a href="product-default.html"><img src=""
                                            alt="" /></a>
                                </div>
                                <div class="ps-product__container">
                                    <div class="ps-product__content"><a class="ps-product__title"
                                            href="product-default.html">Apple iPhone Retina 6s Plus 64GB</a>
                                        <p class="ps-product__vendor">Sold by:<a href="#">ROBERT’S STORE</a></p>
                                        <ul class="ps-product__desc">
                                            <li> Unrestrained and portable active stereo speaker</li>
                                            <li> Free from the confines of wires and chords</li>
                                            <li> 20 hours of portable capabilities</li>
                                            <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
                                            <li> 3/4″ Dome Tweeters: 2X and 4″ Woofer: 1X</li>
                                        </ul>
                                    </div>
                                    <div class="ps-product__shopping">
                                        <p class="ps-product__price">$1310.00</p><a class="ps-btn" href="#">Add to
                                            cart</a>
                                        <ul class="ps-product__actions">
                                            <li><a href="#"><i class="icon-heart"></i> Wishlist</a></li>
                                            <li><a href="#"><i class="icon-chart-bars"></i> Compare</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="ps-product ps-product--wide">
                                <div class="ps-product__thumbnail"><a href="product-default.html"><img
                                            src="img/products/shop/1.jpg" alt="" /></a>
                                </div>
                                <div class="ps-product__container">
                                    <div class="ps-product__content"><a class="ps-product__title"
                                            href="product-default.html">Apple iPhone Retina 6s Plus 64GB</a>
                                        <p class="ps-product__vendor">Sold by:<a href="#">Young Shop</a></p>
                                        <ul class="ps-product__desc">
                                            <li> Unrestrained and portable active stereo speaker</li>
                                            <li> Free from the confines of wires and chords</li>
                                            <li> 20 hours of portable capabilities</li>
                                            <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
                                            <li> 3/4″ Dome Tweeters: 2X and 4″ Woofer: 1X</li>
                                        </ul>
                                    </div>
                                    <div class="ps-product__shopping">
                                        <p class="ps-product__price">$1150.00</p><a class="ps-btn" href="#">Add to
                                            cart</a>
                                        <ul class="ps-product__actions">
                                            <li><a href="#"><i class="icon-heart"></i> Wishlist</a></li>
                                            <li><a href="#"><i class="icon-chart-bars"></i> Compare</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="ps-product ps-product--wide">
                                <div class="ps-product__thumbnail"><a href="product-default.html"><img
                                            src="img/products/shop/2.jpg" alt="" /></a>
                                </div>
                                <div class="ps-product__container">
                                    <div class="ps-product__content"><a class="ps-product__title"
                                            href="product-default.html">Marshall Kilburn Portable Wireless Speaker</a>
                                        <div class="ps-product__rating">
                                            <select class="ps-rating" data-read-only="true">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                            </select><span>01</span>
                                        </div>
                                        <p class="ps-product__vendor">Sold by:<a href="#">Go Pro</a></p>
                                        <ul class="ps-product__desc">
                                            <li> Unrestrained and portable active stereo speaker</li>
                                            <li> Free from the confines of wires and chords</li>
                                            <li> 20 hours of portable capabilities</li>
                                            <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
                                            <li> 3/4″ Dome Tweeters: 2X and 4″ Woofer: 1X</li>
                                        </ul>
                                    </div>
                                    <div class="ps-product__shopping">
                                        <p class="ps-product__price">$42.99 - $60.00</p><a class="ps-btn"
                                            href="#">Add to cart</a>
                                        <ul class="ps-product__actions">
                                            <li><a href="#"><i class="icon-heart"></i> Wishlist</a></li>
                                            <li><a href="#"><i class="icon-chart-bars"></i> Compare</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="ps-product ps-product--wide">
                                <div class="ps-product__thumbnail"><a href="product-default.html"><img
                                            src="img/products/shop/3.jpg" alt="" /></a>
                                </div>
                                <div class="ps-product__container">
                                    <div class="ps-product__content"><a class="ps-product__title"
                                            href="product-default.html">Herschel Leather Duffle Bag In Brown Color</a>
                                        <div class="ps-product__rating">
                                            <select class="ps-rating" data-read-only="true">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                            </select><span>01</span>
                                        </div>
                                        <p class="ps-product__vendor">Sold by:<a href="#">Go Pro</a></p>
                                        <ul class="ps-product__desc">
                                            <li> Unrestrained and portable active stereo speaker</li>
                                            <li> Free from the confines of wires and chords</li>
                                            <li> 20 hours of portable capabilities</li>
                                            <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
                                            <li> 3/4″ Dome Tweeters: 2X and 4″ Woofer: 1X</li>
                                        </ul>
                                    </div>
                                    <div class="ps-product__shopping">
                                        <p class="ps-product__price">$125.30</p><a class="ps-btn" href="#">Add to
                                            cart</a>
                                        <ul class="ps-product__actions">
                                            <li><a href="#"><i class="icon-heart"></i> Wishlist</a></li>
                                            <li><a href="#"><i class="icon-chart-bars"></i> Compare</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="ps-product ps-product--wide">
                                <div class="ps-product__thumbnail"><a href="product-default.html"><img
                                            src="img/products/shop/4.jpg" alt="" /></a>
                                </div>
                                <div class="ps-product__container">
                                    <div class="ps-product__content"><a class="ps-product__title"
                                            href="product-default.html">Xbox One Wireless Controller Black Color</a>
                                        <div class="ps-product__rating">
                                            <select class="ps-rating" data-read-only="true">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                            </select><span>01</span>
                                        </div>
                                        <p class="ps-product__vendor">Sold by:<a href="#">Global Office</a></p>
                                        <ul class="ps-product__desc">
                                            <li> Unrestrained and portable active stereo speaker</li>
                                            <li> Free from the confines of wires and chords</li>
                                            <li> 20 hours of portable capabilities</li>
                                            <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
                                            <li> 3/4″ Dome Tweeters: 2X and 4″ Woofer: 1X</li>
                                        </ul>
                                    </div>
                                    <div class="ps-product__shopping">
                                        <p class="ps-product__price">$55.99</p><a class="ps-btn" href="#">Add to
                                            cart</a>
                                        <ul class="ps-product__actions">
                                            <li><a href="#"><i class="icon-heart"></i> Wishlist</a></li>
                                            <li><a href="#"><i class="icon-chart-bars"></i> Compare</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="ps-product ps-product--wide">
                                <div class="ps-product__thumbnail"><a href="product-default.html"><img
                                            src="img/products/shop/5.jpg" alt="" /></a>
                                    <div class="ps-product__badge">-37%</div>
                                </div>
                                <div class="ps-product__container">
                                    <div class="ps-product__content"><a class="ps-product__title"
                                            href="product-default.html">Grand Slam Indoor Of Show Jumping Novel</a>
                                        <div class="ps-product__rating">
                                            <select class="ps-rating" data-read-only="true">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                            </select><span>01</span>
                                        </div>
                                        <p class="ps-product__vendor">Sold by:<a href="#">Robert's Store</a></p>
                                        <ul class="ps-product__desc">
                                            <li> Unrestrained and portable active stereo speaker</li>
                                            <li> Free from the confines of wires and chords</li>
                                            <li> 20 hours of portable capabilities</li>
                                            <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
                                            <li> 3/4″ Dome Tweeters: 2X and 4″ Woofer: 1X</li>
                                        </ul>
                                    </div>
                                    <div class="ps-product__shopping">
                                        <p class="ps-product__price sale">$32.99 <del>$41.00 </del></p><a class="ps-btn"
                                            href="#">Add to cart</a>
                                        <ul class="ps-product__actions">
                                            <li><a href="#"><i class="icon-heart"></i> Wishlist</a></li>
                                            <li><a href="#"><i class="icon-chart-bars"></i> Compare</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="ps-product ps-product--wide">
                                <div class="ps-product__thumbnail"><a href="product-default.html"><img
                                            src="img/products/shop/6.jpg" alt="" /></a>
                                    <div class="ps-product__badge">-5%</div>
                                </div>
                                <div class="ps-product__container">
                                    <div class="ps-product__content"><a class="ps-product__title"
                                            href="product-default.html">Sound Intone I65 Earphone White Version</a>
                                        <div class="ps-product__rating">
                                            <select class="ps-rating" data-read-only="true">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                            </select><span>01</span>
                                        </div>
                                        <p class="ps-product__vendor">Sold by:<a href="#">Youngshop</a></p>
                                        <ul class="ps-product__desc">
                                            <li> Unrestrained and portable active stereo speaker</li>
                                            <li> Free from the confines of wires and chords</li>
                                            <li> 20 hours of portable capabilities</li>
                                            <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
                                            <li> 3/4″ Dome Tweeters: 2X and 4″ Woofer: 1X</li>
                                        </ul>
                                    </div>
                                    <div class="ps-product__shopping">
                                        <p class="ps-product__price sale">$100.99 <del>$106.00 </del></p><a class="ps-btn"
                                            href="#">Add to cart</a>
                                        <ul class="ps-product__actions">
                                            <li><a href="#"><i class="icon-heart"></i> Wishlist</a></li>
                                            <li><a href="#"><i class="icon-chart-bars"></i> Compare</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="ps-product ps-product--wide">
                                <div class="ps-product__thumbnail"><a href="product-default.html"><img
                                            src="img/products/shop/7.jpg" alt="" /></a>
                                    <div class="ps-product__badge">-16%</div>
                                </div>
                                <div class="ps-product__container">
                                    <div class="ps-product__content"><a class="ps-product__title"
                                            href="product-default.html">Korea Long Sofa Fabric In Blue Navy Color</a>
                                        <div class="ps-product__rating">
                                            <select class="ps-rating" data-read-only="true">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                            </select><span>01</span>
                                        </div>
                                        <p class="ps-product__vendor">Sold by:<a href="#">Youngshop</a></p>
                                        <ul class="ps-product__desc">
                                            <li> Unrestrained and portable active stereo speaker</li>
                                            <li> Free from the confines of wires and chords</li>
                                            <li> 20 hours of portable capabilities</li>
                                            <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
                                            <li> 3/4″ Dome Tweeters: 2X and 4″ Woofer: 1X</li>
                                        </ul>
                                    </div>
                                    <div class="ps-product__shopping">
                                        <p class="ps-product__price sale">$567.89 <del>$670.20 </del></p><a class="ps-btn"
                                            href="#">Add to cart</a>
                                        <ul class="ps-product__actions">
                                            <li><a href="#"><i class="icon-heart"></i> Wishlist</a></li>
                                            <li><a href="#"><i class="icon-chart-bars"></i> Compare</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="ps-product ps-product--wide">
                                <div class="ps-product__thumbnail"><a href="product-default.html"><img
                                            src="img/products/shop/8.jpg" alt="" /></a>
                                    <div class="ps-product__badge">-16%</div>
                                </div>
                                <div class="ps-product__container">
                                    <div class="ps-product__content"><a class="ps-product__title"
                                            href="product-default.html">Unero Military Classical Backpack</a>
                                        <div class="ps-product__rating">
                                            <select class="ps-rating" data-read-only="true">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                            </select><span>02</span>
                                        </div>
                                        <p class="ps-product__vendor">Sold by:<a href="#">Young shop</a></p>
                                        <ul class="ps-product__desc">
                                            <li> Unrestrained and portable active stereo speaker</li>
                                            <li> Free from the confines of wires and chords</li>
                                            <li> 20 hours of portable capabilities</li>
                                            <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
                                            <li> 3/4″ Dome Tweeters: 2X and 4″ Woofer: 1X</li>
                                        </ul>
                                    </div>
                                    <div class="ps-product__shopping">
                                        <p class="ps-product__price sale">$35.89 <del>$42.20 </del></p><a class="ps-btn"
                                            href="#">Add to cart</a>
                                        <ul class="ps-product__actions">
                                            <li><a href="#"><i class="icon-heart"></i> Wishlist</a></li>
                                            <li><a href="#"><i class="icon-chart-bars"></i> Compare</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="ps-product ps-product--wide">
                                <div class="ps-product__thumbnail"><a href="product-default.html"><img
                                            src="img/products/shop/9.jpg" alt="" /></a>
                                </div>
                                <div class="ps-product__container">
                                    <div class="ps-product__content"><a class="ps-product__title"
                                            href="product-default.html">Rayban Rounded Sunglass Brown Color</a>
                                        <div class="ps-product__rating">
                                            <select class="ps-rating" data-read-only="true">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                            </select><span>02</span>
                                        </div>
                                        <p class="ps-product__vendor">Sold by:<a href="#">Young shop</a></p>
                                        <ul class="ps-product__desc">
                                            <li> Unrestrained and portable active stereo speaker</li>
                                            <li> Free from the confines of wires and chords</li>
                                            <li> 20 hours of portable capabilities</li>
                                            <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
                                            <li> 3/4″ Dome Tweeters: 2X and 4″ Woofer: 1X</li>
                                        </ul>
                                    </div>
                                    <div class="ps-product__shopping">
                                        <p class="ps-product__price">$35.89</p><a class="ps-btn" href="#">Add to
                                            cart</a>
                                        <ul class="ps-product__actions">
                                            <li><a href="#"><i class="icon-heart"></i> Wishlist</a></li>
                                            <li><a href="#"><i class="icon-chart-bars"></i> Compare</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="ps-product ps-product--wide">
                                <div class="ps-product__thumbnail"><a href="product-default.html"><img
                                            src="img/products/shop/10.jpg" alt="" /></a>
                                </div>
                                <div class="ps-product__container">
                                    <div class="ps-product__content"><a class="ps-product__title"
                                            href="product-default.html">Sleeve Linen Blend Caro Pane Shirt</a>
                                        <div class="ps-product__rating">
                                            <select class="ps-rating" data-read-only="true">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                            </select><span>01</span>
                                        </div>
                                        <p class="ps-product__vendor">Sold by:<a href="#">Go Pro</a></p>
                                        <ul class="ps-product__desc">
                                            <li> Unrestrained and portable active stereo speaker</li>
                                            <li> Free from the confines of wires and chords</li>
                                            <li> 20 hours of portable capabilities</li>
                                            <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
                                            <li> 3/4″ Dome Tweeters: 2X and 4″ Woofer: 1X</li>
                                        </ul>
                                    </div>
                                    <div class="ps-product__shopping">
                                        <p class="ps-product__price">$29.39 - $39.99</p><a class="ps-btn"
                                            href="#">Add to cart</a>
                                        <ul class="ps-product__actions">
                                            <li><a href="#"><i class="icon-heart"></i> Wishlist</a></li>
                                            <li><a href="#"><i class="icon-chart-bars"></i> Compare</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="ps-product ps-product--wide">
                                <div class="ps-product__thumbnail"><a href="product-default.html"><img
                                            src="img/products/shop/11.jpg" alt="" /></a>
                                </div>
                                <div class="ps-product__container">
                                    <div class="ps-product__content"><a class="ps-product__title"
                                            href="product-default.html">Men’s Sports Runnning Swim Board Shorts</a>
                                        <div class="ps-product__rating">
                                            <select class="ps-rating" data-read-only="true">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                            </select><span>01</span>
                                        </div>
                                        <p class="ps-product__vendor">Sold by:<a href="#">Robert's Store</a></p>
                                        <ul class="ps-product__desc">
                                            <li> Unrestrained and portable active stereo speaker</li>
                                            <li> Free from the confines of wires and chords</li>
                                            <li> 20 hours of portable capabilities</li>
                                            <li> Double-ended Coil Cord with 3.5mm Stereo Plugs Included</li>
                                            <li> 3/4″ Dome Tweeters: 2X and 4″ Woofer: 1X</li>
                                        </ul>
                                    </div>
                                    <div class="ps-product__shopping">
                                        <p class="ps-product__price">$13.43</p><a class="ps-btn" href="#">Add to
                                            cart</a>
                                        <ul class="ps-product__actions">
                                            <li><a href="#"><i class="icon-heart"></i> Wishlist</a></li>
                                            <li><a href="#"><i class="icon-chart-bars"></i> Compare</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="ps-pagination">
                        <ul class="pagination">
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">Next Page<i class="icon-chevron-right"></i></a></li>
                        </ul>
                    </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
