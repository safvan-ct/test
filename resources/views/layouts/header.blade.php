<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <!--<title>Boutique </title>-->

    <x-meta route-name="{{ Route::currentRouteName() }}" item-id="{{ Request::segment(2) }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/chosen.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/lightbox.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/pe-icon-7-stroke.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/jquery.mCustomScrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Montserrat">
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display:400italic,400,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto:300,100,100italic,300italic,400,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
</head>
<body >
     {{-- @include('whatsapp') --}}
<div id="box-mobile-menu" class="box-mobile-menu full-height full-width">
	<div class="box-inner">
		<span class="close-menu"><span class="icon pe-7s-close"></span></span>
	</div>
</div>
<div id="header-ontop" class="is-sticky"></div>
<header id="header" class="header style2 style14">
	<div class="main-header">
		<div class="logo" style="padding: 3px 0;">
			<a href="#"><img src="{{asset('/storage/images/kens.png')}}" style="height: 79px;" alt=""></a>
		</div>
		<div class="main-menu-wapper">
			<ul class="boutique-nav main-menu clone-main-menu">
				<li class="active menu-item-has-children item-megamenu">
					<a href="{{ route('index') }}"><b>Home</b></a>

				</li>
                <li class="active menu-item-has-children item-megamenu">
					<a href="{{ route('about') }}"><b>About</b></a>

				</li>
                <li class=" active menu-item-has-children">
                    <a href="#"><b>Shop</b></a>
                    <span class="arow"></span>
                    <ul class="sub-menu">
                        @foreach ( $cats as $cat)
                        <li><a href="{{ route('shopcat',$cat->id) }} ">{{$cat->title}} </a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="active menu-item-has-children item-megamenu">
					<a href="{{ route('contact') }}"><b>Contact</b></a>
				</li>
    <!--            <li class="active menu-item-has-children item-megamenu">-->
				<!--	<a href="{{ route('contact') }}">Registration</a>-->
				<!--</li>-->
                @guest
                <li class="active menu-item-has-children item-megamenu">
					<a href="{{ route('login') }}"><b>Login</b></a>
				</li>
                @endguest
                 @auth

                                <li class="nav-item"><a href="{{ route('logout') }}"  onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="nav-link"><i class="fa fa-sign-out" aria-hidden="true" style="color: #cc0088;font-size: 22px;"></i></a></li>

                                <li class="nav-item"><a href="{{ route('myaccount') }}" class="nav-link"><i class="fa fa-user" aria-hidden="true" style="color: #cc0088;font-size: 22px;"></i></a></li>
                               @endauth

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

			</ul>
			<span class="mobile-navigation" style="color: #ca0088;"><i class="fa fa-bars"></i></span>
		</div>
		<div class="right-control">

			<div class="box-control">
				<!--<form  class="box-search show-icon">-->
				<!--	<span><span class="pe-7s-search"></span></span>-->
				<!--	<div class="inner">-->
				<!--		<input type="text" class="search" placeholder="Search here...">-->
				<!--		<span class="close-box pe-7s-close"></span>-->
				<!--	</div>-->
				<!--</form>-->


				<div class="mini-cart">

				    @auth
                     	<a class="cart-link" href="{{ route('cart') }}" ><span class="pe-7s-cart" style="color: #cc0088;padding: 13px;"></span> <span class="count">[{{ count((array) session('cart')) }}]</span></a>
					 @endauth

					   @guest
                	<a class="cart-link" href="{{ route('login') }}"><span class="pe-7s-cart" style="color: #cc0088;padding: 13px;"></span> <span class="count">[{{ count((array) session('cart')) }}]</span></a>

                @endguest
					<!--<div class="show-shopping-cart">-->
	    <!--                <h3 class="title">YOU HAVE <span class="text-primary">(3 ITEMS)</span> IN YOUR CART</h3>-->
	    <!--                <ul class="list-product">-->
	    <!--                	<li>-->
	    <!--                		<div class="thumb">-->
	    <!--                			<img src="images/products/1.png" alt="">-->
	    <!--                		</div>-->
	    <!--                		<div class="info">-->
	    <!--                			<h4 class="product-name"><a href="#">LONDON STAR SWEATSHIRT</a></h4>-->
	    <!--                			<span class="price">1x£375.00</span>-->
	    <!--                			<a class="remove-item" href="#"><i class="fa fa-close"></i></a>-->
	    <!--                		</div>-->
	    <!--                	</li>-->
	    <!--                	<li>-->
	    <!--                		<div class="thumb">-->
	    <!--                			<img src="images/products/1.png" alt="">-->
	    <!--                		</div>-->
	    <!--                		<div class="info">-->
	    <!--                			<h4 class="product-name"><a href="#">LONDON STAR SWEATSHIRT</a></h4>-->
	    <!--                			<span class="price">1x£375.00</span>-->
	    <!--                			<a class="remove-item" href="#"><i class="fa fa-close"></i></a>-->
	    <!--                		</div>-->
	    <!--                	</li>-->
	    <!--                </ul>-->
	    <!--                <div class="sub-total">-->
	    <!--                	Subtotal:£255.00-->
	    <!--                </div>-->
	    <!--                <div class="group-button">-->
	    <!--                	<a href="#" class="button">Shopping Cart</a>-->
	    <!--                	<a href="#" class="check-out button">CheckOut</a>-->
	    <!--                </div>-->
					<!--</div>-->
				</div>
				<!--<div class="box-settings">-->
	   <!--             <span class="icon pe-7s-config"></span>-->
	   <!--             <div class="settings-wrapper ">-->
	   <!--                 <div class="setting-content">-->
	   <!--                     <div class="select-language">-->
	   <!--                         <div class="language-title">Select language</div>-->
	   <!--                         <div class="language-topbar">-->
	   <!--                             <div class="lang-list">-->
	   <!--                                 <ul class="clearfix">-->
	   <!--                                     <li class="active"><a href="#"> <img src="images/flag1.png" alt=""> </a></li>-->
	   <!--                                     <li><a href="#"> <img src="images/flag2.png" alt=""></a></li>-->
	   <!--                                     <li><a href="#"> <img src="images/flag3.png" alt=""></a></li>-->
	   <!--                                     <li><a href="#"> <img src="images/flag4.png" alt=""></a></li>-->
	   <!--                                 </ul>-->
	   <!--                             </div>-->
	   <!--                         </div>-->
	   <!--                     </div>-->
	   <!--                     <div class="select-currency">-->
	   <!--                         <div class="currency-title">Select currency</div>-->
	   <!--                         <div class="currency-topbar">-->
	   <!--                             <div class="currency-list">-->
	   <!--                                 <ul class="clearfix">-->
	   <!--                                     <li><a href="#"><span class="sym"><i class="fa fa-usd"></i></span></a></li>-->
	   <!--                                     <li class="active"><a href="#"><span class="sym"><i class="fa fa-eur"></i></span></a></li>-->
	   <!--                                     <li><a href="#"><span class="sym"><i class="fa fa-gbp"></i></span></a></li>-->
	   <!--                                 </ul>-->
	   <!--                             </div>-->
	   <!--                         </div>-->
	   <!--                     </div>-->
	   <!--                     <div class="setting-option">-->
	   <!--                         <ul>-->
	   <!--                             <li><a href="#"><i class="icon-heart icons"></i><span>Wishlist</span></a></li>-->
	   <!--                             <li><a href="#"><i class="icon-user icons"></i><span> MyAccount</span></a></li>-->
	   <!--                             <li><a href="#"><i class="icon-note icons"></i><span>Checkout</span></a></li>-->
	   <!--                              <li><a href="#"><i class="icon-handbag icons"></i><span>Compare</span></a></li>-->
	   <!--                              <li><a href="#"><i class="icon-lock-open icons"></i><span>Login / Register</span></a></li>-->
	   <!--                         </ul>-->
	   <!--                     </div>-->
	   <!--             	</div>-->
	   <!--         	</div>-->
				<!--</div>-->
			</div>
		</div>

	</div>
