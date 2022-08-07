@foreach ($datas as $account)

    <div class="modal fade" id="view{{ $account->id }}" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Product : {{ $account->name}}</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            {{-- </br>
                <center><div class="col-xs-12 mb-2">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">
                        ADD New Credentials
                    </button>
                </div></center> --}}


        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="table-container">
                    <div class="table-responsive">
                        <table id="copy-print-csv" class="table custom-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Email</th>
                                    <th>Stream Username</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($credentials as $credential)
                                @if($credential->pid == $account->id)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $credential->email}}</td>
                                        <td>{{ $credential->stream_username}}</td>

                                        <td>

                                            @if($credential->send !='yes')


                                            <a class="delete_btn btn btn-danger" data-action="cre{{ $credential->id }}" message="Delete the credential">
                                                Delete
                                            </a>

                                            @else
                                            <h3 class="text-danger">Sold</h3>
                                            @endif

                                            <form style="display: none" id="cre{{ $credential->id }}" method="post"
                                                action="{{ route('credentials.destroy',$credential->id ) }}">
                                                @csrf @method('delete')
                                            </form>
                                        </td>

                                    </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

            </div>
        </div>
    </div>
@endforeach
