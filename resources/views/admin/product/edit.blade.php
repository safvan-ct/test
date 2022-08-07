@foreach ($datas as $accounts)
    <div class="modal fade" id="edit{{ $accounts->id }}" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('accounts_update', $accounts->id) }}" method="post"
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
                                            {{ $category->id == $accounts->cat_id ? 'selected' : '' }}>
                                            {{ $category->title }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category')<span class="text-danger">{{ $message }}</span>@enderror
                            </div> --}}

                            <div class="col-md-4 mb-3">
                                <label>Category</label>
                                <select name="game" class="form-control" required
                                    onchange="getsubCats{{ $accounts->id }}(this.value)">
                                    <option value="">Select Category</option>
                                    @foreach ($games as $game)
                                        <option value="{{ $game->id }}"
                                            {{ $game->id == $accounts->cat_id  ? 'selected' : '' }}>
                                            {{ $game->title }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label>Sub Category</label>
                                <select name="category" onchange="" class="form-control" required
                                    id="sub_cat{{ $accounts->id }}">
                                    <option value="">Select Category</option>
                                    @foreach ($subcategories as $category)
                                        @if ($category->id == $accounts->subcat_id)
                                            <option value="{{ $category->id }}"
                                                {{ $category->id == $accounts->subcat_id ? 'selected' : '' }}>
                                                {{ $category->title }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('category')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>





                            <div class="col-md-12 mb-3">
                                <label>Name </label>
                                <input type="text" class="form-control" name="title" value="{{ $accounts->name }}">
                                @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <!--<div class="col-md-6 mb-3">-->
                            <!--        <label>alt</label>-->
                            <!--        <input type="text" class="form-control" name="alt"-->
                            <!--            value="{{ $accounts->alt }}">-->
                            <!--        @error('alt')<span class="text-danger">{{ $message }}</span>@enderror-->
                            <!--    </div>-->


                            <div class="col-md-6 mb-3">
                                <label>Image1 ( 800 * 800 px)</label>
                                <input type="file" class="form-control" name="image1">
                                @error('image1')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                    <label>alt</label>
                                    <input type="text" class="form-control" name="alt"
                                        value="{{ $accounts->alt }}">
                                    @error('alt')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>

                             <div class="col-md-6 mb-3">
                                <label>Image2 ( 800 * 800 px)</label>
                                <input type="file" class="form-control" name="image2">
                                @error('image2')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                    <label>alt</label>
                                    <input type="text" class="form-control" name="alt"
                                        value="{{ $accounts->alt }}">
                                    @error('alt')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>


                            <div class="col-md-6 mb-3">
                                <label>Image3 ( 800 * 800 px)</label>
                                <input type="file" class="form-control" name="image3">
                                @error('image3')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                    <label>alt</label>
                                    <input type="text" class="form-control" name="alt"
                                        value="{{ $accounts->alt }}">
                                    @error('alt')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>


                         <div class="col-md-6 mb-3">
                                <label>Image4 ( 800 * 800 px)</label>
                                <input type="file" class="form-control" name="image4">
                                @error('image4')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        <div class="col-md-6 mb-3">
                                    <label>alt</label>
                                    <input type="text" class="form-control" name="alt"
                                        value="{{ $accounts->alt }}">
                                    @error('alt')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>


                            <div class="col-md-12 mb-3">
                                <label>Description</label>
                                <textarea class="form-control summernote" name="description" value="{{ old('description') }}" required style="height: auto">{{ $accounts->description }}</textarea>
                                @error('description')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>




                             <div class="col-md-4 mb-3">
                                <label>Price</label>
                                <input type="number" id="rates{{ $accounts->id }}" onkeyup="cal_edit{{ $accounts->id }}(this.value)" class="form-control" name="price" value="{{ $accounts->rate }}" required>
                                @error('price')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label>Offer %</label>
                                <input type="number" id="offers{{ $accounts->id }}"  onkeyup="calc_edit{{ $accounts->id }}(this.value)" min="0" max="100" class="form-control" name="offer" value="{{  $accounts->offer }}" required>
                                @error('offer')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-md-4 mb-3">
	                    	<label class="">Current Rate</label>
	                        <input type="text" id="current_rate11{{ $accounts->id }}" class="form-control" name="current_rate" value="{{  $accounts->offer_rate }}"  readonly>
	                    	</div>

                            <div class="col-md-12 mb-3">
                                <label>Ingredient</label>
                                <textarea class="form-control summernote" name="ingredient" value="{{ old('ingredient') }}" required>{{ $accounts->ingredient }}</textarea>
                                @error('ingredient')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label>Benefits</label>
                                <textarea class="form-control summernote" name="benefits" value="{{ old('benefits') }}" required>{{ $accounts->benefits }}</textarea>
                                @error('benefits')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>


                            <div class="col-md-12 mb-3">
                                <label>How To use</label  >
                                <textarea class="form-control summernote" name="howtouse" value="{{ old('howtouse') }}" required>{{ $accounts->howtouse }}</textarea>
                                @error('howtouse')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label>For Best Result</label>
                                <textarea class="form-control summernote" name="forbestresult" value="{{ old('forbestresult') }}" required>{{ $accounts->forbestresult }}</textarea>
                                @error('forbestresult')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>


                        </div>
                    </div>

    <script type="text/javascript">
      function calc_edit{{ $accounts->id }}(val) {

        var rate = $('#rates{{ $accounts->id }}').val();
        var orate = rate * (val/100);
        var crate = rate - orate;

        $('#offer_rate').val(orate);
        $('#current_rate11{{ $accounts->id }}').val(crate);
      }

      function cal_edit{{ $accounts->id }}(val1) {
        var offer = $('#offers{{ $accounts->id }}').val();
        if(offer != '') {
          var orate1 = val1 * (offer/100);
          var crate1 = val1 - orate1;
          $('#offer_rate').val(orate1);
          $('#current_rate11{{ $accounts->id }}').val(crate1);
        }
      }


    </script>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="case" value="insert">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function getsubCats{{ $accounts->id }}(catid) {
            if (catid != '') {
                $('#sub_cat{{ $accounts->id }}').empty().append($("<option></option>")
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
                            $('#sub_cat{{ $accounts->id }}').append($("<option></option>")
                                .attr("value", value.id).text(value.title));
                        });
                    }
                });
            }
        }





    function getsubsubCats{{ $accounts->id }}(subcatid) {
        if (subcatid != '') {
            $('#subsub_cat{{ $accounts->id }}').empty().append($("<option></option>")
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
                        $('#subsub_cat{{ $accounts->id }}').append($("<option></option>")
                            .attr("value", value.id).text(value.subtitle));
                    });
                }
            });
        }
    }


    </script>



@endforeach
