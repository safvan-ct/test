
@extends('layouts.app')

@section('title', 'Cart')

@section('content')

<div class="ps-page--simple">



    <div class="ps-section--shopping ps-shopping-cart">
        <div class="container">
            <div class="ps-section__header">
                <h1>Shopping Cart</h1>
            </div>
            <div class="ps-section__content">
                <div class="table-responsive">
                    <table class="table ps-table--shopping-cart ps-table--responsive">
                        <thead>
                            <tr>
                                <th>Product name</th>
                                <th>PRICE</th>
                                <th>QUANTITY</th>
                                <th>TOTAL</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0 @endphp
                            @if(session('cart'))
                                @foreach(session('cart') as $id => $details)
                                    @php $total += $details['price'] * $details['quantity'] @endphp

                            <tr>
                                <td data-label="Product">
                                    <div class="ps-product--cart">
                                        <div class="ps-product__thumbnail"><a ><img src="{{ asset('/storage/' . $details['image']) }}" alt="" /></a></div>
                                        <div class="ps-product__content"><a>{{ $details['name'] }} </a>

                                        </div>
                                    </div>
                                </td>
                                <td class="price" data-label="Price">{{ $details['price'] }}</td>
                                <td data-id ={{ $id }} data-label="Quantity">
                                    <div class="form-group--number">
                                        <style>
                                            form#in {
    width: 120px;
    padding: 0px;
}
                                        </style>
                                        
                                         <input type="number" id="number" value="{{ $details['quantity'] }}" onchange="data(this.value,{{ $id }})" onkeyup="data(this.value,{{ $id }})"  class="update-cart" class="quantity"/>
   
                                    <!--      <form style="" id="in">-->
                                    <!--     <div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value">-</div>-->
                                         <!--<input type="number" id="number" value="1" />-->
                                    <!--      <input type="number" id="number" value="{{ $details['quantity'] }}" onchange="data(this.value,{{ $id }})" onkeyup="data(this.value,{{ $id }})"  class="update-cart" class="quantity"/>-->
   
                                    <!--     <div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value">+</div>-->
                                    <!--</form>-->
                                   
                                      
                                         
                                            <!--  <div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value"  onkeyup="data(this.value,{{ $id }})"  >-</div>-->
                                            <!-- <input type="number" id="number" value="{{ $details['quantity'] }}" onchange="data(this.value,{{ $id }})" onkeyup="data(this.value,{{ $id }})"  class="update-cart" class="quantity"/>-->
                                            <!--<div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value" onkeyup="data(this.value,{{ $id }})"  >+</div>-->
                                    
                                  <input type="hidden" value="{{ $id }}"  id="id"  class="form-control " class="id"/>
   
                                       
                                
                                     <!--<input type="number" value="{{ $details['quantity'] }}" onkeyup="data(this.value,{{ $id }})"  class="form-control update-cart" class="quantity"/>-->
   
                                        
                                    </div>
                                </td>
                                <td data-label="Total">{{ $details['price'] * $details['quantity'] }}</td>
                                <td class="actions" data-th=""><form method="post" action="{{ route('remove.from.cart') }}">@csrf
                                    <input type="hidden" name="id" value="{{ $id }}">
                                   <a href=""> <button class="btn btn-danger btn-sm remove-from-cart" "><i class="icon-cross"></i></button
                                   </a></form>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            
          
                  </div>
            <div class="ps-section__footer">
                <div class="row">
                    <!--{{-- <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 ">-->
                    <!--    <figure>-->
                    <!--        <figcaption>Coupon Discount</figcaption>-->
                    <!--        <div class="form-group">-->
                    <!--            <input class="form-control" type="text" placeholder="">-->
                    <!--        </div>-->
                    <!--        <div class="form-group">-->
                    <!--            <button class="ps-btn ps-btn--outline" style="color:white;">Apply</button>-->
                    <!--        </div>-->
                    <!--    </figure>-->
                    <!--</div> --}}-->
                 
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        <div class="ps-block--shopping-total">
                           
                            <div class="ps-block__content">
                                <ul class="ps-block__product">
                                    @php $total = 0 @endphp
                                    @if(session('cart'))
                                        @foreach(session('cart') as $id => $details)
                                            @php $total += $details['price'] * $details['quantity'] @endphp

                                    <li><span class="ps-block__shop">{{ $details['name'] }}</span>
                                        {{-- <span class="ps-block__shipping">Free Shipping</span> --}}
                                        @endforeach
                                        @endif
                                </ul>
                                @php $total = 0 @endphp
                                @foreach((array) session('cart') as $id => $details)
                                    @php $total += $details['price'] * $details['quantity'] @endphp
                                @endforeach
                                <h3>Total <span>{{ $total }}</span></h3>
                            </div>
                        </div>

						@if (count((array) session('cart')) !=0)
						
						<a class="ps-btn ps-btn--fullwidth" href="{{ route('checkout') }}">Proceed to checkout</a>

        <!--                @if (Auth::user() != Null)-->
        <!--                @if (Auth::user()->email_verified_at != Null) -->
        <!--                <a class="ps-btn ps-btn--fullwidth" href="{{ route('checkout') }}">Proceed to checkout</a>-->
        <!--                 @else-->
        <!--                <a class="ps-btn ps-btn--fullwidth" href="{{ route('login') }}">Proceed to checkout</a>-->
						  <!--@endif-->
						  <!-- @else-->
        <!--                <a class="ps-btn ps-btn--fullwidth" href="{{ route('login') }}">Proceed to checkout</a>-->
					
        <!--                  @endif-->

					     @else
                         <a class="ps-btn ps-btn--fullwidth" href="{{ route('shop',6) }}">Shop Now</a>
						@endif


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
