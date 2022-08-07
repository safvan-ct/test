@extends('layouts.app1')
@section('title', 'About')
@section('content')
 
@foreach ($accounts as $account )
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
                         <form method="post" action="{{ route('adddetail.to.cart', $account->id) }}">
                             @csrf

                        <div class="ps-product__thumbnail" data-vertical="true">
                            <figure>
                                <div class="ps-wrapper">
                                    <div class="ps-product__gallery" data-arrow="true">
                                        <div class="item"><a href="{{ asset('/storage/' . $account->image) }}"><div class="zoom"><img src="{{ asset('/storage/' . $account->image) }}" alt="" style="width: 300px;"></div></a></div>
                                        <div class="item"><a href="{{ asset('/storage/' . $account->image2) }}"><div class="zoom"><img src="{{ asset('/storage/' . $account->image2) }}" alt="" style="width: 300px;"></div></a></div>
                                      <div class="item"><a href="{{ asset('/storage/' . $account->image3) }}"><div class="zoom"><img src="{{ asset('/storage/' . $account->image3) }}" alt="" style="width: 300px;"></div></a></div>
                                      <div class="item"><a href="{{ asset('/storage/' . $account->image4) }}"><div class="zoom"><img src="{{ asset('/storage/' . $account->image4) }}" alt="" style="width: 300px;"></div></a></div>
                                      
                                        </div>
                                </div>
                            </figure>
                            <div class="ps-product__variants" data-item="4" data-md="4" data-sm="4" data-arrow="false">
                                <div class="item"><img src="{{ asset('/storage/' . $account->image) }}" alt="" style="width: 350px;" ></div>
                                <div class="item"><img src="{{ asset('/storage/' . $account->image2) }}" alt="" style="width: 350px;" ></div>
                                <div class="item"><img src="{{ asset('/storage/' . $account->image3) }}" alt="" style="width: 350px;" ></div>
                                <div class="item"><img src="{{ asset('/storage/' . $account->image4) }}" alt="" style="width: 350px;" ></div>
                                  </div>
                        </div>
                        <div class="ps-product__info">
                            <h3 style="font-size: 35px;font-weight: 500;">{{ $account->name }} </h3>
                            <div class="ps-product__meta">


                            </div>
                            <h4 class="ps-product__price" style="color: #6c757d">MRP : <b style="color:black ;font-size: 25;">
                                <!--<del>account₹{{ $account->rate }}</del>-->
                                @if($account->offer!==0)
                                            <del>₹&nbsp&nbsp{{$account->rate}}</del>
                                            @endif
                                ₹ {{ $account->offer_rate }}</b></h4>


                            <div class="ps-product__shopping">
                                <figure>
                                    <figcaption>Quantity</figcaption>
                                    
                                              <div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value">-</div>
                                         <input type="number" id="number" name="quantity" value="1" />
                                         <div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">+</div>
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
                                <button   type="submit" class="ps-product__actions ps-btn ps-btn--black" style="height: 42px;
                                    font-size: 25px;
                                    padding-top: 12px;">Add to Cart</button>
                                    
                                    <!--<a href="{{ route('add.to.cart', $account->id) }}" class="ps-btn ps-btn--black"  style="height: 42px;-->
                                    <!--font-size: 25px;-->
                                    <!--padding-top: 12px;">Add to cart</a>-->
                                    
                                    </div>
                            </div>
                            
                            </form>
                            <!-- <div class="ps-product__specification"><a class="report" href="#">Report Abuse</a>
                                <p><strong>SKU:</strong> SF1133569600-1</p>
                                <p class="categories"><strong> Categories:</strong><a href="#">Consumer Electronics</a>,<a href="#"> Refrigerator</a>,<a href="#">Babies & Moms</a></p>
                                <p class="tags"><strong> Tags</strong><a href="#">sofa</a>,<a href="#">technologies</a>,<a href="#">wireless</a></p>
                            </div> -->
                            <!--<div class="ps-product__sharing"><a class="facebook" href="#"><i class="fa fa-facebook"></i></a><a class="twitter" href="#"><i class="fa fa-twitter"></i></a><a class="google" href="#"><i class="fa fa-google-plus"></i></a><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></div>-->
                        </div>
                    </div>
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
                                    <p style="font-size: 19px">  {!! $account->ingredient!!}</p>
 </div>

                            </div>
                            <div class="ps-tab" id="tab-3">


                                <div class="ps-document">
                                    <p style="font-size: 19px">  {!! $account->benefits!!}</p>
                                    </div>

                            </div>
                            <div class="ps-tab" id="tab-4">
                                <div class="ps-document">
                                    <p style="font-size: 19px">  {!! $account->howtouse!!}</p>
                                    </div>

                            </div>
                            <div class="ps-tab" id="tab-5">
                                {!! $account->forbestresult!!}

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
                            $i=0;
                            @endphp
                             @foreach ($related as $product )
                              @if($product->cat_id==$account->cat_id)
                             @if($i==0)
                               @php
                            $i++;
                            @endphp
                            <div class="ps-product">
                                    <div class="ps-product__thumbnail"><a href="{{ route('account_details',$product->id) }}"><img src="{{ asset('/storage/' . $product->image) }}" alt="" /></a>
                                        <ul class="ps-product__actions" style="background: black; color: white; width:150px;">
                                            <li><a href="{{ route('add.to.cart', $product->id) }}" data-toggle="tooltip" data-placement="top" style="margin-right: 34px;margin-left: 25px;width: 90px;">Add to Cart</a></li>

                                            <!-- <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li> -->

                                        </ul>
                                    </div>
                                    <div class="ps-product__container"><a class="ps-product__vendor" href="{{ route('account_details',$product->id) }}"></a>
                                        <div class="ps-product__content"><a class="ps-product__title" href="{{ route('account_details',$product->id) }}">{{ $product->name }}</a>
                                            <p class="ps-product__price sale">@if($product->offer!==0)
                                            <del>₹&nbsp&nbsp{{$product->rate}}</del>
                                            @endif ₹&nbsp&nbsp{{$product->offer_rate}}</p>
                                        </div>
                                        <div class="ps-product__content hover"><a class="ps-product__title" href="{{ route('account_details',$product->id) }}">{{ $product->name }}</a>
                                               <p class="ps-product__price sale">@if($product->offer!==0)
                                            <del>₹&nbsp&nbsp{{$product->rate}}</del>
                                            @endif ₹&nbsp&nbsp{{$product->offer_rate}}</p>
                                     </div>
                                    </div>
                                </div>
                                @endif
                                @endif
                            @endforeach
                            <!-- <div class="ps-product">
                                <div class="ps-product__thumbnail"><a href="product-default.html"><img src="img/images/onion-oil.png" alt="" /></a>
                                   
                                    <ul class="ps-product__actions" style="background: black; color: white; width:150px;">
                                        <li><a href="#" data-toggle="tooltip" data-placement="top" title="Add To Cart" style="margin-right: 34px;margin-left: 10px;"><i class="icon-bag2"></i></a></li>
                                        <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li>
                                        
                                    </ul>
                                </div>
                                <div class="ps-product__container"><a class="ps-product__vendor" href="#"></a>
                                    <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Black seed Onion oil</a>
                                        <div class="ps-product__rating">
                                            <select class="ps-rating" data-read-only="true">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                            </select><span>04</span>
                                        </div>
                                        <p class="ps-product__price sale">$347 </p>
                                    </div>
                                    <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">Sound Intone I65 Earphone White Version</a>
                                        <p class="ps-product__price sale">$100.99 <del>$106.00 </del></p>
                                    </div>
                                </div>
                            </div> -->
                            
                        </div>
                    </aside>


            </div>
        </div>

        <!--  <div id="slider-view"  class="ps-carousel--nav-inside owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="false" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on" data-owl-animate-in="fadeIn" data-owl-animate-out="fadeOut">-->
        <!--    @foreach ($sliders as $slider)-->
        <!--    <div class="ps-banner--autopart" data-background="{{ asset('/storage/uploads/bestsaleslider/' . $slider->image) }}"><img src="{{ asset('/storage/uploads/bestsaleslider/' . $slider->image) }}" alt="" style="height:392px;width:1291px">-->
        <!--        <div class="ps-banner__content">-->

        <!--        </div>-->
        <!--    </div>-->
        <!--    @endforeach-->

        <!--</div>-->
        
        <div class="ps-section--default">
                <div class="ps-section__header">
                    <h3>KEY INGREDIENTS</h3>
                </div>
                <div class="ps-section__content">
                    <div class="ps-product-list ps-product-list--2">
                                                
                                                <div class="ps-section__content" style="padding-top: 0px;">
                                                    <div class="ps-carousel--nav owl-slider" data-owl-auto="false" data-owl-loop="false" data-owl-speed="10000" data-owl-gap="30" data-owl-nav="false" data-owl-dots="true" data-owl-item="5" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-item-xl="5" data-owl-duration="1000" data-owl-mousedrag="on">
                                                        @foreach ($ingredients as $ingredient)
                                                        @if($ingredient->product==$account->id)
                                                        <div class="ps-product">
                                                            <div class="ps-product__thumbnail"><a ><img src="{{ asset('/storage/' . $ingredient->image) }}" alt="{{ $ingredient->alt}}" style="width: 200px;
                                                                height: 135px;" /></a>
                                                                
                                                                
                                                            </div>
                                                            <div class="ps-product__container"><a class="ps-product__vendor" href="#"><b><center>{{ $ingredient->title}}</center></b></a>
                                                                <!--<div class="ps-product__content"><p class="ps-product__title"  style="color:black">Necessary for the growth, development and repair of all body tissues</p>-->
                                                                    
                                                                <!--</div>-->
                                                                <!--<div class="ps-product__content hover"><p class="ps-product__title"  style="color:black">Necessary for the growth, development and repair of all body tissues</p>-->
                                                                   
                                                                <!--</div>-->
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
                                    <h3> {{$rating}}</h3>
                                    <select class="ps-rating" data-read-only="true">
                                        @if($rating==1)
                                        <option value="1" class="br-selected br-current">1</option>
                                         <option value="2">2</option>
                                            <option value="3">3</option>
                                             
                                            <option value="2" >2</option>
                                            
                                             
                                            <option value="5"class="" style="color: #EDB867;">5</option>
                                        @elseif($rating==2)
                                       <option value="2"class="br-selected br-current">2</option>
                                       
                                        <option value="2"class="br-selected br-current" style="color: #EDB867;">2</option>
                                            <option value="3">3</option>
                                             
                                            <option value="4" >4</option>
                                            
                                             
                                            <option value="5">5</option>
                                         @elseif($rating==3)
                                       <option value="3"class="br-selected br-current">3</option>
                                        <option value="4"class="br-selected br-current" style="color: #EDB867;">4</option>
                                            <option value="3"class="br-selected " style="color: #EDB867;">3</option>
                                             
                                            <option value="2" >2</option>
                                            
                                             
                                            <option value="5"class="" style="color: #EDB867;">5</option>
                                            
                                           
                                                <option value="2" style="color: #EDB867;">2</option>
                                          @elseif($rating==4)
                                          <option value="4"class="br-selected br-current" style="color: #EDB867;">4</option>
                                            <option value="1"class="br-selected " style="color: #EDB867;">1</option>
                                             
                                            <option value="2"class="br-selected " style="color: #EDB867;">2</option>
                                            
                                             
                                            <option value="4"class="" style="color: #EDB867;">4</option>
                                            
                                           
                                                <option value="2" style="color: #EDB867;">2</option>
                                            
                                          
                                           @elseif($rating==5)
                                             <option value="4"class="br-selected br-current" style="color: #EDB867;">4</option>
                                            <option value="1"class="br-selected " style="color: #EDB867;">1</option>
                                            
                                            <option value="2"class="br-selected " style="color: #EDB867;">2</option>
                                            
                                              <option value="3"class=" " style="color: #EDB867;">3</option>
                                              
                                            <option value="4"class="" style="color: #EDB867;">4</option>
                                        @endif
                                      
                                    </select>
                                    
                                    
                                    <span>{{$reviewcount}} Review</span>
                                </div>
                                 @if($rating==5)
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
                                  @elseif($rating==4)
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
                                  @elseif($rating==3)
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
                                  @elseif($rating==2)
                                  
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
                                  @elseif($rating==1)
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
                            <form class="ps-form--review" action="{{ route('review') }}" method="post">
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
                                            <input class="form-control" type="text" placeholder="Your Name" name="name">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12  ">
                                        <div class="form-group">
                                            <input class="form-control" type="email" placeholder="Your Email" name="email">
                                            <input class="form-control" type="hidden" placeholder="Your Email" name="pid" value={{ $account->id}}>
                                        </div>
                                    </div>
                                       <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12  ">
                                <center>
                                <script src='https://www.google.com/recaptcha/api.js'></script>
                                <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.sitekey') }}" ></div>
                                @error('g-recaptcha-response')
                                    <div class="col-12 text-danger text-center">Captcha verification required
                                    </div>
                                @enderror
                            </center>
                            </div>
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


    </div>
                  <!--   <section class="u-align-center u-clearfix u-palette-5-dark-3 u-section-2" id="sec-57f9" style="background-color:white">-->
                  <!--  <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">-->
                  <!--    <h2 class="u-text u-text-1" style="color:black">Frequently Asked Questions</h2>-->
                  <!--    <div class="u-border-9 u-border-palette-1-base u-line u-line-horizontal u-line-1" style="border-color: black;"></div>-->
                  <!--    <div class="u-accordion u-faq u-spacing-10 u-accordion-1">-->
                  <!--      <div class="u-accordion-item">-->
                  <!--        <a class="active u-accordion-link u-active-palette-1-base u-button-style u-hover-palette-1-base u-palette-5-dark-2 u-text-active-white u-text-grey-10 u-text-hover-grey-10 u-accordion-link-1" id="link-accordion-ae6a" aria-controls="accordion-ae6a" aria-selected="true">-->
                  <!--          <span class="u-accordion-link-text">What Shipping Methods Are Available?</span><span class="u-accordion-link-icon u-icon u-icon-circle u-text-palette-1-base u-icon-1"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 16 16" style=""><use xlink:href="#svg-bf29"></use></svg><svg class="u-svg-content" id="svg-bf29" style="color: rgb(255, 255, 255);"><path d="M8,10.7L1.6,5.3c-0.4-0.4-1-0.4-1.3,0c-0.4,0.4-0.4,0.9,0,1.3l7.2,6.1c0.1,0.1,0.4,0.2,0.6,0.2s0.4-0.1,0.6-0.2l7.1-6-->
                  <!--c0.4-0.4,0.4-0.9,0-1.3c-0.4-0.4-1-0.4-1.3,0L8,10.7z"></path></svg></span>-->
                  <!--        </a>-->
                  <!--        <div class="u-accordion-active u-accordion-pane u-container-style u-palette-1-base u-accordion-pane-1" id="accordion-ae6a" aria-labelledby="link-accordion-ae6a">-->
                  <!--          <div class="u-container-layout u-container-layout-1" style="background-color: #e1e1e1; border: 1px solid #e6edfb;">-->
                  <!--            <div class="fr-view u-clearfix u-rich-text u-text">-->
                  <!--              <p>Answer . Ex Portland Pitchfork irure mustache. Eutra fap before they sold out literally. Aliquip ugh bicycle rights actually mlkshk, seitan squid craft beer tempor.</p>-->
                  <!--            </div>-->
                  <!--          </div>-->
                  <!--        </div>-->
                  <!--      </div>-->
                  <!--      <div class="u-accordion-item">-->
                  <!--        <a class="u-accordion-link u-active-palette-1-base u-button-style u-hover-palette-1-base u-palette-5-dark-2 u-text-active-white u-text-grey-10 u-text-hover-grey-10 u-accordion-link-2" id="link-accordion-8339" aria-controls="accordion-8339" aria-selected="false">-->
                  <!--          <span class="u-accordion-link-text">Do You Ship Internationally?&nbsp;<br>-->
                  <!--          </span><span class="u-accordion-link-icon u-icon u-icon-circle u-text-palette-1-base u-icon-2"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 16 16" style=""><use xlink:href="#svg-aba5"></use></svg><svg class="u-svg-content" id="svg-aba5" style="color: rgb(255, 255, 255);"><path d="M8,10.7L1.6,5.3c-0.4-0.4-1-0.4-1.3,0c-0.4,0.4-0.4,0.9,0,1.3l7.2,6.1c0.1,0.1,0.4,0.2,0.6,0.2s0.4-0.1,0.6-0.2l7.1-6-->
                  <!--c0.4-0.4,0.4-0.9,0-1.3c-0.4-0.4-1-0.4-1.3,0L8,10.7z"></path></svg></span>-->
                  <!--        </a>-->
                  <!--        <div class="u-accordion-pane u-container-style u-palette-1-base u-accordion-pane-2" id="accordion-8339" aria-labelledby="link-accordion-8339">-->
                  <!--          <div class="u-container-layout u-container-layout-2" style="background-color: #e1e1e1; border: 1px solid #e6edfb;">-->
                  <!--            <div class="fr-view u-clearfix u-rich-text u-text">-->
                  <!--              <p>Answer . Hoodie tote bag mixtape tofu. Typewriter jean shorts wolf quinoa, messenger bag organic freegan cray.</p>-->
                  <!--            </div>-->
                  <!--          </div>-->
                  <!--        </div>-->
                  <!--      </div>-->
                  <!--      <div class="u-accordion-item">-->
                  <!--        <a class="u-accordion-link u-active-palette-1-base u-button-style u-hover-palette-1-base u-palette-5-dark-2 u-text-active-white u-text-grey-10 u-text-hover-grey-10 u-accordion-link-3" id="link-accordion-1c17" aria-controls="accordion-1c17" aria-selected="false">-->
                  <!--          <span class="u-accordion-link-text">How Long Will It Take To Get My Package?&nbsp;<br>-->
                  <!--          </span><span class="u-accordion-link-icon u-icon u-icon-circle u-text-palette-1-base u-icon-3"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 16 16" style=""><use xlink:href="#svg-5bcf"></use></svg><svg class="u-svg-content" id="svg-5bcf" style="color: rgb(255, 255, 255);"><path d="M8,10.7L1.6,5.3c-0.4-0.4-1-0.4-1.3,0c-0.4,0.4-0.4,0.9,0,1.3l7.2,6.1c0.1,0.1,0.4,0.2,0.6,0.2s0.4-0.1,0.6-0.2l7.1-6-->
                  <!--c0.4-0.4,0.4-0.9,0-1.3c-0.4-0.4-1-0.4-1.3,0L8,10.7z"></path></svg></span>-->
                  <!--        </a>-->
                  <!--        <div class="u-accordion-pane u-container-style u-palette-1-base u-accordion-pane-3" id="accordion-1c17" aria-labelledby="link-accordion-1c17">-->
                  <!--          <div class="u-container-layout u-container-layout-3" style="background-color: #e1e1e1;; border: 1px solid #e6edfb;">-->
                  <!--            <div class="fr-view u-clearfix u-rich-text u-text">-->
                  <!--              <p>Answer. Swag slow-carb quinoa VHS typewriter pork belly brunch, paleo single-origin coffee Wes Anderson. Flexitarian Pitchfork forage, literally paleo fap pour-over. Wes Anderson Pinterest YOLO fanny pack meggings, deep v XOXO chambray sustainable slow-carb raw denim church-key fap chillwave Etsy. +1 typewriter kitsch, American Apparel tofu Banksy Vice.</p>-->
                  <!--            </div>-->
                  <!--          </div>-->
                  <!--        </div>-->
                  <!--      </div>-->
                  <!--      <div class="u-accordion-item u-expanded-width">-->
                  <!--        <a class="u-accordion-link u-active-palette-1-base u-button-style u-hover-palette-1-base u-palette-5-dark-2 u-text-active-white u-text-grey-10 u-text-hover-grey-10 u-accordion-link-4" id="link-accordion-ae6a" aria-controls="accordion-ae6a" aria-selected="false">-->
                  <!--          <span class="u-accordion-link-text">What Payment Methods Are Accepted?</span><span class="u-accordion-link-icon u-icon u-icon-circle u-text-palette-1-base u-icon-4"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 16 16" style=""><use xlink:href="#svg-6b20"></use></svg><svg class="u-svg-content" id="svg-6b20" style="color: rgb(255, 255, 255);"><path d="M8,10.7L1.6,5.3c-0.4-0.4-1-0.4-1.3,0c-0.4,0.4-0.4,0.9,0,1.3l7.2,6.1c0.1,0.1,0.4,0.2,0.6,0.2s0.4-0.1,0.6-0.2l7.1-6-->
                  <!--c0.4-0.4,0.4-0.9,0-1.3c-0.4-0.4-1-0.4-1.3,0L8,10.7z"></path></svg></span>-->
                  <!--        </a>-->
                  <!--        <div class="u-accordion-pane u-container-style u-palette-1-base u-accordion-pane-4" id="accordion-ae6a" aria-labelledby="link-accordion-ae6a">-->
                  <!--          <div class="u-container-layout u-container-layout-4" style="background-color: #e1e1e1; border: 1px solid #e6edfb;">-->
                  <!--            <div class="fr-view u-clearfix u-rich-text u-text">-->
                  <!--              <p>Answer. Fashion axe DIY jean shorts, swag kale chips meh polaroid kogi butcher Wes Anderson chambray next level semiotics gentrify yr. Voluptate photo booth fugiat Vice. Austin sed Williamsburg, ea labore raw denim voluptate cred proident mixtape excepteur mustache. Twee chia photo booth readymade food truck, hoodie roof party swag keytar PBR DIY.</p>-->
                  <!--            </div>-->
                  <!--          </div>-->
                  <!--        </div>-->
                  <!--      </div>-->
                  <!--      <div class="u-accordion-item u-expanded-width">-->
                  <!--        <a class="u-accordion-link u-active-palette-1-base u-button-style u-hover-palette-1-base u-palette-5-dark-2 u-text-active-white u-text-grey-10 u-text-hover-grey-10 u-accordion-link-4" id="link-accordion-ae6a" aria-controls="accordion-ae6a" aria-selected="false">-->
                  <!--          <span class="u-accordion-link-text">Is Buying On-Line Safe?</span><span class="u-accordion-link-icon u-icon u-icon-circle u-text-palette-1-base u-icon-4"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 16 16" style=""><use xlink:href="#svg-6b20"></use></svg><svg class="u-svg-content" id="svg-6b20" style="color: rgb(255, 255, 255);"><path d="M8,10.7L1.6,5.3c-0.4-0.4-1-0.4-1.3,0c-0.4,0.4-0.4,0.9,0,1.3l7.2,6.1c0.1,0.1,0.4,0.2,0.6,0.2s0.4-0.1,0.6-0.2l7.1-6-->
                  <!--c0.4-0.4,0.4-0.9,0-1.3c-0.4-0.4-1-0.4-1.3,0L8,10.7z"></path></svg></span>-->
                  <!--        </a>-->
                  <!--        <div class="u-accordion-pane u-container-style u-palette-1-base u-accordion-pane-4" id="accordion-ae6a" aria-labelledby="link-accordion-ae6a">-->
                  <!--          <div class="u-container-layout u-container-layout-4"style="background-color: #e1e1e1; border: 1px solid #e6edfb;">-->
                  <!--            <div class="fr-view u-clearfix u-rich-text u-text">-->
                  <!--              <p>Answer. Art party authentic freegan semiotics jean shorts chia cred. Neutra Austin roof party Brooklyn, synth Thundercats swag 8-bit photo booth. Plaid letterpress leggings craft beer meh ethical Pinterest.</p>-->
                  <!--            </div>-->
                  <!--          </div>-->
                  <!--        </div>-->
                  <!--      </div>-->
                  
                  
                    <div class="ps-section--default">
                <div class="ps-section__header">
                    <h3>RECOMMENDED PRODUCTS</h3>
                    <!--(account->cat_id == product_cat_id)-->
                </div>
               
                <div class="ps-section__content">
                    <div class="ps-carousel--nav owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="10000" data-owl-gap="30" data-owl-nav="true" data-owl-dots="true" data-owl-item="6" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-item-xl="3" data-owl-duration="1000" data-owl-mousedrag="on">
                            @foreach ($related as $product )
                            @if($product->cat_id==$account->cat_id)
                        <div class="ps-product">
                                    <div class="ps-product__thumbnail"><a href="{{ route('account_details',$product->id) }}"><img src="{{ asset('/storage/' . $product->image) }}" alt="" /></a>
                                        <ul class="ps-product__actions" style="background: black; color: white; width:150px;">
                                            <li><a href="{{ route('add.to.cart', $product->id) }}" data-toggle="tooltip" data-placement="top" style="margin-right: 34px;margin-left: 25px;width: 90px;">Add to Cart</a></li>

                                            <!-- <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li> -->

                                        </ul>
                                    </div>
                                    <div class="ps-product__container"><a class="ps-product__vendor" href="{{ route('account_details',$product->id) }}"></a>
                                        <div class="ps-product__content"><a class="ps-product__title" href="{{ route('account_details',$product->id) }}">{{ $product->name }}</a>
                                            <p class="ps-product__price sale">@if($product->offer!==0)
                                            <del>₹&nbsp&nbsp{{$product->rate}}</del>
                                            @endif ₹&nbsp&nbsp{{$product->offer_rate}}</p>
                                        </div>
                                        <div class="ps-product__content hover"><a class="ps-product__title" href="{{ route('account_details',$product->id) }}">{{ $product->name }}</a>
                                               <p class="ps-product__price sale">@if($product->offer!==0)
                                            <del>₹&nbsp&nbsp{{$product->rate}}</del>
                                            @endif ₹&nbsp&nbsp{{$product->offer_rate}}</p>
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
