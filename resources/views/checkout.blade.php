@extends('layouts.app')
@section('title', 'checkout')

@section('content')

<style>
    form.ps-form--checkout {
    width: 100%;
}
</style>

 <main class="ps-page--my-account">
        
        <section class="ps-section--account ps-checkout">
            <div class="container">
                <div class="ps-section__header">
                    <h3>Checkout Information</h3>
                </div>
                              
                        <!--<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">-->
                        <!--    <figure>-->
                        <!--        <figcaption>Coupon Discount</figcaption>-->
                        <!--        <div class="form-group">-->
                        <!--            <input class="form-control" type="text" placeholder="">-->
                        <!--        </div>-->
                        <!--        <div class="form-group">-->
                        <!--            <button class="ps-btn ps-btn--outline">Apply</button>-->
                        <!--        </div>-->
                        <!--    </figure>-->
                        <!--</div>-->
                        
                        
                <div class="ps-section__content">
                    <form class="ps-form--checkout" action="{{ route('paymentindex') }}" method="post">
                        @csrf
                        <div class="ps-form__content">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                                    <div class="ps-form__billing-info">
                                        
                                        <h3 class="ps-form__heading">Shipping Address</h3>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label> Name</label>
                                                    <input class="form-control" type="text"  name="name" value="{{ old('name') }}" placeholder="" required>
                                                           @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Phone</label>
                                                    <input class="form-control" type="text" name="phone" value="{{ old('phone') }}" placeholder="" required>
                                                           @error('phone')<span class="text-danger">{{ $message }}</span>@enderror
                                                </div>
                                            </div>
                                        </div>
                                         <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label> Email</label>
                                                    <input class="form-control" type="email"  name="email" value="{{ old('email') }}" placeholder="" required>
                                                           @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                                                </div>
                                            </div>
                                        <div class="form-group">
                                            <label>Address</label>
                                            <input class="form-control" type="text" name="address" value="{{ old('address') }}" placeholder="" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Apartment</label>
                                            <input class="form-control" name="apartment" value="{{ old('apartment') }}" type="text" placeholder="" required>
                                                   @error('apartment')<span class="text-danger">{{ $message }}</span>@enderror
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>City</label>
                                                    <input class="form-control" name="city" value="{{ old('city') }}" type="text" placeholder="" required>
                                                           @error('city')<span class="text-danger">{{ $message }}</span>@enderror
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label>Postal Code</label>
                                                    <input class="form-control" name="postcode" value="{{ old('postcode') }}" type="text" placeholder="" required>
                                                           @error('postcode')<span class="text-danger">{{ $message }}</span>@enderror
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ">
                                    <div class="ps-block--checkout-order">
                                        <div class="ps-block__content">
                                            <figure>
                                                <figcaption><strong>Product</strong><strong>Total</strong></figcaption>
                                            </figure>
                                            <figure class="ps-block__items">
                                                     @php $total = 0 @endphp
                    @if(session('cart'))
                        @foreach(session('cart') as $id => $details)
                        @php $total += $details['price'] * $details['quantity'] @endphp

                                                
                                            <a href="#"><strong>{{ $details['name'] }}</strong><span>x &nbsp {{ $details['quantity']}}</span><small>₹&nbsp{{ $details['price'] * $details['quantity'] }}</small></a>
                                            <!--<a href="#"><strong>Herschel Leather Duffle Bag In Brown Color</strong><span>x1</span><small>$ 125.30</small></a>-->
                                            
                         @endforeach
                    @endif
                                            </figure>
                                            <figure>
                                                <figcaption><strong>Subtotal</strong><strong>₹&nbsp{{ $total }}</strong></figcaption>
                                            </figure>
                           
                                            
                                            
                                            <!--<figure class="ps-block__shipping">-->
                                            <!--    <h3>Shipping</h3>-->
                                            <!--    <p>Calculated at next step</p>-->
                                            <!--</figure>-->
                                            	@if (count((array) session('cart')) !=0)
                                            	 <button class="ps-btn ps-btn--fullwidth" type="submit"> Place Order</button>
                    

        <!--                @if (Auth::user() != Null)-->
        <!--                @if (Auth::user()->email_verified_at != Null) -->
        <!--             <button class="ps-btn ps-btn--fullwidth" type="submit"> Place Order</button>-->
        <!--                 @else-->
        <!--                <a class="ps-btn ps-btn--fullwidth" href="{{ route('login') }}">Place Order</a>-->
						  <!--@endif-->
						  <!-- @else-->
        <!--                <a class="ps-btn ps-btn--fullwidth" href="{{ route('login') }}">Place Order</a>-->
					
        <!--                  @endif-->

					     @else
                         <a class="ps-btn ps-btn--fullwidth" href="{{ route('shop',6) }}">Car is Empty</a>
						@endif
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>

    </main>



						
						@endsection
