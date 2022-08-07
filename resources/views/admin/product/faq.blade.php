@extends('admin.layouts.app')

@section('title', 'Website data')

@section('content')

    <div class="main-container">

        <div class="row gutters mb-3">
            <div class="col-md-12 mb-2">
                @include('admin.layouts.alert')
            </div>

            <div class="col-xs-2 mb-2">
                <a href="{{ route('dashboard', 'product') }}" class="btn btn-primary">Back</a>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">
                    ADD NEW
                </button>
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
                                    <th>Question</th>
                                    <th>Answer</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{!! $data->question !!}</td>
                                        <td>{!! $data->answer !!}</td>
                                       
                                        <td>
                                            <button type="button" class="btn btn-primary btn-block" data-toggle="modal"
                                                data-target="#edit{{ $data->id }}">Edit</button>

                                            <a class="delete_btn btn btn-danger btn-block" data-action="{{ $data->id }}"
                                                message="Delete the data">
                                                Delete
                                            </a>

                                            <form style="display: none" id="{{ $data->id }}" method="post"
                                                action="{{ route('faq.destroy', $data->id ) }}">
                                                @csrf @method('delete')
                                            </form>
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

    <div class="modal fade" id="add" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('faq.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group row">

                           
                              <div class="col-md-12 mb-3">
                                <label>Question</label>
                                <textarea class="summernote" name="question" required> </textarea>

                                @error('question')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label>Answer</label>
                                <textarea class="summernote" name="answer" required> </textarea>

                                @error('answer')<span class="text-danger">{{ $message }}</span>@enderror
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
    </div>

    @foreach ($datas as $data)
        <div class="modal fade" id="edit{{ $data->id }}" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="{{ route('faq.update', $data->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group row">
                               

                                <div class="col-md-12 mb-3">
                                    <label>Question</label>
                                    <textarea class="summernote" name="question" required> {{ $data->question}} </textarea>
                                    @error('question')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>

                                    <div class="col-md-12 mb-3">
                                    <label>Answer</label>
                                    <textarea class="summernote" name="answer" required> {{ $data->answer }} </textarea>
                                    @error('answer')<span class="text-danger">{{ $message }}</span>@enderror
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
