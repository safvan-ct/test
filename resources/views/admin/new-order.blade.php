@extends('admin.layouts.app')

@section('title', 'New Orders')

@section('content')

    <div class="main-container">

        <div class="row gutters mb-3">
            <div class="col-md-12 mb-2">
                @include('admin.layouts.alert')
            </div>

            <div class="col-xs-2 mb-2">
                <a href="{{ route('dashboard') }}" class="btn btn-primary">Back</a>
            </div>
        </div>

        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="table-container">
                    <div class="table-responsive">
                        <table id="copy-print-csv" class="table custom-table">
                            <thead>
                                <tr>
                                    <th>#</th>
													<th>User</th>
													<th>Billing Address</th>
													<th>purchased_Date</th>
													<th>Paymentid</th>
												

													<th>Details</th>
                                </tr>
                            </thead>

                            <tbody>
                               
                                @foreach ($orders as $order1)
                                 @php
                                	$pname = trim(str_replace(array(','), ' ', $order1->product));
                                @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        
                                        <td>
                                            @if($order1->user_id ==NULL)
                                            Guest
                                        
                                                @else
                                                 @foreach ($users as $user)
                                                   @if($user->id==$order1->user_id)
                                                   {{$user->email}}
                                                   @endif
                                                 @endforeach
                                                
                                            @endif
                                            
                                          </td>
                                        <td>{{ $order1->first_name }}{{ $order1->last_name }}</br>
                                        {{ $order1->address }}</br>{{ $order1->city }}</br>
                                        {{ $order1->state }}</br>{{ $order1->postcode }}
                                        </br>{{ $order1->phone }}
                                        </td>
                                        <td>{{ date('m-d-Y', strtotime($order1->date)) }}</td>
                                        <td>
                                            {{ $order1->payment_id }}
                                        </td>
                                       

                                        <td> <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target=".bd-example-modal-lg1{{ $order1->id }}">Details</button>
                                            
                                            @if($order1->status=="new")
                                           <a href="{{ route('order.status', [$order1->id, "shipped"]) }}"> <button type="button" class="btn btn-warning">Ship</button></a>
                                            @elseif($order1->status=="shipped")
                                            <a href="{{ route('order.status', [$order1->id, "delivered"]) }}"> <button type="button" class="btn btn btn-success">Deliver</button></a>
                                              @elseif($order1->status=="delivered")
                                              <p>Delivered</p>
                                            @endif
                                            
                                            </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach ($orders as $order)
    <div class="modal fade bd-example-modal-lg1{{ $order->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header bg-whitesmoke mb-4">


                    <h5 class="modal-title" id="myLargeModalLabel">Order Details</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>


                </div>

                <form action="#" method="" >

                    <table class="table" style="overflow-y: auto;">
                        <thead class="thead-primary">
                            <tr class="text-center">
                                <th>Sl No.</th>
                                <th>Product</th>

                                <th> Price</th>
                                <th>Quantity</th>
                                <th>Total</th>



                            </tr>
                        </thead>
                        <tbody>
                            @php

                         $quan = explode(',', $order->pquantity);
                     
                        $product_id = explode(',', $order->pid);
                       
                        $i=-1;
                        $n=0;
                        @endphp
                       
                    
                    @foreach ($product_id as $product_id)

                        @if ( $product_id !='')

                           @php
                              $i++;
                             
                           @endphp

                                        @foreach ($products as $product)

                                        @if ( $product_id==$product->id)

                                        @php
                                        $n++;
                                       
                                       @endphp


                                        <tr class="text-center">
                                        <td class="quantity">{{ $n}} </td>
                            <td class="quantity">  {{$product->name}}</h3> </td>
                            <td class="quantity"> {{ $product->offer_rate}}</h3> </td>
                                            <td class="quantity">  {{$quan[$i]}}</h3> </td>
                                        <td class="quantity"> {{$product->offer_rate*$quan[$i]}}</h3> </td>

                                </tr>
                                @else
                                
                                @endif

                                @endforeach
                                @endif
                                @endforeach



        </tbody>


    </table>
    <p style="align:right"></p>

    <div class="modal-footer bg-whitesmoke br">
    <b>Grand Total:{{ $order->pay_amount}}</b> &nbsp &nbsp
    <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
</form>
<!--End Add Data Form-->
</div>
</div>
</div>
@endforeach
@endsection
