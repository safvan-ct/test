@extends('layouts.app')

@section('title', 'Refund Policy')

@section('content')

<!--<div class="page-banner about-banner" style="background-image: url({{asset('/storage/images/botiqueCover.jpg')}});">-->
<!--    <div class="banner-content">-->
<!--        <span class="subtitle" style="color:black">Welcome to Boutique - Let’s shop with us !</span>-->
<!--        <h2 class="title" style="color:black">Refund Policy</h2>-->
<!--    </div>-->
<!--</div>-->

<!-- Start Contact Area -->
<div class="ps-page--single" id="about-us">
        <div class="ps-about-intro">
            <div class="container">
                <div class="ps-section__header">
                    
                    <h3>REFUND POLICY</h3>
                    <p></p>
                </div>
                <div class="ps-section__content">
                  @foreach ($policy as $policy )

                            <p class="p-b-28" >
                                {!! $policy->refund !!} .</p>

                @endforeach
                </div>
            </div>
        </div>
      
        
    </div>

<!-- End Contact Area -->

 @endsection
