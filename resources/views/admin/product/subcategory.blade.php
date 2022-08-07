@extends('admin.layouts.app')

@section('title', 'Account Category')

@section('content')

    <div class="main-container">

        <div class="row gutters mb-3">
            <div class="col-md-12 mb-2">
                @include('admin.layouts.alert')
            </div>

            <div class="col-xs-2 mb-2">
                <a href="{{ route('dashboard', 'product') }}" class="btn btn-primary">Back</a>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">
                    ADD SubCategory
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
                                     <th>Category</th>
                                    <th>sub Category</th>
                                    <th>Title</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $subcat)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>

                                              @foreach ($games as $game)
                                        @if ($game->id==$subcat->game)

                                        <td>{{ $game->title }}</td>
                                        @endif
                                        @endforeach

                                        @foreach ($cats as $cat)
                                        @if ($cat->id==$subcat->catid)

                                        <td>{{ $cat->title }}</td>
                                        @endif
                                        @endforeach
                                        <td>{{ $subcat->subtitle }}</td>
                                        @if( $catss->description !=")
                                           <td>{!! $catss->description !!}</td>
                                        @else
                                        <td></td>
                                        @endif
                                     

                                        <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit{{ $subcat->id }}">Edit</button>

                                            <a class="delete_btn btn btn-danger" data-action="{{ $subcat->id }}" message="Delete the subcat">
                                                Delete
                                            </a>

                                            <form style="display: none" id="{{ $subcat->id }}" method="post"
                                                action="{{ route('subcat.destroy', $subcat->id ) }}">
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
                    <h5 class="modal-title">New Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('subcat.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group row">
                            <!--<div class="col-md-12 mb-3">-->
                            <!--    <label>Game</label>-->
                            <!--    <select name="cat" class="form-control" required onchange="getsubCats(this.value)">-->
                            <!--        <option value="">Select subCategory</option>-->
                            <!--        @foreach ($cats as $cat)-->
                            <!--            <option value="{{ $cat->id }}"  >-->
                            <!--                {{ $cat->title }}-->
                            <!--            </option>-->
                            <!--        @endforeach-->
                            <!--    </select>-->
                            <!--    @error('cat')<span class="text-danger">{{ $message }}</span>@enderror-->
                            <!--</div>-->


                            <div class="col-md-6 mb-3">
                                <label>Game</label>
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
                                <label>Category</label>
                                <select name="cat" class="form-control" onchange="getsubsubCats(this.value)" id="sub_cat" required >
                                    <option value="">Select category</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" value="{{ old('title') }}" required>
                                @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Description</label>
                                <textarea class="form-control summernote" name="description" value="{{ old('description') }}" > </textarea>
                                @error('description')<span class="text-danger">{{ $message }}</span>@enderror
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

    @foreach ($datas as $subcategory)
        <div class="modal fade" id="edit{{ $subcategory->id }}" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit subCategory</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="{{ route('subcat.update', $subcategory->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group row">
                                <!--<div class="col-md-12 mb-3">-->
                                <!--    <label>Sub Category</label>-->
                                <!--    <select name="cat" class="form-control" required onchange="getsubCats(this.value)">-->
                                <!--        <option value="">Select subCategory</option>-->
                                <!--        @foreach ($cats as $cat)-->
                                <!--       >-->
                                <!--            <option value="{{ $cat->id }}"   {{ $cat->id == $subcategory->catid ? 'selected' : '' }} >-->
                                <!--                {{ $cat->title }}-->
                                <!--            </option>-->
                                <!--        @endforeach-->
                                <!--    </select>-->
                                <!--    @error('game')<span class="text-danger">{{ $message }}</span>@enderror-->
                                <!--</div>-->


                                     <div class="col-md-4 mb-3">
                                    <label>Game</label>
                                    <select name="game" class="form-control" required
                                        onchange="getsubCats{{ $subcategory->id }}(this.value)">
                                        <option value="">Select Category</option>
                                        @foreach ($games as $game)
                                            <option value="{{ $game->id }}"
                                                {{ $game->id == $subcategory->game  ? 'selected' : '' }}>
                                                {{ $game->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('game')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label> Category</label>
                                    <select name="cat" class="form-control"  required
                                        id="sub_cat{{ $subcategory->id }}">
                                        <option value="">Select Category</option>
                                        @foreach ($cats as $category)
                                            @if ($category->game == $subcategory->game)
                                                <option value="{{ $category->id }}"
                                                    {{ $category->id == $subcategory->catid ? 'selected' : '' }}>
                                                    {{ $category->title }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                    @error('category')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="title" value="{{ $subcategory->subtitle }}">
                                    @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>Description</label>
                                    <textarea class="form-control summernote" name="description" value="{{ old('description') }}" > {{ $subcategory->description }}</textarea>
                                    @error('description')<span class="text-danger">{{ $message }}</span>@enderror
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
            function getsubCats{{ $subcategory->id }}(catid) {
                if (catid != '') {
                    $('#sub_cat{{ $subcategory->id }}').empty().append($("<option></option>")
                        .attr("value", '').text('Select  Category'));

                        $('#subsub_cat{{ $subcategory->id }}').empty().append($("<option></option>")
                    .attr("value", '').text('Select Category'));



                    var action = '{{ route('getsubCat', ':id') }}';
                    action = action.replace(':id', catid);
                    $.ajax({
                        url: action,
                        type: "get",
                        dataType: 'json',
                        success: function(response) {
                            $.each(response.subcat, function(key, value) {
                                console.log(value);
                                $('#sub_cat{{ $subcategory->id }}').append($("<option></option>")
                                    .attr("value", value.id).text(value.title));
                            });
                        }
                    });
                }
            }
    </script>
    @endforeach
@endsection
