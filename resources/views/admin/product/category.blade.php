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
                                    <th>Title</th>
                                    <th>Description</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $category)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        @foreach ($games as $game)
                                        @if ($game->id==$category->game)
                                        <td>{{ $game->title }}</td>
                                        @endif
                                        @endforeach
                                        <td>{{ $category->title }}</td>
                                         @if($category->description !="")
                                         <td>{!! $category->description !!}</td>
                                        @else
                                        <td></td>
                                        @endif

                                        <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit{{ $category->id }}">Edit</button>

                                            <a class="delete_btn btn btn-danger" data-action="{{ $category->id }}" message="Delete the category">
                                                Delete
                                            </a>

                                            <form style="display: none" id="{{ $category->id }}" method="post"
                                                action="{{ route('category.destroy', $category->id ) }}">
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
                    <h5 class="modal-title">New SubCategory</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-md-12 mb-3">
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
                            <div class="col-md-12 mb-3">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" value="{{ old('title') }}" required>
                                @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Description</label>
                                <textarea class="form-control summernote" name="description" value="{{ old('description') }}"> </textarea>
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

    @foreach ($datas as $category)
        <div class="modal fade" id="edit{{ $category->id }}" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit SubCategory</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="{{ route('category.update', $category->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group row">
                                <div class="col-md-12 mb-3">
                                    <label>Category</label>
                                    <select name="game" class="form-control" required onchange="getsubCats(this.value)">
                                        <option value="">Select SubCategory</option>
                                        @foreach ($games as $game)
                                        <option value="{{ $game->id }}"  >
                                            <option value="{{ $game->id }}"   {{ $game->id == $category->game ? 'selected' : '' }} >
                                                {{ $game->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('game')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="title" value="{{ $category->title }}">
                                    @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>Description</label>
                                    <textarea class="form-control summernote" name="description" value="{{ old('description') }}" > {{ $category->description }}</textarea>
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
    @endforeach
@endsection
