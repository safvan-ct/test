@extends('admin.layouts.app')

@section('title', 'Website Terms of Use')

@section('content')

    <div class="main-container">

        <div class="row gutters mb-3">
            <div class="col-md-12 mb-2">
                @include('admin.layouts.alert')
            </div>

            <div class="col-xs-2 mb-2">
                <a href="{{ route('dashboard', 'web') }}" class="btn btn-primary">Back</a>
            </div>
        </div>

        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('terms_update', $data->id) }}" method="post">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-12 mb-3">
                                    <label>Terms of Use</label>
                                    <textarea class="summernote" name="terms" required> {{ $data->terms }}</textarea>
                                    @error('terms')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary float-right" name="case"
                                value="insert">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