</header>



    @include('layouts.alert')
    @yield('content')

    <footer class="footer style2 style5">
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-4">
						<div class="widget contact-info">
							<div class="logo">
								<a href="#"><img alt="" src="{{asset('/storage/images/kens.png')}}"></a>
							</div>
							<div class="content">
								<p>Welcome note Kens boutique was started in the year 2007.
                We offer a wide range of apparel to fit any woman’s unique sense of style. </p>

							</div>
						</div>
					</div>
					<div class="col-sm-12 col-md-4">
						<div class="widget our-service">
							<h3 class="widget-title">infomation</h3>
							<div class="content">
								<ul>
									<li ><a href="{{ route('index') }}">Home</a></li>
									<li><a href="{{ route('about') }}">About us</a></li>
									<li><a href="{{ route('refund') }}">Refund Policy</a></li>
									<li><a href="{{ route('terms') }}">Terms & Condition</a></li>
									<li><a href="{{ route('privacy') }}">Privacy</a></li>
									<li><a href="{{ route('contact') }}">Contact Us</a></li>
								</ul>
							</div>
						</div>
					</div>

					<div class="col-sm-12 col-md-4">
						<div class="widget our-service">
							<h3 class="widget-title">Contact</h3>
							<div class="content">
								<p class="address"><i class="fa fa-home"></i><span>KENS, CULLEN ROAD, EAST OF VAZHICHERY JUNCTION, ALAPPUZHA.....</span></p>
								<p class="phone"><i class="fa fa-phone"></i> <span> +91 8891535539</span></p>
								<p class="mail"><i class="fa fa-envelope"></i><span>kenscreation2009@gmail.com</span></p>
							</div>
							<div class="content">
								<div class="social">
			                        <a href="https://www.facebook.com/kensalappy"><i style="padding-right: 19px;font-size: 29px;" class="fa fa-facebook"></i></a>
			                        <a href="#"><i style="padding-right: 19px;font-size: 29px;" class="fa fa-youtube"></i></a>
			                        <a href="https://www.instagram.com/kensalappuzha/"><i style="padding-right: 19px;font-size: 29px;" class="fa fa-instagram"></i></a>

			                        <a href="https://api.whatsapp.com/send?phone=+918891535539%20&text=Hello,%20I%20want%20to%20know%20more%20about%20your%20Services.%20Thanks"><i style="padding-right: 19px;font-size: 29px;" class="fa fa-whatsapp"></i></a>
			                    </div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
		<div class="footer-bottom">
			<div class="container">
			<div class="payment">
				<div class="head"><span>We Accept</span><span class="PlayfairDisplay">Online Payment Be Secured</span></div>
				<div class="list">
                    <a href="#" class="item"><img src="images/payments/5.png" alt=""></a>
                    <a href="#" class="item"><img src="images/payments/6.png" alt=""></a>
                    <a href="#" class="item"><img src="images/payments/7.png" alt=""></a>
                    <a href="#" class="item"><img src="images/payments/8.png" alt=""></a>
                </div>
			</div>
			</div>
		</div>
	</footer>
	<a href="#" class="scroll_top" title="Scroll to Top" style="display: block;"><i class="fa fa-arrow-up"></i></a>
	<script type="text/javascript" src="{{ asset('assets/js/jquery-2.1.4.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/chosen.jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/Modernizr.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/lightbox.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/masonry.pkgd.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/jquery.parallax-1.1.3.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/masonry.js') }}"></script>
	<script type="text/javascript" src="{{ asset('assets/js/functions.js') }}"></script>
</body>
</html>
