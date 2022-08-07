@extends('admin.layouts.app')

@section('title', 'Website Refund Policy')

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
                        <form action="{{ route('refund_update', $data->id) }}" method="post">
                            @csrf
                            <div class="form-group row">
                                <div class="col-md-12 mb-3">
                                    <label>Refund Policy</label>
                                    <textarea class="summernote" name="refund" required> {{ $data->refund }}</textarea>
                                    @error('refund')
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
