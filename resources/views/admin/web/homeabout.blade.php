@extends('admin.layouts.app')

@section('title', 'Website homeabout news')

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
                                    <th>Title</th>
                                    <th>Images</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($homeabouts as $homeabout)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>

                                        <td>{{ $homeabout->title }}</td>
                                        <!-- @if( $homeabout->title =="")-->
                                        <!--   <td>{{ $homeabout->title }}</td>-->
                                        <!--@else-->
                                        <!--<td></td>-->
                                        <!--@endif-->
                                     
                                        
                                    
                                       
                                     

                                        <td>
                                            <img src="{{ asset('/storage/' . $homeabout->image) }}"
                                                style="width: 100px; height: 50px">
                                        </td>
                                         
                                        <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#edit{{ $homeabout->id }}">Edit</button>

                                            {{-- <a class="delete_btn btn btn-danger btn-block" data-action="{{ $homeabout->id }}"
                                                message="Delete the homeabout">
                                                Delete
                                            </a>

                                            <form style="display: none" id="{{ $homeabout->id }}" method="post"
                                                action="{{ route('homeabout.destroy', $homeabout) }}">
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
{{--
    <div class="modal fade" id="add" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New homeabout</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('homeabout.store') }}" method="post" enctype="multipart/form-data">
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
                                <label>link</label>
                                <input type="text" class="form-control" name="link"
                                    value="{{ old('link') }}" required>
                                @error('link')<span class="text-danger">{{ $message }}</span>@enderror
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
    </div> --}}

    @foreach ($homeabouts as $homeabout_edit)
        <div class="modal fade" id="edit{{ $homeabout_edit->id }}" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit homeabout</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="{{ route('homeabout.update', $homeabout_edit) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group row">

                                <div class="col-md-6 mb-3">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="title"
                                        value="{{ $homeabout_edit->title }}">
                                    @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>Description</label>
                                    <textarea class="form-control summernote" name="description" value="{{ old('description') }}" required> {{ $homeabout_edit->description }}</textarea>
                                    @error('description')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                
                                
                                 <div class="col-md-6 mb-3">
                                    <label>alt</label>
                                    <input type="text" class="form-control" name="alt"
                                        value="{{ $homeabout_edit->alt }}">
                                    @error('alt')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                              <div class="col-md-6 mb-3">
                                    <label>Image(1280 * 720 px) </label>
                                    <input type="file" class="form-control" name="image">
                                    @error('image')<span class="text-danger">{{ $message }}</span>@enderror
                                    <img src="{{ asset('/storage/uploads/homeabout/' . $homeabout_edit->image) }}"
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
