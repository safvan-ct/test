@extends('layouts.app')

@section('title', 'Terms of Use')

@section('content')
<!--<div class="page-banner about-banner" style="background-image: url({{asset('/storage/images/shopping-my-life-27729014.jpg')}});">-->
<!--    <div class="banner-content">-->
<!--        <span class="subtitle" style="color:black">Welcome to Boutique - Let’s shop with us !</span>-->
<!--        <h2 class="title" style="color:black">Terms & Conditions</h2>-->
<!--    </div>-->
<!--</div>-->

<!-- Start Contact Area -->
<div class="ps-page--single" id="about-us">
        <div class="ps-about-intro">
            <div class="container">
                <div class="ps-section__header">
                    <h4></h4>
                    <h3>TERMS AND CONDITION</h3>
                         @foreach ($policy as $policy )

            <p class="p-b-28" style="text-align:justify;color:white;">
       {!! $policy->terms !!} .</p>

             @endforeach
                 </div>
                <div class="ps-section__content">
                   
                </div>
            </div>
        </div>
       
       
    </div>

<!-- End Contact Area -->

 @endsection
