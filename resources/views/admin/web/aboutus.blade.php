@extends('admin.layouts.app')

@section('title', 'Website about news')

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
                                    <th> Title</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($abouts as $about)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>

                                        <td>{{ $about->title }}</td>


                                        <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#edit{{ $about->id }}">Edit</button>

                                            {{-- <a class="delete_btn btn btn-danger btn-block" data-action="{{ $about->id }}"
                                                message="Delete the about">
                                                Delete
                                            </a>

                                            <form style="display: none" id="{{ $about->id }}" method="post"
                                                action="{{ route('about.destroy', $about) }}">
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
                    <h5 class="modal-title">New about</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('aboutus.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group row">


                            <div class="col-md-6 mb-3">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title"
                                    value="{{ old('title') }}">
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

    @foreach ($abouts as $about_edit)
        <div class="modal fade" id="edit{{ $about_edit->id }}" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit about</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="{{ route('aboutus.update', $about_edit) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group row">

                                <div class="col-md-6 mb-3">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="title"
                                        value="{{ $about_edit->title }}">
                                    @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                
                                 <div class="col-md-12 mb-3">
                                    <label>Heading</label>
                                    <textarea class="form-control summernote" name="heading" value="{{ old('heading') }}" required> {{ $about_edit->Heading }}</textarea>
                                    @error('heading')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>Description</label>
                                    <textarea class="form-control summernote" name="description" value="{{ old('description') }}" required> {{ $about_edit->description }}</textarea>
                                    @error('description')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                <h2>Counts</h2>
                                </br>
                                </div>
                                  <div class="col-md-6 mb-3">
                                    <label>Product Saled</label>
                                    <input type="text" class="form-control" name="productsaled"
                                        value="{{ $about_edit->Productsaled }}">
                                    @error('productsaled')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                
                                 <div class="col-md-6 mb-3">
                                    <label>Number Of Products</label>
                                    <input type="text" class="form-control" name="numberofproducts"
                                        value="{{ $about_edit->NumberofProducts }}">
                                    @error('numberofproducts')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label>Buyersactive</label>
                                    <input type="text" class="form-control" name="buyersactive"
                                        value="{{ $about_edit->Buyersactive }}">
                                    @error('buyersactive')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                  <div class="col-md-6 mb-3">
                                    <label>Rating</label>
                                    <input type="text" class="form-control" name="rating"
                                        value="{{ $about_edit->Rating }}">
                                    @error('rating')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                
                                
                                 <div class="col-md-12 mb-3">
                                <h2>Award & Recognition</h2>
                                </br>
                                </div>

                       <div class="col-md-12 mb-3">
                                    <label>Heading</label>
                                    <textarea class="form-control summernote" name="awardheading" value="{{ old('awardheading') }}" required> {{ $about_edit->awardheading }}</textarea>
                                    @error('awardheading')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>Description</label>
                                    <textarea class="form-control summernote" name="awarddescription" value="{{ old('awarddescription') }}" required> {{ $about_edit->awarddescription }}</textarea>
                                    @error('aearddescription')<span class="text-danger">{{ $message }}</span>@enderror
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
