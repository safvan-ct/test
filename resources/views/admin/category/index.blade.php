@extends('admin.layouts.app')

@section('title', 'Website Popup Banner')

@section('content')

    <div class="main-container">

        <div class="row gutters mb-3">
            <div class="col-md-12 mb-2">
                @include('admin.layouts.alert')
            </div>

            <div class="col-xs-2 mb-2">
                <button type="button" class="btn btn-primary" onclick="createUpdateModal(0)">ADD NEW</button>
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
                                    <th>Title</th>
                                    <th>Description</th>
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
                            <div class="col-md-12 mb-3">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title" id="title">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label>Description</label>
                                <textarea class="form-control" name="description" id="description"></textarea>
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
                ajax: "{{ route('category.result') }}",
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
                        data: 'description',
                        name: 'description'
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
            $('#heading').html('New Category');
            $('#createUpdateForm')[0].reset();

            if (id != 0) {
                $('#heading').html('Update Category');
                $('#title').val($('#title_' + id).html());
                $('#description').val($('#description_' + id).html());
            }
        }

        function createUpdatePost() {
            var url = "{{ route('category.create.update') }}";
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
