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

                                    <th>Image</th>
                                    <th>link</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($advs as $adv)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>

                                        <td>
                                            <img src="{{ asset('/storage/uploads/adv/' . $adv->image) }}"
                                                style="width: 100px; height: 50px">
                                        </td>
                                        <td>{{ $adv->link }}</td>

                                        <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#edit{{ $adv->id }}">Edit</button>


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


    @foreach ($advs as $adv_edit)
        <div class="modal fade" id="edit{{ $adv_edit->id }}" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Advertisement</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="{{ route('adv.update', $adv_edit) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group row">
                                <div class="col-md-6 mb-3">
                                    <label>Link</label>
                                    <input type="text" class="form-control" name="link"
                                        value="{{ $adv_edit->link }}">
                                    @error('link')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
 <div class="col-md-6 mb-3">
                                    <label>alt</label>
                                    <input type="text" class="form-control" name="alt"
                                        value="{{ $adv_edit->alt }}">
                                    @error('alt')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Image (675 * 353 px)</label>
                                    <input type="file" class="form-control" name="image">
                                    @error('image')<span class="text-danger">{{ $message }}</span>@enderror
                                    <img src="{{ asset('/storage/uploads/adv/' . $adv_edit->image) }}"
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
