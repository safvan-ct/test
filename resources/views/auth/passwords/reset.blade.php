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
                        <center><div class="login-form">
                            <h2>Reset Password</h2>




                          <form method="POST" action="{{ route('password.update') }}">
                              @csrf

                              <input type="hidden" name="token" value="{{ $token }}">



                    <div class="form-group">
                        <div class="col-12 learts-mb-30">

                            <input type="hidden" name="email"   class="form-control" value="{{ $email ?? old('email') }}" required>
                            @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </br>
                        <div class="col-12 learts-mb-30">

                            <input type="password" class="form-control"   placeholder="Password"  name="password" required>
                            @error('password')<span class="text-danger">{{ $message }}</span>@enderror
                        </div></br>

                        <div class="col-12 learts-mb-30">

                            <input type="password"  class="form-control"   placeholder="Confirm Password" name="password_confirmation" required>
                        </div>

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
<!--                    <form method="POST" action="{{ route('password.update') }}">-->
<!--                        @csrf-->

<!--                        <input type="hidden" name="token" value="{{ $token }}">-->

<!--                        <div class="form-group row">-->
<!--                            <label for="email" class="col-md-4 col-form-label text-md-right">-->
<!--                                {{ __('E-Mail Address') }}-->
<!--                            </label>-->

<!--                            <div class="col-md-6">-->
<!--                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>-->

<!--                                @error('email')-->
<!--                                    <span class="invalid-feedback" role="alert">-->
<!--                                        <strong>{{ $message }}</strong>-->
<!--                                    </span>-->
<!--                                @enderror-->
<!--                            </div>-->
<!--                        </div>-->

<!--                        <div class="form-group row">-->
<!--                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>-->

<!--                            <div class="col-md-6">-->
<!--                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">-->

<!--                                @error('password')-->
<!--                                    <span class="invalid-feedback" role="alert">-->
<!--                                        <strong>{{ $message }}</strong>-->
<!--                                    </span>-->
<!--                                @enderror-->
<!--                            </div>-->
<!--                        </div>-->

<!--                        <div class="form-group row">-->
<!--                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>-->

<!--                            <div class="col-md-6">-->
<!--                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">-->
<!--                            </div>-->
<!--                        </div>-->

<!--                        <div class="form-group row mb-0">-->
<!--                            <div class="col-md-6 offset-md-4">-->
<!--                                <button type="submit" class="btn btn-primary">-->
<!--                                    {{ __('Reset Password') }}-->
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
