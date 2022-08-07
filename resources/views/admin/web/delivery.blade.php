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
                <div class="table-container">
                    <div class="table-responsive">
                        <table id="copy-print-csv" class="table custom-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                              
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($deliverys as $delivery)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                       
                                        <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#edit{{ $delivery->id }}">Edit</button>
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


    @foreach ($deliverys as $data)
        <div class="modal fade" id="edit{{ $data->id }}" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit delivery Policy</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="{{ route('deliverys.update', $data->id) }}" method="post"   enctype="multipart/form-data">
                       @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group row">
                                <div class="col-md-12 mb-3">
                                    <label>delivery Policy<Title></Title></label>

                                    <textarea class="summernote" name="delivery" required> {{ $data->delivery }}</textarea>

                                    @error('delivery')<span class="text-danger">{{ $message }}</span>@enderror
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
