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
                        <form action="{{ route('settings.create') }}" method="post">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <p>Flash News</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Title</label>
                                    <input type="text" class="form-control" name="flash_title" value="{{ settings('flash_title') }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Link</label>
                                    <input type="text" class="form-control" name="flash_link" value="{{ settings('flash_link') }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-12 mb-3">
                                    <label>Delivery Policy</label>
                                    <textarea class="summernote" name="delivery_policy">{{ settings('delivery_policy') }}</textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Privacy Policy</label>
                                    <textarea class="summernote" name="privacy_policy">{{ settings('privacy_policy') }}</textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Refund Policy</label>
                                    <textarea class="summernote" name="refund_policy">{{ settings('refund_policy') }}</textarea>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Trems of Use</label>
                                    <textarea class="summernote" name="terms_of_use">{{ settings('terms_of_use') }}</textarea>
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
