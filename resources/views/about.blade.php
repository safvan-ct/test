@extends('layouts.app')

@section('title', 'About')

@section('content')


    <div class="ps-page--single" id="about-us">
        <div class="ps-about-intro">
            <div class="container">
                <div class="ps-section__header">
                      <h2>{!! $aboutus->Heading !!} </h2>
                    <h4>{{ $aboutus->title }} </h4>
                     <p>{!! $aboutus->description !!}
                        </p>
                </div>
                <div class="ps-section__content">
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6 ">
                            <!--<div class="ps-block--icon-box"><i class="icon-cube"></i>-->
                            <!--    <h4>{!! $aboutus->Productsaled !!}</h4>-->
                            <!--    <p>Product for sale</p>-->
                            <!--</div>-->
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6 ">
                            <!--<div class="ps-block--icon-box"><i class="icon-store"></i>-->
                            <!--    <h4>{!! $aboutus->NumberofProducts !!}</h4>-->
                            <!--    <p>Number Of Product</p>-->
                            <!--</div>-->
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6 ">
                            <!--<div class="ps-block--icon-box"><i class="icon-bag2"></i>-->
                            <!--    <h4>{!! $aboutus->Buyersactive !!}</h4>-->
                            <!--    <p>Buyer active </p>-->
                            <!--</div>-->
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6 ">
                            <!--<div class="ps-block--icon-box"><i class="icon-cash-dollar"></i>-->
                            <!--    <h4>{!! $aboutus->Rating !!}</h4>-->
                            <!--    <p>Rating</p>-->
                            <!--</div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
      <div class="ps-about-awards">
            <div class="container">
                <div class="ps-section__header">
                    <h4>{!! $aboutus->awardheading !!}</h4>
                    <p>{!! $aboutus->awarddescription !!}</p>
                </div>
                <div class="ps-section__content">
                    <div class="owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="15000" data-owl-gap="0" data-owl-nav="false" data-owl-dots="false" data-owl-item="5" data-owl-item-xs="3" data-owl-item-sm="3" data-owl-item-md="3" data-owl-item-lg="4" data-owl-duration="1500" data-owl-mousedrag="off">
                         @foreach ($datas as $data)
                            
                        <a href="#"><img src="{{ asset('/storage/' . $data->image) }}" style="width: 100px; height: 50px" alt={{$data->alt}}></a>
                        @endforeach
                        
                        </div>
                </div>
            </div>
        </div>
    </div>


@endsection
