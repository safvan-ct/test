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
                    <center><div class="login-form">
                        <h2>Forgot Password</h2>

                        <p>Lost your password? Please enter your email address. You will receive a link to create a new password via email.</p>
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                            <div class="form-group">

                                <input type="text"  name="email" class="form-control" placeholder="Email" required>

                            @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>




                            <button  name="forgot" type="submit">Submit</button>
                        </form>

                        <div class="col-12 learts-mb-20"></br>
                            <a href="{{ route('login') }}" class="fw-400">Back to login</a>
                        </div>
                    </div></center>
                </div>


            </div>
        </div>
    </section>
@endsection




<!--@extends('layouts.app')-->

<!--@section('content')-->
<!--<div class="container">-->
<!--    <div class="row justify-content-center">-->
<!--        <div class="col-md-8">-->
<!--            <div class="card">-->
<!--                <div class="card-header">{{ __('Reset Password') }}</div>-->

<!--                <div class="card-body">-->
<!--                    @if (session('status'))-->
<!--                        <div class="alert alert-success" role="alert">-->
<!--                            {{ session('status') }}-->
<!--                        </div>-->
<!--                    @endif-->

<!--                    <form method="POST" action="{{ route('password.email') }}">-->
<!--                        @csrf-->

<!--                        <div class="form-group row">-->
<!--                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>-->

<!--                            <div class="col-md-6">-->
<!--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>-->

<!--                                @error('email')-->
<!--                                    <span class="invalid-feedback" role="alert">-->
<!--                                        <strong>{{ $message }}</strong>-->
<!--                                    </span>-->
<!--                                @enderror-->
<!--                            </div>-->
<!--                        </div>-->

<!--                        <div class="form-group row mb-0">-->
<!--                            <div class="col-md-6 offset-md-4">-->
<!--                                <button type="submit" class="btn btn-primary">-->
<!--                                    {{ __('Send Password Reset Link') }}-->
<!--                                </button>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </form>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!--@endsection-->
