@extends('admin.layouts.app')

@section('title', 'Products')

@section('content')

    <div class="main-container">

        <div class="row gutters">
            <div class="col-md-12 mb-2">
                @include('admin.layouts.alert')
            </div>

            <div class="col-xs-12 mb-2">
                <a href="{{ route('dashboard', 'product') }}" class="btn btn-primary">Back</a>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">
                    ADD Ingredients
                </button>
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
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                   

                                    <!--<th>Product</th>-->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $ingredient)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        
                                          @if($ingredient->product!=0)
                                        @foreach ($products as $product)
                                        @if ($product->id == $ingredient->product)
                                        <td>{{ $product->name }}</td>
                                        @endif
                                        @endforeach
                                        @else
                                         <td> </td>
                                        @endif
                                        <td>{{ $ingredient->title}}</td>
                                      
                                      
                                         <td> <img src="{{ asset('/storage/' . $ingredient->image) }}"
                                            style="width: 100px; height: 50px"></td>

                                        <td>



                                          <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#edit{{ $ingredient->id }}">Edit</button>

                                            <a class="delete_btn btn btn-danger btn-block" data-action="{{ $ingredient->id }}" message="Delete the Ingredient">
                                                Delete
                                            </a>

                                            <form style="display: none" id="{{ $ingredient->id }}" method="post"
                                                action="{{ route('ingredient.destroy', $ingredient->id ) }}">
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

    <div class="modal fade" id="add" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('ingredient.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="status" value="none">

                    <div class="modal-body">
                        <div class="form-group row">

                            <div class="col-md-6 mb-3">
                                <label>Category</label>
                                <select name="game" class="form-control" required onchange="getsubCats(this.value)">
                                    <option value="">Select Category</option>
                                    @foreach ($games as $game)
                                        <option value="{{ $game->id }}"  >
                                            {{ $game->title }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('game')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <script>
                                function getsubCats(catid) {
                                    if (catid != '') {
                                        $('#sub_cat').empty().append($("<option></option>")
                                            .attr("value", '').text('Select  Category'));

                                        var action = '{{ route('getsubCat', ':id') }}';
                                        action = action.replace(':id', catid);
                                        $.ajax({
                                            url: action,
                                            type: "get",
                                            dataType: 'json',
                                            success: function(response) {
                                                $.each(response.subcat, function(key, value) {
                                                    console.log(value);
                                                    $('#sub_cat').append($("<option></option>")
                                                        .attr("value", value.id).text(value.title));
                                                });
                                            }
                                        });
                                    }
                                }
                                
                                 function getsubsubCats(subcatid) {
                                    if (subcatid != '') {
                                        $('#productid').empty().append($("<option></option>")
                                            .attr("value", '').text('Select  SubCategory'));

                                        var action = '{{ route('getsubsubCat', ':id') }}';
                                        action = action.replace(':id', subcatid);
                                        $.ajax({
                                            url: action,
                                            type: "get",
                                            dataType: 'json',
                                            success: function(response) {
                                                $.each(response.productid, function(key, value) {
                                                    console.log(value);
                                                    $('#productid').append($("<option></option>")
                                                        .attr("value", value.id).text(value.name));
                                                });
                                            }
                                        });
                                    }
                                }
                            </script>


<div class="col-md-6 mb-3">
    <label>Sub Category</label>
    <select name="category" class="form-control"  onchange="getsubsubCats(this.value)" id="sub_cat" required >
        <option value="">Select Category</option>
    </select>
</div>
<div class="col-md-6 mb-3">
    <label>Product</label>
    <select name="product" class="form-control"   id="productid" required >
        <option value="">Select Subcategory</option>
    </select>
</div>




                            <div class="col-md-6 mb-3">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" value="{{ old('title') }}" required>
                                @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                                <div class="col-md-6 mb-3">
                                <label>Alt</label>
                                <input type="text" class="form-control" name="alt"
                                    value="{{ old('alt') }}" >
                                @error('alt')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>


                            <div class="col-md-6 mb-3">
                                <label>Image (800px * 800px)</label>
                                <input type="file" class="form-control" name="image" required>
                                @error('image')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>



                        </div>
                    </div>
  
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    
    
    
    @foreach ($datas as $ingredient)
    <div class="modal fade" id="edit{{ $ingredient->id }}" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Ingredient</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('ingredient.update', $ingredient->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                       @method('PUT')
                    <div class="modal-body">
                        <div class="form-group row">
                            {{-- <div class="col-md-6 mb-3">
                                <label>Category</label>
                                <select name="category" class="form-control" required>
                                    <option value="">Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $category->id == $ingredient->cat_id ? 'selected' : '' }}>
                                            {{ $category->title }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category')<span class="text-danger">{{ $message }}</span>@enderror
                            </div> --}}



<div class="col-md-6 mb-3">
    <label>Product</label>
    <select name="product" class="form-control"   id="productid" required >
                        @foreach ($products as $product)
                                        @if ($product->id == $ingredient->product)
                                            <option value="{{ $product->id }}"
                                                {{ $product->id == $ingredient->product ? 'selected' : '' }}>
                                                {{ $product->name }}
                                            </option>
                                        @endif
                                    @endforeach
    </select>
</div>



                            <div class="col-md-12 mb-3">
                                <label>Title </label>
                                <input type="text" class="form-control" name="title" value="{{ $ingredient->title }}">
                                @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
 <div class="col-md-6 mb-3">
                                    <label>alt</label>
                                    <input type="text" class="form-control" name="alt"
                                        value="{{ $ingredient->alt }}">
                                    @error('alt')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            <div class="col-md-6 mb-3">
                                <label>Image (800px * 800px)</label>
                                <input type="file" class="form-control" name="image">
                                @error('image')<span class="text-danger">{{ $message }}</span>@enderror
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
        function getsubCats{{ $ingredient->id }}(catid) {
            if (catid != '') {
                $('#sub_cat{{ $ingredient->id }}').empty().append($("<option></option>")
                    .attr("value", '').text('Select  Category'));;

                var action = '{{ route('getsubCat', ':id') }}';
                action = action.replace(':id', catid);
                $.ajax({
                    url: action,
                    type: "get",
                    dataType: 'json',
                    success: function(response) {
                        $.each(response.subcat, function(key, value) {
                            console.log(value);
                            $('#sub_cat{{ $ingredient->id }}').append($("<option></option>")
                                .attr("value", value.id).text(value.title));
                        });
                    }
                });
            }
        }





    function getsubsubCats{{ $ingredient->id }}(subcatid) {
        if (subcatid != '') {
            $('#subsub_cat{{ $ingredient->id }}').empty().append($("<option></option>")
                .attr("value", '').text('Select SubCategory'));

            var action = '{{ route('getsubsubCat', ':id') }}';
            action = action.replace(':id', subcatid);
            $.ajax({
                url: action,
                type: "get",
                dataType: 'json',
                success: function(response) {
                    $.each(response.subsubcat, function(key, value) {
                        console.log(value);
                        $('#subsub_cat{{ $ingredient->id }}').append($("<option></option>")
                            .attr("value", value.id).text(value.subtitle));
                    });
                }
            });
        }
    }


    </script>



@endforeach


@endsection
