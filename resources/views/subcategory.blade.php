@extends('layouts.app')

@section('content')



<div class="ps-layout--shop">
    <div class="ps-layout__left">
       <aside class="widget widget_shop" >
                            <h4 class="widget-title" style="color:black">Categories</h4>
                            <ul class="ps-list--categories">
                                @foreach($catss as $cat1)
                                <li class="menu-item-has-children"><a href="{{ route('shop',$cat1->id) }}">{{ $cat1->title }}</a><span class="sub-toggle"><i class="fa fa-angle-down"></i></span>
                                    <ul class="sub-menu">

                                         @foreach($subcategorys as $subcategory1)
                                           @if($subcategory1->game==$cat1->id)
                                        <li><a href="{{ route('shopcat',$subcategory1->id) }}" style="color:black">{{$subcategory1->title}}</a>
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
    
    <div class="ps-layout__right">
        
        <div id="slider-view"  class="ps-carousel--nav-inside owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="0" data-owl-nav="false" data-owl-dots="true" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on" data-owl-animate-in="fadeIn" data-owl-animate-out="fadeOut">
            @foreach ($sliders as $slider)
            <div class="ps-banner--autopart" data-background="{{ asset('/storage/uploads/bestsaleslider/' . $slider->image) }}"><img src="{{ asset('/storage/uploads/bestsaleslider/' . $slider->image) }}" alt="" style="height:392px;width:1291px">
                <div class="ps-banner__content">

                </div>
            </div>
            @endforeach

        </div>
        
         @foreach ($subcategories as $subcategorie )
        <div class="ps-block--shop-features">
            <div class="ps-block__header" style="padding-top: 17px;">
                <h3>{{ $subcategorie->title }}</h3>
                <div class="ps-block__navigation"><a class="ps-carousel__prev" href="#recommended1"><i class="icon-chevron-left"></i></a><a class="ps-carousel__next" href="#recommended1"><i class="icon-chevron-right"></i></a></div>
            </div>
            <div class="ps-block__content">
                <div class="owl-slider" id="recommended1" data-owl-auto="true" data-owl-loop="true" data-owl-speed="10000" data-owl-gap="30" data-owl-nav="false" data-owl-dots="false" data-owl-item="6" data-owl-item-xs="2" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-item-xl="3" data-owl-duration="1000" data-owl-mousedrag="on">
                   <!--<div class="ps-product">-->
                   <!--     <div class="ps-product__thumbnail"><a href="product-default.html"><img src="img/images/foaming-facewash.png" alt="" /></a>-->
                          
                   <!--         <ul class="ps-product__actions" style="background: black; color: white; width:150px;">-->
                   <!--             <li><a href="#" data-toggle="tooltip" data-placement="top" style="margin-right: 34px;margin-left: 25px;width: 90px;">Add to Cart</a></li>-->
    
                                <!-- <li><a href="#" data-placement="top" title="Quick View" data-toggle="modal" data-target="#product-quickview"><i class="icon-eye"></i></a></li> -->
                                
                   <!--         </ul>-->
                   <!--     </div>-->
                   <!--     <div class="ps-product__container"><a class="ps-product__vendor" href="#"></a>-->
                   <!--         <div class="ps-product__content"><a class="ps-product__title" href="product-default.html">Glutathione foaming face wash</a>-->
                   <!--             <div class="ps-product__rating">-->
                   <!--                 <select class="ps-rating" data-read-only="true">-->
                   <!--                     <option value="1">1</option>-->
                   <!--                     <option value="1">2</option>-->
                   <!--                     <option value="1">3</option>-->
                   <!--                     <option value="1">4</option>-->
                   <!--                     <option value="2">5</option>-->
                   <!--                 </select><span>04</span>-->
                   <!--             </div>-->
                   <!--             <p class="ps-product__price sale">$497</p>-->
                   <!--         </div>-->
                   <!--         <div class="ps-product__content hover"><a class="ps-product__title" href="product-default.html">Glutathione foaming face wash</a>-->
                   <!--             <p class="ps-product__price sale">$497</p>-->
                   <!--         </div>-->
                   <!--     </div>-->
                   <!-- </div>-->
                   
                   @php
                   $i=0;
                   @endphp
                    @foreach ($accounts as $product )
                    @if($product->subcat_id==$subcategorie->id)
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
                              
                        @endforeach
                </div>
            </div>
            
        <!--      <div style="text-align: center;padding-top: 30px;">-->
        <!--  <a href="{{ route('shopcat',$subcategorie->id) }}">  <button class="ps-btn" >Show More</button></a>-->
        <!--</div>-->
            @if($i>2)
            <div style="text-align: center;padding-top: 30px;">
          <a href="{{ route('shopcat',$subcategorie->id) }}">  <button class="ps-btn" >Show More</button></a>
        </div>
        @else
         <div style="text-align: center;padding-top: 30px; height:106px">
          <a >  </a>
        </div>
        @endif
        </div></br></br>
          @endforeach
        
    </div>
</div>

@endsection