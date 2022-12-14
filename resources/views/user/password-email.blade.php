@extends('layouts.app')

@section('title', 'Password reset')

@section('content')
    <section class="profile-authentication-area ptb-100">
        <div class="container">
            @if (session('status'))
                <div class="alert alert-success" role="alert">{{ session('status') }}</div>
            @endif
            <div class="row" style="padding-left: 30%;">
                <div class="col-lg-6 col-md-12">
                    <center>
                        <div class="login-form">
                            <h2>Forgot Password</h2>

                            <p>Lost your password? Please enter your email address. You will receive a link to create a new
                                password via email.</p>
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="email" class="form-control" placeholder="Email" required>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <button name="forgot" type="submit">Submit</button>
                            </form>
                            <div class="col-12 learts-mb-20"></br>
                                <a href="{{ route('login') }}" class="fw-400">Back to login</a>
                            </div>
                        </div>
                    </center>
                </div>
            </div>
        </div>
    </section>
@endsection
