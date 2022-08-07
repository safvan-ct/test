@extends('layouts.app')

@section('title', 'Privacy Policy')

@section('content')

  
<!--<div class="page-banner about-banner" style="background-image: url({{asset('/storage/images/botiqueCover.jpg')}});">-->
<!--    <div class="banner-content">-->
<!--        <span class="subtitle" style="color:black">Welcome to Boutique - Let’s shop with us !</span>-->
<!--        <h2 class="title" style="color:black">Privacy Policy</h2>-->
<!--    </div>-->
<!--</div>-->

    <!-- Start Contact Area -->
     <div class="ps-page--single" id="about-us">
        <div class="ps-about-intro">
            <div class="container">
                <div class="ps-section__header">
                    
                    <h3>PRIVACY POLICY</h3>
                    @foreach ($privacy as $Privacy )
                      <p class="p-b-28"> {!! $Privacy->privacy !!} </p>

                      @endforeach
                </div>
               
            </div>
        </div>
     
        
    </div>
    <!--<section class="contact-area ptb-100">-->
    <!--    <div class="container">-->
    <!--        <div class="">-->
    <!--                  @foreach ($privacy as $Privacy )-->
    <!--                  <p class="p-b-28"> {!! $Privacy->privacy !!} </p>-->

    <!--                  @endforeach-->


    <!--        </div>-->
    <!--    </div>-->
    <!--</section>-->
    <!-- End Contact Area -->

 @endsection
