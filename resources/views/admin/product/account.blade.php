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
                    ADD Products
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

                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Sub Category</th>
                                    <!--<th>brand</th>-->
                                    <th>Rate</th>
                                    <th>Offer</th>
                                    <th>Current Rate</th>
                                     <th>image</th>
                                    <!--<th>Description</th>-->
                                    <!--<th>Specification</th>-->

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $account)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $account->name}}</td>
                                        @foreach ($games as $game)
                                        @if ($game->id == $account->cat_id)
                                        <td>{{ $game->title }}</td>
                                        @endif
                                        @endforeach


                                        @if($account->subcat_id!=0)
                                        @foreach ($subcategories as $subcategory)
                                        @if ($subcategory->id == $account->subcat_id)
                                        <td>{{ $subcategory->title }}</td>
                                        @endif
                                        @endforeach
                                        @else
                                         <td> </td>
                                        @endif





                                        <td>{{ $account->rate}}</td>
                                        <td>{{ $account->offer }}</td>
                                        <td>{{ $account->offer_rate }}</td>
                                         <td> <img src="{{ asset('/storage/' . $account->image) }}"
                                            style="width: 100px; height: 50px">
                                            
                                             <img src="{{ asset('/storage/' . $account->image2) }}"
                                            style="width: 100px; height: 50px">
                                            
                                             <img src="{{ asset('/storage/' . $account->image3) }}"
                                            style="width: 100px; height: 50px">
                                            
                                             <img src="{{ asset('/storage/' . $account->image4) }}"
                                            style="width: 100px; height: 50px">
                                            </td>
                                        <!--<td> {!! substr( $account->description,0,150) !!}...</td>-->
                                        <!--<td>{!! substr( $account->specification,0,150) !!}... </td>-->




                                        <td>



                                          <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#edit{{ $account->id }}">Edit</button>

                                            <a class="delete_btn btn btn-danger btn-block" data-action="{{ $account->id }}" message="Delete the Product">
                                                Delete
                                            </a>

                                            <form style="display: none" id="{{ $account->id }}" method="post"
                                                action="{{ route('accounts.destroy', $account->id ) }}">
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

                <form action="{{ route('accounts.store') }}" method="post" enctype="multipart/form-data">
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
                            </script>


<div class="col-md-6 mb-3">
    <label>Sub Category</label>
    <select name="category" class="form-control"  onchange="getsubsubCats(this.value)" id="sub_cat" required >
        <option value="">Select Category</option>
    </select>
</div>




                            <div class="col-md-6 mb-3">
                                <label>Name</label>
                                <input type="text" class="form-control" name="title" value="{{ old('title') }}" required>
                                @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Image1 ( 202 * 202 px)</label>
                                <input type="file" class="form-control" name="image1" required>
                                @error('image1')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                         <div class="col-md-6 mb-3">
                                <label>Image2 ( 202 * 202 px)</label>
                                <input type="file" class="form-control" name="image2" required>
                                @error('image2')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            
                            
                              <div class="col-md-6 mb-3">
                                <label>Image3 ( 202 * 202 px)</label>
                                <input type="file" class="form-control" name="image3" required>
                                @error('image3')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            
                              <div class="col-md-6 mb-3">
                                <label>Image4 ( 202 * 202 px)</label>
                                <input type="file" class="form-control" name="image4" required>
                                @error('image4')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
 
                                       <div class="col-md-6 mb-3">
                                <label>Alt</label>
                                <input type="text" class="form-control" name="alt"
                                    value="{{ old('alt') }}" >
                                @error('alt')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>


                            <div class="col-md-6 mb-3">
                                <label>Price</label>
                                <input type="number" id="rate" onkeyup="cal(this.value)" class="form-control" name="price" value="{{ old('price') }}" required>
                                @error('price')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Offer %</label>
                                <input type="number" id="offer"  onkeyup="calc(this.value)" min="0" max="100" class="form-control" name="offer" value="{{ old('offer', 0) }}" required>
                                @error('offer')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-md-6 mb-3">
	                    	<label class="">Current Rate</label>
	                        <input type="text" id="current_rate" class="form-control" name="current_rate" readonly>
	                    	</div>

                            <div class="col-md-12 mb-3">
                                <label>Description</label>
                                <textarea class="form-control summernote" name="description" value="{{ old('description') }}" required></textarea>
                                @error('description')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label>Ingredient</label>
                                <textarea class="form-control summernote" name="ingredient" value="{{ old('ingredient') }}" required></textarea>
                                @error('ingredient')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label>Benefits</label>
                                <textarea class="form-control summernote" name="benefits" value="{{ old('benefits') }}" required></textarea>
                                @error('benefits')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>


                            <div class="col-md-12 mb-3">
                                <label>How To use</label>
                                <textarea class="form-control summernote" name="howtouse" value="{{ old('howtouse') }}" required></textarea>
                                @error('howtouse')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label>For Best Result</label>
                                <textarea class="form-control summernote" name="forbestresult" value="{{ old('forbestresult') }}" required></textarea>
                                @error('forbestresult')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>


                        </div>
                    </div>
   <script type="text/javascript">
		function calc(val) {
		var rate = $('#rate').val();
		var orate = rate * (val/100);
		var crate = rate - orate;
		$('#offer_rate').val(orate);
		$('#current_rate').val(crate);
		}

		function cal(val1) {
		var offer = $('#offer').val();
		if(offer != '') {
		var orate1 = val1 * (offer/100);
		var crate1 = val1 - orate1;
		$('#offer_rate').val(orate1);
		$('#current_rate').val(crate1);
		}
		else{
		$('#current_rate').vall;
			}
		}

		function round() {
		var current_rate = $('#current_rate').val();
		if(current_rate != '') {
		$('#current_rate').val(Math.trunc(current_rate));
		}
		}
		</script>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

     @include('admin.product.edit')
@endsection
