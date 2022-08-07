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
                    ADD cats
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
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $catss)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $catss->title }}</td>
                                        <td>{!! $catss->description !!}</td>

                                        <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit{{ $catss->id }}">Edit</button>

                                            <a class="delete_btn btn btn-danger" data-action="{{ $catss->id }}" message="Delete the cats">
                                                Delete
                                            </a>

                                            <form style="display: none" id="{{ $catss->id }}" method="post"
                                                action="{{ route('cats.destroy', $catss->id ) }}">
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
                    <h5 class="modal-title">New cats</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('cats.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group row">


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

    @foreach ($datas as $cats)
        <div class="modal fade" id="edit{{ $cats->id }}" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit cats</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="{{ route('cats.update', $cats->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group row">


                                <div class="col-md-12 mb-3">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="title" value="{{ $cats->title }}">
                                    @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>


                            <div class="col-md-12 mb-3">
                                <label>Description</label>
                                <textarea class="form-control summernote" name="description" value="{{ old('description') }}" > {{ $cats->description }}</textarea>
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
