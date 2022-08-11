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
                                    <th>Page</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Keyword</th>
                                    <th>Og Title</th>
                                    <th>OG Description</th>
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
                                <label>Description</label>
                                <input type="text" class="form-control" name="description" id="description">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Keywords</label>
                                <textarea class="form-control" name="keywords" id="keywords"></textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Og Title</label>
                                <textarea class="form-control" name="og_title" id="og_title"></textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Og Description</label>
                                <textarea class="form-control" name="og_description" id="og_description"></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Image</label>
                                <input type="file" class="form-control" name="image" id="file" accept="image/*">
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
                ajax: "{{ route('seo.result') }}",
                columns: [
                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'page',
                        name: 'page'
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
                        data: 'keywords',
                        name: 'keywords'
                    },
                    {
                        data: 'og_title',
                        name: 'og_title'
                    },
                    {
                        data: 'og_description',
                        name: 'og_description'
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
            $('#heading').html('New Seo');
            $('#createUpdateForm')[0].reset();

            if (id != 0) {
                $('#heading').html('Update Seo');
                $('#title').val($('#title_' + id).html());
                $('#description').val($('#description_' + id).html());
                $('#keywords').val($('#keywords_' + id).html());
                $('#og_titile').val($('#og_titile_' + id).html());
                $('#og_description').val($('#og_description_' + id).html());
                $('#image').show().attr("src", $('#image_' + id).html());
            }
        }

        function createUpdatePost() {
            var url = "{{ route('seo.create.update') }}";
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