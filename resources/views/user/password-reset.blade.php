@extends('layouts.app')

@section('title', 'Password reset')

@section('content')
    <!-- Start Page Title Area -->
    <section class="page-title-area page-title-bg1">
        <div class="container">
            <div class="page-title-content">
                <h1 title="MY ACCOUNT">MY ACCOUNT</h1>
            </div>
        </div>
    </section>
    <!-- End Page Title Area -->

    <!-- Start Profile Authentication Area -->
    <section class="profile-authentication-area ptb-100">
        <div class="container">
            <div class="row" style="padding-left: 30%;">
                <div class="col-lg-6 col-md-12">
                    <center>
                        <div class="login-form">
                            <h2>Reset Password</h2>
                            <form method="POST" action="{{ route('password.update') }}">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                <div class="form-group">
                                    <div class="col-12 learts-mb-30">
                                        <input type="hidden" name="email" class="form-control"
                                            value="{{ $email ?? old('email') }}" required>
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    </br>
                                    <div class="col-12 learts-mb-30">
                                        <input type="password" class="form-control" placeholder="Password" name="password"
                                            required>
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    </br>
                                    <div class="col-12 learts-mb-30">
                                        <input type="password" class="form-control" placeholder="Confirm Password"
                                            name="password_confirmation" required>
                                    </div>
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
