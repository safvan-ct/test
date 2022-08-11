@extends('admin.layouts.app')

@section('title', 'Website about news')

@section('content')

    <div class="main-container">

        <div class="row gutters mb-3">
            <div class="col-md-12 mb-2">
                @include('admin.layouts.alert')
            </div>
        </div>

        <form action="{{ route('about.us.create') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <div class="col-md-6 mb-1">
                    <label>Heading</label>
                    <input type="text" class="form-control" name="about_heading"
                        value="{{ settings('about_heading') }}">
                </div>

                <div class="col-md-6 mb-1">
                    <label>Title</label>
                    <input type="text" class="form-control" name="about_title"
                        value="{{ settings('about_title') }}">
                </div>

                <div class="col-md-12 mb-3">
                    <label>Description</label>
                    <textarea class="form-control summernote" name="about_description">{{ settings('about_description') }}</textarea>
                </div>

                <div class="col-md-12 mb-1">
                    <p>Award & Recognition</p>
                </div>

                <div class="col-md-6 mb-1">
                    <label>Heading</label>
                    <input type="text" class="form-control" name="award_heading"
                        value="{{ settings('award_heading') }}">
                </div>

                <div class="col-md-12 mb-3">
                    <label>Description</label>
                    <textarea class="form-control summernote" name="award_description">{{ settings('award_description') }}</textarea>
                </div>

                <div class="col-md-12 mb-3">
                    <button type="submit" class="btn btn-primary float-right">Update</button>
                </div>
            </div>
        </form>
    </div>
@endsection
