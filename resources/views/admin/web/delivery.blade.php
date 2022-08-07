@extends('admin.layouts.app')

@section('title', 'Website delivery Policy')

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
                        <form action="{{ route('deliverys.update', $data->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group row">
                                <div class="col-md-12 mb-3">
                                    <label>Delivery Policy</label>
                                    <textarea class="summernote" name="delivery" required> {{ $data->delivery }}</textarea>
                                    @error('delivery')
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
