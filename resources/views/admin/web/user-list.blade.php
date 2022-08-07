@extends('admin.layouts.app')

@section('title', 'User List')

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
                                    <th>Name</th>
                                    
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                       
                                        <td>{{ $user->email }}</td>
                                           <td>
                                      @if($user->ban==0)

                                            <a class=" btn btn-danger btn-block" href="{{ route('userban', $user->id ) }}"
                                                message="Ban the User">
                                                ban
                                            </a>
                                            <form style="display: none" id="a{{ $user->id }}" method="get"
                                                action="{{ route('userban', $user->id ) }}">
                                                @csrf 
                                            </form>
                                            
                                            @else
                                            
                                            
                                             <a class=" btn btn-primary btn-block" href="{{ route('userunban', $user->id ) }}"
                                                message="Unban the User">
                                                Unban
                                            </a>
                                            <form style="display: none" id="{{ $user->id }}" method="get" action="{{ route('userunban', $user->id ) }}">
                                                @csrf
                                            </form>
                                            
                                            @endif
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

@endsection
