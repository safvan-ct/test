@extends('admin.layouts.app')

@section('title', 'Website slider')

@section('content')

    <div class="main-container">

        <div class="row gutters mb-3">
            <div class="col-md-12 mb-2">
                @include('admin.layouts.alert')
            </div>

            <div class="col-xs-2 mb-2">
                <a href="{{ route('dashboard', 'web') }}" class="btn btn-primary">Back</a>
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
                                    <th>First Title</th>
                                    <th>Second Title</th>
                                    <th>Link</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sliders as $slider)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>

                                        <td>{{ $slider->title }}</td>
                                        <td>{{ $slider->sub_title }}</td>
                                        <td>{{ $slider->link }}</td>
                                        <td>
                                            <img src="{{ asset('/storage/uploads/slider/' . $slider->image) }}"
                                                style="width: 100px; height: 50px">
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#edit{{ $slider->id }}">Edit</button>

                                            {{-- <a class="delete_btn btn btn-danger btn-block" data-action="{{ $slider->id }}"
                                                message="Delete the slider">
                                                Delete
                                            </a>

                                            <form style="display: none" id="{{ $slider->id }}" method="post"
                                                action="{{ route('slider.destroy', $slider) }}">
                                                @csrf @method('delete')
                                            </form> --}}
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
                    <h5 class="modal-title">New slider</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group row">


                            <div class="col-md-6 mb-3">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title"
                                    value="{{ old('title') }}" >
                                @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Sub Title</label>
                                <input type="text" class="form-control" name="sub_title"
                                    value="{{ old('sub_title') }}" >
                                @error('sub_title')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Link</label>
                                <input type="text" class="form-control" name="link"
                                    value="{{ old('link') }}" required>
                                @error('link')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Image (1920 * 720 px)</label>
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

    @foreach ($sliders as $slider_edit)
        <div class="modal fade" id="edit{{ $slider_edit->id }}" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit slider</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="{{ route('slider.update', $slider_edit) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group row">

                                <div class="col-md-6 mb-3">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="title"
                                        value="{{ $slider_edit->title }}">
                                    @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Sub Title</label>
                                    <input type="text" class="form-control" name="sub_title"
                                        value="{{ $slider_edit->sub_title }}">
                                    @error('second_title')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Link</label>
                                    <input type="text" class="form-control" name="link"
                                        value="{{ $slider_edit->link }}">
                                    @error('link')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Image (1920 * 720 px)</label>
                                    <input type="file" class="form-control" name="image">
                                    @error('image')<span class="text-danger">{{ $message }}</span>@enderror
                                    <img src="{{ asset('/storage/uploads/slider/' . $slider_edit->image) }}"
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
