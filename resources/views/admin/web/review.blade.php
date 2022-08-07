@extends('admin.layouts.app')

@section('title', 'Website review')

@section('content')

    <div class="main-container">

        <div class="row gutters mb-3">
            <div class="col-md-12 mb-2">
                @include('admin.layouts.alert')
            </div>

            <div class="col-xs-2 mb-2">
                <a href="{{ route('dashboard', 'product') }}" class="btn btn-primary">Back</a>
                <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">-->
                <!--    ADD NEW-->
                <!--</button>-->
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
                                    <th>Product</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Review</th>
                                    <th>Rating</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reviews as $review)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                           <td>  @foreach ($products as $product)
                                                    @if($product->id==$review->pid)
                                                    
                                                    {{ $product->name }}
                                                    
                                                    @endif
                                           
                                                 @endforeach
                                               
                                               </td>
                                        <td>{{ $review->name }}</td>
                                        <td>{{ $review->email }}</td>
                                         <td>{{ $review->review }}</td>
                                         
                                           <td>{{ $review->rating }}</td>
                                       
                                        <td>
                                            <!--<button type="button" class="btn btn-primary btn-block" data-toggle="modal"-->
                                            <!--    data-target="#edit{{ $review->id }}">Edit</button>-->

                                            <a class="delete_btn btn btn-danger btn-block" data-action="{{ $review->id }}"
                                                message="Delete the review">
                                                Delete
                                            </a>

                                            <form style="display: none" id="{{ $review->id }}" method="post"
                                                action="{{ route('reviews.destroy', $review->id ) }}">
                                                @csrf @method('delete')
                                            </form>
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

 
@endsection
