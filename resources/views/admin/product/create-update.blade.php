@extends('admin.layouts.app')

@section('title', 'Products')

@section('content')

    <div class="main-container">

        <div class="row gutters">
            <div class="col-md-12 mb-2">
                @include('admin.layouts.alert')
            </div>

            <div class="col-xs-12 mb-2">
                <a href="{{ route('product.index') }}" class="btn btn-primary">Back</a>
            </div>
        </div>

        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">{{ is_null($product->id) ? 'New' : 'Update' }} Product</h5>

                    <form action="{{ route('product.create.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <input type="hidden" value="{{ $product->id }}" name="id">

                            <div class="col-md-6 mb-3">
                                <label>Category</label>
                                <select name="category_id" class="form-control" onchange="getsubCats(this.value)">
                                    <option value="">Select Category</option>
                                    @foreach (categories() as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('category_id', $product->category_id) == $item->id ? 'selected' : '' }}>
                                            {{ $item->title }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Sub Category</label>
                                <select name="sub_category_id" class="form-control" id="sub_category_id">
                                    <option value="">Select Sub Category</option>
                                    @if (!is_null($product->id))
                                        @foreach (subCategories() as $item)
                                            <option value="{{ $item->id }}"
                                                {{ old('sub_category_id', $product->sub_category_id) == $item->id ? 'selected' : '' }}>
                                                {{ $item->title }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('sub_category_id')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name"
                                    value="{{ old('name', $product->name) }}">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Price</label>
                                <input type="number" id="price" onkeyup="offerPrice()" class="form-control"
                                    name="price" value="{{ old('price', $product->price) }}">
                                @error('price')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Offer %</label>
                                <input type="number" id="offer" onkeyup="offerPrice()" min="0" max="100"
                                    class="form-control" name="offer" value="{{ old('offer', $product->offer) }}">
                                @error('offer')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="">Offer Price</label>
                                <input type="text" id="offer_price" class="form-control" name="offer_price" readonly
                                    value="{{ old('offer_price', $product->offer_price) }}">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Image1 ( 202 * 202 px)</label>
                                <input type="file" class="form-control" name="image1" accept="image/*">
                                @error('image1')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Image2 ( 202 * 202 px)</label>
                                <input type="file" class="form-control" name="image2" accept="image/*">
                                @error('image2')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Image3 ( 202 * 202 px)</label>
                                <input type="file" class="form-control" name="image3" accept="image/*">
                                @error('image3')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Image4 ( 202 * 202 px)</label>
                                <input type="file" class="form-control" name="image4" accept="image/*">
                                @error('image4')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="">Yotube Link</label>
                                <input type="text" id="youtube_link" class="form-control" name="youtube_link"
                                    value="{{ old('youtube_link', $product->youtube_link) }}">
                            </div>

                            {{-- <div class="col-md-6 mb-3">
                                <iframe width="100" height="100" src="{{ $product->youtube_link }}"></iframe>
                            </div> --}}

                            <div class="col-md-12 mb-3">
                                <label>Description</label>
                                <textarea class="form-control summernote" name="description">{{ old('description', $product->description) }}</textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label>Ingredient</label>
                                <textarea class="form-control summernote" name="ingredient">{{ old('ingredient', $product->ingredient) }}</textarea>
                                @error('ingredient')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label>Benefits</label>
                                <textarea class="form-control summernote" name="benefits">{{ old('benefits', $product->benefits) }}</textarea>
                                @error('benefits')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="col-md-12 mb-3">
                                <label>How To use</label>
                                <textarea class="form-control summernote" name="how_to_use">{{ old('how_to_use', $product->how_to_use) }}</textarea>
                                @error('how_to_use')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label>For Best Result</label>
                                <textarea class="form-control summernote" name="for_best_result">{{ old('for_best_result', $product->for_best_result) }}</textarea>
                                @error('for_best_result')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <button type="submit"
                                    class="btn btn-primary float-right">{{ is_null($product->id) ? 'Save' : 'Update' }}</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function getsubCats(catid) {
            if (catid != '') {
                $('#sub_category_id').empty().append($("<option></option>").attr("value", '').text('Select Sub Category'));

                var url = "{{ route('getsubCat', ['ID']) }}";
                url = url.replace(/ID/g, catid);

                $.ajax({
                    url: url,
                    type: "get",
                    dataType: 'json',
                    success: function(response) {
                        $.each(response.subcat, function(key, value) {
                            $('#sub_category_id').append($("<option></option>").attr("value", value.id)
                                .text(value.title));
                        });
                    }
                });
            }
        }

        function offerPrice() {
            var price = $('#price').val() == '' ? 0 : $('#price').val();
            var offer = $('#offer').val() == '' ? 0 : $('#offer').val();
            var offer_price = price;
            if (offer != 0) {
                offer_price = price - price * (offer / 100);
            }
            $('#offer').val(offer);
            $('#offer_price').val(offer_price);
        }

        function round() {
            var offer_price = $('#offer_price').val();
            if (offer_price != '') {
                $('#offer_price').val(Math.trunc(offer_price));
            }
        }
    </script>
@endsection
