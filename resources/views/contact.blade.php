@extends('layouts.app')

@section('title', 'Contact')

@section('content')


    <style>
        form.contact {
            width: 50%;
        }
    </style>
    <div class="ps-page--single" id="contact-us">
        <!--<div class="ps-breadcrumb">-->
        <!--    <div class="container">-->
        <!--        <ul class="breadcrumb">-->
        <!--<li><a href="index.html">Home</a></li>-->
        <!--<li>Contact Us</li>-->
        <!--        </ul>-->
        <!--    </div>-->
        <!--</div>-->
        <div class="ps-contact-map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3929.438062148875!2d76.293821!3d9.980625999999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3b080d49dd87ed8d%3A0x7c3fb3d6276b77e5!2sAmigo%20Medical%20Systems!5e0!3m2!1sen!2sin!4v1659006127955!5m2!1sen!2sin"
                width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="ps-contact-info">
            <div class="container">
                <div class="ps-section__header">
                    <h3>Contact Us For Any Questions</h3>
                </div>
                <div class="ps-section__content">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 ">
                            <div class="ps-block--contact-info">
                                <h4>Contact Directly</h4>
                                <p><a href="mailto:amigocarein@gmail.com"><span class="__cf_email__"
                                            data-cfemail="caa9a5a4beaba9be8aa7abb8beacbfb8b3e4a9a5a7">
                                            amigocarein@gmail.com.</span></a><span> 8086147100</span></p>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 ">
                            <div class="ps-block--contact-info">
                                <h4>Head Quater</h4>
                                <p><span>38/29953 G , 1st floor, Joseph tower, CBI road, Kathrikadavu, kaloor, kochi
                                        682017.</span></p>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 ">
                            <div class="ps-block--contact-info">
                                <h4>Work With Us</h4>
                                <p><span>Send your CV to our email:</span><a href="mailto:amigocarein@gmail.com"><span
                                            class="__cf_email__"
                                            data-cfemail="593a382b3c3c2b1934382b2d3f2c2b20773a3634">amigocarein@gmail.com</span></a>
                                </p>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 ">
                            <div class="ps-block--contact-info">
                                <h4>Customer Service</h4>
                                <p><a href="mailto:amigocarein@gmail.com"><span class="__cf_email__"
                                            data-cfemail="d3b0a6a0a7bcbeb6a1b0b2a1b693beb2a1a7b5a6a1aafdb0bcbe">
                                            amigocarein@gmail.com</span></a><span>1800 891 8906</span></p>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 ">
                            <div class="ps-block--contact-info">
                                <h4>Media Relations</h4>
                                <p><a href="mailto:amigocarein@gmail.com"><span class="__cf_email__"
                                            data-cfemail="8be6eeefe2eacbe6eaf9ffedfef9f2a5e8e4e6">amigocarein@gmail.com</span></a><span></span>
                                </p>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 ">
                            <div class="ps-block--contact-info">
                                <h4>Vendor Support</h4>
                                <p><a href="mailto:amigocarein@gmail.com"><span class="__cf_email__"
                                            data-cfemail="d4a2b1bab0bba6a7a1a4a4bba6a094b9b5a6a0b2a1a6adfab7bbb9">
                                            amigocarein@gmail.com</span></a><span>Amigo Medical Systems</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ps-contact-form">
            <div class="container">
                <form class="ps-form--contact-us contact" action="{{ route('contact') }}" method="post">
                    @csrf
                    <h3>Get In Touch</h3>
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                            <div class="form-group">
                                <input class="form-control" name="name" id="name" type="text"
                                    placeholder="Name *">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 ">
                            <div class="form-group">
                                <input class="form-control" name="email" id="email" type="email"
                                    placeholder="Email *">
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <div class="form-group">
                                <input class="form-control" name="phone" id="phone_number" type="number"
                                    placeholder="Phone *">
                            </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            <div class="form-group">
                                <textarea class="form-control" name="message" id="message" rows="5" placeholder="Message"></textarea>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mb-3">
                            <center>
                                <script src='https://www.google.com/recaptcha/api.js'></script>
                                <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.sitekey') }}"></div>
                                @error('g-recaptcha-response')
                                    <div class="col-12 text-danger text-center">Captcha verification required
                                    </div>
                                @enderror
                            </center>
                        </div>
                    </div>
                    <div class="form-group submit">
                        <button class="ps-btn">Send message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--<div class="page-banner about-banner" style="background-image: url({{ asset('/storage/images/botiqueCover.jpg') }});">-->
    <!--    <div class="banner-content">-->
    <!--        <span class="subtitle" style="color:black">Welcome to Boutique - Let’s shop with us !</span>-->
    <!--        <h2 class="title" style="color:black">Contact</h2>-->
    <!--    </div>-->
    <!--</div>-->
    <!--<div class="container">-->
    <!--    <div class="row">-->
    <!--        <div class="col-sm-6">-->

    <!--            <div class="kt-contact-form margin-top-60">-->
    <!--                <div id="message-box-conact"></div>-->
    <!--                <h3 class="title">REACH US FOR ANY QUESTIONS YOU MIGHT HAVE</h3>-->
    <!--                <p>-->
    <!--                    <input id="name" type="text" placeholder="Your name">-->
    <!--                </p>-->
    <!--                <p>-->
    <!--                    <input id="email" type="text" placeholder="Your Email">-->
    <!--                </p>-->
    <!--                <p>-->
    <!--                    <textarea id="content" placeholder="Your message!"></textarea>-->
    <!--                </p>-->
    <!--                <button id='btn-send-contact' class="button">SEND MESSAGE</button>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <div class="col-sm-6">-->
    <!--            <div class="margin-top-60">-->
    <!--                <img src="images/b/46.jpg" alt="">-->
    <!--                <h6 class="margin-top-20">GIVE US A CALL</h6>-->
    <!--                <p class="roboto">Want to speak with a sales representative? Drop us a line and we’d be happy to answer any questions!</p>-->
    <!--                <p style="font-size: 18px; color: #222; font-weight: bold;"><i class="fa fa-phone"></i> +91 8891535539</p>-->
    <!--            </div>-->

    <!--             <div class="margin-top-20">-->
    <!--                <img src="images/b/46.jpg" alt="">-->
    <!--                <h6 class="margin-top-20">Visit Us</h6>-->
    <!--                <p style="font-size: 18px; color: #222; font-weight: bold;"><i class="fa fa-map-marker"></i> KENS, CULLEN ROAD, EAST OF</br>VAZHICHERY JUNCTION, ALAPPUZHA..</p>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    <!--<div class="margin-top-60 margin-bottom-30">-->
    <!--   <div class="container">-->
    <!--        <div class="row">-->
    <!--            <div class="col-sm-12 col-md-4">-->
    <!--                <div class="element-icon style2">-->
    <!--                    <div class="icon"><i class="flaticon flaticon-origami28"></i></div>-->
    <!--                    <div class="content">-->
    <!--                        <h4 class="title">FREE SHIPPING WORLD WIDE</h4>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-sm-12 col-md-4">-->
    <!--                <div class="element-icon style2">-->
    <!--                    <div class="icon"><i class="flaticon flaticon-curvearrows9"></i></div>-->
    <!--                    <div class="content">-->
    <!--                        <h4 class="title">MONEY BACK GUARANTEE</h4>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--            <div class="col-sm-12 col-md-4">-->
    <!--                <div class="element-icon style2">-->
    <!--                    <div class="icon"><i class="flaticon flaticon-headphones54"></i></div>-->
    <!--                    <div class="content">-->
    <!--                        <h4 class="title">ONLINE SUPPORT 24/7</h4>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--   </div>-->
    <!--</div>-->


@endsection
