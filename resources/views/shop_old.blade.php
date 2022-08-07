@extends('layouts.app')

@section('title', 'Shop')

@section('content')

    <style>
        .page-link {
            color: #F8796C !important;
        }

        .page-item.active .page-link {
            background-color: #F8796C !important;
            border-color: #F8796C;
        }

        .page-item.active .page-link {
            color: #fff !important;
        }

    </style>


  <!-- Start Page Title Area -->
  <section class="page-title-area page-title-bg1">
    <div class="container">
        <div class="page-title-content">
            <h1 title="Account List">Account List</h1>
        </div>
    </div>
</section>
<!-- End Page Title Area -->

<!-- Start Products Area -->
<section class="products-area ptb-100">
    <div class="container">
  @foreach ($accounts as $account )
  @endforeach


     <form action="{{ route('shop_sort') }}" method="post">
        @csrf
        <div class="zelda-grid-sorting row align-items-center">
           <div class="col-lg-6 col-md-6 result-count">
                <p style="color:#050c03;">Showing 1–8 of 12 results</p>
            </div>

            <div class="col-lg-6 col-md-6 ordering">
                <div class="select-box">
                    <label>Sort By:</label>
                    <select onchange="submit();" name="sort">
                        <option value="">Select</option>
                        <option value="low">Price: low to high</option>
                        <option value="high">Price: high to low</option>
                    </select>
                </div>
            </div>
        </div>

        </form>



         <div class="row">
            @foreach ($accounts as $account )

            @if($account->credential == "Yes")

              <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="single-products-item">
                <div class="products-image">
                    <div class="bg-image" style="width:283px;height:422px">

                    </div>

                   <a href="{{ route('account_details',$account->id) }}" > <img src="{{ asset('/storage/' . $account->image) }}" alt="image" class="main-image"></a>


                     <p class="btn-holder"><a href="{{ route('add.to.cart', $account->id) }}" class="add-to-cart-btn" role="button">Add to cart</a> </p>

                </div>

                <div class="products-content">
                    <h3><a href="{{ route('account_details',$account->id) }}">{{ $account->name}}</a></h3>
                     <span class="price" style="">{{ $account->title}}</span>

                   @if($account->offer==0)
                    <span class="price" style="">${{ $account->rate}}</span>
                    @else
                    <span class="price" style=""> <s style="color:red;font-style: italic;"><span style="color:#24bf00">${{ $account->rate}}</span></s> &nbsp${{ $account->offer_rate}}</span>

                    @endif

                </div>
            </div>
            </div>
                 @else

                <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="single-products-item">
                <div class="products-image"  style="width:283px;height:300px;margin-top: 55px;background-color: green; opacity: 0.1;">

                    <div class="bg-image"  >
                       <a href="single-products.php" > </a>
                    </div>

                   <a href="" > <img src="{{ asset('/storage/' . $account->image) }}" alt="image" class="main-image"></a>




                       </div>

                 <div style="  position: absolute;top: 35%; left: 50%;transform: translate(-50%, -50%);font-size: 26px;color: green;">Sold Out</div>

                <div class="products-content"></br></br></br>
                    <h3><a href="">{{ $account->name}}</a></h3>
                     <span class="price" style="">{{ $account->title}}</span>

                     @if($account->offer==0)
                    <span class="price" style="">${{ $account->rate}}</span>
                   @else
                     <span class="price" style=""><s style="color:red;font-style: italic;"><span style="color:#24bf00">${{ $account->rate}}</span></s> &nbsp${{ $account->offer_rate}}</span>

                   @endif

                </div>
            </div>
            </div>

                 @endif


                  @endforeach



        </div>
    </div>

</section>
<!-- End Products Area -->
@endsection
