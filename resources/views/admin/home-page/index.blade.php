@extends('admin.layouts.app')

@section('title', 'Website Privacy Policy')

@section('content')

    <div class="main-container">

        <div class="row gutters mb-3">
            <div class="col-md-12 mb-2">
                @include('admin.layouts.alert')
            </div>
        </div>

        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('home.page.create') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <p>Offer Banner</p>
                                </div>
                                <div class="col-md-6 mb-1">
                                    <label>Link</label>
                                    <input type="text" class="form-control" name="offer_banner_link"
                                        value="{{ homePageContent('offer_banner_link') }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Image*</label>
                                    <input type="file" class="form-control" name="offer_banner_image" accept="image/*">
                                    <img src="{{ asset('/storage/uploads/home_page/' . homePageContent('offer_banner_image')) }}" style="width: 100px; height: 50px; margin-top: 10px;">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <p>Quiz</p>
                                </div>
                                <div class="col-md-6 mb-1">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="quiz_title"
                                        value="{{ homePageContent('quiz_title') }}">
                                </div>
                                <div class="col-md-6 mb-1">
                                    <label>Link</label>
                                    <input type="text" class="form-control" name="quiz_link"
                                        value="{{ homePageContent('quiz_link') }}">
                                </div>
                                {{-- <div class="col-md-12 mb-1">
                                    <label>Description</label>
                                    <textarea class="summernote" name="quiz_description">{{ homePageContent('quiz_description') }}</textarea>
                                </div> --}}
                                <div class="col-md-6 mb-3">
                                    <label>Image*</label>
                                    <input type="file" class="form-control" name="quiz_image" accept="image/*">
                                    <img src="{{ asset('/storage/uploads/home_page/' . homePageContent('quiz_image')) }}" style="width: 100px; height: 50px; margin-top: 10px;">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <p>Category</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Category 1</label>
                                    <select class="form-control" name="category_1">
                                        <option value="">Select Category</option>
                                        @foreach (categories() as $item)
                                            <option value="{{ $item->id }}" {{ homePageContent('category_1') == $item->id ? 'selected' : ''}}>
                                                {{ $item->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Category 2</label>
                                    <select class="form-control" name="category_2">
                                        <option value="">Select Category</option>
                                        @foreach (categories() as $item)
                                            <option value="{{ $item->id }}" {{ homePageContent('category_2') == $item->id ? 'selected' : ''}}>
                                                {{ $item->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <p>Sub Category</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <select class="form-control" name="sub_category">
                                        <option value="">Select Sub Category</option>
                                        @foreach (subCategories() as $item)
                                            <option value="{{ $item->id }}" {{ homePageContent('sub_category') == $item->id ? 'selected' : ''}}>
                                                {{ $item->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <p>About</p>
                                </div>
                                <div class="col-md-6 mb-1">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="about_title"
                                        value="{{ homePageContent('about_title') }}">
                                </div>
                                <div class="col-md-12 mb-1">
                                    <label>Description</label>
                                    <textarea class="summernote" name="about_description">{{ homePageContent('about_description') }}</textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Image*</label>
                                    <input type="file" class="form-control" name="about_image" accept="image/*">
                                    <img src="{{ asset('/storage/uploads/home_page/' . homePageContent('about_image')) }}" style="width: 100px; height: 50px; margin-top: 10px;">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary float-right">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
