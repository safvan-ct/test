@extends('admin.layouts.app')

@section('title', 'Website Popup Banner')

@section('content')

    <div class="main-container">

        <div class="row gutters mb-3">
            <div class="col-md-12 mb-2">
                @include('admin.layouts.alert')
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
                                    <th>User</th>
                                    <th>Billing Address</th>
                                    <th>Products</th>
                                    <th>Purchased At</th>
                                    <th>Payment Id</th>
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
                ajax: "{{ route('orders.result', $type) }}",
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'user',
                        name: 'user'
                    },
                    {
                        data: 'billin_address',
                        name: 'billin_address'
                    },
                    {
                        data: 'products',
                        name: 'products',
                    },
                    {
                        data: 'purchased',
                        name: 'purchased',
                    },
                    {
                        data: 'payment_id',
                        name: 'payment_id',
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
    </script>
@endsection
