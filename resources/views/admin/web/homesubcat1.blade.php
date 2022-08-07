@extends('admin.layouts.app')

@section('title', 'Home Category1')

@section('content')

    <div class="main-container">

        <div class="row gutters">
            <div class="col-md-12 mb-2">
                @include('admin.layouts.alert')
            </div>

            <div class="col-xs-12 mb-2">
                <a href="{{ route('dashboard', 'web') }}" class="btn btn-primary">Back</a>
                <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">-->
                <!--    ADD homecats-->
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

                                    <th>Category</th>
                                    <th>Sub Category</th>
                                     <th>Product</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                              
                                @foreach ($datas as $homecat)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        @foreach ($games as $game)
                                        @if ($game->id == $homecat->cat_id)
                                        <td>{{ $game->title }}</td>
                                        @endif
                                        @endforeach


                                        @if($homecat->subcat_id!=0)
                                        @foreach ($subcategories as $subcategory)
                                        @if ($subcategory->id == $homecat->subcat_id)
                                        <td>{{ $subcategory->title }}</td>
                                        @endif
                                        @endforeach
                                        @else
                                         <td> </td>
                                        @endif
                                        
                                         @if($homecat->Product_id!=0)
                                        @foreach ($products as $product)
                                        @if ($homecat->Product_id == $product->id)
                                        <td>{{ $product->name }}</td>
                                        @endif
                                        @endforeach
                                        @else
                                         <td> </td>
                                        @endif


                                        <!--<td>{{ $homecat->Product_id}}</td>-->
                                     


                                        <td>



                                          <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#edit{{ $homecat->id }}">Edit</button>

                                            <!--<a class="delete_btn btn btn-danger btn-block" data-action="{{ $homecat->id }}" message="Delete the homecat">-->
                                            <!--    Delete-->
                                            <!--</a>-->

                                            <!--<form style="display: none" id="{{ $homecat->id }}" method="post"-->
                                            <!--    action="{{ route('homecat1.destroy', $homecat->id ) }}">-->
                                            <!--    @csrf @method('delete')-->
                                            <!--</form>-->
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


@foreach ($datas as $homecats)
    <div class="modal fade" id="edit{{ $homecats->id }}" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Home Category1</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('homesubcat1s.update', $homecats->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="modal-body">
                        <div class="form-group row">
                            {{-- <div class="col-md-6 mb-3">
                                <label>Category</label>
                                <select name="category" class="form-control" required>
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $category->id == $homecats->cat_id ? 'selected' : '' }}>
                                            {{ $category->title }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category')<span class="text-danger">{{ $message }}</span>@enderror
                            </div> --}}

                            <div class="col-md-4 mb-3">
                                <label>Category</label>
                                <select name="game" class="form-control" required
                                    onchange="getsubCats{{ $homecats->id }}(this.value)">
                                    <option value="">Select Category</option>
                                    @foreach ($games as $game)
                                        <option value="{{ $game->id }}"
                                            {{ $game->id == $homecats->cat_id  ? 'selected' : '' }}>
                                            {{ $game->title }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label>Sub Category</label>
                                <select name="category" class="form-control" required  onchange="getproduct{{ $homecats->id }}(this.value)" 
                                    id="sub_cat{{ $homecats->id }}">
                                    <option value="">Select Category</option>
                                    @foreach ($subcategories as $category)
                                        @if ($category->id == $homecats->subcat_id)
                                            <option value="{{ $category->id }}"
                                                {{ $category->id == $homecats->subcat_id ? 'selected' : '' }}>
                                                {{ $category->title }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('category')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                           <div class="col-md-4 mb-3">
                                <label>Product</label>
                                <select name="product" onchange="" class="form-control" required
                                    id="product{{ $homecats->id }}">
                                    <option value="">Select sub Category</option>
                                    @foreach ($products as $product)
                                        @if ($homecats->subcat_id == $product->subcat_id)
                                            <option value="{{ $product->id }}"
                                                {{ $product->id == $homecats->Product_id ? 'selected' : '' }}>
                                                {{ $product->name }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('product')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                           

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="case" value="insert">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function getsubCats{{ $homecats->id }}(catid) {
            if (catid != '') {
                $('#sub_cat{{ $homecats->id }}').empty().append($("<option></option>")
                    .attr("value", '').text('Select  Category'));;
                       $('#product{{ $homecats->id }}').empty().append($("<option></option>")
                .attr("value", '').text('Select SubCategory'));


                var action = '{{ route('getsubCat', ':id') }}';
                action = action.replace(':id', catid);
                $.ajax({
                    url: action,
                    type: "get",
                    dataType: 'json',
                    success: function(response) {
                        $.each(response.subcat, function(key, value) {
                            console.log(value);
                            $('#sub_cat{{ $homecats->id }}').append($("<option></option>")
                                .attr("value", value.id).text(value.title));
                        });
                    }
                });
            }
        }





    function getproduct{{ $homecats->id }}(subcatid) {
        if (subcatid != '') {
            $('#product{{ $homecats->id }}').empty().append($("<option></option>")
                .attr("value", '').text('Select SubCategory'));

            var action = '{{ route('getproducts', ':id') }}';
            action = action.replace(':id', subcatid);
            $.ajax({
                url: action,
                type: "get",
                dataType: 'json',
                success: function(response) {
                    $.each(response.productid, function(key, value) {
                        console.log(value);
                        $('#product{{ $homecats->id }}').append($("<option></option>")
                            .attr("value", value.id).text(value.name));
                    });
                }
            });
        }
    }


    </script>



@endforeach

@endsection
