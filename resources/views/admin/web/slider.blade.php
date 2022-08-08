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
                {{-- <button type="button" class="btn btn-primary" onclick="createUpdateModal(0)">ADD NEW</button> --}}
            </div>
        </div>

        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="table-container">
                    <div class="table-responsive">
                        <table id="data-table" class="table custom-table w-100">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>First Title</th>
                                    <th>Second Title</th>
                                    <th>Link</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="create_update" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="heading"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="" method="post" enctype="multipart/form-data" id="createUpdateForm">
                    @csrf
                    <input type="hidden" class="form-control" name="id" id="id">
                    <div class="modal-body">
                        <div class="form-group row">
                            <div class="col-md-6 mb-3">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" id="title">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Sub Title</label>
                                <input type="text" class="form-control" name="sub_title" id="sub_title">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Link</label>
                                <input type="text" class="form-control" name="link" id="link" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Image (1920 * 720 px)</label>
                                <input type="file" class="form-control" name="image" id="file">
                                <img src="" style="width: 100px; height: 50px; margin-top: 20px;" id="image">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="createUpdatePost()">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(function() {
            results();
        });

        function results() {
            $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                destroy: true,
                ajax: "{{ route('slider.result') }}",
                columns: [
                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'title',
                        name: 'title'
                    },
                    {
                        data: 'sub_title',
                        name: 'sub_title'
                    },
                    {
                        data: 'link',
                        name: 'link'
                    },
                    {
                        data: 'image',
                        name: 'image',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
        }

        function createUpdateModal(id) {
            $('#id').val(id);
            $('#create_update').modal('toggle');
            $('#image').hide();
            $('#heading').html('New Slider');
            $('#createUpdateForm')[0].reset();

            if (id != 0) {
                $('#heading').html('Update Slider');
                $('#title').val($('#title_' + id).html());
                $('#sub_title').val($('#sub_title_' + id).html());
                $('#link').val($('#link_' + id).html());
                $('#image').show().attr("src", $('#image_' + id).html());
            }
        }

        function createUpdatePost() {
            var url = "{{ route('slider.create.update') }}";
            var form = $('#createUpdateForm')[0];

            $.ajax({
                url: url,
                method: "POST",
                data: new FormData(form),
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    if (data.response == 'success') {
                        $('#create_update').modal('toggle');
                        alertMessage('success', data.message)
                        results();
                    }
                    else if (data.response == 'error') {
                        alertMessage('error', data.message)
                    }
                },
                error: function(data) {
                    var errorText  = '';
                    $.each(data.responseJSON.errors, function(index, val) {
                        errorText += val+'<br>';
                    });
                    alertMessage('error', errorText)
                }
            });
        }
    </script>
@endsection
