@extends('layouts.app')

@section('title', 'delivery Policy')

@section('content')

  
<!--<div class="page-banner about-banner" style="background-image: url({{asset('/storage/images/botiqueCover.jpg')}});">-->
<!--    <div class="banner-content">-->
<!--        <span class="subtitle" style="color:black">Welcome to Boutique - Let’s shop with us !</span>-->
<!--        <h2 class="title" style="color:black">delivery Policy</h2>-->
<!--    </div>-->
<!--</div>-->

    <!-- Start Contact Area -->
     <div class="ps-page--single" id="about-us">
        <div class="ps-about-intro">
            <div class="container">
                <div class="ps-section__header">
                    
                    <h3>DELIVERY POLICY</h3>
                    @foreach ($deliverys as $delivery )
                      <p class="p-b-28"> {!! $delivery->delivery !!} </p>

                      @endforeach
                </div>
               
            </div>
        </div>
     
        
    </div>
   

 @endsection
