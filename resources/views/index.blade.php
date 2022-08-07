@extends('layouts.app')

@section('content')



<div id="homepage-2">
    <div class="ps-home-banner" style="padding-bottom:13px">
        <div id="slider-view"  class="ps-carousel--nav-inside owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="false" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on" data-owl-animate-in="fadeIn" data-owl-animate-out="fadeOut">
            
            @foreach ($sliders as $slider)
            <div class="ps-banner--autopart" data-background="{{ asset('/storage/uploads/slider/' . $slider->image) }}"> <a href="{{ $slider->link }}"><img src="{{ asset('/storage/uploads/slider/' . $slider->image) }}" alt="" style="height:500px;"></a>
                <div class="ps-banner__content">
                    <!--<h4>Top Rated</h4>-->
                    <h3>{{$slider->title}}</h3>
                    <p style="padding-left:5px"></p>
                    <!--<p style="padding-left:5px"><strong></strong></p><a class="ps-btn" href="{{ $slider->link  }}">Shop Now</a>-->
                </div>
            </div>
            @endforeach
            
        </div>
    </div>



    <a href="{{ route('about') }}"><div class="content_new" style="width: 100%;height: 500px;background-image: url({{ asset('/storage/' . $homeabouts->image) }});" >
        <h5 style="color:#212529;
        text-align: left;padding-top:250px;padding-left: 70px;font-size: 40px;
        font-style: italic;">{{$homeabouts->title}}</h5>
        <p class="p-b-28" style="padding-left: 80px;text-align:justify;">
            {!! $homeabouts->description !!}
        </p>
    </div> </a>

    <div class="ps-block--products-of-category" style="margin-top: 50px;padding-left: 142px;margin-left: -18px;
    margin-right: -61px;width: 100%;">
        <div class="ps-block__categories">
            <h6  style="color:#64c2d1;text-align: center;font-style: italic;">
                 @foreach ($games as $game)
                @if ($game->id == $catf->cat_id)
                {{ $game->title }}
                @endif
                @endforeach</h6>
            <!-- <h3>REVITALIZING</h3> -->
            <h3 style="text-align:center;    height: 141px;">
                 @if($catf->Product_id!=0)
                @foreach ($products as $product)
                @if ($catf->Product_id == $product->id)
                {{ $product->name }}
               </h3>
            <ul>
                <!--<p style="text-align: -webkit-center;padding-right: 1px;">  {!! $product->description !!}</p><br><br>-->
                <a class="continue-shopping-btn"  href="{{ route('account_details',$product->id) }}"><button class="ps-btn" style="font-size:9px">CONITNUE SHOPPING</button></p></a>
            </ul>

        </div>
        <div class="ps-block__slider">
            <div class="ps-carousel--product-box owl-slider" v data-owl-auto="true" data-owl-loop="true" data-owl-speed="7000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="500" data-owl-mousedrag="off">
                <a href="{{ route('account_details',$product->id) }}">
                    <img src="{{ asset('/storage/' . $product->image) }}" alt="{{$product->alt}}"></a>
                           <a href="{{ route('account_details',$product->id) }}"> <img src="{{ asset('/storage/' . $product->image2) }}" alt="{{$product->alt}}"></a>
                            <a href="{{ route('account_details',$product->id) }}"><img src="{{ asset('/storage/' . $product->image3) }}" alt="{{$product->alt}}"></a>
                            <a href="{{ route('account_details',$product->id) }}"><img src="{{ asset('/storage/' . $product->image4) }}" alt="{{$product->alt}}"></a>
            </div>
        </div>
        @endif
        @endforeach
        @else
        @endif
        <div class="ps-block__categories">
            <h6 style="color:#64c2d1;text-align: center;font-style:italic;">
                 @foreach ($games as $game1)
                @if ($game1->id == $cats->cat_id)
                {{ $game1->title }}
                @endif
                @endforeach</h6>
            <!-- <h3>REVITALIZING</h3> -->
            <h3 style="text-align:center;    height: 141px;">
                @if($cats->Product_id!=0)
                @foreach ($products as $product1)
                @if ($cats->Product_id == $product1->id)
                {{ $product1->name }}

            </h3>
            <ul>
                <!--<p style="text-align: -webkit-center;padding-right: 1px;">{!! $product1->description !!}</p><br>-->
                <a class="continue-shopping-btn" href="{{ route('account_details',$product1->id) }}"><button class="ps-btn" style="font-size:9px">CONITNUE SHOPPING</button></p></a>
            </ul>

        </div>
        <div class="ps-block__slider">
            <div class="ps-carousel--product-box owl-slider" v data-owl-auto="true" data-owl-loop="true" data-owl-speed="7000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="500" data-owl-mousedrag="off">
                <a href="{{ route('account_details',$product1->id) }}"> <img src="{{ asset('/storage/' . $product1->image) }}" alt="{{$product1->alt}}"></a>
                    
                       <a href="{{ route('account_details',$product1->id) }}"> <img src="{{ asset('/storage/' . $product1->image2) }}" alt="{{$product1->alt}}"></a>
                       <a href="{{ route('account_details',$product1->id) }}"> <img src="{{ asset('/storage/' . $product1->image3) }}" alt="{{$product1->alt}}"></a>
                       <a href="{{ route('account_details',$product1->id) }}"> <img src="{{ asset('/storage/' . $product1->image4) }}" alt="{{$product1->alt}}"></a>
                  
            </div>
        </div>
        @endif
        @endforeach
        @else
        @endif
        </div>


          <div class="row" style="width:100% ;height:353px;margin:0;">
        <div class="col-md-6 col-sm-6 col-6" >
            <!--<h5 style="padding-top: 60px;-->
            <!--text-align: center;font-size: 33px;">{{$homequizs->title}}</h5>-->
            <!--<h5 style="text-align:center ;color: #343a40;font-size: 18px;padding-left: 20px;padding-right: 20px;">{!! $homequizs->description !!} </h5>-->

            <!--<button class="ps-btn">Take Quiz</button>-->
            
           <a href="{{$homequizs->link}}"> <img src=" {{ asset('/storage/' . $homequizs->image) }}" alt="{{$banners->alt}}" style="height:353px;width:100%;"></a>

        </div>
           <div class="col-md-6 col-sm-6 col-6" >
        <a href="{{$banners->link}}"><img src=" {{ asset('/storage/uploads/adv/' . $banners->image) }}" alt="{{$banners->alt}}" style="height:353px;width:100%;"></a>
        </div>

    </div>


                      <div class="ps-block--categories-box">
                    <div class="ps-block__header">

                    </div>
                    <div class="ps-block__content">
                        <div class="ps-block-content" style="width: 40%;margin-top: 84px;">
                            <h6  style="color:#64c2d1;text-align: center;font-style: italic;padding-left: 20px;">
                                @foreach ($subcategories as $subcategorie)
                                @if ($subcategorie->id == $subcats->subcat_id)
                                {{ $subcategorie->title }}
                                @endif
                                @endforeach
                            </h6>
            <!-- <h3>REVITALIZING</h3> -->
            <h3 style="text-align:center;">
                @if($subcats->Product_id!=0)
                @foreach ($products as $product2)
                @if ($subcats->Product_id == $product2->id)
                {{ $product2->name }}


            </h3>

            <ul>
                <!--<p style="text-align: -webkit-center;padding-right: 1px;">     {!! $product2->description !!}<br></p><br><br>-->
                <a class="continue-shopping-btn" href="{{ route('shopcat',$subcats->subcat_id) }}" style="margin-left: 115px;"><button class="ps-btn">CONITNUE SHOPPING</button></a>
            </ul>

            @endif
            @endforeach
            @else
            @endif
                        </div>

                         <div class="ps-layout__right" style="width:60%;">
                                <div class="ps-block--shop-features">


                                        <div class="ps-block__navigation" style="padding-left:747px;"><a class="ps-carousel__prev" href="#recommended1"><i class="icon-chevron-left"></i></a><a class="ps-carousel__next" href="#recommended1"><i class="icon-chevron-right"></i></a></div>

                                    <div class="ps-block__content">
                                        <div class="owl-slider" id="recommended1" data-owl-auto="true" data-owl-loop="false" data-owl-speed="10000" data-owl-gap="30" data-owl-nav="false" data-owl-dots="false" data-owl-item="6" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="3" data-owl-item-lg="3" data-owl-item-xl="3" data-owl-duration="1000" data-owl-mousedrag="on">

                                            @if($subcats->subcat_id!=0)
                                            @foreach ($products as $product3)
                                            @if ($subcats->subcat_id == $product3->subcat_id)
                                            <div class="ps-product">
                                                <div class="ps-product__thumbnail"><a href="{{ route('account_details',$product3->id) }}"><img src="{{ asset('/storage/' . $product3->image) }}" alt=""/></a>
                                                    <ul class="ps-product__actions" style="background: black; color: white; width:150px;">
                                                        <li><a href="{{ route('add.to.cart', $product3->id) }}" data-toggle="tooltip" data-placement="top" style="margin-right: 34px;margin-left: 25px;width: 90px;">Add to Cart</a></li>

                                                        <!-- <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li> -->

                                                    </ul>
                                                </div>
                                                <div class="ps-product__container"><a class="ps-product__vendor" href="#"> </a>
                                                    <div class="ps-product__content"><a class="ps-product__title" href="{{ route('account_details',$product3->id) }}">{{ $product3->name }}</a>

                                                        <p class="ps-product__price sale">₹{{ $product3->rate }}</p>
                                                    </div>
                                                    <div class="ps-product__content hover"><a class="ps-product__title" href="{{ route('account_details',$product3->id) }}">{{ $product3->name }}</a>
                                                        <p class="ps-product__price">₹{{ $product3->rate }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            @endforeach
                                            @else
                                            @endif

                                        </div>
                                    </div>
                                </div>


                            </div>




                    </div>
                </div>

               <div class="ps-blog" style="padding-left: 15px;padding-right: 15px;padding-top: 20px;">
                <div class="ps-blog__header">
                <h4 style="text-align: center;font-size: 27px;">OUR ARTICLE</h4>
                </div>
                <div class="ps-blog__content">
                    <div class="row">
            @foreach ($newss as $news)
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                            <div class="ps-post">
                                <div class="ps-post__thumbnail"><a class="ps-post__overlay" href="{{ route('new_detail',$news->id) }}"></a><img src="{{ asset('/storage/' . $news->image) }}" alt="{{$news->alt}}">
                                    {{-- <div class="ps-post__badge"><i class="icon-volume-high"></i></div> --}}
                                </div>
                                <div class="ps-post__content">
                                    <!--<div class="ps-post__meta"><a href="#">Entertaiment</a><a href="#">Technology</a>-->
                                    </div><a class="ps-post__title" href="{{ route('new_detail',$news->id) }}">{{$news->title}}</a>
                                    <p>{{ date('y- M d', strtotime($news->updated_at)) }}</p>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>


    <div class="ps-client-say">
        <div class="container">
            <div class="ps-section__header">
                <h3>What client say</h3>
                <div class="ps-section__nav"><a class="ps-carousel__prev" href="#"><i class="icon-chevron-left"></i></a><a class="ps-carousel__next" href="-2.html"><i class="icon-chevron-right"></i></a></div>
            </div>
            <div class="ps-section__content">
                <div class="ps-carousel--testimonials owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="10000" data-owl-gap="30" data-owl-nav="false" data-owl-dots="false" data-owl-item="2" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="2" data-owl-duration="1000" data-owl-mousedrag="on">
                     @foreach ($testimonials as $testimonial)

                    <div class="ps-block--testimonial">
                        <div class="ps-block__header"><img src="{{ asset('/storage/' . $testimonial->image) }}" alt=""></div>
                        <div class="ps-block__content"><i class="icon-quote-close"></i>
                            <h4>{{ $testimonial->name }}<span>{{ $testimonial->designation }}</span></h4>
                            <p>{{ $testimonial->quote }}</p>
                        </div>
                    </div>

                     @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="ps-site-features">


        <div class="ps-block--site-features ps-block--site-features-2">
            <div class="ps-block__item">
                <div class="ps-block__left"><img src="{{asset('/storage/images/fast-delivery.png')}}" style="width: 100px;height:81px"></div>
                <div class="ps-block__right">
                    <h4></h4>
                    <p>Free shipping on orders above Rs 500</p>
                </div>
            </div>
            <div class="ps-block__item">
                <div class="ps-block__left"><img src="{{asset('/storage/images/premium-badge.png')}}" style="width: 100px;"></div>
                <div class="ps-block__right">
                    <h4></h4>
                    <p>Premium quality products</p>
                </div>
            </div>
            <div class="ps-block__item">
                <div class="ps-block__left"><img src="{{asset('/storage/images/herbal-spa-treatment-leaves.png')}}" style="width: 100px;"></div>
                <div class="ps-block__right">
                    <h4></h4>
                    <p>All natural ingradients</p>
                </div>
            </div>
            <div class="ps-block__item">
                <div class="ps-block__left"><img src="{{asset('/storage/images/rupee-indian.png')}}" style="width: 100px;"></div>
                <div class="ps-block__right">
                    <h4></h4>
                    <p>Money back guarantee</p>
                </div>
            </div>
            <div class="ps-block__item">
                <div class="ps-block__left"><img src="{{asset('/storage/images/pawprint.png')}}" style="width: 100px;"></div>
                <div class="ps-block__right">
                    <h4></h4>
                    <p>Not tested on animals</p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>


@endsection
