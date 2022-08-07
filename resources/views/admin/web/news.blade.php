@extends('admin.layouts.app')

@section('title', 'Website news')

@section('content')

    <div class="main-container">

        <div class="row gutters mb-3">
            <div class="col-md-12 mb-2">
                @include('admin.layouts.alert')
            </div>

            <div class="col-xs-2 mb-2">
                <a href="{{ route('dashboard', 'web') }}" class="btn btn-primary">Back</a>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">
                    ADD NEW
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
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($newss as $news)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $news->title }}</td>
                                        <!--<td>{!! $news->description !!}</td>-->
                                        <td>
                                            <img src="{{ asset('/storage/' . $news->image) }}"
                                                style="width: 100px; height: 50px">
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-block" data-toggle="modal"
                                                data-target="#edit{{ $news->id }}">Edit</button>

                                            <a class="delete_btn btn btn-danger btn-block" data-action="{{ $news->id }}"
                                                message="Delete the News">
                                                Delete
                                            </a>

                                            <form style="display: none" id="{{ $news->id }}" method="post"
                                                action="{{ route('news.destroy', $news->id ) }}">
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
                    <h5 class="modal-title">New News & Events</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('news.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group row">

                            <div class="col-md-12 mb-3">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title"
                                    value="{{ old('first_title') }}" required>
                                @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label>Description</label>
                                <textarea class="summernote" name="description" required> </textarea>

                                @error('description')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
    <div class="col-md-6 mb-3">
                                <label>Alt</label>
                                <input type="text" class="form-control" name="alt"
                                    value="{{ old('alt') }}" >
                                @error('alt')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Image (420 * 331px)</label>
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

    @foreach ($newss as $news)
        <div class="modal fade" id="edit{{ $news->id }}" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Blog</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="{{ route('news.update', $news->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group row">
                                <div class="col-md-12 mb-3">
                                    <label> Title</label>
                                    <input type="text" class="form-control" name="title"
                                        value="{{ $news->title }}">
                                    @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>Description</label>
                                    <textarea class="summernote" name="description" required> {{ $news->description }} </textarea>
                                    @error('description')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                   <div class="col-md-6 mb-3">
                                    <label>alt</label>
                                    <input type="text" class="form-control" name="alt"
                                        value="{{ $news->alt }}">
                                    @error('alt')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>


                                <div class="col-md-6 mb-3">
                                    <label>Image (420 * 331px)</label>
                                    <input type="file" class="form-control" name="image">
                                    @error('image')<span class="text-danger">{{ $message }}</span>@enderror
                                    <img src="{{ asset('/storage/' . $news->image) }}"
                                        style="width: 100px; height: 50px; margin-top: 20px;">
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
